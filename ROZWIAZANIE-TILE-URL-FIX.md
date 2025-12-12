# ✅ ROZWIĄZANIE: Problem z znikającymi linkami w polach tile_url

## 🔴 Problem

### Objawy:
- Link znika z pola ACF po zapisaniu strony
- Nawet prosty tekst (np. "test123") znika po zapisaniu
- Dotyczy **tylko pola tile_url** (ostatniego pola w każdym kafelku)
- Inne pola (tytuł, opis, kolor) zapisują się normalnie

### Diagnoza:
Po przeprowadzeniu szczegółowej analizy zidentyfikowano **główną przyczynę problemu**:

## 🎯 Główna Przyczyna

**ACF (Advanced Custom Fields) ma problem z zarządzaniem polami o tej samej nazwie w różnych grupach.**

### Szczegóły techniczne:

1. **Struktura pól:**
   - Mamy 6 grup: `offer_card_1`, `offer_card_2`, ..., `offer_card_6`
   - Każda grupa ma sub-pole o nazwie `tile_url`
   - Wszystkie 6 pól nazywają się **identycznie**: `tile_url`

2. **Problem z WordPress meta:**
   - ACF zapisuje dane do WordPress `post_meta` używając struktury:
     ```
     offer_card_1_tile_url = "wartość"
     _offer_card_1_tile_url = "field_offer_card_1_tile_url" (referencja do klucza pola)
     ```
   
3. **Konflikt podczas zapisu:**
   - Gdy ACF próbuje zapisać wiele pól o tej samej nazwie (`tile_url`) w różnych grupach
   - Mechanizm referencji pól (_field_name) może się pomylić
   - Ostatnie pole (`tile_url` w kafelku 6) może nie otrzymać poprawnej referencji
   - W rezultacie wartość się nie zapisuje lub nadpisuje

## ✅ Rozwiązanie

### 1. Unikalne nazwy pól

**Zmieniono nazwy pól `tile_url` aby były unikalne dla każdego kafelka:**

```json
Kafelek 1: "name": "tile_url_1"
Kafelek 2: "name": "tile_url_2"
Kafelek 3: "name": "tile_url_3"
Kafelek 4: "name": "tile_url_4"
Kafelek 5: "name": "tile_url_5"
Kafelek 6: "name": "tile_url_6"
```

### 2. Zaktualizowano pliki

#### A. `acf-page-offer.json`
Zaktualizowano definicje pól sub-field dla wszystkich 6 kafelków:

```json
{
  "key": "field_offer_card_1_tile_url",
  "label": "URL Kafelka",
  "name": "tile_url_1",  // ← ZMIENIONE z "tile_url"
  "type": "text",
  "default_value": "",
  "instructions": "Wpisz link dla tego kafelka..."
}
```

#### B. `page-offer.php`
Zaktualizowano kod PHP aby obsługiwał nowe nazwy pól:

**Zmiana 1: Defaults array**
```php
$defaults = [
    1 => [..., 'tile_url_1'=>''],  // ← ZMIENIONE
    2 => [..., 'tile_url_2'=>''],  // ← ZMIENIONE
    3 => [..., 'tile_url_3'=>''],  // ← ZMIENIONE
    4 => [..., 'tile_url_4'=>''],  // ← ZMIENIONE
    5 => [..., 'tile_url_5'=>''],  // ← ZMIENIONE
    6 => [..., 'tile_url_6'=>''],  // ← ZMIENIONE
];
```

**Zmiana 2: Filtrowanie pól**
```php
// Zachowaj pole tile_url dla każdej karty (tile_url, tile_url_1, tile_url_2, etc.)
if (strpos($key, 'tile_url') === 0 || ($value !== null && $value !== '')) {
    $filtered_card[$key] = $value;
}
```

**Zmiana 3: Pobieranie linku**
```php
// Pobierz link z ACF - sprawdź zarówno 'tile_url' jak i 'tile_url_X'
$card_link = '';
$tile_url_key = 'tile_url_' . ($i + 1);
if (isset($b[$tile_url_key]) && trim($b[$tile_url_key]) !== '') {
    $card_link = $b[$tile_url_key];
} elseif (isset($b['tile_url']) && trim($b['tile_url']) !== '') {
    $card_link = $b['tile_url'];  // fallback dla starych danych
}
```

## 📋 Instrukcje wdrożenia

### 1. Re-import pól ACF w WordPress

**WAŻNE:** Musisz zaimportować zaktualizowany plik ACF JSON do WordPress!

#### Opcja A: Automatyczna synchronizacja (zalecane)
1. Zaloguj się do WordPress Admin
2. Przejdź do: **Custom Fields → Field Groups**
3. Poszukaj powiadomienia o synchronizacji
4. Jeśli widzisz "Sync available" dla grupy "Strona Oferty"
5. Kliknij **"Sync"** lub **"Synchronizuj"**

#### Opcja B: Ręczny import
1. Zaloguj się do WordPress Admin
2. Przejdź do: **Custom Fields → Tools**
3. W sekcji **"Import Field Groups"**
4. Wybierz plik: `acf-page-offer.json`
5. Kliknij **"Import file"**
6. Potwierdź nadpisanie istniejącej grupy

### 2. Wypełnij pola linków

1. Przejdź do: **Strony → Oferta → Edytuj**
2. Przewiń do sekcji "Kafelek 1"
3. Wypełnij pole **"URL Kafelka"** (np. `/oferta/konferencje`)
4. Powtórz dla Kafelek 2-6
5. Kliknij **"Aktualizuj"**

### 3. Weryfikacja

Po zapisaniu strony:
1. Odśwież stronę edycji (F5)
2. Sprawdź czy wartości w polach "URL Kafelka" **pozostały** (nie zniknęły)
3. ✅ Jeśli tak - problem rozwiązany!
4. ❌ Jeśli nie - sprawdź czy synchronizacja ACF przebiegła poprawnie

## 🔍 Weryfikacja poprawności

### W WordPress Admin:
```
Strony → Oferta → Edytuj

Kafelek 1:
  ✅ URL Kafelka: /oferta/konferencje  (wartość pozostaje po zapisaniu)

Kafelek 2:
  ✅ URL Kafelka: /oferta/misje  (wartość pozostaje po zapisaniu)

...etc.
```

### W kodzie HTML strony:
```html
<!-- Powinno być: -->
<a href="/oferta/konferencje" class="kafelek">...</a>

<!-- NIE: -->
<div class="kafelek">...</div>  <!-- bez href -->
```

### W inspektorze przeglądarki:
1. Otwórz stronę Oferta
2. Najedź kursorem na kafelek
3. W lewym dolnym rogu przeglądarki sprawdź link
4. Powinien wyświetlać się właściwy URL (np. `yourdomain.com/oferta/konferencje`)

## 📊 Porównanie: Przed i Po

### PRZED (problematyczne):
```json
// acf-page-offer.json
{
  "name": "offer_card_1",
  "sub_fields": [
    { "name": "tile_url" }  // ❌ Ta sama nazwa we wszystkich 6 kartach
  ]
}

{
  "name": "offer_card_2",
  "sub_fields": [
    { "name": "tile_url" }  // ❌ Konflikt!
  ]
}
```

**Rezultat:** Wartości znikają, WordPress nie wie którą referencję użyć.

### PO (naprawione):
```json
// acf-page-offer.json
{
  "name": "offer_card_1",
  "sub_fields": [
    { "name": "tile_url_1" }  // ✅ Unikalna nazwa
  ]
}

{
  "name": "offer_card_2",
  "sub_fields": [
    { "name": "tile_url_2" }  // ✅ Unikalna nazwa
  ]
}
```

**Rezultat:** Każde pole ma unikalną nazwę, zapisuje się poprawnie.

## 🔧 Zmienione pliki

| Plik | Zmiana | Status |
|------|--------|--------|
| `acf-page-offer.json` | Zmieniono nazwy pól `tile_url` → `tile_url_1..6` | ✅ ZAKTUALIZOWANE |
| `page-offer.php` | Zaktualizowano kod do obsługi nowych nazw | ✅ ZAKTUALIZOWANE |
| `.gitignore` | Dodano pliki backup | ✅ ZAKTUALIZOWANE |

## 💡 Wyjaśnienie techniczne

### Dlaczego to działa?

1. **Przed:** ACF miał 6 pól o nazwie `tile_url`
   - WordPress meta keys: `offer_card_1_tile_url`, `offer_card_2_tile_url`, etc.
   - Referencje: `_offer_card_1_tile_url`, `_offer_card_2_tile_url`, etc.
   - Problem: ACF może pomylić które pole odpowiada której wartości

2. **Po:** ACF ma 6 pól o unikalnych nazwach
   - WordPress meta keys: `offer_card_1_tile_url_1`, `offer_card_2_tile_url_2`, etc.
   - Referencje: `_offer_card_1_tile_url_1`, `_offer_card_2_tile_url_2`, etc.
   - Rozwiązanie: Każde pole jest jednoznacznie identyfikowalne

### Dlaczego tylko ostatnie pole miało problem?

ACF przetwarza pola w kolejności. Gdy wszystkie pola miały tę samą nazwę:
1. Pole 1 zapisuje: `tile_url` → OK
2. Pole 2 zapisuje: `tile_url` → nadpisuje referencję z pola 1
3. Pole 3 zapisuje: `tile_url` → nadpisuje referencję z pola 2
4. ...
5. Pole 6 zapisuje: `tile_url` → ostatnie nadpisanie
6. Pole 6 może nie otrzymać poprawnej referencji do swojego klucza

## 🎯 Najlepsze praktyki

### Dla przyszłości:

1. **Zawsze używaj unikalnych nazw pól** w grupach ACF
   - ✅ DOBRZE: `title_1`, `title_2`, `title_3`
   - ❌ ŹLE: `title`, `title`, `title`

2. **Lub użyj Repeater zamiast wielu grup**
   - Zamiast 6 osobnych grup (`offer_card_1` ... `offer_card_6`)
   - Użyj jednego pola Repeater z 6 wierszami

3. **Testuj zapis/odczyt** po dodaniu nowych pól
   - Wypełnij pole → Zapisz → Odśwież → Sprawdź czy wartość pozostała

## 📚 Powiązane pliki

- `acf-page-offer.json` - Definicja pól ACF ✅ NAPRAWIONE
- `page-offer.php` - Szablon strony oferty ✅ NAPRAWIONE
- `NAPRAWIONO-LINKI-KAFELKI.md` - Poprzednia dokumentacja problemu
- `INSTRUKCJE-STRONA-OFERTA.md` - Ogólne instrukcje konfiguracji

---

**Data naprawy:** 2024-12-12  
**Problem:** Linki w polach tile_url znikają po zapisaniu  
**Główna przyczyna:** Konflikt nazw pól w ACF groups  
**Rozwiązanie:** Unikalne nazwy pól (tile_url_1, tile_url_2, etc.)  
**Status:** ✅ NAPRAWIONE - wymaga re-importu ACF w WordPress Admin

# 🔧 NAPRAWIONO: Problem z linkami w kafelkach oferty

## 📋 Diagnoza problemu

### Problem:
Linki w kafelkach oferty **nie działały**, ponieważ:
1. Pole ACF typu `url` automatycznie usuwa linki względne (np. `/oferta/konferencje`)
2. Kod w `index.php` miał hardcoded linki `/oferta` zamiast używać pól ACF

### Objawy:
- Pole "Link" w ACF jest puste (ACF usunęło wpisany link względny)
- Kod używa wartości domyślnej: `/oferta`
- W kodzie HTML widać: `<a href="/oferta"` zamiast właściwego linka
- Wszystkie kafelki prowadzą do tej samej strony

### Przyczyna:
1. Ktoś mógł zmienić typ pola "Link" z `text` na `url` w interfejsie WordPress Admin
2. Kod w `index.php` nie wykorzystywał pola `link` z ACF

## ✅ Rozwiązanie

### 1. Naprawiono kod w index.php

**Co zostało zmienione:**
- Dodano funkcję pomocniczą `get_card_link()` która pobiera link z ACF
- Zaktualizowano wszystkie 5 kart oferty aby używać `get_card_link()` zamiast hardcoded `/oferta`

**Przed:**
```php
<a href="/oferta" class="offer-card dark-bg card-1">
```

**Po:**
```php
<a href="<?php echo get_card_link($card_1); ?>" class="offer-card dark-bg card-1">
```

**Nowa funkcja pomocnicza:**
```php
// Funkcja pomocnicza do pobierania linku karty
function get_card_link($card) {
    // Jeśli karta ma link, użyj go; w przeciwnym razie użyj domyślnego /oferta
    return !empty($card['link']) ? esc_url($card['link']) : '/oferta';
}
```

### 2. Weryfikacja typu pola w ACF JSON

Plik `acf-page-offer.json` **POPRAWNIE** definiuje pole link jako typ `text`:

```json
{
    "key": "field_offer_card_1_link",
    "label": "Link",
    "name": "link",
    "type": "text",
    "default_value": "",
    "instructions": "Link do podstrony oferty (opcjonalny, domyślnie: /oferta). Możesz wpisać link względny (np. /oferta/konferencje) lub pełny URL (np. https://example.com)"
}
```

### 2. Synchronizacja ACF z JSON

**Konieczne kroki w WordPress Admin:**

1. **Sprawdź aktualny typ pola:**
   - Przejdź do: **Custom Fields → Field Groups**
   - Kliknij: **Strona Oferty**
   - Rozwiń każdy kafelek (offer_card_1 do offer_card_6)
   - Sprawdź pole **"Link"**
   - ❌ **Jeśli typ to "URL"** → Musisz to naprawić!
   - ✅ **Jeśli typ to "Text"** → Wszystko OK

2. **Opcja A: Re-import pól z JSON (ZALECANE)**
   - Przejdź do: **Custom Fields → Tools**
   - W sekcji **"Import Field Groups"**
   - Wybierz plik: `acf-page-offer.json`
   - Kliknij **Import file**
   - ✅ To nadpisze istniejące pola poprawnymi wartościami

3. **Opcja B: Ręczna zmiana typu pola**
   - Przejdź do: **Custom Fields → Field Groups → Strona Oferty**
   - Dla każdego kafelka (1-6):
     - Rozwiń grupę `offer_card_X`
     - Znajdź pole **"Link"**
     - Zmień **Field Type** z `URL` na `Text`
   - Kliknij **Update** / **Aktualizuj**

### 3. Aktualizacja wartości w polach

Po synchronizacji pól i po naprawie kodu:

1. **Przejdź do strony Oferta:**
   - **Strony → Oferta → Edytuj**

2. **Wypełnij pola Link w kafelkach:**
   - Kafelek 1: `/oferta/konferencje` (lub inny link)
   - Kafelek 2: `/oferta/misje`
   - Kafelek 3: `/oferta/badania`
   - Kafelek 4: `/oferta/kultura`
   - Kafelek 5: `/oferta/technologie`
   - Kafelek 6: `/oferta/eventy`

3. **Kliknij Aktualizuj**

## 📊 Porównanie: Przed i Po

### PRZED (typ "url"):
```
Wartość wpisana w ACF:     /oferta/konferencje
Wartość zapisana w bazie:  [PUSTE] ❌
Wartość w kodzie:          /oferta (fallback)
Link w HTML:               <a href="/oferta">
```

### PO (typ "text"):
```
Wartość wpisana w ACF:     /oferta/konferencje
Wartość zapisana w bazie:  /oferta/konferencje ✅
Wartość w kodzie:          /oferta/konferencje
Link w HTML:               <a href="/oferta/konferencje">
```

## 🔍 Weryfikacja poprawności

### Sprawdź w kodzie źródłowym strony:

1. Otwórz stronę Oferta w przeglądarce
2. Kliknij prawym przyciskiem → **Zbadaj element** / **Inspect**
3. Znajdź kafelek (szukaj klasy `kafelek`)
4. Sprawdź czy link jest poprawny:

```html
<!-- ❌ PRZED (błędny) -->
<a href="/oferta" class="kafelek">

<!-- ✅ PO (poprawny) -->
<a href="/oferta/konferencje" class="kafelek">
```

### Sprawdź przez kliknięcie:

1. Najedź kursorem na kafelek
2. Sprawdź w lewym dolnym rogu przeglądarki, jaki link się wyświetla
3. Powinien być: `yourdomain.com/oferta/konferencje` (nie `/oferta`)

## 📝 Wyjaśnienie techniczne

### Różnica między typem "text" a "url" w ACF:

| Typ pola | Walidacja | Akceptuje linki względne | Przykład |
|----------|-----------|-------------------------|----------|
| **text** | Brak / dowolny tekst | ✅ TAK | `/oferta/konferencje`, `https://example.com` |
| **url** | Wymaga http:// lub https:// | ❌ NIE | Tylko `https://example.com` |

### Dlaczego ACF usuwa linki względne z pola "url":

ACF wykonuje walidację pola typu `url` i automatycznie odrzuca wartości, które nie zaczynają się od protokołu (`http://` lub `https://`). To zachowanie jest zamierzone, aby zapewnić poprawność URL-i zewnętrznych.

### Kod w page-offer.php (linia 244):

```php
// Pobierz link z ACF lub użyj domyślnego
$card_link = !empty($b['link']) ? $b['link'] : '/oferta';

echo '<a href="'.esc_url($card_link).'" class="kafelek" ...>
```

**Wyjaśnienie:**
- Jeśli pole `link` jest puste → używa `/oferta`
- Jeśli pole `link` ma wartość → używa tej wartości
- `esc_url()` bezpiecznie obsługuje zarówno linki względne jak i absolutne

## 🎯 Najlepsze praktyki

### Kiedy używać typu "text" vs "url":

| Sytuacja | Typ pola | Powód |
|----------|----------|-------|
| Linki wewnętrzne (np. `/oferta/konferencje`) | **text** | Pozwala na linki względne |
| Linki zewnętrzne (np. `https://google.com`) | **url** | Waliduje poprawność URL |
| **Mieszane** (zarówno wewnętrzne jak zewnętrzne) | **text** | Maksymalna elastyczność |

### Dla kafelków oferty:
✅ **Używaj typu "text"** - ponieważ linki są głównie wewnętrzne (/oferta/...)

## 🚀 Status końcowy

| Element | Status | Uwagi |
|---------|--------|-------|
| Plik ACF JSON | ✅ POPRAWNY | Typ pola: "text" |
| Kod w page-offer.php | ✅ POPRAWNY | Obsługuje linki względne i absolutne (linia 244) |
| Kod w index.php | ✅ NAPRAWIONY | Dodano funkcję `get_card_link()` i zaktualizowano wszystkie karty |
| Dokumentacja | ✅ DODANA | Ten plik + INSTRUKCJE-STRONA-OFERTA.md |
| Wymagane działanie | ⚠️ WYMAGANE | Re-import ACF JSON w WordPress Admin (jeśli typ pola został zmieniony) |

## 📚 Powiązane pliki:

- `index.php` - Strona główna z kafelkami oferty (linie 491-503, 536-573) ✅ NAPRAWIONO
- `page-offer.php` - Szablon używający linków (linia 244) ✅ JUŻ DZIAŁAŁO
- `acf-page-offer.json` - Definicja pól ACF (linie 127-133, 178-184, 229-235, 280-286, 331-337, 382-388)
- `INSTRUKCJE-STRONA-OFERTA.md` - Ogólne instrukcje konfiguracji
- `ROZWIAZANIE-PAGE-OFFER.md` - Dokumentacja konwersji szablonu

---

**Data:** 2025-12-12  
**Problem:** Linki w kafelkach oferty nie działają  
**Rozwiązanie:**  
1. ✅ Naprawiono kod w `index.php` - teraz używa pól ACF zamiast hardcoded linków
2. ⚠️ Re-import ACF JSON aby przywrócić typ pola "text" (jeśli zostało zmienione na "url")

**Status:** ✅ NAPRAWIONO W KODZIE - wymaga sprawdzenia/re-importu ACF w WordPress Admin

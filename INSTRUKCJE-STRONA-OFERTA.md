# Instrukcje: Strona Oferty (page-offer.php)

## 📋 Podsumowanie zmian

Plik `page-offer.php` został przekonwertowany z hard-coded strony na szablon WordPress, analogicznie do `page-aboutus.php`.

## ✅ Co zostało zrobione:

1. **Dodano deklarację Template Name**
   - Dodano komentarz `Template Name: Oferta` na początku pliku
   - Teraz szablon jest widoczny w WordPress Admin → Strony → Szablon strony

2. **Weryfikacja struktury ACF**
   - Plik `acf-page-offer.json` zawiera wszystkie wymagane pola
   - Lokalizacja pól: `page_template == page-offer.php` ✅
   - Wszystkie sekcje mają wartości domyślne (fallback)

3. **Struktura szablonu**
   - Szablon używa `get_field()` dla wszystkich treści
   - Zgodny ze strukturą `page-aboutus.php`
   - Obsługuje wszystkie sekcje: Hero, Oferta, Kafelki, Approach, Kontakt

## 🔧 Konfiguracja w WordPress (wymagane kroki):

### Krok 1: Import pól ACF (jeśli nie zrobione)
1. WordPress Admin → **Custom Fields → Tools**
2. W sekcji "Import Field Groups" kliknij **Choose File**
3. Wybierz plik: `acf-page-offer.json`
4. Kliknij **Import file**
5. Sprawdź czy grupa "Strona Oferty" jest widoczna w **Custom Fields → Field Groups**

### Krok 2: Przypisanie szablonu do strony
1. WordPress Admin → **Strony → Wszystkie strony**
2. Znajdź stronę "Oferta" (lub utwórz nową)
3. W prawym panelu (Attributes) znajdź **Szablon**
4. Z listy rozwijanej wybierz: **Oferta**
5. Kliknij **Aktualizuj** lub **Opublikuj**

### Krok 3: Wypełnienie pól ACF
Po przypisaniu szablonu, na stronie edycji pojawią się pola ACF:

#### Sekcja Hero:
- `offer_hero_title_highlight` - Wyróżniony tytuł (np. "Doświadczenia")
- `offer_hero_title_rest` - Reszta tytułu (np. ", które łączą świat")
- `offer_hero_description` - Opis sekcji hero
- `offer_hero_background_image` - Obrazek tła

#### Sekcja Oferta:
- `offer_section_subtitle` - Podtytuł (np. "Nasza oferta")
- `offer_section_title_before` - Tytuł przed highlightem
- `offer_section_title_highlight` - Wyróżniona część tytułu
- `offer_section_description` - Opis sekcji
- `offer_cta_text` - Tekst przycisku
- `offer_cta_link` - Link przycisku

#### Kafelki (6 sztuk):
Każdy kafelek (`offer_card_1` do `offer_card_6`) zawiera:
- `title` - Tytuł kafelka
- `description` - Opis
- `icon` - Ikona (obrazek)
- `color` - Kolor tła (hex)
- `width` - Szerokość (np. "35%", "65%")
- `link` - Link do podstrony (opcjonalny, domyślnie: /oferta)

#### Sekcja "Nasze podejście":
- `offer_approach_subtitle` - Podtytuł
- `offer_approach_title` - Tytuł główny
- `offer_approach_description` - Opis
- `offer_approach_highlight_word` - Wyróżnione słowo
- `offer_approach_highlight_text` - Tekst pod wyróżnionym słowem
- `offer_approach_image_small` - Małe zdjęcie
- `offer_approach_image_large` - Duże zdjęcie
- `offer_approach_background_image` - Obrazek tła

## 🔍 Rozwiązywanie problemów:

### Problem: Sekcja Hero nie wyświetla się

**Możliwe przyczyny i rozwiązania:**

1. **Szablon nie został przypisany do strony**
   - Sprawdź w edycji strony czy wybrany szablon to "Oferta"
   - Jeśli nie ma takiej opcji, sprawdź czy plik ma komentarz `Template Name: Oferta`

2. **Pola ACF nie zostały zaimportowane**
   - Sprawdź w **Custom Fields → Field Groups** czy istnieje grupa "Strona Oferty"
   - Jeśli nie, zaimportuj plik `acf-page-offer.json`

3. **Pola ACF nie są wypełnione**
   - Szablon ma wartości domyślne (fallback), więc powinien działać nawet bez wypełnienia
   - Sprawdź w edycji strony czy widzisz pola ACF poniżej edytora

4. **Niekompatybilność ACF**
   - Wymagana wersja: ACF 5.0 lub nowsza
   - Sprawdź czy wtyczka ACF jest aktywna

5. **Cache przeglądarki lub serwera**
   - Wyczyść cache WordPress (jeśli używasz wtyczki cache)
   - Wyczyść cache przeglądarki (Ctrl+Shift+R lub Cmd+Shift+R)

### Problem: Pola ACF nie pojawiają się w edycji strony

**Rozwiązanie:**
1. Sprawdź czy grupa pól "Strona Oferty" ma poprawną lokalizację:
   - **Custom Fields → Field Groups → Strona Oferty**
   - Kliknij "Edit"
   - Przewiń na dół do sekcji "Location"
   - Upewnij się że reguła to: `Page Template` `is equal to` `page-offer.php`

2. Jeśli reguła jest poprawna, ale pola nie pojawiają się:
   - Odśwież stronę edycji
   - Sprawdź czy szablon "Oferta" jest wybrany w prawym panelu

## 📊 Porównanie z page-aboutus.php:

| Element | page-aboutus.php | page-offer.php | Status |
|---------|------------------|----------------|--------|
| Template Name | ✅ "O nas" | ✅ "Oferta" | ✅ Zgodne |
| get_header() | ✅ | ✅ | ✅ Zgodne |
| Sekcja Hero | ✅ | ✅ | ✅ Zgodne |
| ACF z fallback | ✅ | ✅ | ✅ Zgodne |
| Social icons | ✅ | ✅ | ✅ Zgodne |
| contact.php | ✅ | ✅ | ✅ Zgodne |
| footer.php | ✅ | ✅ | ✅ Zgodne |

## 📝 Uwagi techniczne:

1. **Struktura HTML**
   - Zarówno `page-offer.php` jak i `page-aboutus.php` mają dodatkowo tag `<head>` przed `get_header()`
   - To nie jest standardowa praktyka WordPress, ale jest spójne z resztą motywu
   - Tag ten zawiera linki do fontów Google Fonts

2. **Inline styles**
   - Szablon używa inline styles dla precyzyjnej kontroli layoutu
   - Jest to zgodne z design system projektu

3. **Custom Post Type "loga_klientow"**
   - Sekcja z logotypami klientów pobiera dane z CPT
   - Ma fallback do hard-coded logotypów jeśli CPT jest pusty

## 🎯 Następne kroki:

1. ✅ Szablon jest gotowy do użycia
2. ⚠️ Należy przypisać szablon do strony w WordPress Admin
3. ⚠️ Należy wypełnić pola ACF odpowiednią treścią
4. ⚠️ Przetestować czy wszystkie sekcje wyświetlają się poprawnie

## 📚 Powiązane pliki:

- `page-offer.php` - Główny szablon
- `acf-page-offer.json` - Konfiguracja pól ACF (426 linii)
- `header.php` - Nagłówek strony
- `footer.php` - Stopka strony
- `contact.php` - Sekcja kontaktowa

---

**Data:** 2024-12-10  
**Wersja:** 1.0  
**Zgodność:** WordPress 5.0+, ACF 5.0+

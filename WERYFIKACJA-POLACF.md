# Weryfikacja pól ACF - page-offer.php

## ✅ Wszystkie pola używane w szablonie są zdefiniowane w ACF

### Sekcja Hero (wszystkie pola obecne ✅)
- `offer_hero_background_image` ✅
- `offer_hero_title_highlight` ✅
- `offer_hero_title_rest` ✅
- `offer_hero_description` ✅

### Sekcja Oferta (wszystkie pola obecne ✅)
- `offer_section_subtitle` ✅
- `offer_section_title_before` ✅
- `offer_section_title_highlight` ✅
- `offer_section_description` ✅
- `offer_cta_text` ✅
- `offer_cta_link` ✅

### Kafelki Oferty (wszystkie pola obecne ✅)
- `offer_card_1` (group) ✅
  - `title` ✅
  - `description` ✅
  - `icon` ✅
  - `color` ✅
  - `width` ✅
  - `link` ✅
- `offer_card_2` do `offer_card_6` (analogicznie) ✅

### Sekcja Approach (wszystkie pola obecne ✅)
- `offer_approach_subtitle` ✅
- `offer_approach_title` ✅
- `offer_approach_description` ✅
- `offer_approach_highlight_word` ✅
- `offer_approach_highlight_text` ✅
- `offer_approach_image_small` ✅
- `offer_approach_image_large` ✅
- `offer_approach_background_image` ✅

## ✅ Wartości domyślne (fallback)

Wszystkie pola mają wartości domyślne w szablonie, więc strona będzie działać nawet jeśli pola ACF nie są wypełnione:

**Hero:**
```php
$hero_title_highlight = get_field('offer_hero_title_highlight') ?: 'Doświadczenia';
$hero_title_rest = get_field('offer_hero_title_rest') ?: ', które łączą świat';
$hero_description = get_field('offer_hero_description') ?: 'Łączymy doświadczenie...';
```

**Oferta:**
```php
$section_subtitle = get_field('offer_section_subtitle') ?: 'Nasza oferta';
$section_title_before = get_field('offer_section_title_before') ?: 'Wydarzenia bez granic –';
// itd.
```

## 📋 Dlaczego Hero może nie działać?

### Możliwe przyczyny:

1. **Szablon nie jest przypisany do strony**
   - Rozwiązanie: WordPress Admin → Strony → Oferta → Szablon → "Oferta"

2. **Grupa pól ACF ma złą lokalizację**
   - Obecna lokalizacja: `page_template == page-offer.php` ✅
   - To jest poprawne!

3. **Pola ACF nie są zaimportowane**
   - Rozwiązanie: Custom Fields → Tools → Import → acf-page-offer.json

4. **Cache WordPress lub przeglądarki**
   - Rozwiązanie: Wyczyść cache

5. **Problem z CSS/JavaScript**
   - Hero używa inline styles, więc nie powinno być problemu
   - Sprawdź konsolę przeglądarki (F12) pod kątem błędów

## 🔍 Jak zweryfikować czy szablon działa?

### Test 1: Sprawdź czy szablon jest widoczny
```
WordPress Admin → Strony → Dodaj nową → Szablon (prawy panel)
```
Jeśli "Oferta" jest na liście = ✅ Template Name działa

### Test 2: Sprawdź czy ACF pola są widoczne
```
WordPress Admin → Strony → Oferta → Edytuj
```
Przewiń w dół - jeśli widzisz sekcje ACF = ✅ Pola są zaimportowane

### Test 3: Sprawdź źródło strony
```
Otwórz stronę → Prawy przycisk → Zbadaj element / View source
```
Szukaj: `<section class="hero-section"`
- Jeśli jest = ✅ Hero renderuje się
- Jeśli nie ma = Problem z szablonem lub przypisaniem

## ✅ Podsumowanie weryfikacji

| Element | Status |
|---------|--------|
| Template Name | ✅ Dodany |
| ACF Fields Definition | ✅ Wszystkie zdefiniowane |
| Field Names Match | ✅ 100% zgodność |
| Fallback Values | ✅ Dla wszystkich pól |
| Structure Match | ✅ Jak page-aboutus.php |
| Hero Section Code | ✅ Obecny w szablonie |

**Wniosek:** Template jest technicznie poprawny. Jeśli hero nie działa, to problem konfiguracji w WordPress Admin, nie kodu.

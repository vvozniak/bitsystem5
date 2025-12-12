# Rozwiązanie problemu z linkami w kafelkach oferty

## Problem
Linki w kafelkach oferty nie działały, ponieważ pole ACF typu `url` automatycznie usuwało linki względne (np. `/oferta/konferencje`). ACF wymaga dla pola typu `url` pełnego adresu z `http://` lub `https://`.

### Dlaczego link był nadal `/oferta`:
1. Pole "Link" w ACF było puste (ACF usunęło wpisany link względny)
2. Kod używał wartości domyślnej: `/oferta`
3. W kodzie HTML widziałeś: `<a href="/oferta"` zamiast Twojego linka

## Rozwiązanie
Zmieniono typ pola ACF z `url` na `text` dla wszystkich pól linków wewnętrznych.

### Zmienione pliki i pola:

#### 1. `acf-page-offer.json` (Strona Oferty)
- `offer_cta_link` - Link przycisku CTA w sekcji oferty
- `offer_card_1.link` - Link kafelka "Konferencje i wydarzenia"
- `offer_card_2.link` - Link kafelka "Misje gospodarcze i naukowe"
- `offer_card_3.link` - Link kafelka "Wsparcie projektów badawczych"
- `offer_card_4.link` - Link kafelka "Inicjatywy międzykulturowe"
- `offer_card_5.link` - Link kafelka "Rozwiązania technologiczne"
- `offer_card_6.link` - Link kafelka "Eventy specjalne"

#### 2. `acf-oferta.json` (Realizacje)
- `hero_cta_link` - Link przycisku CTA w sekcji Hero
- `highlight_cta_link` - Link przycisku CTA w sekcji Highlight
- `standard_cta_link` - Link przycisku CTA w sekcji Standard

#### 3. `acf-offer-single.json` (Pojedyncza Oferta)
- `offer_single_cta_link` - Link przycisku CTA

#### 4. `acf-page-aboutus.json` (Strona O Nas)
- `aboutus_what_cta_link` - Link przycisku CTA w sekcji "Co robimy"
- `aboutus_realizations_cta_link` - Link przycisku CTA w sekcji "Realizacje"

## Jak teraz używać pól Link w ACF

### ✅ Możesz używać linków względnych:
- `/oferta/konferencje`
- `/oferta/misje-gospodarcze`
- `/kontakt`
- `/realizacje`
- `#sekcja` (kotwice)

### ✅ Możesz używać pełnych URL:
- `https://example.com/strona`
- `http://external-site.com`

### ⚠️ Uwaga:
- Linki zewnętrzne (logo klientów, social media) nadal wymagają pełnych URL z `http://` lub `https://`
- Te pola pozostały jako typ `url` i działają jak wcześniej

## Dla programistów

### Bezpieczeństwo
Wszystkie linki są sanityzowane przez funkcję `esc_url()` w PHP, która:
- Akceptuje zarówno linki względne jak i bezwzględne
- Usuwa potencjalnie niebezpieczne znaki
- Zabezpiecza przed atakami XSS

### Przykład użycia w kodzie PHP:
```php
$card_link = isset($b['link']) && !empty($b['link']) ? esc_url($b['link']) : '/oferta';
echo '<a href="'.$card_link.'">';
```

Funkcja `esc_url()` poprawnie obsługuje:
- Linki względne: `/oferta/konferencje` → `/oferta/konferencje`
- Linki bezwzględne: `https://example.com` → `https://example.com`
- Kotwice: `#kontakt` → `#kontakt`

## Testowanie

### Jak zweryfikować że działa:
1. Zaloguj się do WordPress Admin
2. Edytuj stronę z szablonem "Oferta"
3. W polu "Link" dla kafelka wpisz link względny, np: `/oferta/konferencje`
4. Zapisz stronę
5. Odśwież edycję strony - link powinien nadal być widoczny w polu
6. Zobacz stronę - kliknięcie w kafelek powinno przekierować do właściwej podstrony

## Historia zmian
- **2025-12-12**: Zmieniono typ pola z `url` na `text` dla 13 pól linków wewnętrznych
- Kod PHP nie wymagał zmian - już prawidłowo obsługiwał linki względne przez `esc_url()`

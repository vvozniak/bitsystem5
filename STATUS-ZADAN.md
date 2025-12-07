# 📋 Status realizacji zadań - Praktyki Proj

---

## 🏠 STRONA GŁÓWNA - top 4✅️

**Cel:** Umożliwić edycję wszystkich treści przez ACF.

### Interaktywność przez ACF

**Status: ✅ ZROBIONE**

- ✅ Wszystkie teksty, nagłówki i zdjęcia na stronie głównej są edytowalne przez pola ACF.
  - `index.php` używa `get_field()` dla sekcji: hero, about, masai, offer, stats
  - Pola ACF są poprawnie zaimplementowane i działają
- ✅ Ilość i układ elementów pozostały statyczne (zgodnie z wymaganiami)
- ⚠️ Struktura ACF została utworzona ręcznie (nie przez ChatGPT, ale działa poprawnie)

**Szczegóły implementacji:**
- Sekcja Hero: `hero_main_text`, `hero_title`, `hero_description`, `hero_background_image`, `hero_image`, `hero_icons`, `hero_social_links`
- Sekcja About: `about_subtitle`, `about_title`, `about_description`, `about_cta_text`, `about_cta_link`
- Sekcja Masai: `masai_super_heading`, `masai_title`, `masai_description`, `masai_icons`, `masai_main_image`, `masai_small_image`
- Sekcja Stats: `stat_1_number`, `stat_1_description`, `stat_1_icon` (dla 4 statystyk)
- Sekcja Offer: `offer_left_subtitle`, `offer_left_title`, `offer_left_description`, `offer_card_1` do `offer_card_5`
- Sekcja Approach: `approach_subtitle`, `approach_title`, `approach_description`, `approach_highlight_text_normal`, `approach_highlight_text_accent`, `approach_image_small`, `approach_image_large`

---

### Karuzela logotypów

**Status: ✅ ZROBIONE**

- ✅ Custom Post Type `loga_klientow` utworzony w `functions.php` (linie 204-232)
- ✅ Pola ACF dla CPT utworzone w `acf-loga-klientow.json`:
  - `logo_image` - obrazek logo (wymagane)
  - `logo_link` - link do strony klienta (opcjonalne)
  - `logo_alt` - tekst alternatywny (opcjonalne)
- ✅ Kod karuzeli na stronie głównej zaktualizowany (`index.php` linie 463-503):
  - Pobiera logotypy z CPT `loga_klientow`
  - Fallback do starych pól ACF jeśli CPT nie ma logotypów
- ✅ Kod karuzeli na stronie oferty zaktualizowany (`page-offer.php` linie 230-280):
  - Pobiera logotypy z CPT `loga_klientow`
  - Obsługuje linki do stron klientów

**Szczegóły implementacji:**
- CPT: `functions.php` linie 204-232
- ACF: `acf-loga-klientow.json`
- Menu: "Loga klientów" w panelu administracyjnym (ikona: `dashicons-images-alt2`)
- Strona główna: `index.php` linie 463-503
- Strona oferty: `page-offer.php` linie 230-280

---

### Stopka + social media

**Status: ✅ ZROBIONE**

- ✅ Wszystkie dane są edytowalne przez ACF
- ✅ Utworzona osobna strona "Ustawienia globalne" (ID: 332) w panelu administracyjnym
- ✅ Wszystkie dane można edytować w jednym miejscu

**Szczegóły implementacji:**
- Plik: `footer.php` (linie 9-32)
- Strona ustawień: ID 332
- Pola ACF:
  - `global_phone` - telefon
  - `global_email` - e-mail
  - `global_address_line1` - adres linia 1
  - `global_address_line2` - adres linia 2
  - `global_copyright_text` - prawa autorskie
  - `global_privacy_url` - link do polityki prywatności
  - `global_linkedin_url` - LinkedIn
  - `global_facebook_url` - Facebook
  - `global_instagram_url` - Instagram
  - `global_youtube_url` - YouTube

---

## 📄 STRONY STATYCZNE

**Cel:** Uproszczone podstrony z edytowalną treścią.

### Regulamin i Polityka prywatności

**Status: ✅ ZROBIONE (technicznie) / ⚠️ DO WYKONANIA W PANELU WP**

- ✅ Szablon `page-plain.php` utworzony i działa
- ✅ Wsparcie Gutenberga jest w `functions.php` (linie 20-23):
  - `add_theme_support('wp-block-styles')`
  - `add_theme_support('editor-styles')`
  - `add_editor_style('css/editor-style.css')`

**Szczegóły implementacji:**
- Szablon: `page-plain.php` zawiera:
  - Navbar (`get_header()`)
  - Tytuł strony (`the_title()`)
  - Treść Gutenberga (`the_content()`)
  - Footer (`get_footer()`)
- Template Name: "Prosta strona (Plain)"

**Do zrobienia w panelu WordPress:**
1. Utworzyć podstronę "Regulamin":
   - Strony → Dodaj nową
   - Tytuł: "Regulamin"
   - Szablon strony: "Prosta strona (Plain)"
   - Opublikować
2. Utworzyć podstronę "Polityka prywatności":
   - Strony → Dodaj nową
   - Tytuł: "Polityka prywatności"
   - Szablon strony: "Prosta strona (Plain)"
   - Opublikować

---

## ✉️ FORMULARZ KONTAKTOWY

**Cel:** Umożliwić wysyłkę maili z formularza.

### Konfiguracja poczty

**Status: ❌ NIE ZROBIONE**

- ❌ Brak wtyczki Post SMTP (Postman SMTP)
- ❌ Brak konfiguracji konta e-mail do obsługi automatu
- ⚠️ Obecnie formularz używa `wp_mail()` (funkcja WordPress), która może nie działać na wszystkich serwerach

**Do zrobienia:**
1. Zainstalować wtyczkę Post SMTP (Postman SMTP)
2. Utworzyć konto e-mail do obsługi automatu (np. `formularz@domena.pl`)
3. Skonfigurować wtyczkę z danymi SMTP

---

### Formularz

**Status: ⚠️ CZĘŚCIOWO ZROBIONE**

- ✅ Formularz działa (własna implementacja w `contact.php` i `functions.php`)
- ✅ Obsługa wysyłki w `functions.php` (linie 125-163): `handle_send_contact_form()`
- ❌ **NIE używa Contact Form 7** (własna implementacja)
- ✅ Na stronie kontaktowej teksty są statyczne (bez ACF) - zgodnie z wymaganiami

**Szczegóły implementacji:**
- Formularz: `contact.php` (linie 31-42)
- Obsługa: `functions.php` (linie 125-163)
- Walidacja: sprawdzanie pól, walidacja e-mail
- Wysyłka: `wp_mail()` do `wiktor.krys1@gmail.com`

**Do zrobienia (opcjonalnie):**
- Zastąpić własną implementację Contact Form 7 (jeśli wymagane)

---

## 💼 OFERTA - top 1✅️

**Cel:** Treści edytowalne, ale bez osobnych post type'ów.

### Podstrona „Oferta"

**Status: ✅ ZROBIONE**

- ✅ Strona `page-offer.php` istnieje i używa ACF
- ✅ Grupa pól ACF dla strony oferty utworzona w `acf-page-offer.json`
- ✅ Wszystkie treści są edytowalne przez ACF:
  - Sekcja Hero: `offer_hero_title_highlight`, `offer_hero_title_rest`, `offer_hero_description`, `offer_hero_background_image`
  - Sekcja Oferta: `offer_section_subtitle`, `offer_section_title_before`, `offer_section_title_highlight`, `offer_section_description`, `offer_cta_text`, `offer_cta_link`
  - Kafle oferty: `offer_card_1` do `offer_card_6` (każdy jako Group z polami: `title`, `description`, `icon`, `color`, `width`)
  - Sekcja Approach: `offer_approach_subtitle`, `offer_approach_title`, `offer_approach_description`, `offer_approach_highlight_word`, `offer_approach_highlight_text`, `offer_approach_image_small`, `offer_approach_image_large`, `offer_approach_background_image`

**Szczegóły implementacji:**
- ACF: `acf-page-offer.json` (426 linii)
- Lokalizacja: `page_template == page-offer.php`
- Plik: `page-offer.php` używa `get_field()` dla wszystkich sekcji
- Fallback: wartości domyślne w kodzie, jeśli pola ACF są puste

---

## 🏗️ REALIZACJE - top 2✅️

**Cel:** Dynamiczna sekcja projektów klienta.

### Custom Post Type „Realizacje"

**Status: ✅ ZROBIONE**

- ✅ Custom Post Type "realizacje" utworzony w `functions.php` (linie 170-199)
- ✅ Obsługuje Gutenberga (`show_in_rest => true`)
- ✅ Szablon `single-realizacje.php` istnieje i działa
- ✅ Pola ACF zaimplementowane w `acf-oferta.json`:
  - `realizacja_tytul` - tytuł realizacji
  - `obrazek_tytulowy` - obrazek tytułowy
  - `realizacja_type` - typ sekcji (hero/highlight/standard)
  - Dodatkowe pola w zależności od typu (Conditional Logic)

**Szczegóły implementacji:**
- CPT: `functions.php` linie 170-199
- Szablon: `single-realizacje.php`
- ACF: `acf-oferta.json` (831 linii, pełna struktura z Conditional Logic)
- Menu: "Realizacje" w panelu administracyjnym (ikona: `dashicons-portfolio`)

---

### Sekcja „Najnowsze projekty"

**Status: ✅ ZROBIONE**

- ✅ Komponent na stronie głównej pobiera 3 najnowsze wpisy z post type'a "Realizacje"
- ✅ Implementacja w `index.php` (linie 579-645)
- ✅ Wyświetla obrazek tytułowy, tytuł z podziałem na akcentowaną część

**Szczegóły implementacji:**
- Zapytanie: `WP_Query` z `post_type => 'realizacje'`, `posts_per_page => 3`
- Pola ACF: `realizacja_tytul`, `obrazek_tytulowy`
- Link: każda karta prowadzi do `single-realizacje.php`

---

## 📰 AKTUALNOŚCI - top 3✅️

**Cel:** Wykorzystanie wbudowanego systemu bloga WordPress.

### Lista aktualności

**Status: ✅ ZROBIONE**

- ✅ Zaadaptowany domyślny system bloga WordPress (posty)
- ✅ Wyświetlanie wpisów z miniaturą, tytułem i leadem
- ✅ Implementacja w `page-blog.php`

**Szczegóły implementacji:**
- Zapytanie: `WP_Query` z `post_type => 'post'`, `posts_per_page => 6`
- Pola ACF: `tytul`, `obraz_tytulowy`, `lead`
- Układ: siatka 3 kolumny z kartami

---

### Pojedynczy wpis

**Status: ✅ ZROBIONE**

- ✅ Szablon `single.php` istnieje i działa
- ✅ Analogiczny do pojedynczej realizacji
- ✅ Wyświetla obrazek tytułowy, lead i treść Gutenberga

**Szczegóły implementacji:**
- Szablon: `single.php`
- Pola ACF: `tytul`, `obraz_tytulowy`, `lead`
- Treść: `the_content()` (Gutenberg)
- Nawigacja: poprzedni/następny wpis

---

## 🧩 OPTYMALIZACJA OBRAZKÓW

**Cel:** Zmniejszyć wagę strony i poprawić wydajność.

### WebP

**Status: ❌ NIE ZROBIONE**

- ❌ Brak wtyczki WebP Express
- ❌ Obrazy w `/images/` nie są w formacie WebP (są PNG/JPG)
- ❌ Brak konwersji przesyłanych obrazów do WebP

**Do zrobienia:**
1. Zainstalować i skonfigurować wtyczkę WebP Express
2. Przekonwertować statyczne obrazy w `/images/` do WebP:
   - `tlo.png`, `tlo2.png`, `tlo3.png`
   - Wszystkie ikony (ikon1.png - ikon7.png)
   - Wszystkie obrazy komponentów
3. Zaktualizować kod, aby używał obrazów WebP (lub pozwolić wtyczce obsłużyć to automatycznie)
4. Skompresować pozostałe statyczne pliki ręcznie

---

## 🔒 BEZPIECZEŃSTWO

**Cel:** Podstawowe zabezpieczenie WordPressa.

### Wtyczki i konfiguracja

**Status: ❌ NIE ZROBIONE**

- ❌ Brak wtyczki WPS Hide Login
- ❌ Brak wtyczki Limit Login Attempts Reloaded

**Do zrobienia:**
1. Zainstalować wtyczkę **WPS Hide Login** i skonfigurować:
   - Zmienić adres logowania z `/wp-admin` na niestandardowy (np. `/moje-sekretne-logowanie`)
2. Zainstalować wtyczkę **Limit Login Attempts Reloaded** i skonfigurować:
   - Ustawić limit prób logowania (np. 5 prób)
   - Ustawić czas blokady (np. 20 minut)
3. Dalsze wytyczne omówić z Adamem (konfiguracja i szczegóły)

---

## 📊 PODSUMOWANIE

### ✅ W pełni zrobione:
- **Realizacje** (CPT + ACF + single + sekcja na stronie głównej)
- **Aktualności** (WordPress posts + single + ACF)
- **Stopka + social media** (ACF globalne ustawienia)
- **Strona główna - treści ACF** (wszystkie sekcje edytowalne przez ACF)
- **Karuzela logotypów** (CPT `loga_klientow` + ACF + zaktualizowane strony)
- **Oferta** (ACF dla wszystkich sekcji, pełna edytowalność)
- **Strony statyczne** (szablon `page-plain.php` utworzony)

### ⚠️ Częściowo zrobione:
- **Formularz kontaktowy** (działa, ale bez Contact Form 7 i Post SMTP)
- **Strony statyczne** (szablon gotowy, ale trzeba utworzyć podstrony w panelu WordPress)

### ❌ Nie zrobione:
- **Optymalizacja obrazów** (brak WebP Express, obrazy nie są w WebP)
- **Bezpieczeństwo** (brak wtyczek: WPS Hide Login, Limit Login Attempts Reloaded)

---

**Ostatnia aktualizacja:** 2024 - po implementacji CPT logotypów, ACF dla oferty i szablonu page-plain.php

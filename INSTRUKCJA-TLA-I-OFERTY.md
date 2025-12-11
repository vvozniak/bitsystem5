# Instrukcja: Customowe Tła i Szablon Oferty

## Problem 1: Tła na Stronach (ROZWIĄZANE)

### Jak to działa?

Dodano pola ACF typu "image" dla następujących stron, które pozwalają użytkownikowi zmienić tło przez panel WordPress:

1. **Lista realizacji** (`page-realization.php`)
   - Pole ACF: `lista_realizacji_tlo`
   - Fallback: `images/webp/tlo.webp`

2. **Lista bloga** (`page-blog.php`)
   - Pole ACF: `lista_bloga_tlo`
   - Fallback: `images/webp/tlo.webp`

3. **Pojedyncza realizacja** (`single-realizacje.php`)
   - Pole ACF: `pojedyncza_realizacja_tlo`
   - Fallback: `images/webp/tlo3.webp`

4. **Pojedynczy post** (`single.php`)
   - Pole ACF: `pojedynczy_post_tlo`
   - Fallback: `images/webp/tlo3.webp`

### Jak zmienić tło?

1. Zaloguj się do panelu WordPress
2. Przejdź do odpowiedniej strony lub posta
3. W prawym sidebaru znajdź sekcję "Tła Stron"
4. Wybierz obraz dla pola odpowiadającego danej stronie
5. Zapisz zmiany

**Uwaga:** Jeśli nie wybierzesz własnego tła, system automatycznie użyje domyślnego obrazu.

---

## Problem 2: Szablon Pojedynczej Oferty (ROZWIĄZANE)

### Utworzono:

1. **Custom Post Type "Oferty"**
   - Nazwa w menu: "Oferty"
   - Slug: `oferty`
   - URL archiwum: `/oferty/`
   - Ikona: dashicons-awards

2. **Szablon `single-oferty.php`**
   - Hero section z tłem + tytuł oferty
   - Główna treść z WordPress editor
   - Opcjonalnie: do 3 obrazków ilustrujących usługę
   - Opcjonalnie: lista punktów "Co obejmuje usługa?"
   - Przycisk CTA "Skontaktuj się" linkujący do `/kontakt`

### Pola ACF dla Pojedynczej Oferty:

1. **Tło Hero** (`oferta_tlo_hero`)
   - Typ: Image
   - Fallback: `images/webp/tlo.webp`

2. **Obrazek 1-3** (`oferta_obrazek_1`, `oferta_obrazek_2`, `oferta_obrazek_3`)
   - Typ: Image
   - Opcjonalne - wyświetlają się w grid layout

3. **Lista punktów** (`oferta_lista_punktow`)
   - Typ: Textarea
   - Każdy punkt w nowej linii
   - Wyświetla się w ramce "Co obejmuje usługa?"

### Jak dodać nową ofertę?

1. Zaloguj się do WordPress
2. W menu bocznym kliknij "Oferty" → "Dodaj nową"
3. Wypełnij:
   - Tytuł oferty (pojawi się w hero section)
   - Treść główną (użyj edytora WordPress)
   - **Opcjonalnie:** Dodaj do 3 obrazki ilustrujące usługę
   - **Opcjonalnie:** Wpisz listę punktów (każdy w nowej linii)
   - **Opcjonalnie:** Zmień tło hero
4. Opublikuj ofertę

### Jak podlinkować ofertę na stronie głównej?

1. Przejdź do edycji strony głównej (ID: 43)
2. Znajdź sekcję z kafelkami ofert
3. Dla każdego kafelka (offer_card_1 do offer_card_5) jest pole "Link"
4. Wpisz pełny URL do konkretnej oferty, np.: `/oferty/eventy-kulturowe/`
5. Jeśli pole jest puste, domyślnie linkuje do `/oferta`

### Przykładowa struktura oferty:

```
Tytuł: Eventy Kulturowe

Treść główna:
Organizujemy wyjątkowe wydarzenia kulturalne, które pozwalają 
uczestnikom poznać różne kultury i tradycje świata. Nasze eventy 
to autentyczne doświadczenia łączące edukację z rozrywką.

Obrazki:
- Zdjęcie 1: Event z Masajami
- Zdjęcie 2: Warsztaty rękodzieła
- Zdjęcie 3: Degustacja tradycyjnych potraw

Lista punktów:
Opowieści o życiu i kulturze
Pokazy tańców tradycyjnych
Warsztaty rękodzieła
Degustacja potraw
Pamiątkowe zdjęcia
```

---

## Pliki zmodyfikowane:

### PHP:
- `functions.php` - dodano CPT "oferty"
- `single-oferty.php` - nowy szablon dla pojedynczej oferty
- `page-realization.php` - dodano ACF tło z fallbackiem
- `page-blog.php` - dodano ACF tło z fallbackiem
- `single-realizacje.php` - dodano ACF tło z fallbackiem
- `single.php` - dodano ACF tło z fallbackiem
- `index.php` - zaktualizowano linki ofert aby używały pól ACF

### ACF JSON:
- `acf-backgrounds.json` - definicja pól tła dla wszystkich stron
- `acf-single-oferty.json` - definicja pól dla pojedynczej oferty

---

## Design Guidelines:

### Szablon oferty jest zgodny z resztą motywu:
- Czcionki: Manrope (nagłówki), IBM Plex Sans (tekst), Inter (przyciski)
- Kolory: #0BA0D8 (primary blue), #000C32 (dark)
- Responsywny design (vw units)
- Spójny layout z innymi stronami

### Minimalizm:
- Tylko najważniejsze pola ACF
- Prosty, czytelny layout
- Focus na treści

---

## Testowanie:

Po wdrożeniu należy:
1. Sprawdzić czy CPT "Oferty" pojawia się w menu WordPress
2. Dodać przykładową ofertę i zweryfikować jej wyświetlanie
3. Zmienić tło na jednej z listy realizacji/bloga i sprawdzić czy działa
4. Zaktualizować linki na stronie głównej do konkretnych ofert
5. Przetestować responsywność na mobile i desktop

# Instrukcje wdrożenia - Strona Oferty i Logotypy Klientów

## Zmiany wprowadzone

### 1. Strona Oferty - Edycja przez ACF

Wszystkie treści na stronie oferty (`page-offer.php`) są teraz edytowalne przez panel ACF w WordPress.

#### Pola ACF dla strony oferty

Po zalogowaniu do panelu WordPress i przejściu do edycji strony z szablonem `page-offer.php`, zobaczysz następujące sekcje:

##### Sekcja Hero (Nagłówek)
- **Hero - Tytuł wyróżniony**: Słowo z highlightem (domyślnie: "Doświadczenia")
- **Hero - Reszta tytułu**: Tekst po wyróżnionym słowie (domyślnie: ", które łączą świat")
- **Hero - Opis**: Opis w sekcji hero
- **Hero - Tło**: Obraz tła dla sekcji hero

##### Sekcja Oferta
- **Oferta - Podtytuł**: Podtytuł sekcji (domyślnie: "Nasza oferta")
- **Oferta - Tytuł przed highlightem**: Tekst przed wyróżnieniem (domyślnie: "Wydarzenia bez granic –")
- **Oferta - Tytuł wyróżniony**: Wyróżniona część tytułu (domyślnie: "łączymy ludzi, idee i kultury")
- **Oferta - Opis**: Opis sekcji oferty
- **Oferta - CTA tekst**: Tekst przycisku (domyślnie: "Zobacz nasze realizacje")
- **Oferta - CTA link**: Link przycisku (domyślnie: "#realizacje")

##### Kafelki oferty (6 sztuk)
Każdy kafelek (Kafelek 1 do Kafelek 6) zawiera:
- **Tytuł**: Tytuł kafelka
- **Opis**: Opis kafelka
- **Ikona**: Obraz ikony kafelka
- **Kolor tła**: Kolor tła kafelka (wybór koloru)
- **Szerokość**: Szerokość kafelka w procentach (np. "35%", "50%", "65%")

Domyślne kafelki:
1. Konferencje i wydarzenia (35%, #000C32)
2. Misje gospodarcze i naukowe (65%, #0BA0D8)
3. Wsparcie projektów badawczych (50%, #000C32)
4. Inicjatywy międzykulturowe (50%, #0BA0D8)
5. Rozwiązania technologiczne dla eventów (40%, #000C32)
6. Eventy specjalne (60%, #0BA0D8)

##### Sekcja Podejście
- **Podejście - Podtytuł**: Podtytuł sekcji (domyślnie: "Nasze podejście")
- **Podejście - Tytuł**: Główny tytuł (domyślnie: "Dlaczego warto nam zaufać")
- **Podejście - Opis**: Główny opis sekcji
- **Podejście - Wyróżnione słowo**: Słowo/fraza do wyróżnienia (domyślnie: "Międzynarodowa perspektywa")
- **Podejście - Tekst z highlightem**: Tekst pod wyróżnionym słowem
- **Podejście - Małe zdjęcie**: Małe zdjęcie w lewej kolumnie
- **Podejście - Duże zdjęcie**: Duże zdjęcie w prawej kolumnie
- **Podejście - Tło**: Obraz tła (domyślnie: Group 1.png)

#### Jak edytować stronę oferty:

1. Zaloguj się do panelu WordPress (`/wp-admin`)
2. Przejdź do **Strony** > **Wszystkie strony**
3. Znajdź stronę używającą szablonu `page-offer.php`
4. Kliknij **Edytuj**
5. Przewiń w dół do sekcji "Strona Oferty"
6. Edytuj pola według potrzeb
7. Kliknij **Aktualizuj** aby zapisać zmiany

### 2. Custom Post Type - Loga Klientów

Utworzono nowy typ postów dla logotypów klientów, które są automatycznie wyświetlane w karuzeli na stronie głównej (`index.php`) i stronie oferty (`page-offer.php`).

#### Jak dodać nowe logo:

1. Zaloguj się do panelu WordPress (`/wp-admin`)
2. W menu po lewej stronie znajdź **Loga klientów** (ikona z obrazkami)
3. Kliknij **Dodaj nowe**
4. Wypełnij pola:
   - **Tytuł**: Nazwa klienta (np. "Firma XYZ")
   - **Logo klienta**: Prześlij obraz logo (preferowany format: PNG z przezroczystym tłem)
   - **Link do strony klienta** (opcjonalnie): Jeśli chcesz, aby logo było klikalnym linkiem
   - **Tekst alternatywny** (opcjonalnie): Opis logo dla SEO i dostępności
5. Kliknij **Publikuj**

#### Zarządzanie kolejnością logo:

Logotypy są wyświetlane w kolejności według ustawienia **menu_order**. Aby zmienić kolejność:
1. Użyj wtyczki do zmiany kolejności (np. "Simple Custom Post Order")
2. LUB zmień datę publikacji (wcześniej opublikowane = wcześniej w karuzeli)

#### Uwaga o fallbacku:

- Jeśli nie dodano żadnych logo w CPT, system automatycznie wyświetli poprzednie logo z pól ACF (dla strony głównej) lub hardcoded logo (dla strony oferty)
- Po dodaniu logotypów w CPT, te będą miały priorytet

### 3. Pliki ACF JSON

Utworzono następujące pliki konfiguracji ACF:
- `acf-page-offer.json` - Pola dla strony oferty
- `acf-loga-klientow.json` - Pola dla CPT logotypów

#### Import ACF (jeśli pola nie są widoczne):

1. Przejdź do **Custom Fields** > **Tools**
2. W sekcji **Import field groups** wybierz plik JSON
3. Zaimportuj odpowiednie pliki ACF

### 4. Zachowanie domyślnych wartości

Wszystkie pola ACF mają ustawione **domyślne wartości** odpowiadające poprzednim statycznym treściom. Oznacza to, że:
- Jeśli pole zostanie puste, wyświetli się wartość domyślna
- Nie musisz od razu wypełniać wszystkich pól
- Możesz stopniowo aktualizować treści

### 5. Backup

Przed wprowadzeniem zmian, system zachowuje poprzednie wartości poprzez fallbacki:
- Kafelki oferty: Jeśli ACF nie jest ustawiony, wyświetli się poprzednia tablica z domyślnymi wartościami
- Logotypy: Jeśli CPT jest pusty, wyświetlą się poprzednie logo
- Wszystkie obrazy i teksty: Mają fallback do poprzednich wartości

## Testowanie

### Test 1: Strona Oferty
1. Otwórz stronę oferty w przeglądarce
2. Sprawdź, czy wszystkie sekcje wyświetlają się prawidłowo
3. Zmodyfikuj kilka pól ACF w panelu administracyjnym
4. Odśwież stronę i sprawdź, czy zmiany są widoczne

### Test 2: Karuzela Logotypów
1. Dodaj kilka logotypów w panelu administracyjnym
2. Otwórz stronę główną i stronę oferty
3. Sprawdź, czy karuzela działa płynnie
4. Sprawdź, czy linki (jeśli dodane) działają poprawnie

### Test 3: Fallbacki
1. Usuń wszystkie logotypy z CPT
2. Sprawdź, czy wyświetlają się poprzednie logo
3. Zostaw puste pole ACF na stronie oferty
4. Sprawdź, czy wyświetla się wartość domyślna

## Rozwiązywanie problemów

### Pola ACF nie są widoczne
- Sprawdź, czy wtyczka ACF jest zainstalowana i aktywna
- Zaimportuj pliki JSON z folderu głównego motywu

### Logotypy nie wyświetlają się
- Sprawdź, czy dodano co najmniej jedno logo w CPT
- Sprawdź, czy pole "Logo klienta" jest wypełnione
- Sprawdź uprawnienia do plików obrazów

### Karuzela nie działa płynnie
- Sprawdź konsolę przeglądarki pod kątem błędów JavaScript
- Upewnij się, że pliki CSS i JS motywu są prawidłowo załadowane

## Struktura plików

```
/wp-content/themes/your-theme/
├── acf-page-offer.json       # Pola ACF dla strony oferty
├── acf-loga-klientow.json    # Pola ACF dla CPT logotypów
├── functions.php             # Rejestracja CPT
├── page-offer.php            # Szablon strony oferty (zaktualizowany)
├── index.php                 # Strona główna (zaktualizowana)
└── INSTRUKCJE-WDROZENIA.md  # Ten plik
```

## Kontakt

W razie pytań lub problemów, skontaktuj się z developerem.

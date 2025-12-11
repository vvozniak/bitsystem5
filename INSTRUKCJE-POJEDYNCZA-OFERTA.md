# Szablon: Pojedyncza Oferta (page-offer-single.php)

## 📝 Opis

Szablon strony WordPress do prezentacji pojedynczej oferty lub usługi. Prosty, elastyczny szablon bez potrzeby tworzenia Custom Post Type - wystarczy utworzyć zwykłą stronę WordPress i wybrać szablon "Pojedyncza Oferta".

---

## 🚀 Jak używać

### Krok 1: Utwórz nową stronę
1. W panelu WordPress: **Strony → Dodaj nową**
2. Wpisz tytuł strony (np. "Organizacja eventów kulturowych")
3. Po prawej stronie w **Szablon strony** wybierz: **Pojedyncza Oferta**

### Krok 2: Dodaj treść
1. Użyj standardowego edytora WordPress (Gutenberg) do dodania treści
2. Możesz dodawać:
   - Paragrafy tekstu
   - Nagłówki (H2, H3, H4)
   - Listy (punktowane, numerowane)
   - Cytaty
   - Obrazki
   - Tabele
   - Wszystkie inne bloki Gutenberga

### Krok 3: Ustaw obrazek wyróżniający (opcjonalnie)
1. Po prawej stronie w sekcji **Obrazek wyróżniający**
2. Kliknij **Ustaw obrazek wyróżniający**
3. Wybierz lub wgraj obrazek
4. Obrazek pojawi się pod tytułem hero section, przed treścią

### Krok 4: Dostosuj opcjonalne pola ACF (opcjonalnie)
Jeśli chcesz dostosować wygląd:
1. Przewiń w dół do sekcji **Pojedyncza Oferta**
2. Możesz ustawić:
   - **Tło hero section** - własne zdjęcie w tle (domyślnie: tlo.webp)
   - **Tekst przycisku CTA** - tekst na przycisku (domyślnie: "Skontaktuj się z nami")
   - **Link przycisku CTA** - gdzie prowadzi przycisk (domyślnie: /kontakt)

### Krok 5: Opublikuj
1. Kliknij przycisk **Opublikuj** po prawej stronie
2. Gotowe! Strona jest dostępna pod adresem `/nazwa-strony/`

---

## 🎨 Struktura szablonu

### 1. Hero Section
- **Tło:** Duże zdjęcie w tle (domyślne lub z ACF)
- **Tytuł:** Tytuł strony WordPress w niebieskim highlighcie
- **Styl:** Nowoczesny design z rounded corners i półprzezroczystym tłem

### 2. Obrazek wyróżniający (opcjonalny)
- Wyświetlany tylko jeśli został ustawiony
- Wycentrowany, z zaokrąglonymi rogami i cieniem
- Responsywny (dostosowuje się do rozmiaru ekranu)

### 3. Treść główna
- Pełna treść z edytora WordPress
- Czytelna czcionka IBM Plex Sans
- Właściwe odstępy między elementami
- Style dla wszystkich bloków Gutenberga

### 4. Przycisk CTA
- Wycentrowany przycisk na dole strony
- Domyślnie prowadzi do strony kontaktowej
- Animacja hover (podniesienie i zmiana koloru)
- Można dostosować tekst i link przez ACF

### 5. Footer
- Standardowa stopka z `footer.php`

---

## ⚙️ Pola ACF (opcjonalne)

Szablon korzysta z następujących pól ACF, które są **całkowicie opcjonalne**:

### `offer_single_background` (Obraz)
- **Nazwa:** Tło hero section
- **Typ:** Image
- **Opis:** Własne zdjęcie w tle sekcji hero (domyślnie: /images/webp/tlo.webp)
- **Format zwracania:** Array
- **Wymagane:** Nie

### `offer_single_cta_text` (Tekst)
- **Nazwa:** Tekst przycisku CTA
- **Typ:** Text
- **Opis:** Tekst wyświetlany na przycisku CTA (domyślnie: "Skontaktuj się z nami")
- **Wymagane:** Nie

### `offer_single_cta_link` (URL)
- **Nazwa:** Link przycisku CTA
- **Typ:** URL
- **Opis:** Adres URL do którego prowadzi przycisk (domyślnie: /kontakt)
- **Wymagane:** Nie

### Lokalizacja pól ACF
- **Reguła:** Szablon strony = page-offer-single.php
- **Pozycja:** Normal (poniżej edytora)

---

## 📦 Import pól ACF

Jeśli pola ACF nie są jeszcze skonfigurowane, możesz je utworzyć ręcznie lub zaimportować:

### Ręczne tworzenie
1. **Custom Fields → Field Groups → Add New**
2. Nazwa grupy: "Pojedyncza Oferta"
3. Dodaj 3 pola zgodnie z powyższą specyfikacją
4. W **Lokalizacja** ustaw: 
   - Szablon strony = Pojedyncza Oferta (page-offer-single.php)
5. Zapisz

---

## 🎯 Przykłady użycia

### Przykład 1: Strona usługi "Organizacja eventów"
```
Tytuł: Organizacja eventów kulturowych
Treść: [Opis usługi w Gutenbergu z nagłówkami, listami i zdjęciami]
Obrazek wyróżniający: event.jpg
Tło hero: [domyślne tlo.webp]
CTA: "Zapytaj o ofertę" → /kontakt
```

### Przykład 2: Strona oferty "Doradztwo strategiczne"
```
Tytuł: Doradztwo strategiczne
Treść: [Szczegółowy opis oferty]
Obrazek wyróżniający: consulting.jpg
Tło hero: consulting-bg.jpg [własne z ACF]
CTA: "Umów konsultację" → /konsultacje
```

### Przykład 3: Prosta oferta bez dodatkowych pól
```
Tytuł: Wsparcie projektów badawczych
Treść: [Zwykły tekst z edytora]
Obrazek wyróżniający: [brak]
Tło hero: [domyślne]
CTA: [domyślne - "Skontaktuj się z nami" → /kontakt]
```

---

## 🎨 Dostosowywanie wyglądu

### Kolory
Główne kolory używane w szablonie:
- **Niebieski akcent:** `#0BA0D8` (przyciski, linki)
- **Niebieski highlight:** `#0BA0D880` (80% opacity)
- **Hover niebieski:** `#0888ba`
- **Tekst:** `#4a4a4a` (treść), `#1a1a1a` (nagłówki)

### Czcionki
- **Nagłówki:** Manrope (sans-serif, 600 weight)
- **Treść:** IBM Plex Sans (sans-serif, regular)

### Responsywność
Szablon jest w pełni responsywny:
- **Desktop:** Standardowe rozmiary viewport
- **Tablet (769px - 1024px):** Dostosowane marginesy i rozmiary czcionek
- **Mobile (< 768px):** Zoptymalizowany layout mobilny

---

## ✅ Zalety tego rozwiązania

1. **Prostota:** Brak potrzeby CPT, custom fields czy skomplikowanej konfiguracji
2. **Elastyczność:** Każda strona może mieć unikalną treść
3. **Gutenberg:** Pełne wsparcie dla edytora blokowego WordPress
4. **Opcjonalność:** Wszystkie dodatkowe pola ACF są opcjonalne
5. **Skalowalność:** Możesz utworzyć dowolną ilość stron ofert
6. **Łatwość edycji:** Użytkownik nie musi znać kodu ani ACF

---

## 🔄 Różnice od innych szablonów

### vs. CPT "Realizacje"
- **Realizacje:** Dla projektów już zrealizowanych, z własnym post type
- **Pojedyncza Oferta:** Dla opisów usług/ofert, zwykłe strony WordPress

### vs. page-plain.php
- **page-plain:** Minimalistyczny szablon dla regulaminu, polityki prywatności
- **Pojedyncza Oferta:** Bogatszy layout z hero section, obrazkami i CTA

### vs. page-offer.php
- **page-offer:** Lista wszystkich ofert (strona główna oferty)
- **Pojedyncza Oferta:** Szczegółowy opis jednej konkretnej usługi

---

## 🐛 Rozwiązywanie problemów

### Problem: Szablon nie pojawia się w liście
**Rozwiązanie:** 
- Sprawdź czy plik `page-offer-single.php` jest w głównym folderze motywu
- Upewnij się że w pliku jest komentarz `Template Name: Pojedyncza Oferta`
- Odśwież stronę wyboru szablonu w panelu WordPress

### Problem: Brak tła w hero section
**Rozwiązanie:**
- Sprawdź czy plik `/images/webp/tlo.webp` istnieje
- Lub ustaw własne tło przez pole ACF "Tło hero section"

### Problem: Nie pokazuje się obrazek wyróżniający
**Rozwiązanie:**
- Upewnij się że obrazek wyróżniający został ustawiony w panelu strony
- Sprawdź czy motyw obsługuje obrazki wyróżniające (`add_theme_support('post-thumbnails')`)

### Problem: Przycisk CTA nie działa
**Rozwiązanie:**
- Domyślnie prowadzi do `/kontakt` - upewnij się że taka strona istnieje
- Lub ustaw własny link przez pole ACF "Link przycisku CTA"

---

## 📞 Wsparcie

W razie pytań lub problemów:
1. Sprawdź czy używasz najnowszej wersji motywu
2. Upewnij się że WordPress jest zaktualizowany (5.0+)
3. Jeśli używasz ACF, upewnij się że wtyczka jest aktywna

---

**Wersja:** 1.0  
**Data:** 2025-12-11  
**Zgodność:** WordPress 5.0+, opcjonalnie ACF 5.0+  
**Plik szablonu:** `page-offer-single.php`

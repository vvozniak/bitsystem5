# Implementacja: oferta.php + ACF

## 📦 PLIKI W PAKIECIE

1. **oferta.php** - Kompletny szablon strony
2. **acf-oferta.json** - Grupa pól ACF z Conditional Logic
3. **IMPLEMENTACJA-OFERTA.md** - Ten plik (instrukcja)

---

## 🚀 SZYBKI START

### Krok 1: Import ACF
1. W panelu WordPress: **Narzędzia → Import**
2. Wybierz **Advanced Custom Fields → Import field groups**
3. Wgraj plik: `acf-oferta.json`
4. Grupa pól "Realizacje - Oferta" zostanie automatycznie przypisana do **post_type = 'realizacje'**

### Krok 2: Dodaj stronę z szablonem
1. W panelu WordPress: **Strony → Dodaj nową**
2. Nadaj nazwę (np. "Nasze Realizacje")
3. Po prawej stronie wybierz **Szablon strony: Oferta**
4. Opublikuj stronę

### Krok 3: Dodawaj realizacje
1. W panelu WordPress: **Realizacje → Dodaj nową**
2. Wybierz **Typ sekcji** (Hero / Highlight / Standard)
3. Wypełnij widoczne pola (Conditional Logic ukrywa niepotrzebne)
4. Opublikuj

---

## 🎨 TRZY TYPY WIZUALIZACJI

### 🟦 TYP: HERO (Moja Afryka - Podróż z Masajem)

**Użycie:** Sekcje pełnoekranowe z bogatym programem

**Pola widoczne w ACF:**
- Tytuł - Linia 1 (np. "Eventy kulturowe")
- Tytuł - Linia 2 (np. "Moja Afryka – Podróż z Masajem", pogrubiona)
- Opis
- Tytuł programu (domyślnie: "Program wydarzenia obejmuje:")
- **8 par pól:** Element 1-8 Tekst + Ikona
- Główne zdjęcie (duże, po lewej)
- Małe zdjęcie (po prawej)
- CTA Tekst + Link

**Wygląd:**
```
[Duże zdjęcie]  [Tytuł 2-liniowy + Opis + 8 ikon w siatce 2x4 + CTA]  [Małe zdjęcie]
```

---

### 🟩 TYP: HIGHLIGHT (Kolej na Kobiety)

**Użycie:** Sekcje wyróżnione z wyeksponowanym tytułem

**Pola widoczne w ACF:**
- Podtytuł (np. "Konferencja")
- Tytuł - Przed highlightem (np. "Kolej na")
- Tytuł - Wyróżnione słowo (np. "Kobiety", z highlightem)
- Opis
- **4 pary pól:** Ikona 1-4 Obraz + Tekst
- Główne zdjęcie (duże, po prawej)
- Zdjęcie tła (dekoracyjne, po lewej)
- CTA Tekst + Link

**Wygląd:**
```
[Tło dekoracyjne]  [Podtytuł + Tytuł + Opis + 4 ikony w rzędzie + CTA]  [Główne zdjęcie]
```

---

### 🟨 TYP: STANDARD (Pozostałe projekty)

**Użycie:** Standardowe projekty z automatycznym układem naprzemiennym

**Pola widoczne w ACF:**
- Podtytuł (np. "Projekt")
- Tytuł - Przed highlightem (opcjonalnie)
- Tytuł - Wyróżnione słowo (z highlightem)
- Tytuł - Po highlighcie (np. "– Klub Seniora")
- Opis 1 (pierwszy paragraf)
- Opis 2 (drugi paragraf)
- Dofinansowanie (np. "Dofinansowanie z UE: 50 000,00 zł")
- Zdjęcie
- CTA Tekst + Link

**Wygląd (automatycznie naprzemiennie):**
```
Realizacja 1:  [Zdjęcie]  [Tekst]
Realizacja 2:  [Tekst]    [Zdjęcie]
Realizacja 3:  [Zdjęcie]  [Tekst]
...
```

---

## ⚙️ CONDITIONAL LOGIC

**Jak to działa:**
- Po wyborze "Typ sekcji" w panelu edycji realizacji, **automatycznie pokazują się tylko pola dla tego typu**
- Nie trzeba ręcznie ukrywać/pokazywać pól
- Reszta pól jest ukryta i nie zapisuje danych

**Przykład:**
1. Wybierasz: **Hero**
2. ACF pokazuje: 8 par (tekst + ikona), 2 zdjęcia, CTA
3. ACF ukrywa: wszystkie pola Highlight i Standard

---

## 📋 STRUKTURA DANYCH (bez repeaterów)

**Dlaczego bez repeaterów?**
- Zapewniona zgodność z briefem
- Stała liczba elementów (8 dla Hero, 4 dla Highlight)
- Łatwiejsza walidacja danych
- Brak problemów z pętlami w ACF

**Nazwy pól w bazie:**
```
realizacja_type               // hero / highlight / standard

// HERO
hero_title_line1
hero_title_line2
hero_description
hero_program_title
hero_item1_text, hero_item1_icon
hero_item2_text, hero_item2_icon
... (do hero_item8_text, hero_item8_icon)
hero_main_image
hero_small_image
hero_cta_text, hero_cta_link

// HIGHLIGHT
highlight_subtitle
highlight_title_before
highlight_title_highlight
highlight_description
highlight_icon1_image, highlight_icon1_text
... (do highlight_icon4_image, highlight_icon4_text)
highlight_main_image
highlight_background_image
highlight_cta_text, highlight_cta_link

// STANDARD
standard_subtitle
standard_title_before
standard_title_highlight
standard_title_after
standard_description1
standard_description2
standard_funding
standard_image
standard_cta_text, standard_cta_link
```

---

## 🔄 AUTOMATYCZNY UKŁAD NAPRZEMIENNIE (Standard)

**Jak działa:**
- Szablon **oferta.php** używa licznika: `$standard_counter`
- Pierwsza realizacja Standard: zdjęcie po lewej
- Druga realizacja Standard: zdjęcie po prawej
- Trzecia realizacja Standard: zdjęcie po lewej
- ... i tak dalej

**Nie musisz:**
- Ręcznie ustawiać układu
- Martwić się o kolejność
- Nic zmieniać w kodzie

Szablon sam zadba o układ!

---

## 🎯 KOLEJNOŚĆ WYŚWIETLANIA

Realizacje renderują się:
- Od **najnowszych** do najstarszych
- Wszystkie typy (Hero, Highlight, Standard) w jednej sekwencji
- Możesz kontrolować kolejność poprzez datę publikacji w WordPress

**Przykład sekwencji:**
```
1. Hero      (najnowsza)
2. Standard  (lewo)
3. Highlight
4. Standard  (prawo - automatycznie!)
5. Standard  (lewo - automatycznie!)
6. Hero
```

---

## 🎨 STYLE CSS

**Klasy CSS używane w szablonie:**
- `.kobiety-section`, `.kobiety-container`, `.kobiety-left`, `.kobiety-right` (dla Highlight)
- `.realization-section` (dla Hero)
- `.standard-project-section` (dla Standard)

**Style są zdefiniowane w:** `css/styl.css`

Szablon używa **inline styles** dla precyzyjnego dopasowania do projektu oraz **istniejących klas CSS** dla kompatybilności.

---

## 📌 ODPOWIEDZI NA PYTANIA Z BRIEFU

✅ **Typ Hero: 8 elementów listy** → TAK (field_hero_item1 ... field_hero_item8)

✅ **Typ Highlight: 4 ikony** → TAK (field_highlight_icon1 ... field_highlight_icon4)

✅ **Typ Standard: układ i pola** → TAK (podtytuł, tytuł z highlightem, 2 opisy, dofinansowanie, zdjęcie, CTA)

✅ **Bez repeaterów** → TAK (wszystkie pola indywidualne z Conditional Logic)

✅ **Automatyczny układ lewo/prawo dla Standard** → TAK (licznik: $standard_counter)

---

## 🛠️ ROZSZERZANIE

### Dodawanie kolejnych elementów do Hero (np. 10 zamiast 8):

1. Otwórz `acf-oferta.json`
2. Skopiuj ostatni blok pól (item8)
3. Zmień klucze: `field_hero_item9_text`, `field_hero_item9_icon`
4. Zaimportuj ponownie grupę pól do ACF
5. Otwórz `oferta.php`
6. Zmień pętlę z `for ($i = 1; $i <= 8; $i++)` na `for ($i = 1; $i <= 10; $i++)`

### Dodawanie kolejnych ikon do Highlight (np. 6 zamiast 4):

Analogicznie jak powyżej, tylko dla pól `highlight_icon*`.

---

## 📞 WSPARCIE

W razie pytań lub problemów z implementacją:
- Sprawdź czy ACF jest zainstalowane i aktywne
- Upewnij się, że post type "realizacje" istnieje (powinien być w `functions.php`)
- Zweryfikuj import grupy pól w: **Custom Fields → Field Groups**

---

**Wersja:** 1.0  
**Data:** 2025-12-07  
**Zgodność:** WordPress 5.0+, ACF 5.0+

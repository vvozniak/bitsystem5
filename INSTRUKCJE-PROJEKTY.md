# Instrukcja: Podział zakładki "Projekty" na "Zrealizowane" i "Nadchodzące"

## 1. Import zaktualizowanych pól ACF

1. W panelu WordPress przejdź do: **ACF > Narzędzia (Tools)**
2. W sekcji "Import" kliknij "Choose File"
3. Wybierz plik: `acf-oferta.json` z głównego folderu motywu
4. Kliknij **"Import JSON"**

⚠️ **Uwaga**: Jeśli pola już istnieją, zostaną zaktualizowane z nowym polem "Status projektu"

## 2. Nowe pole ACF: Status projektu

Po imporcie, w każdej realizacji (Realizacje > Dodaj nową/Edytuj) pojawi się nowe pole:

**Status projektu:**
- ✅ Zrealizowany projekt (domyślnie)
- 📅 Nadchodzący projekt

To pole pozwala określić, czy projekt jest już zrealizowany czy planowany na przyszłość.

## 3. Utworzenie stron w WordPress

### Strona 1: Zrealizowane Projekty

1. Przejdź do: **Strony > Dodaj nową**
2. Tytuł strony: `Zrealizowane Projekty`
3. W prawym panelu, w sekcji **"Atrybuty strony"** wybierz szablon: **"Projekty (Zrealizowane)"**
4. Opublikuj stronę

### Strona 2: Nadchodzące Projekty

1. Przejdź do: **Strony > Dodaj nową**
2. Tytuł strony: `Nadchodzące Projekty`
3. W prawym panelu, w sekcji **"Atrybuty strony"** wybierz szablon: **"Projekty (Nadchodzące)"**
4. Opublikuj stronę

## 4. Konfiguracja menu z rozwijaniem

1. Przejdź do: **Wygląd > Menu**
2. Wybierz swoje główne menu (lub utwórz nowe)
3. Usuń starą pozycję "Zrealizowane projekty" (jeśli istnieje)
4. Dodaj nowy **"Niestandardowy link"**:
   - **Adres URL**: `#` (lub zostaw puste)
   - **Tekst linku**: `Projekty`
   - Kliknij **"Dodaj do menu"**
5. Dodaj stronę **"Zrealizowane Projekty"** do menu
6. Dodaj stronę **"Nadchodzące Projekty"** do menu
7. **Przeciągnij** obie strony (Zrealizowane i Nadchodzące) lekko w prawo, pod pozycję "Projekty" - to utworzy podmenu
8. Kliknij **"Zapisz menu"**

Struktura menu powinna wyglądać tak:
```
Strona główna
O nas
Oferta
Projekty  ←  (link główny)
  ↳ Zrealizowane Projekty  ←  (podmenu)
  ↳ Nadchodzące Projekty    ←  (podmenu)
Kontakt
```

## 5. Jak pracować z realizacjami?

### Dodawanie nowej realizacji:

1. Przejdź do: **Realizacje > Dodaj nową**
2. **Wybierz "Status projektu"**:
   - **Zrealizowany projekt** - pojawi się na stronie "Zrealizowane Projekty"
   - **Nadchodzący projekt** - pojawi się na stronie "Nadchodzące Projekty"
3. **Wybierz "Typ sekcji"**: Hero / Highlight / Standard
4. Wypełnij pozostałe pola zgodnie z wybranym typem
5. Opublikuj

### Przenoszenie projektu z "Nadchodzące" do "Zrealizowane":

1. Otwórz realizację do edycji
2. Zmień **"Status projektu"** z "Nadchodzący projekt" na "Zrealizowany projekt"
3. Zaktualizuj/Zapisz

Projekt automatycznie zniknie ze strony "Nadchodzące" i pojawi się na stronie "Zrealizowane"!

## 6. Funkcjonalność menu

### Na desktopie:
- Najedź myszką na "Projekty" - rozwinie się podmenu
- Kliknij na "Zrealizowane Projekty" lub "Nadchodzące Projekty"

### Na urządzeniach mobilnych:
- Kliknij w "Projekty" - rozwinie się podmenu
- Kliknij w wybraną opcję

## 7. Testowanie

### Sprawdź czy:
1. ✅ Menu rozwija się po najechaniu/kliknięciu na "Projekty"
2. ✅ Strona "Zrealizowane Projekty" wyświetla tylko projekty ze statusem "Zrealizowany"
3. ✅ Strona "Nadchodzące Projekty" wyświetla tylko projekty ze statusem "Nadchodzący"
4. ✅ Styl i layout są zgodne z oryginałem (te same pola ACF, ten sam wygląd)

## 8. Migracja istniejących realizacji

Jeśli masz już dodane realizacje:

1. Przejdź do: **Realizacje > Wszystkie realizacje**
2. Dla każdej realizacji:
   - Kliknij **"Edytuj"**
   - Wybierz odpowiedni **"Status projektu"**
   - Kliknij **"Zaktualizuj"**

**Domyślnie** wszystkie istniejące realizacje będą miały status "Zrealizowany projekt", więc pojawią się na stronie "Zrealizowane Projekty".

## Podsumowanie zmian

### Co zostało dodane:
- ✅ Nowe pole ACF: "Status projektu" (zrealizowane/nadchodzące)
- ✅ Nowy szablon: "Projekty (Nadchodzące)" - page-nadchodzace.php
- ✅ Zaktualizowany szablon: "Projekty (Zrealizowane)" - oferta.php
- ✅ Menu z rozwijaniem (dropdown) - header.php + styl.css
- ✅ Filtrowanie realizacji według statusu w obu szablonach

### Pliki zmodyfikowane:
- `acf-oferta.json` - dodano pole "realizacja_status"
- `oferta.php` - dodano filtrowanie po statusie "zrealizowane"
- `page-nadchodzace.php` - nowy szablon dla "nadchodzące"
- `header.php` - obsługa menu dropdown
- `css/styl.css` - style dla submenu

---

**Pytania?** Jeśli coś nie działa lub potrzebujesz pomocy, sprawdź czy:
1. ACF jest zainstalowane i aktywne
2. Plik JSON został zaimportowany poprawnie
3. Menu jest przypisane do lokalizacji "Primary Menu"
4. Strony mają przypisany odpowiedni szablon

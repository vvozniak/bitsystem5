# Instrukcja: Zmiana tła hero przez Obrazek Wyróżniający

## Zmodyfikowane pliki:
- `page-realization.php` - Strona Realizacji
- `page-blog.php` - Strona Bloga

## Jak zmienić tło na tych stronach:

### Krok 1: Wejdź do edycji strony
1. Zaloguj się do panelu WordPress Admin
2. Przejdź do **Strony → Wszystkie strony**
3. Znajdź stronę, która używa szablonu "Strona Realizacji" lub "Strona Bloga"
4. Kliknij **Edytuj**

### Krok 2: Ustaw Obrazek Wyróżniający
1. W prawym panelu znajdź sekcję **"Obrazek wyróżniający"** (Featured Image)
2. Kliknij **"Ustaw obrazek wyróżniający"**
3. Wybierz obraz z biblioteki lub wgraj nowy
4. Kliknij **"Ustaw obrazek wyróżniający"**

### Krok 3: Zapisz i sprawdź
1. Kliknij **"Aktualizuj"** aby zapisać stronę
2. Odwiedź stronę na froncie
3. Obrazek wyróżniający powinien być teraz tłem hero

## Domyślne tło
Jeśli **nie** ustawisz obrazka wyróżniającego, strona użyje domyślnego tła: `images/webp/tlo.webp`

## Zalecenia dla obrazów tła:
- **Minimalne wymiary:** 1920x1080 px (Full HD)
- **Zalecane:** 2560x1440 px lub wyższe
- **Format:** 16:9 (panoramiczne)
- **Rozszerzenia:** .webp, .jpg, .png
- **Rozmiar pliku:** Maksymalnie 500 KB (używaj kompresji)
- **Kompozycja:** Unikaj zbyt jasnych tła (tekst jest biały)

## Jak to działa?
Szablon automatycznie:
1. Sprawdza czy strona ma ustawiony obrazek wyróżniający
2. Jeśli TAK → używa go jako tła hero
3. Jeśli NIE → używa domyślnego tło.webp

## Szybkie testowanie:
1. Edytuj stronę realizacji/bloga
2. Ustaw dowolny obrazek jako wyróżniający
3. Zapisz i odśwież stronę na froncie
4. Tło hero powinno się zmienić!

---
**Ostatnia aktualizacja:** Grudzień 2025

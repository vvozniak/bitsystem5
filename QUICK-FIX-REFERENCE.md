# Quick Reference: ACF tile_url Fix

## What Changed?

### Before:
```
All 6 cards had sub-fields named: "tile_url"
This caused WordPress meta conflicts
```

### After:
```
Card 1: "tile_url_1"
Card 2: "tile_url_2"
Card 3: "tile_url_3"
Card 4: "tile_url_4"
Card 5: "tile_url_5"
Card 6: "tile_url_6"
```

## WordPress Admin Steps

### 1. Sync ACF Fields
```
WordPress Admin → Custom Fields → Field Groups
Look for "Sync available" on "Strona Oferty"
Click "Sync"
```

### 2. Fill in Links
```
WordPress Admin → Pages → Oferta → Edit

Kafelek 1 → URL Kafelka: /oferta/konferencje
Kafelek 2 → URL Kafelka: /oferta/misje
Kafelek 3 → URL Kafelka: /oferta/badania
Kafelek 4 → URL Kafelka: /oferta/kultura
Kafelek 5 → URL Kafelka: /oferta/technologie
Kafelek 6 → URL Kafelka: /oferta/eventy

Click "Aktualizuj" (Update)
```

### 3. Verify
```
Refresh the page (F5)
Check if values are still there ✅
If yes - FIXED!
If no - check sync step again
```

## Files Changed

- `acf-page-offer.json` - Updated field names
- `page-offer.php` - Updated template code
- `ROZWIAZANIE-TILE-URL-FIX.md` - Full documentation

## Why This Works

ACF was confused because all 6 fields had the same name "tile_url".
Now each field has a unique name, so ACF can save them correctly.

## Support

For detailed explanation see: `ROZWIAZANIE-TILE-URL-FIX.md`

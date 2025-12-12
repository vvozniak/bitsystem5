# Testing Checklist: ACF tile_url Fix

## Pre-Deployment Verification ✅

- [x] ACF JSON is valid (no syntax errors)
- [x] PHP syntax is valid (no errors in page-offer.php)
- [x] All 6 tile_url fields have unique names (tile_url_1 through tile_url_6)
- [x] Code has backward compatibility for old field name
- [x] Security scan passed (CodeQL)
- [x] Code review completed and feedback addressed

## Post-Deployment Testing (WordPress Admin)

### Step 1: Sync ACF Fields ⚠️ REQUIRED
```
[ ] Log in to WordPress Admin
[ ] Navigate to: Custom Fields → Field Groups
[ ] Look for "Strona Oferty" field group
[ ] Check for "Sync available" notification
[ ] Click "Sync" or "Synchronizuj"
[ ] Verify sync completed successfully
```

**Alternative if sync not available:**
```
[ ] Go to: Custom Fields → Tools
[ ] Select "Import Field Groups"
[ ] Choose file: acf-page-offer.json
[ ] Click "Import file"
[ ] Confirm overwrite of existing group
```

### Step 2: Test Field Persistence
```
[ ] Navigate to: Pages → Oferta → Edit
[ ] Scroll to "Kafelek 1" section
[ ] Fill in "URL Kafelka" field with: /oferta/test-1
[ ] Click "Aktualizuj" (Update)
[ ] Refresh the page (F5)
[ ] ✅ VERIFY: /oferta/test-1 is still there (not empty!)
[ ] If empty ❌ - sync step failed, try again
```

### Step 3: Fill All Cards
```
[ ] Kafelek 1 → URL Kafelka: /oferta/konferencje
[ ] Kafelek 2 → URL Kafelka: /oferta/misje
[ ] Kafelek 3 → URL Kafelka: /oferta/badania
[ ] Kafelek 4 → URL Kafelka: /oferta/kultura
[ ] Kafelek 5 → URL Kafelka: /oferta/technologie
[ ] Kafelek 6 → URL Kafelka: /oferta/eventy
[ ] Click "Aktualizuj" (Update)
[ ] Refresh the page (F5)
[ ] ✅ VERIFY: All values are still present
```

### Step 4: Frontend Verification
```
[ ] Open the Oferta page in browser
[ ] Hover mouse over Kafelek 1
[ ] Check bottom-left corner of browser
[ ] ✅ VERIFY: Link shows /oferta/konferencje
[ ] Right-click → Inspect element
[ ] ✅ VERIFY: <a href="/oferta/konferencje" class="kafelek">
[ ] Repeat for all 6 cards
```

### Step 5: Test Link Functionality
```
[ ] Click on Kafelek 1
[ ] ✅ VERIFY: Navigates to /oferta/konferencje (or 404 if page doesn't exist yet)
[ ] Go back to Oferta page
[ ] Test clicking all other cards
[ ] ✅ VERIFY: Each navigates to correct URL
```

## Troubleshooting

### Issue: Values still disappear after saving
**Solution:**
1. Check if ACF sync was completed
2. Try manual import from JSON
3. Clear WordPress cache
4. Check browser console for errors

### Issue: "Sync available" doesn't appear
**Solution:**
1. Use manual import method
2. Or re-upload acf-page-offer.json to theme directory
3. Refresh WordPress admin

### Issue: Links not working on frontend
**Solution:**
1. Check if you saved the page after filling fields
2. Clear browser cache
3. Check page source for correct href attributes
4. Verify field names match in template

## Expected Results

### In WordPress Admin:
```
✅ All tile_url fields save and persist
✅ No more disappearing values
✅ Can use both relative (/oferta/test) and absolute (https://example.com) URLs
```

### On Frontend:
```
✅ Cards with URLs render as <a> tags
✅ Cards without URLs render as <div> tags
✅ Hover shows correct link in browser status bar
✅ Clicking navigates to correct URL
✅ Cards have hover effect (transform and shadow)
```

## Rollback Plan

If issues persist after deployment:

1. Restore old ACF JSON:
   ```
   mv acf-page-offer.json.old acf-page-offer.json
   ```

2. Restore old template code (revert commits)

3. Report issue with:
   - Browser console errors
   - WordPress debug.log
   - ACF version number

## Support Documentation

- `ROZWIAZANIE-TILE-URL-FIX.md` - Full technical documentation
- `QUICK-FIX-REFERENCE.md` - Quick reference guide
- `NAPRAWIONO-LINKI-KAFELKI.md` - Previous fix documentation

---

**Test Date:** __________  
**Tester:** __________  
**Result:** ✅ PASS / ❌ FAIL  
**Notes:** __________

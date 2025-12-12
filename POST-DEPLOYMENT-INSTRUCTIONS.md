# ⚠️ POST-DEPLOYMENT INSTRUCTIONS

## 🚨 CRITICAL: Read This First!

**The code fix is complete and deployed, but it won't work until you complete these steps in WordPress Admin.**

Without these steps, the old ACF field definitions remain active and the problem will persist.

---

## ✅ Required Steps (Est. 5 minutes)

### Step 1: Sync ACF Fields ⚡ REQUIRED

1. Log in to **WordPress Admin**
2. Navigate to: **Custom Fields** → **Field Groups**
3. Find: **"Strona Oferty"** group
4. Look for **"Sync available"** badge or button
5. Click **"Sync"** or **"Synchronizuj"**
6. ✅ **Confirm sync completed**

**Screenshot location to look for:**
```
WordPress Admin (left sidebar)
├─ Custom Fields
   ├─ Field Groups  ← Click here
      └─ Strona Oferty [Sync available] ← Look for this
```

**Alternative if "Sync" not available:**
1. Go to: **Custom Fields** → **Tools**
2. Section: **Import Field Groups**
3. Click: **Choose File**
4. Select: `acf-page-offer.json` from theme directory
5. Click: **Import file**
6. Confirm: **Overwrite existing group**

---

### Step 2: Test Field Persistence 🧪 CRITICAL TEST

**Before filling in all cards, TEST with one card first!**

1. Navigate to: **Pages** → **Oferta** → **Edit**
2. Scroll to: **Kafelek 1**
3. In field **"URL Kafelka"**, enter: `/oferta/test`
4. Click: **"Aktualizuj"** (Update button)
5. **Wait for page to save**
6. Press **F5** to refresh the page
7. Scroll back to **Kafelek 1**
8. Check **"URL Kafelka"** field

**Expected result:**
- ✅ Field shows: `/oferta/test` (value persisted!)

**If field is empty:**
- ❌ Sync failed - go back to Step 1
- ❌ Try the alternative import method
- ❌ Check for errors in browser console

---

### Step 3: Fill All Card URLs 📝

**Only proceed if Step 2 test passed!**

1. Still in: **Pages** → **Oferta** → **Edit**
2. Fill in each card's **"URL Kafelka"** field:

```
Kafelek 1: /oferta/konferencje
Kafelek 2: /oferta/misje
Kafelek 3: /oferta/badania
Kafelek 4: /oferta/kultura
Kafelek 5: /oferta/technologie
Kafelek 6: /oferta/eventy
```

**Or use your own URLs:**
- Relative URLs: `/oferta/custom-page`
- Absolute URLs: `https://example.com`
- Leave empty to disable link on that card

3. Click: **"Aktualizuj"** (Update)
4. **Verify**: All values saved correctly

---

### Step 4: Verify Frontend 🌐

1. **Open Oferta page** in browser
2. **Hover mouse** over Kafelek 1
3. **Check bottom-left** corner of browser
4. ✅ Should show: `yourdomain.com/oferta/konferencje`

**Click to test:**
1. **Click Kafelek 1**
2. ✅ Should navigate to: `/oferta/konferencje`
3. **Go back** and test other cards

**Inspect HTML (optional):**
1. Right-click on a card
2. Select: **"Inspect"** or **"Zbadaj element"**
3. Look for: `<a href="/oferta/konferencje" class="kafelek">`
4. ✅ Confirm `href` is correct

---

## 🎯 Success Checklist

- [ ] ACF fields synced (Step 1)
- [ ] Test passed - value persisted (Step 2)
- [ ] All 6 cards filled (Step 3)
- [ ] Frontend links verified (Step 4)
- [ ] Cards clickable and navigate correctly
- [ ] No JavaScript console errors

**If all checked:** ✅ **FIX COMPLETE!**

---

## 🆘 Troubleshooting

### Problem: "Sync available" doesn't appear

**Solution:**
1. Use manual import method (Step 1 alternative)
2. Upload `acf-page-offer.json` via FTP to theme directory
3. Try import again

---

### Problem: Values still disappear after saving

**Possible causes:**
1. ❌ ACF sync not completed
2. ❌ Old field definitions still active
3. ❌ Cache interfering

**Solutions:**
1. ✅ Clear WordPress cache (if using cache plugin)
2. ✅ Clear browser cache (Ctrl+Shift+Delete)
3. ✅ Try manual import method
4. ✅ Check WordPress debug.log for errors:
   ```
   /wp-content/debug.log
   ```
5. ✅ Disable all caching plugins temporarily
6. ✅ Try in incognito/private browser window

---

### Problem: Links don't work on frontend

**Check these:**
1. ✅ Did you save the page after filling URLs?
2. ✅ Clear browser cache
3. ✅ Check page source (Right-click → View Source)
4. ✅ Look for `<a href="...">` tags
5. ✅ Verify URLs are correct in WordPress Admin

**If cards render as `<div>` instead of `<a>`:**
- This is normal if URL field is empty
- Fill in the URL and save again

---

### Problem: Some cards work, others don't

**This indicates:**
- Partial sync or incomplete field update
- Re-run ACF sync/import
- Clear all caches
- Test each card individually

---

## 📞 Getting Help

### Check documentation:
1. **[README-ACF-FIX.md](README-ACF-FIX.md)** - Main overview
2. **[QUICK-FIX-REFERENCE.md](QUICK-FIX-REFERENCE.md)** - Quick guide
3. **[TESTING-CHECKLIST.md](TESTING-CHECKLIST.md)** - Detailed testing
4. **[ROZWIAZANIE-TILE-URL-FIX.md](ROZWIAZANIE-TILE-URL-FIX.md)** - Technical details

### Debug information to collect:
If you need support, provide:
- WordPress version
- ACF version
- Browser console errors (F12 → Console tab)
- WordPress debug.log contents
- Screenshot of ACF Field Groups page
- Result of test in Step 2

---

## 🔄 Rollback Plan

**If issues persist and you need to rollback:**

1. **In WordPress Admin:**
   ```
   Custom Fields → Tools → Import
   Select: acf-page-offer.json.old (if available)
   Import
   ```

2. **Via Git:**
   ```bash
   git checkout main
   git pull
   # This restores previous version
   ```

3. **Report issue with:**
   - What failed
   - Error messages
   - Debug information listed above

---

## ✅ Post-Completion

**After successful deployment:**

1. ✅ Test all 6 cards thoroughly
2. ✅ Verify on different browsers
3. ✅ Test on mobile devices
4. ✅ Monitor for any errors
5. ✅ Keep this document for reference

**Optional:**
- Create test URLs (if they don't exist yet):
  - `/oferta/konferencje`
  - `/oferta/misje`
  - etc.
- Or link to existing pages

---

## 📊 Expected Behavior

### In WordPress Admin:
```
Fill field: "/oferta/test" → Save → Refresh
Result: Field still shows "/oferta/test" ✅
```

### On Frontend:
```
Hover over card → Shows URL in browser status bar ✅
Click card → Navigates to URL ✅
Empty URL → Card is <div> (not clickable) ✅
```

---

## 🎉 You're Done!

If all steps completed successfully:

✅ Fields save correctly  
✅ Values persist after refresh  
✅ Links work on frontend  
✅ All 6 cards functional  

**Congratulations!** The ACF tile_url fix is complete and working.

---

**Last Updated:** 2024-12-12  
**Version:** 1.0  
**Status:** Active

**Questions?** See [README-ACF-FIX.md](README-ACF-FIX.md) for documentation index.

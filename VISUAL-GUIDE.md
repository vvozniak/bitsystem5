# Visual Guide: ACF tile_url Fix

## 🔴 BEFORE (Problem)

```
┌─────────────────────────────────────────────────────────────┐
│  WordPress Post Meta (wp_postmeta)                          │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  offer_card_1_tile_url = "/oferta/konferencje"            │
│  _offer_card_1_tile_url = "field_offer_card_1_tile_url"   │
│                                                             │
│  offer_card_2_tile_url = "/oferta/misje"                  │
│  _offer_card_2_tile_url = "field_offer_card_2_tile_url"   │
│                            ⚠️ CONFLICT!                     │
│  offer_card_3_tile_url = "/oferta/badania"                │
│  _offer_card_3_tile_url = "field_offer_card_3_tile_url"   │
│                            ⚠️ CONFLICT!                     │
│  ...                                                        │
│                                                             │
│  ❌ ACF gets confused about which reference belongs to     │
│     which field because all sub-fields share the same      │
│     name "tile_url"                                        │
│                                                             │
│  Result: Last field (card 6) often fails to save          │
└─────────────────────────────────────────────────────────────┘

ACF Field Structure (PROBLEMATIC):
┌────────────────┐
│ offer_card_1   │
│  ├─ title      │
│  ├─ description│
│  ├─ icon       │
│  ├─ color      │
│  ├─ width      │
│  └─ tile_url   │ ← Same name!
└────────────────┘
┌────────────────┐
│ offer_card_2   │
│  ├─ title      │
│  ├─ description│
│  ├─ icon       │
│  ├─ color      │
│  ├─ width      │
│  └─ tile_url   │ ← Same name! ⚠️
└────────────────┘
... (4 more with same name)

User Experience:
Admin: Enter URL → Save → ❌ EMPTY
Frontend: <div> (no link) ❌
```

---

## ✅ AFTER (Solution)

```
┌─────────────────────────────────────────────────────────────┐
│  WordPress Post Meta (wp_postmeta)                          │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  offer_card_1_tile_url_1 = "/oferta/konferencje"          │
│  _offer_card_1_tile_url_1 = "field_offer_card_1_tile_url" │
│                                                             │
│  offer_card_2_tile_url_2 = "/oferta/misje"                │
│  _offer_card_2_tile_url_2 = "field_offer_card_2_tile_url" │
│                                                             │
│  offer_card_3_tile_url_3 = "/oferta/badania"              │
│  _offer_card_3_tile_url_3 = "field_offer_card_3_tile_url" │
│                                                             │
│  offer_card_4_tile_url_4 = "/oferta/kultura"              │
│  _offer_card_4_tile_url_4 = "field_offer_card_4_tile_url" │
│                                                             │
│  offer_card_5_tile_url_5 = "/oferta/technologie"          │
│  _offer_card_5_tile_url_5 = "field_offer_card_5_tile_url" │
│                                                             │
│  offer_card_6_tile_url_6 = "/oferta/eventy"               │
│  _offer_card_6_tile_url_6 = "field_offer_card_6_tile_url" │
│                                                             │
│  ✅ Each field has unique meta key!                        │
│  ✅ No confusion about which reference belongs to which    │
│  ✅ All values save correctly                              │
└─────────────────────────────────────────────────────────────┘

ACF Field Structure (FIXED):
┌────────────────┐
│ offer_card_1   │
│  ├─ title      │
│  ├─ description│
│  ├─ icon       │
│  ├─ color      │
│  ├─ width      │
│  └─ tile_url_1 │ ← Unique! ✅
└────────────────┘
┌────────────────┐
│ offer_card_2   │
│  ├─ title      │
│  ├─ description│
│  ├─ icon       │
│  ├─ color      │
│  ├─ width      │
│  └─ tile_url_2 │ ← Unique! ✅
└────────────────┘
┌────────────────┐
│ offer_card_3   │
│  ├─ title      │
│  ├─ description│
│  ├─ icon       │
│  ├─ color      │
│  ├─ width      │
│  └─ tile_url_3 │ ← Unique! ✅
└────────────────┘
... (3 more with unique names)

User Experience:
Admin: Enter URL → Save → ✅ SAVED!
Frontend: <a href="/oferta/konferencje"> ✅
```

---

## 📊 Data Flow Diagram

### BEFORE (Broken):
```
WordPress Admin              ACF Processing              Database
─────────────────────────────────────────────────────────────────
User enters:
"/oferta/test"
     │
     ├──► ACF reads field
     │    name: "tile_url"         ❌ Same name for all cards
     │    key: "field_..._tile_url"
     │
     └──► WordPress saves:
          Meta key pattern:
          offer_card_X_tile_url     ✅ Unique
          
          Reference pattern:
          _offer_card_X_tile_url    ❌ ACF confused!
          = "field_..._tile_url"
          
          Problem: ACF can't tell which
          "tile_url" field this reference
          points to!
          
          Result: Value doesn't save ❌
```

### AFTER (Fixed):
```
WordPress Admin              ACF Processing              Database
─────────────────────────────────────────────────────────────────
User enters:
"/oferta/test"
     │
     ├──► ACF reads field
     │    name: "tile_url_1"       ✅ Unique per card!
     │    key: "field_..._tile_url"
     │
     └──► WordPress saves:
          Meta key pattern:
          offer_card_1_tile_url_1   ✅ Unique
          
          Reference pattern:
          _offer_card_1_tile_url_1  ✅ Unique!
          = "field_..._tile_url"
          
          Success: ACF knows exactly
          which field this is!
          
          Result: Value saves ✅
```

---

## 🔧 Code Changes

### acf-page-offer.json (SIMPLIFIED VIEW)

**BEFORE:**
```json
{
  "name": "offer_card_1",
  "sub_fields": [
    { "name": "title" },
    { "name": "tile_url" }  ❌
  ]
},
{
  "name": "offer_card_2",
  "sub_fields": [
    { "name": "title" },
    { "name": "tile_url" }  ❌ Same!
  ]
}
```

**AFTER:**
```json
{
  "name": "offer_card_1",
  "sub_fields": [
    { "name": "title" },
    { "name": "tile_url_1" }  ✅
  ]
},
{
  "name": "offer_card_2",
  "sub_fields": [
    { "name": "title" },
    { "name": "tile_url_2" }  ✅ Unique!
  ]
}
```

### page-offer.php (SIMPLIFIED VIEW)

**BEFORE:**
```php
// Only checked one field name
$card_link = isset($b['tile_url']) 
    ? $b['tile_url'] 
    : '';
```

**AFTER:**
```php
// Checks new unique name first, falls back to old
$card_link = '';
$tile_url_key = 'tile_url_' . $card_num;
if (isset($b[$tile_url_key])) {
    $card_link = $b[$tile_url_key];    // New ✅
} elseif (isset($b['tile_url'])) {
    $card_link = $b['tile_url'];        // Old (backward compatible)
}
```

---

## 🎯 Why This Works

### The Problem:
1. All cards had sub-field named `tile_url`
2. WordPress creates meta keys like `offer_card_1_tile_url`
3. ACF creates reference keys like `_offer_card_1_tile_url`
4. But ACF doesn't know which `tile_url` is which when saving
5. Last one processed often loses its reference

### The Solution:
1. Each card now has unique sub-field name: `tile_url_1`, `tile_url_2`, etc.
2. WordPress creates unique meta keys: `offer_card_1_tile_url_1`
3. ACF creates unique references: `_offer_card_1_tile_url_1`
4. No confusion! Each field is clearly identifiable
5. All values save correctly

---

## 📝 Summary

| Aspect | Before | After |
|--------|--------|-------|
| Field Names | All "tile_url" ❌ | Unique: tile_url_1..6 ✅ |
| Meta Keys | Conflicting ❌ | Unique ✅ |
| Save Behavior | Fails ❌ | Works ✅ |
| User Experience | Frustrating ❌ | Smooth ✅ |

**Key Insight:** In ACF groups, always use unique sub-field names!

---

## 🚀 Next Steps

1. **Sync ACF Fields** in WordPress Admin
2. **Fill in URLs** for all 6 cards
3. **Test** - values should persist
4. **Verify** - links should work on frontend

See EXECUTIVE-SUMMARY.md for complete deployment instructions.

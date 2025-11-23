# NYC STEM Club - Refactoring TODO

> **DO NOT DELETE** - Reference document for future refactoring work

**Created:** 2025-11-21
**Updated:** 2025-11-23
**Status:** Planned - Ready to Begin

---

## Table of Contents

1. [Executive Summary](#executive-summary)
2. [Performance Critical Issues](#-performance-critical-issues-new)
3. [Typography Architecture Breakdown](#-typography-architecture-breakdown)
4. [Why Choose Shortcode Consolidation](#-why-choose-shortcode-consolidation-new)
5. [ACF Field Strategy for End Users](#-acf-field-strategy-for-end-users-new)
6. [Elementor Removal Plan](#-elementor-removal-plan-updated)
7. [Template Consolidation Plan](#-template-consolidation-plan)
8. [Component Architecture](#-component-architecture)
9. [Code Cleanup Protocol](#-code-cleanup-protocol-new)
10. [Step-by-Step Migration Checklist](#-step-by-step-migration-checklist-new)
11. [Rules for Claude Code](#-rules-for-claude-code)
12. [Reusable Prompts](#-reusable-prompts)

---

## Executive Summary

### Current State (As of 2025-11-23)
- **17 templates** with massive code duplication
- **708 hardcoded font-size declarations** with 0 CSS variable usage
- **4 "Why Choose" shortcodes** with 95% identical code
- **~8,000 lines of inline CSS** across templates
- **Performance score: 55** (FCP: 18.7s, LCP: 31.4s)
- **Elementor plugins** - HEADER USES ELEMENTOR (cannot remove)
- **~490 lines dead CSS removed** (WooCommerce + orphaned Elementor)

### Target State
- **4 base templates** (down from 17)
- **7 reusable components** with ACF fields
- **1 unified "Why Choose" shortcode** with parameters
- **0 inline CSS** in templates
- **Performance score: 90+** (FCP: <3s)
- **Elementor kept for header only** (defer full removal to Phase 5+)
- **Content editable in WordPress admin** (not in code)

---

## 🔴 PERFORMANCE CRITICAL ISSUES (NEW)

> **Lighthouse Report: 2025-11-23**
> - Performance: 55/100
> - FCP: 18.7s | LCP: 31.4s | TBT: 40ms | CLS: 0

### Critical Performance Fixes

| Issue | Est. Savings | Priority |
|-------|-------------|----------|
| Render-blocking resources | 12,660 ms | 🔴 CRITICAL |
| Unused CSS | 1,924 KiB | 🔴 CRITICAL |
| Unused JavaScript | 719 KiB | 🟠 HIGH |
| Minify CSS | 217 KiB | 🟠 HIGH |
| Browser caching | 4,336 KiB | 🟠 HIGH |
| Image dimensions missing | Layout shift | 🟡 MEDIUM |

### Immediate Actions (Phase 0)

1. **Remove Elementor plugins** (see Section 6)
   - Instantly removes ~500KB unused JS/CSS

2. **Add browser caching headers**
   ```apache
   # Add to .htaccess
   <IfModule mod_expires.c>
       ExpiresActive On
       ExpiresByType text/css "access plus 1 year"
       ExpiresByType application/javascript "access plus 1 year"
       ExpiresByType image/png "access plus 1 year"
       ExpiresByType image/jpeg "access plus 1 year"
   </IfModule>
   ```

3. **Defer non-critical CSS**
   - Move component CSS to async loading
   - Inline critical above-fold CSS (~15KB max)

4. **Add explicit image dimensions**
   - All `<img>` tags need `width` and `height` attributes

### Accessibility Fixes (Score: 92 → 98+)

- [ ] Fix color contrast issues (text readability)
- [ ] Add accessible names to links
- [ ] Add `<main>` landmark to templates

### SEO Fixes (Score: 85 → 95+)

- [ ] Replace "Learn more" links with descriptive text
- [ ] Fix non-crawlable links
- [ ] Ensure all pages have meta descriptions

---

## 🚨 TYPOGRAPHY ARCHITECTURE BREAKDOWN

### The Problem (As of 2025-11-22)

**708 hardcoded font-size declarations across 17 templates, with 0 CSS variable usage.**

This happened because inline `<style>` blocks were added to each template instead of using the design system. The result is 4 layers of CSS fighting each other.

### Current Typography Chaos

#### Layer 1: design-system.css (Good - Source of Truth)
```css
--text-xs: 0.75rem;     /* 12px */
--text-sm: 0.875rem;    /* 14px */
--text-base: 1rem;      /* 16px */
--text-lg: 1.125rem;    /* 18px */
--text-xl: 1.25rem;     /* 20px */
--text-2xl: 1.5rem;     /* 24px */
--text-3xl: 1.875rem;   /* 30px */
--text-4xl: 2.25rem;    /* 36px */
--text-5xl: 3rem;       /* 48px */
```

#### Layer 2: course-pages.css (Partially uses variables)
- ~100 font-size declarations
- Some use `var(--text-*)`, some hardcoded

#### Layer 3: course-styles.css - Plugin (All hardcoded)
- ~50 font-size declarations
- Uses `28px` for H1 mobile (should be 32px)
- Conflicts with theme CSS

#### Layer 4: Templates (ALL hardcoded - THE MAIN PROBLEM)

| Template | font-size count | Uses CSS Variables |
|----------|-----------------|-------------------|
| template-sat-act-prep.php | 123 | ❌ NO |
| template-act-sat-foundational.php | 121 | ❌ NO (OBSOLETE) |
| template-isee.php | 58 | ❌ NO |
| template-testing-timeline.php | 58 | ❌ NO |
| template-shsat-landing.php | 60 | ❌ NO |
| template-sat-vs-act.php | 56 | ❌ NO |
| template-digital-sat.php | 49 | ❌ NO |
| template-admissions-counseling.php | 26 | ❌ NO |
| template-shsat-faq.php | 25 | ❌ NO |
| template-simple-page.php | 25 | ❌ NO |
| template-homepage.php | 19 | ❌ NO |
| template-faq-page.php | 18 | ❌ NO |
| template-enhanced-act.php | 18 | ❌ NO |
| template-resources.php | 13 | ❌ NO |
| template-academic-enrichment.php | 13 | ❌ NO |
| template-ela-enrichment.php | 13 | ❌ NO |
| template-math-enrichment.php | 13 | ❌ NO |
| **TOTAL** | **708** | **0 variables** |

### 22 Different Font Sizes in Use (Should be 9)

| Count | Size | Standard? | Should be |
|-------|------|-----------|-----------|
| 207 | 16px | ✅ | --text-base |
| 146 | 18px | ✅ | --text-lg |
| 70 | 24px | ✅ | --text-2xl |
| 61 | 14px | ✅ | --text-sm |
| 51 | 32px | ✅ | H1 mobile |
| 28 | 20px | ✅ | --text-xl |
| 21 | 48px | ✅ | --text-5xl |
| 14 | 40px | ✅ | H1 tablet |
| 12 | 28px | ⚠️ | Change to 24px or 32px |
| 10 | 36px | ✅ | --text-4xl |
| 10 | 22px | ⚠️ | Change to 20px or 24px |
| 10 | 15px | ⚠️ | Change to 14px or 16px |
| 6 | 13px | ⚠️ | Change to 12px or 14px |
| 4 | 12px | ✅ | --text-xs |
| 3 | 38px | ⚠️ | Change to 36px or 40px |
| 2 | 56px | ⚠️ | Non-standard, remove |
| 2 | 42px | ⚠️ | Change to 40px or 48px |
| 1 | 80px | ⚠️ | Non-standard, remove |
| 1 | 64px | ⚠️ | Non-standard, remove |
| 1 | 30px | ✅ | --text-3xl |
| 1 | 26px | ⚠️ | Change to 24px |
| 1 | 17px | ⚠️ | Change to 16px or 18px |

### Intended Typography Standards

| Element | Mobile (<768px) | Tablet (768-1024px) | Desktop (1024px+) |
|---------|-----------------|---------------------|-------------------|
| H1 Hero | 32px | 40px | 48px |
| H2 Section | 24px | 28px | 36px |
| H3 Subsection | 20px | 24px | 24px |
| H4 Minor | 18px | 20px | 20px |
| Body | 16px | 16px | 16px |
| Lead/Excerpt | 18px | 18px | 18px |
| Small | 14px | 14px | 14px |
| Caption | 12px | 12px | 12px |

---

## 🎯 WHY CHOOSE SHORTCODE CONSOLIDATION (NEW)

### Current State: 4 Nearly Identical Shortcodes

| Shortcode | Lines | Content Difference |
|-----------|-------|-------------------|
| `[why_choose_sat_act]` | ~80 | SAT/ACT specific stats |
| `[why_choose_shsat]` | ~120 | SHSAT specific stats |
| `[why_choose_isee]` | ~120 | ISEE specific stats |
| `[why_choose_enrichment]` | ~80 | Enrichment specific |

**Problem:** 95% of the code is identical. Each has:
- Same 4-card grid structure
- Same styling (inline CSS)
- Same badge at bottom
- Only the card titles/descriptions differ

### Solution: Single Parameterized Shortcode

Create ONE shortcode with type parameter:

```php
// New unified shortcode
[why_choose type="sat_act"]
[why_choose type="shsat"]
[why_choose type="isee"]
[why_choose type="enrichment"]
[why_choose type="custom" benefits="field_name"]  // Uses ACF field
```

### Implementation Plan

**Step 1: Create unified shortcode**
```php
// File: nyc-stem-courses/includes/shortcodes/why-choose-shortcode.php

function why_choose_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => 'default',
        'benefits' => '',  // ACF field name for custom
    ), $atts);

    // Get benefits based on type OR from ACF field
    $benefits = get_why_choose_benefits($atts['type'], $atts['benefits']);

    // Single template, CSS classes only (no inline styles)
    ob_start();
    include NYC_STEM_COURSES_PATH . 'templates/parts/why-choose.php';
    return ob_get_clean();
}
```

**Step 2: Move CSS to stylesheet**
- Extract all inline styles from current shortcodes
- Add to `course-pages.css` as `.why-choose-*` classes

**Step 3: Create content configuration**
```php
// Centralized benefits content
function get_why_choose_benefits($type) {
    $benefits = array(
        'sat_act' => array(
            array('icon' => 'star', 'title' => 'Proven Score Improvements', 'desc' => '...'),
            array('icon' => 'calendar', 'title' => 'Personalized Strategy', 'desc' => '...'),
            // ...
        ),
        'shsat' => array(
            array('icon' => 'star', 'title' => 'Proven Track Record', 'desc' => '...'),
            // ...
        ),
        // ...
    );
    return $benefits[$type] ?? $benefits['default'];
}
```

**Step 4: Deprecate old shortcodes**
- Keep old shortcodes working (backward compatibility)
- Have them internally call new unified shortcode
- Log deprecation notice for developers

### Benefits of Consolidation
- **~400 lines of code removed** (4 shortcodes → 1)
- **Single CSS file** for styling (not inline)
- **Easy to add new types** (just add array entry)
- **ACF integration** for fully custom benefits

---

## 👤 ACF FIELD STRATEGY FOR END USERS (NEW)

### Current Problem
- Most content is **hardcoded in templates** (not editable in WP admin)
- Only **8 ACF fields** actually in use across 17 templates
- End users cannot edit page content without developer help

### Existing ACF Infrastructure (Course CPT)

The plugin already has excellent ACF fields for **courses** in `acf-fields-organized.php`:

| Section | Fields Available |
|---------|-----------------|
| Hero | hero_stats, hero_card_title, hero_card_stat_1-4, hero_tagline |
| Description | course_description (WYSIWYG) |
| Why Choose | why_choose_us (repeater with override option) |
| FAQs | course_faqs (repeater), faq_title, faq_subtitle |
| Testimonials | testimonials (repeater), testimonial_category_filter |
| CTA | cta_badge, cta_title, cta_subtitle, cta_button_text/url |
| Related | crosssell_courses, related_courses, related_course_categories |

**This is great for courses!** The problem is **landing pages** (SHSAT, ISEE, SAT/ACT, etc.) don't have ACF fields.

### Solution: ACF Field Groups for Landing Pages

**Create new ACF field group: "Landing Page Content"**

```php
// Location: Apply to pages using template-landing-page.php

Field Group: Landing Page Content
├── 🎯 HERO SECTION
│   ├── hero_title_override (text) - Override post title
│   ├── hero_subtitle (text)
│   ├── hero_description (textarea)
│   ├── hero_stats (repeater)
│   │   ├── stat_number (text)
│   │   └── stat_label (text)
│   ├── hero_cta_primary_text (text)
│   ├── hero_cta_primary_url (url)
│   ├── hero_cta_secondary_text (text)
│   └── hero_cta_secondary_url (url)
│
├── 📝 PAGE SECTIONS (Flexible Content)
│   ├── benefits_section
│   │   ├── heading (text)
│   │   └── benefits (repeater)
│   ├── programs_section
│   │   ├── heading (text)
│   │   └── programs (repeater or WYSIWYG)
│   ├── faq_section
│   │   ├── heading (text)
│   │   └── faqs (repeater)
│   ├── testimonials_section
│   │   └── widget_id (text)
│   └── cta_section
│       ├── heading (text)
│       ├── description (textarea)
│       └── button_text/url
│
├── 💎 WHY CHOOSE SECTION
│   ├── why_choose_type (select: sat_act, shsat, isee, enrichment, custom)
│   └── custom_benefits (repeater - only if type=custom)
│
└── ⚙️ PAGE SETTINGS
    ├── show_testimonials (true/false)
    ├── show_faq (true/false)
    └── schema_type (select: Course, Service, Article)
```

### End User Editing Experience

**Before (Current):**
- User wants to change SHSAT page stats
- Must contact developer
- Developer edits template-shsat-landing.php
- Deploy changes

**After (Target):**
- User goes to Pages → SHSAT Landing → Edit
- Sees clearly labeled ACF fields with help text
- Changes hero stats, FAQ content, CTA text
- Clicks "Update"
- Changes live immediately

### Implementation Steps

1. **Create ACF field group** for landing pages (export from ACF UI or PHP)
2. **Create template-landing-page.php** that reads from ACF fields
3. **Migrate content** from hardcoded templates to ACF fields
4. **Test each page** after migration
5. **Delete old template** after confirmation

### ACF Field Best Practices

- **Use clear labels**: "Hero Section Title" not "hero_title"
- **Add help text**: "This appears as the main heading at the top of the page"
- **Use conditional logic**: Only show "custom benefits" if type="custom"
- **Group related fields**: Use tabs or accordions for organization
- **Set sensible defaults**: Pre-fill common values

---

## 🗑️ ELEMENTOR REMOVAL PLAN (UPDATED)

### ⚠️ CRITICAL FINDING (2025-11-23)

**The site HEADER uses Elementor!** The navigation menu is built with ElementsKit Nav Menu widget (`ekit-nav-menu`). This means:

- ❌ **CANNOT fully remove Elementor** without rebuilding header
- ✅ **CAN remove Elementor from page content** (all pages use PHP templates)
- ✅ **CAN remove ~380 lines of orphaned Elementor CSS** from style.css

### Audit Results (2025-11-23)

| Item | Status | Details |
|------|--------|---------|
| Elementor plugin | Installed, Active | **KEEP - Header depends on it** |
| Elementor Pro plugin | Installed, Active | **KEEP - Header depends on it** |
| ElementsKit plugin | Installed, Active | **KEEP - Nav menu widget** |
| Pages using Elementor | **NONE** | All converted to PHP templates |
| Header using Elementor | **YES** | ElementsKit Nav Menu widget |
| Elementor CSS in style.css | ~130 lines remain | Keep header-related styles |

### Phase 0 Completed (2025-11-23)

- [x] Removed Elementor script exclusions from functions.php
- [x] Removed ~380 lines orphaned Elementor CSS (widget IDs, SHSAT tabs)
- [x] Removed ~110 lines WooCommerce dead code (not installed)
- [x] Removed `.elementor-button` refs from template-shsat-landing.php
- [x] Removed `.elementor-button` refs from template-shsat-faq.php
- [x] **RESTORED** essential header styles (`.elementor-widget-image`)

### Styles KEPT in style.css (Header Dependent)

```css
/* KEEP - Header logo positioning */
.elementor-widget-image{text-align:center}
.elementor-widget-image a{display:inline-block}
.elementor-widget-image img{vertical-align:middle;display:inline-block}

/* KEEP - Header button styles */
.site-header .elementor-button, header .elementor-button { ... }

/* KEEP - Blog/Home first section styles */
body.blog .elementor-section:first-child { ... }
```

### Future: Full Elementor Removal (Phase 5+)

To fully remove Elementor, must first:
1. Rebuild header/navigation with pure PHP/CSS
2. Replace ElementsKit Nav Menu with wp_nav_menu()
3. Create custom mobile hamburger menu
4. Test thoroughly across all pages

**Estimated effort:** 4-8 hours
**Risk:** MEDIUM (header is site-wide)
**Recommendation:** Defer to later phase, focus on content templates first

---

## 📋 TEMPLATE CONSOLIDATION PLAN

### Current: 17 Templates

| Template | Lines | Purpose |
|----------|-------|---------|
| template-homepage.php | ~800 | Homepage (keep unique) |
| template-sat-act-prep.php | ~1200 | SAT/ACT landing |
| template-shsat-landing.php | ~1035 | SHSAT landing |
| template-isee.php | ~1100 | ISEE landing |
| template-academic-enrichment.php | ~600 | Enrichment landing |
| template-math-enrichment.php | ~500 | Math enrichment |
| template-ela-enrichment.php | ~500 | ELA enrichment |
| template-admissions-counseling.php | ~700 | Admissions landing |
| template-digital-sat.php | ~800 | Resource article |
| template-enhanced-act.php | ~600 | Resource article |
| template-sat-vs-act.php | ~700 | Resource article |
| template-testing-timeline.php | ~900 | Resource article |
| template-shsat-faq.php | ~1245 | FAQ page |
| template-faq-page.php | ~500 | FAQ page |
| template-resources.php | ~400 | Resource hub |
| template-simple-page.php | ~300 | Generic pages |
| template-act-sat-foundational.php | ~121 | **OBSOLETE** |

### Target: 4 Templates

```
┌─────────────────────────────────────────────────────────────┐
│  template-homepage.php (KEEP - unique layout)               │
│  - Homepage only                                            │
│  - ~800 lines                                               │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  template-landing-page.php (NEW - consolidates 8 templates) │
│  - SHSAT, ISEE, SAT/ACT, Enrichment, Admissions            │
│  - Reads from ACF fields                                    │
│  - Uses section components                                  │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  template-resource-page.php (NEW - consolidates 6 templates)│
│  - Digital SAT, Enhanced ACT, SAT vs ACT, Timeline, FAQs   │
│  - Article-style layout                                     │
│  - Reads from ACF fields                                    │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  template-simple-page.php (KEEP - already flexible)         │
│  - Contact, About, generic pages                            │
│  - Already uses ACF fields                                  │
└─────────────────────────────────────────────────────────────┘
```

### Migration Map

| Current Template | → Target | Status |
|------------------|----------|--------|
| template-shsat-landing.php | template-landing-page.php | Pending |
| template-isee.php | template-landing-page.php | Pending |
| template-sat-act-prep.php | template-landing-page.php | Pending |
| template-academic-enrichment.php | template-landing-page.php | Pending |
| template-math-enrichment.php | template-landing-page.php | Pending |
| template-ela-enrichment.php | template-landing-page.php | Pending |
| template-admissions-counseling.php | template-landing-page.php | Pending |
| template-digital-sat.php | template-resource-page.php | Pending |
| template-enhanced-act.php | template-resource-page.php | Pending |
| template-sat-vs-act.php | template-resource-page.php | Pending |
| template-testing-timeline.php | template-resource-page.php | Pending |
| template-shsat-faq.php | template-resource-page.php | Pending |
| template-faq-page.php | template-resource-page.php | Pending |
| template-resources.php | template-resource-page.php | Pending |
| template-act-sat-foundational.php | **DELETE** | Pending |

---

## 🧩 COMPONENT ARCHITECTURE

### Target Components (7 Total)

```
skola-child/components/
├── hero-section.php        # All hero variants
├── cta-section.php         # Bottom CTA blocks
├── faq-accordion.php       # FAQ with schema
├── course-grid.php         # Course card displays
├── why-choose.php          # Benefits grid
├── comparison-table.php    # Side-by-side comparisons
└── testimonials.php        # Testimonial displays
```

### Component: hero-section.php

**Parameters:**
```php
<?php
$args = array(
    'title' => get_the_title(),           // or ACF field
    'subtitle' => get_field('hero_subtitle'),
    'description' => get_field('hero_description'),
    'stats' => get_field('hero_stats'),   // repeater
    'cta_primary' => array('text' => '...', 'url' => '...'),
    'cta_secondary' => array('text' => '...', 'url' => '...'),
    'variant' => 'standard',              // or 'with-stats', 'with-card'
);
include get_stylesheet_directory() . '/components/hero-section.php';
?>
```

### Component: faq-accordion.php

**Parameters:**
```php
<?php
$args = array(
    'title' => 'Frequently Asked Questions',
    'subtitle' => '',
    'faqs' => get_field('course_faqs'),   // repeater: question, answer
    'schema' => true,                      // Generate FAQPage schema
    'columns' => 2,                        // 1 or 2 column layout
);
include get_stylesheet_directory() . '/components/faq-accordion.php';
?>
```

### CSS Architecture Target

```
skola-child/css/
├── design-system.css     # Variables, typography, colors (SOURCE OF TRUTH)
├── components.css        # All component styles (hero, faq, cta, etc.)
├── layouts.css           # Page layout patterns, grids
└── utilities.css         # Helper classes (optional)

NO INLINE <style> BLOCKS IN ANY TEMPLATE
```

---

## 🧹 CODE CLEANUP PROTOCOL (NEW)

### Pre-Cleanup Checklist (Before EVERY Template Migration)

```markdown
## Template: [TEMPLATE NAME]
## Date: [DATE]
## Developer: [NAME]

### 1. BACKUP
- [ ] Database exported
- [ ] Template file backed up locally
- [ ] Git commit before changes

### 2. DOCUMENT CURRENT STATE
- [ ] List all hardcoded content (titles, stats, FAQs, etc.)
- [ ] List all inline CSS rules (count lines)
- [ ] List all JavaScript functions
- [ ] Screenshot current page appearance

### 3. IDENTIFY REUSABLE CODE
- [ ] Which CSS can move to components.css?
- [ ] Which HTML can become a component?
- [ ] Which content should become ACF fields?

### 4. IDENTIFY DEAD CODE
- [ ] Unused CSS classes (grep for usage)
- [ ] Commented-out code blocks
- [ ] Duplicate definitions
- [ ] Elementor references
```

### During Cleanup Checklist

```markdown
### 5. MIGRATION STEPS
- [ ] Create ACF fields for this page
- [ ] Populate ACF fields with current content
- [ ] Update template to read from ACF
- [ ] Move CSS to appropriate stylesheet
- [ ] Remove inline <style> block
- [ ] Test page at 375px, 768px, 1024px

### 6. VERIFY NOTHING BROKE
- [ ] Visual comparison (screenshot diff)
- [ ] All links work
- [ ] All interactive elements work (FAQ accordion, etc.)
- [ ] Mobile menu works
- [ ] Schema markup still present
```

### Post-Cleanup Checklist

```markdown
### 7. CLEANUP
- [ ] Delete backup file (if successful)
- [ ] Update this document with completion status
- [ ] Git commit with descriptive message

### 8. DOCUMENT WHAT WAS REMOVED
- Lines of inline CSS removed: ___
- Lines of dead code removed: ___
- Files deleted: ___
```

### Dead Code Removal Rules

**ALWAYS SAFE TO DELETE:**
- Commented-out code older than 30 days
- CSS targeting `.elementor-*` classes
- Duplicate CSS rules (keep one in central file)
- Test/debug files (`test-*.php`, `check-*.php`)
- Backup files (`*.backup`, `*-old.php`)

**CHECK BEFORE DELETING:**
- CSS classes - grep entire codebase first
- JavaScript functions - search for calls
- PHP functions - search for calls
- Template files - check no pages using them

**NEVER DELETE WITHOUT BACKUP:**
- Any file in `includes/` or `shortcodes/`
- `functions.php`
- `style.css`
- `design-system.css`
- Active template files

---

## ✅ STEP-BY-STEP MIGRATION CHECKLIST (NEW)

### Phase 0: Performance & Elementor (Week 1)

```markdown
## Phase 0: Performance Critical
## Target: Remove Elementor, Fix Performance Blockers

### Day 1: Elementor Removal
- [ ] Export database backup
- [ ] Remove Elementor script exclusions from functions.php
- [ ] Test site still works
- [ ] Git commit

### Day 2: style.css Cleanup
- [ ] Identify all `.elementor-*` rules (document line numbers)
- [ ] Remove Elementor CSS rules (~500 lines)
- [ ] Test all pages for visual breakage
- [ ] Git commit

### Day 3: Deactivate Plugins
- [ ] Deactivate Elementor Pro
- [ ] Full site test
- [ ] Deactivate Elementor
- [ ] Full site test
- [ ] Git commit

### Day 4-5: Performance Fixes
- [ ] Add browser caching headers
- [ ] Add image dimensions to all <img> tags
- [ ] Run Lighthouse, document improvement
- [ ] Git commit

### Phase 0 Complete Checklist
- [ ] Elementor plugins deactivated
- [ ] No visual regressions
- [ ] Performance score improved
- [ ] All changes committed
```

### Phase 1: Foundation (Week 2)

```markdown
## Phase 1: CSS Foundation & ACF Setup
## Target: Central CSS, ACF Field Groups

### Day 1: CSS Variables
- [ ] Add missing variables to design-system.css
- [ ] Document all variables in TYPOGRAPHY-STANDARDS.md
- [ ] Git commit

### Day 2: Component CSS
- [ ] Create components.css file
- [ ] Move hero CSS from course-pages.css
- [ ] Move FAQ CSS from course-pages.css
- [ ] Move CTA CSS from course-pages.css
- [ ] Git commit

### Day 3: Why Choose Consolidation
- [ ] Create unified [why_choose] shortcode
- [ ] Move inline CSS to components.css
- [ ] Test all 4 types work
- [ ] Deprecate old shortcodes (keep working)
- [ ] Git commit

### Day 4-5: ACF Field Groups
- [ ] Create "Landing Page Content" field group
- [ ] Create "Resource Page Content" field group
- [ ] Test fields appear on test page
- [ ] Git commit

### Phase 1 Complete Checklist
- [ ] All CSS variables documented
- [ ] components.css created and populated
- [ ] Single [why_choose] shortcode working
- [ ] ACF field groups created
- [ ] All changes committed
```

### Phase 2: Component Creation (Week 3)

```markdown
## Phase 2: Build Reusable Components
## Target: 7 Components Created

### Day 1: hero-section.php
- [ ] Create component file
- [ ] Support all hero variants
- [ ] Test with hardcoded data
- [ ] Git commit

### Day 2: cta-section.php & faq-accordion.php
- [ ] Create CTA component
- [ ] Create FAQ component with schema
- [ ] Test both components
- [ ] Git commit

### Day 3: Remaining Components
- [ ] Create course-grid.php
- [ ] Create why-choose.php (uses unified shortcode)
- [ ] Create comparison-table.php
- [ ] Create testimonials.php
- [ ] Git commit

### Day 4-5: Component Testing
- [ ] Test all components with various data
- [ ] Test responsive at 375px, 768px, 1024px
- [ ] Document component parameters
- [ ] Git commit

### Phase 2 Complete Checklist
- [ ] 7 components created
- [ ] All components tested
- [ ] Components documented
- [ ] All changes committed
```

### Phase 3: Template Migration (Weeks 4-5)

```markdown
## Phase 3: Migrate Templates
## Target: 17 templates → 4 templates

### MIGRATION ORDER (Start with smallest/simplest)

#### Batch 1: Enrichment Pages (3 pages, ~500 lines each)
- [ ] template-math-enrichment.php → template-landing-page.php
  - [ ] Create ACF content
  - [ ] Update page to use new template
  - [ ] Test thoroughly
  - [ ] Archive old template
- [ ] template-ela-enrichment.php → template-landing-page.php
- [ ] template-academic-enrichment.php → template-landing-page.php
- [ ] Git commit after each migration

#### Batch 2: Resource Pages (6 pages, ~500-900 lines each)
- [ ] template-resources.php → template-resource-page.php
- [ ] template-faq-page.php → template-resource-page.php
- [ ] template-enhanced-act.php → template-resource-page.php
- [ ] template-digital-sat.php → template-resource-page.php
- [ ] template-sat-vs-act.php → template-resource-page.php
- [ ] template-testing-timeline.php → template-resource-page.php
- [ ] Git commit after each migration

#### Batch 3: Large Landing Pages (4 pages, ~1000+ lines each)
- [ ] template-admissions-counseling.php → template-landing-page.php
- [ ] template-shsat-faq.php → template-resource-page.php
- [ ] template-isee.php → template-landing-page.php
- [ ] template-shsat-landing.php → template-landing-page.php
- [ ] template-sat-act-prep.php → template-landing-page.php
- [ ] Git commit after each migration

#### Batch 4: Cleanup
- [ ] DELETE template-act-sat-foundational.php (already obsolete)
- [ ] Archive migrated templates (don't delete yet)
- [ ] Git commit

### Phase 3 Complete Checklist
- [ ] All pages migrated to new templates
- [ ] All pages tested
- [ ] Old templates archived
- [ ] All changes committed
```

### Phase 4: Final Cleanup (Week 6)

```markdown
## Phase 4: Final Cleanup & Optimization
## Target: Clean codebase, Optimized performance

### Day 1-2: CSS Cleanup
- [ ] Remove all unused CSS classes
- [ ] Audit for duplicate rules
- [ ] Minify CSS files
- [ ] Git commit

### Day 3: JavaScript Cleanup
- [ ] Consolidate FAQ JavaScript
- [ ] Remove unused scripts
- [ ] Git commit

### Day 4: Final Testing
- [ ] Test every page
- [ ] Run Lighthouse on key pages
- [ ] Fix any accessibility issues
- [ ] Fix any SEO issues
- [ ] Git commit

### Day 5: Documentation
- [ ] Update CLAUDE.md with new architecture
- [ ] Update this file with completion notes
- [ ] Create component documentation
- [ ] Git commit

### Phase 4 Complete Checklist
- [ ] Performance score 90+
- [ ] Accessibility score 98+
- [ ] SEO score 95+
- [ ] All documentation updated
- [ ] Project complete!
```

---

## ⛔ RULES FOR CLAUDE CODE

**Copy this into any new Claude Code session when working on this project:**

```
MANDATORY RULES FOR NYC STEM CLUB PROJECT:

1. NO INLINE <style> BLOCKS IN TEMPLATES
   - All CSS goes in design-system.css, components.css, or course-pages.css
   - Never add font-size, color, or spacing directly in PHP templates

2. USE CSS VARIABLES FOR TYPOGRAPHY
   - font-size: var(--text-lg)  ✅
   - font-size: 18px            ❌

3. RESPONSIVE FONT SIZES (Mobile First)
   - H1 Hero: 32px → 40px (768px) → 48px (1024px)
   - H2: 24px → 28px → 36px
   - H3: 20px → 24px
   - Body: 16px (never smaller)

4. BEFORE ADDING ANY CSS:
   - Check if a class already exists in components.css
   - Check if a variable exists in design-system.css
   - If not, ADD IT THERE, not inline

5. SINGLE SOURCE OF TRUTH:
   - design-system.css = variables and base styles
   - components.css = component styles (hero, faq, cta)
   - Templates = HTML structure only, NO <style> blocks

6. USE EXISTING SHORTCODES:
   - [inquiry_button] for CTAs
   - [why_choose type="..."] for benefits sections
   - [course_category] for course grids
   - [faq_accordion] for FAQ sections

7. CLEANUP AS YOU GO:
   - Remove any dead code you find
   - Document what you removed
   - Test after every change

Read REFACTORING-TODO.md and CLAUDE.md before making changes.
```

---

## 📝 REUSABLE PROMPTS

### Prompt: Migrate Template to New System

```
Migrate [TEMPLATE NAME] to the new template system.

Steps:
1. Read the current template file
2. Document all hardcoded content (copy to notepad)
3. Create ACF fields in WordPress admin
4. Populate ACF fields with the hardcoded content
5. Update the page to use template-[landing/resource]-page.php
6. Test at 375px, 768px, 1024px
7. If working, archive the old template
8. Git commit

Do NOT delete the old template until confirmed working.
Document all changes made.
```

### Prompt: Create Component

```
Create the [COMPONENT NAME] component.

Requirements:
1. Create file: skola-child/components/[name].php
2. Accept parameters via $args array
3. Use CSS classes from components.css (NO inline styles)
4. Support responsive design
5. Include schema markup if applicable (FAQ, Course)
6. Document parameters at top of file

Test the component with sample data before integrating.
```

### Prompt: Cleanup Template CSS

```
Clean up inline CSS from [TEMPLATE NAME].

Steps:
1. List all CSS rules in the <style> block
2. For each rule:
   - Does it exist in components.css? → Delete from template
   - Is it unique to this template? → Move to components.css
   - Is it dead code? → Delete entirely
3. Remove the entire <style> block when done
4. Test page appearance
5. Document lines removed

Target: 0 lines of inline CSS in template.
```

### Prompt: Add Page to ACF

```
Add ACF fields for [PAGE NAME] so content is editable.

Steps:
1. Identify all hardcoded content in template
2. Create appropriate ACF fields:
   - Text for short content
   - Textarea for paragraphs
   - Repeater for lists (FAQs, stats, benefits)
   - WYSIWYG for rich content
3. Add help text to each field
4. Populate fields with current content
5. Update template to use get_field()
6. Test editing in WordPress admin

Goal: End user can edit all page content without code changes.
```

---

## Notes

- Keep backward compatibility during refactoring
- Test each page after changes
- One template migration at a time
- Commit after each successful change
- Document everything removed

**Project Start Date:** TBD
**Target Completion:** 6 weeks from start

# NYC STEM Club - Refactoring TODO

> **DO NOT DELETE** - Reference document for future refactoring work

**Created:** 2025-11-21
**Updated:** 2025-11-22
**Status:** Planned - Not Started

---

## 🚨 CRITICAL: Typography Architecture Breakdown

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
| template-act-sat-foundational.php | 121 | ❌ NO |
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

### Missing from design-system.css

Hero-specific variables that should exist but don't:
```css
--hero-h1-mobile: 32px;
--hero-h1-tablet: 40px;
--hero-h1-desktop: 48px;
```

### Fix Priority

1. **HIGH:** Add missing variables to design-system.css
2. **HIGH:** Update course-styles.css (plugin) to use variables
3. **MEDIUM:** Remove inline `<style>` blocks from templates - move to course-pages.css
4. **MEDIUM:** Standardize non-standard font sizes (22px→24px, 28px→24px, etc.)
5. **LOW:** Audit and remove !important declarations once cascade is fixed

### Root Cause

Each template was given its own `<style>` block with hardcoded values instead of:
1. Using CSS classes from design-system.css
2. Using CSS variables
3. Adding new styles to the central stylesheet

This must stop. **All future styling must go in CSS files, not inline `<style>` blocks.**

---

## ⛔ RULES FOR CLAUDE CODE (READ THIS FIRST)

**Copy this into any new Claude Code session when working on this project:**

```
MANDATORY RULES FOR NYC STEM CLUB PROJECT:

1. NO INLINE <style> BLOCKS IN TEMPLATES
   - All CSS goes in course-pages.css or design-system.css
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
   - Check if a class already exists in course-pages.css
   - Check if a variable exists in design-system.css
   - If not, ADD IT THERE, not inline

5. SINGLE SOURCE OF TRUTH:
   - design-system.css = variables and base styles
   - course-pages.css = component styles
   - Templates = HTML structure only, NO <style> blocks

Read REFACTORING-TODO.md before making CSS changes.
```

---

## 1. FAQ Component Consolidation

### Problem
FAQ styling is duplicated across multiple templates with inline `<style>` blocks:
- `template-isee.php` (~150 lines of FAQ CSS)
- `template-shsat-faq.php` (~200 lines of FAQ CSS)
- `template-shsat-landing.php` (FAQ styles if any)
- `template-sat-act-prep.php` (FAQ styles if any)
- `course-styles.css` (plugin FAQ styles for course pages)

### Solution

#### A. Create Global FAQ CSS
**File:** `wp-content/themes/skola-child/css/components/faq.css` or add to `course-pages.css`

```css
/* FAQ Section - Global Styles */
.faq-section { }
.faq-intro { }
.faq-intro h2 { }
.faq-list { }
.faq-item { }
.faq-question { }
.faq-toggle { }
.faq-answer { }
.faq-answer-content { }
/* etc. */
```

#### B. Create FAQ Shortcode
**File:** `wp-content/plugins/nyc-stem-courses/includes/shortcodes/faq-shortcode.php`

```php
// Usage options:
[faq_accordion field="course_faqs"]  // Uses ACF field from current post
[faq_accordion post_id="123"]        // Uses FAQs from specific post
[faq_accordion json='[{"q":"...", "a":"..."}]']  // Inline FAQs
```

Features:
- Auto-generates accessible HTML (button elements, ARIA attributes)
- Auto-generates FAQPage Schema markup
- Supports ACF repeater fields
- Includes JavaScript accordion functionality

#### C. Create FAQ Partial Template
**File:** `wp-content/plugins/nyc-stem-courses/templates/parts/faq-accordion.php`

For use in custom templates:
```php
<?php
$faqs = array(
    array('question' => '...', 'answer' => '...'),
    // ...
);
include(NYC_STEM_COURSES_PATH . 'templates/parts/faq-accordion.php');
?>
```

### Files to Update After Refactoring
1. `template-isee.php` - Remove inline FAQ CSS, use shortcode or partial
2. `template-shsat-faq.php` - Remove inline FAQ CSS, use shortcode or partial
3. `template-shsat-landing.php` - Check for FAQ styles
4. `template-sat-act-prep.php` - Check for FAQ styles
5. `course-styles.css` - Consolidate with global FAQ styles

---

## 2. Hero Section Consolidation

### Problem
Hero section styles are duplicated across landing page templates:
- `template-isee.php`
- `template-shsat-landing.php`
- `template-sat-act-prep.php`
- `template-digital-sat.php`
- `template-academic-enrichment.php`
- `template-math-enrichment.php`
- `template-ela-enrichment.php`
- `template-admissions-counseling.php`
- `template-resources.php`

**Current state:** Hero H1 typography defined in 9+ separate inline `<style>` blocks.

### Solution
Create unified hero component with variants:
- Standard hero (left-aligned, single column)
- Hero with track record stats
- Hero with narrative stats (like SHSAT)

### Typography Centralization (Priority)

**Step 1: Add to `design-system.css`:**

```css
/* ==============================================================================
   HERO H1 TYPOGRAPHY - Single Source of Truth
   Mobile first: 32px → 40px (tablet) → 48px (desktop)
   ============================================================================== */

.hero h1,
.hero-section h1,
.shsat-hero h1,
.course-hero h1,
.course-hero .hero-content h1,
.admissions-counseling-page .hero-content h1 {
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    line-height: 1.2;
    color: white;
    text-align: left;
}

@media (min-width: 768px) {
    .hero h1,
    .hero-section h1,
    .shsat-hero h1,
    .course-hero h1,
    .course-hero .hero-content h1,
    .admissions-counseling-page .hero-content h1 {
        font-size: 40px;
    }
}

@media (min-width: 1024px) {
    .hero h1,
    .hero-section h1,
    .shsat-hero h1,
    .course-hero h1,
    .course-hero .hero-content h1,
    .admissions-counseling-page .hero-content h1 {
        font-size: 48px;
    }
}
```

**Step 2: Remove inline h1 styles from all templates**

Remove the following from each template's `<style>` block:
- `.hero h1 { font-size: ... }`
- `.hero-section h1 { font-size: ... }`
- `.course-hero .hero-content h1 { font-size: ... }`
- All related media query overrides

**Step 3: Remove duplicate rules from course-pages.css**

The tablet/desktop h1 rules at the end of course-pages.css can be removed once centralized.

### Completed (2025-11-22)
- [x] Standardized all hero H1 to 32px/40px/48px
- [x] Added left-alignment for mobile heroes
- [x] Removed all 28px small-mobile overrides
- [x] Created TYPOGRAPHY-STANDARDS.md documentation

---

## 3. Landing Page Template Base

### Problem
Each landing page template has ~1000+ lines with duplicated:
- CSS reset styles
- Typography overrides
- Section container styles
- CTA section styles
- Testimonials section styles

### Solution
Create a base landing page template or shared CSS file:
- `landing-page-base.css` - Common styles for all landing pages
- Each template only contains page-specific overrides

---

## 4. Inline Styles Audit

### Templates with Significant Inline CSS
| Template | Approx Lines | Priority |
|----------|--------------|----------|
| template-isee.php | ~1100 | High |
| template-shsat-faq.php | ~400 | Medium |
| template-shsat-landing.php | ~1000 | High |
| template-sat-act-prep.php | ~1200 | High |
| template-digital-sat.php | ~? | Check |
| template-ela-enrichment.php | ~? | Check |
| template-math-enrichment.php | ~? | Check |

---

## 5. Implementation Order

1. **Phase 1:** FAQ Component (highest duplication, used everywhere)
2. **Phase 2:** Hero Section Component
3. **Phase 3:** Landing Page Base CSS
4. **Phase 4:** Individual template cleanup

---

## 6. Remove Elementor Dependencies

### Problem
Legacy Elementor styles and markup scattered throughout:
- Elementor wrapper divs in some templates
- Elementor CSS classes being targeted
- ElementsKit widgets potentially in use
- Elementor plugin still active (check if needed)

### Solution
1. Audit all templates for Elementor references
2. Replace Elementor widgets with native shortcodes/templates
3. Remove Elementor CSS overrides from stylesheets
4. Consider deactivating Elementor plugin if no longer needed

### Files to Check
- All template-*.php files
- course-styles.css
- course-pages.css
- design-system.css

---

## 7. Template Standardization

### Problem
Currently: One template per page type (template-isee.php, template-shsat-landing.php, etc.)
- Massive code duplication
- Hard to maintain consistency
- Each template is 1000+ lines

### Solution
Create modular, reusable templates:

#### A. Base Templates (2-3 max)
```
template-landing-page.php     - For all program landing pages (ISEE, SHSAT, SAT/ACT, etc.)
template-resource-page.php    - For FAQ pages, guides, resources
template-course-single.php    - Already exists in plugin
```

#### B. Section Components (partials)
```
parts/hero-section.php        - Configurable hero with variants
parts/faq-section.php         - FAQ accordion
parts/programs-section.php    - Course/program grid
parts/cta-section.php         - Call-to-action blocks
parts/testimonials-section.php
parts/timeline-section.php
parts/levels-grid.php         - For ISEE levels, etc.
```

#### C. Page Configuration via ACF or Custom Fields
Instead of hardcoding content in templates:
```php
// template-landing-page.php
$hero_title = get_field('hero_title');
$hero_excerpt = get_field('hero_excerpt');
$hero_stats = get_field('hero_stats');
$show_faq = get_field('show_faq_section');
$faq_items = get_field('faq_items');
// etc.
```

#### D. Migration Path
1. Create new modular template system
2. Migrate one page at a time (start with simplest)
3. Move page-specific content to ACF fields
4. Delete old template-*.php files once migrated

### Target State
- ~5 base templates instead of ~15+
- ~10 reusable partials
- Content managed in WordPress admin, not code
- Style changes apply globally

---

## 8. CSS Architecture Target

### Current State
```
course-styles.css      - Plugin styles (~2000 lines)
course-pages.css       - Theme styles (~1500 lines)
design-system.css      - Variables and base (~500 lines)
+ inline styles in each template (~1000 lines each)
```

### Target State
```
design-system.css      - Variables, resets, base typography
components.css         - Reusable components (FAQ, hero, cards, buttons)
layouts.css            - Page layout patterns
utilities.css          - Helper classes (optional)
```

No inline `<style>` blocks in templates.

---

## 9. File Cleanup

### Files to Delete (after migration)
- [ ] `template-isee.php` → migrate to `template-landing-page.php`
- [ ] `template-shsat-landing.php` → migrate to `template-landing-page.php`
- [ ] `template-shsat-faq.php` → migrate to `template-resource-page.php`
- [ ] `template-sat-act-prep.php` → migrate to `template-landing-page.php`
- [ ] `template-digital-sat.php` → migrate to `template-landing-page.php`
- [ ] Other redundant templates (audit needed)

### Files to Audit for Cleanup
- [ ] Unused CSS classes in stylesheets
- [ ] Commented-out code blocks
- [ ] Duplicate shortcode definitions
- [ ] Orphaned partial templates
- [ ] Test/debug files in public directory

### Temporary/Debug Files to Remove
```
app/public/check-*.php
app/public/clear-*.php
app/public/update-*.php
app/public/test-*.php
```

---

## 10. Reusable Prompts for Future Changes

### Purpose
Standard prompts to ensure consistent implementation when making incremental changes. Copy-paste these when working with Claude Code or any AI assistant.

---

### Prompt: Add New Landing Page

```
Create a new landing page for [PROGRAM NAME] using the template-landing-page.php base.

Requirements:
1. Use existing section partials (hero, faq, cta, testimonials)
2. Follow TYPOGRAPHY-STYLE-GUIDE.md for all text styling
3. Use [inquiry_button] shortcode for CTAs
4. Add FAQPage schema markup if FAQ section included
5. No inline <style> blocks - use existing CSS classes
6. Mobile responsive (test at 768px and 480px breakpoints)

Page sections needed:
- Hero with [STATS]
- [LIST OTHER SECTIONS]
- FAQ section
- CTA section
- Testimonials

Reference existing pages: /isee-test-preparation/, /sat-act-test-prep/
```

---

### Prompt: Add FAQ Section to Page

```
Add an FAQ section to [PAGE NAME] using the global FAQ component.

Requirements:
1. Use .faq-section, .faq-list, .faq-item structure
2. Questions as <button class="faq-question"> elements
3. Toggle icon: <span class="faq-toggle">▸</span>
4. Include FAQPage schema markup for SEO
5. All items closed by default (no .active class)
6. Style from components.css (no inline styles)

FAQs to add:
1. Q: [QUESTION] A: [ANSWER]
2. Q: [QUESTION] A: [ANSWER]
...

Reference: template-shsat-faq.php FAQ structure
```

---

### Prompt: Update Hero Section

```
Update the hero section on [PAGE NAME].

Requirements:
1. Follow hero component structure from parts/hero-section.php
2. Left-aligned, single column layout
3. Typography per TYPOGRAPHY-STYLE-GUIDE.md:
   - H1: 48px, weight 800, white, line-height 1.2
   - Excerpt: 16-18px, rgba(255,255,255,0.9)
4. Track record stats with .hero-track-record if applicable
5. Use [inquiry_button] shortcode for CTAs
6. No inline styles

Content:
- Title: [TITLE]
- Excerpt: [EXCERPT TEXT]
- Stats: [STAT 1], [STAT 2]
- Buttons: [BUTTON 1], [BUTTON 2]
```

---

### Prompt: Style Audit

```
Audit [PAGE/TEMPLATE NAME] for typography and style compliance.

Check against TYPOGRAPHY-STYLE-GUIDE.md:
1. Font family: Roboto everywhere (no Inter, Georgia)
2. Heading sizes: H1=48px hero/36px standard, H2=32px, H3=24px, H4=18px
3. Font weights: H1/H2=700, H3-H6=600, body=400
4. Line heights: Hero=1.2, headings=1.3, body=1.6, small=1.5
5. Colors: Headings=#134958, body=#333, meta=#666
6. List bullets: ▸ character, 18px, #28AFCF

Report issues with specific line numbers and fixes needed.
```

---

### Prompt: Add Course Category Page

```
Create/update the [CATEGORY] course category landing using existing components.

Requirements:
1. Use [course_category category="SLUG"] shortcode for course grid
2. Hero section with category-specific stats
3. "Why Choose" section using [why_choose_CATEGORY] shortcode if exists
4. FAQ section with category-relevant questions
5. CTA section with [inquiry_button]
6. Follow template-landing-page.php structure

Category: [CATEGORY SLUG]
Stats to display: [STAT 1], [STAT 2]
```

---

### Prompt: Create New Shortcode

```
Create a new shortcode [SHORTCODE_NAME] for [PURPOSE].

Requirements:
1. Add to nyc-stem-courses plugin: includes/shortcodes/
2. Register in main plugin file
3. Support parameters: [LIST PARAMS]
4. Output semantic HTML with BEM-style classes
5. Add CSS to course-styles.css (not inline)
6. Document usage in code comments

Example usage:
[shortcode_name param1="value" param2="value"]

Output HTML structure:
<div class="component-name">
  ...
</div>
```

---

### Prompt: Mobile Responsiveness Fix

```
Fix mobile responsiveness issues on [PAGE NAME].

Breakpoints to check:
- 1024px (tablet landscape)
- 768px (tablet portrait)
- 480px (mobile)

Common issues to fix:
1. Hero text size scaling
2. Grid layouts → single column on mobile
3. Button full-width on mobile
4. Padding/margin adjustments
5. FAQ accordion touch targets (min 44px)

Test URL: [LOCAL URL]
Reference working page: [REFERENCE URL]
```

---

## Notes

- Keep backward compatibility during refactoring
- Test each page after changes
- Consider creating a simple component library documentation
- Typography guide already exists: `TYPOGRAPHY-STYLE-GUIDE.md`
- Priority: Remove Elementor dependencies before template consolidation
- Use prompts above for consistent future development


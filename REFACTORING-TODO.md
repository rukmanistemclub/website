# NYC STEM Club - Refactoring TODO

> **DO NOT DELETE** - Reference document for future refactoring work

**Created:** 2025-11-21
**Status:** Planned - Not Started

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
- etc.

### Solution
Create unified hero component with variants:
- Standard hero (left-aligned, single column)
- Hero with track record stats
- Hero with narrative stats (like SHSAT)

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


# NYC STEM Club - CSS Cleanup Plan

> **DO NOT DELETE** - Reference document for refactoring work

**Created:** 2025-11-21
**Updated:** 2025-11-25
**Status:** Restarted - Focus on CSS Cleanup

---

## Goal

**Simple objective:** Remove inline CSS from templates, consolidate into external CSS files, improve page load.

**NOT doing:**
- Template consolidation (17 → 4)
- ACF content migration
- Complex restructuring

---

## Current State

- **17 templates** with inline `<style>` blocks
- **666 hardcoded font-size declarations** in templates
- **3,809 lines** in CSS architecture files (design-system.css, components.css, course-pages.css)
- CSS architecture exists but templates don't fully use it

---

## CSS Architecture (Already Exists)

| File | Lines | Purpose |
|------|-------|---------|
| `design-system.css` | 1,018 | CSS variables (colors, typography, spacing) |
| `components.css` | 829 | Reusable component styles |
| `course-pages.css` | 1,962 | Page layout styles |
| `style.css` | varies | Theme overrides, Elementor header styles |

---

## Templates to Clean (By Priority)

### High Traffic / Important Pages
| Template | Lines | Inline Font Sizes |
|----------|-------|-------------------|
| template-shsat-landing.php | 1,323 | 53 |
| template-sat-act-prep.php | 1,346 | 110 |
| template-isee.php | 1,456 | 56 |
| template-homepage.php | 658 | 19 |

### Resource/Article Pages
| Template | Lines | Inline Font Sizes |
|----------|-------|-------------------|
| template-digital-sat.php | 838 | 49 |
| template-enhanced-act.php | 763 | 16 |
| template-sat-vs-act.php | 1,374 | 55 |
| template-testing-timeline.php | 1,342 | 58 |
| template-shsat-faq.php | 1,243 | 22 |
| template-faq-page.php | 984 | 18 |

### Smaller Pages
| Template | Lines | Inline Font Sizes |
|----------|-------|-------------------|
| template-admissions-counseling.php | 517 | 13 |
| template-academic-enrichment.php | 309 | 13 |
| template-math-enrichment.php | 381 | 13 |
| template-ela-enrichment.php | 378 | 13 |
| template-simple-page.php | 453 | 25 |
| template-resources.php | 279 | 12 |

### To Delete
| Template | Lines | Reason |
|----------|-------|--------|
| template-act-sat-foundational.php | 1,923 | Unused, massive bloat |

---

## Cleanup Process (Per Template)

1. **Read** the template's `<style>` block
2. **Identify** which styles already exist in CSS files
3. **Move** unique styles to `components.css` or `course-pages.css`
4. **Replace** hardcoded values with CSS variables:
   - `font-size: 18px` → `font-size: var(--text-lg)`
   - `color: #134958` → `color: var(--color-primary)`
5. **Delete** the `<style>` block from template
6. **Test** at 375px, 768px, 1024px
7. **Commit**

---

## CSS Variables Reference

### Typography (from design-system.css)
```css
--text-xs: 0.75rem;    /* 12px */
--text-sm: 0.875rem;   /* 14px */
--text-base: 1rem;     /* 16px */
--text-lg: 1.125rem;   /* 18px */
--text-xl: 1.25rem;    /* 20px */
--text-2xl: 1.5rem;    /* 24px */
--text-3xl: 1.875rem;  /* 30px */
--text-4xl: 2.25rem;   /* 36px */
--text-5xl: 3rem;      /* 48px */
```

### Colors
```css
--color-primary: #134958;
--color-accent: #28AFCF;
--color-orange: #FF7F07;
--color-text: #333333;
--color-text-light: #666666;
```

---

## Existing Shortcodes (Use These)

| Shortcode | Purpose |
|-----------|---------|
| `[inquiry_button]` | CTA buttons |
| `[testimonials]` | Testimonial sections |
| `[course_category]` | Course grids |
| `[why_choose type="..."]` | Benefits section |
| `[faq_section type="..."]` | FAQ accordion |
| `[cta_section type="..."]` | CTA sections |

---

## Progress Tracker

| Template | CSS Extracted | Variables Used | Tested | Done |
|----------|---------------|----------------|--------|------|
| template-act-sat-foundational.php | - | - | - | DELETE |
| template-shsat-landing.php | [ ] | [ ] | [ ] | [ ] |
| template-sat-act-prep.php | [ ] | [ ] | [ ] | [ ] |
| template-isee.php | [ ] | [ ] | [ ] | [ ] |
| template-homepage.php | [ ] | [ ] | [ ] | [ ] |
| template-digital-sat.php | [ ] | [ ] | [ ] | [ ] |
| template-enhanced-act.php | [ ] | [ ] | [ ] | [ ] |
| template-sat-vs-act.php | [ ] | [ ] | [ ] | [ ] |
| template-testing-timeline.php | [ ] | [ ] | [ ] | [ ] |
| template-shsat-faq.php | [ ] | [ ] | [ ] | [ ] |
| template-faq-page.php | [ ] | [ ] | [ ] | [ ] |
| template-admissions-counseling.php | [ ] | [ ] | [ ] | [ ] |
| template-academic-enrichment.php | [ ] | [ ] | [ ] | [ ] |
| template-math-enrichment.php | [ ] | [ ] | [ ] | [ ] |
| template-ela-enrichment.php | [ ] | [ ] | [ ] | [ ] |
| template-simple-page.php | [ ] | [ ] | [ ] | [ ] |
| template-resources.php | [ ] | [ ] | [ ] | [ ] |

---

## Notes

### Header Uses Elementor
The site header is built with ElementsKit (Elementor widget). Cannot remove Elementor without rebuilding header. Keep header-related styles in style.css.

### Schemas Are Intact
Existing schema markup in templates should remain. No need to change.

### ACF Fields Still Registered
The ACF field definitions in the plugin are still there. They're not hurting anything and can be used later if needed.

---

## Files Reference

| File | Location |
|------|----------|
| design-system.css | skola-child/css/ |
| components.css | skola-child/css/ |
| course-pages.css | skola-child/css/ |
| style.css | skola-child/ |
| functions.php | skola-child/ |

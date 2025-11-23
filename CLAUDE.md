# Claude Code Instructions for NYC STEM Club

**READ THIS ENTIRE FILE BEFORE MAKING ANY CHANGES**

---

## RULE 0: READ BEFORE YOU WRITE

Before modifying ANY file:
1. **Read the existing file first** - understand what's there
2. **Search for existing solutions** - don't recreate what exists
3. **Check related files** - CSS, templates, shortcodes
4. **Understand the pattern** - follow what's already established

---

## CSS Architecture Rules

### 1. NO INLINE STYLES IN TEMPLATES
- **NEVER** add `<style>` blocks to PHP templates
- All CSS goes in dedicated stylesheet files
- Templates contain HTML structure only

### 2. File Responsibilities
| File | Purpose |
|------|---------|
| `design-system.css` | CSS variables, base styles - SOURCE OF TRUTH |
| `course-pages.css` | Component styles, layouts |
| `course-styles.css` | Plugin-specific (minimize use) |
| `template-*.php` | HTML only, NO CSS |

### 3. Typography - USE VARIABLES
```css
/* CORRECT */
font-size: var(--text-lg);
color: var(--color-primary);

/* WRONG - Never do this */
font-size: 18px;
color: #134958;
```

### 4. Responsive Typography Standards
| Element | Mobile | Tablet (768px) | Desktop (1024px) |
|---------|--------|----------------|------------------|
| H1 Hero | 32px | 40px | 48px |
| H2 | 24px | 28px | 36px |
| H3 | 20px | 24px | 24px |
| H4 | 18px | 20px | 20px |
| Body | 16px | 16px | 16px |

### 5. Before Adding Any CSS
1. **SEARCH** `course-pages.css` for existing classes
2. **SEARCH** `design-system.css` for existing variables
3. If class exists, USE IT - don't create a new one
4. If needed, add to those files - NOT inline
5. **NO !important** unless absolutely necessary (fixing Elementor conflicts only)

### 6. Colors - USE VARIABLES ONLY
```css
--color-primary: #134958;      /* Dark blue - headings */
--color-accent: #28AFCF;       /* Teal - links, highlights */
--color-orange: #FF7F07;       /* Orange - CTAs */
--color-text: #333333;         /* Body text */
--color-text-light: #666666;   /* Secondary text */
```

---

## Component Rules

### 7. Check for Existing Shortcodes
Before building any component, check if a shortcode exists:
- `[inquiry_button]` - CTA buttons
- `[course_card]` - Course display cards
- `[testimonials]` - Testimonial sections
- `[faq_section]` - FAQ accordions

Location: `wp-content/plugins/nyc-stem-courses/includes/shortcodes/`

### 8. Check for Existing Template Parts
Before duplicating HTML structure, check:
- `wp-content/themes/skola-child/template-parts/`
- `wp-content/plugins/nyc-stem-courses/templates/`

### 9. Button Standards
All CTA buttons use the same class and shortcode:
```php
<?php echo do_shortcode('[inquiry_button text="Get Started"]'); ?>
```
- Orange (#FF7F07) for primary CTAs
- Sharp corners (border-radius: 0)
- 18px font, 600 weight
- Never create one-off button styles

---

## HTML Structure Rules

### 10. Semantic HTML
- Use proper heading hierarchy: h1 → h2 → h3 (never skip)
- One h1 per page (in hero section)
- Use `<section>` with descriptive classes
- Use `<button>` for interactive elements, `<a>` for navigation

### 11. Class Naming
Follow existing patterns:
- `.course-hero`, `.course-description`, `.course-benefits`
- `.faq-section`, `.faq-item`, `.faq-question`
- `.cta-section`, `.cta-group`

Don't invent new naming conventions.

---

## Mobile-First Rules

### 12. Breakpoints
```css
/* Mobile first - base styles */
.element { }

/* Tablet */
@media (min-width: 768px) { }

/* Desktop */
@media (min-width: 1024px) { }
```

### 13. Mobile Alignment
- ALL content left-aligned on mobile
- Centered only on tablet+ where appropriate
- Test at 375px, 768px, 1024px widths

---

## Schema/SEO Rules

### 14. Schema Markup
- Every landing page needs appropriate schema (Course, FAQPage, Article)
- Schema goes in template, not in CSS
- Check existing templates for schema patterns before adding

---

## What NOT To Do

1. ❌ Add `<style>` blocks to templates
2. ❌ Use hardcoded pixel values for fonts
3. ❌ Use hardcoded hex colors
4. ❌ Create new button styles
5. ❌ Add !important without justification
6. ❌ Create duplicate components
7. ❌ Skip reading existing code
8. ❌ Ignore mobile testing
9. ❌ Use non-standard font sizes (22px, 28px, 15px, etc.)
10. ❌ Make changes without understanding context

---

## Current Technical Debt

**708 hardcoded font-size declarations in templates need cleanup.**

See `REFACTORING-TODO.md` for:
- Full audit of the problem
- Template-by-template breakdown
- Prioritized fix list

**DO NOT MAKE THIS WORSE.**

---

## Key Files Reference

| File | Location | Purpose |
|------|----------|---------|
| REFACTORING-TODO.md | Project root | Full refactoring plan |
| TYPOGRAPHY-STANDARDS.md | skola-child/ | Typography reference |
| design-system.css | skola-child/css/ | CSS variables (source of truth) |
| course-pages.css | skola-child/css/ | Component styles |
| course-styles.css | plugin/assets/css/ | Plugin styles |
| functions.php | skola-child/ | Theme functions, enqueues |

---

## File Cleanup Rules

### 15. Before Every Commit - Delete Temporary Files

**Always delete these before committing:**
- `app/public/test-*.php` - Test scripts
- `app/public/check-*.php` - Debug scripts
- `app/public/clear-*.php` - Cache clear scripts
- `app/public/update-*.php` - One-time update scripts
- `app/public/debug-*.php` - Debug scripts
- `app/public/*.html` - Temporary HTML output files
- `*.backup` files
- `*-archive-*.css` files (dated archives)
- `.wpress` backup files (large, don't commit)
- `uploads.zip` or similar archives

**Check for these patterns:**
```bash
git status | grep -E "(test-|check-|clear-|update-|debug-|\.backup|archive-|\.wpress|\.zip)"
```

### 16. Files to NEVER Delete
- `CLAUDE.md` - This file
- `REFACTORING-TODO.md` - Technical debt tracking
- `TYPOGRAPHY-STANDARDS.md` - Design reference
- Any file in `css/` folder
- Any `template-*.php` file
- `functions.php`
- `style.css`
- `.gitignore`
- Any file in `includes/` or `shortcodes/`

### 17. Before Pushing to Staging
1. Run `git status` - review all changes
2. Delete temporary/debug files
3. Check for large files (`.wpress`, `.zip`) - don't commit
4. Ensure no credentials or `.env` files staged
5. Review diff for accidental changes

---

## Known CSS Conflicts

### 19. design-system.css Generic H1 Rules Override Templates

**Problem discovered 2025-11-22:**
`design-system.css` has generic `h1`, `h2`, etc. rules that apply to ALL pages:

```css
@media (min-width: 1024px) {
    h1 { font-size: var(--text-5xl); }  /* 48px */
}
```

These override template-specific rules like `.hero-section h1` even though the template rule has higher specificity. This is because:
1. `design-system.css` is loaded globally
2. External stylesheets can override inline `<style>` blocks in some cases

**Fix:** Add `!important` to template h1 rules until design-system.css is refactored.

**Root cause fix needed:** Either:
- Remove generic heading sizes from design-system.css
- Or add `.hero-section h1` rules to design-system.css
- Or move template styles to course-pages.css

---

## Self-Maintaining Rules

### 20. Update This File During Sessions

If during a session you:
- Discover a pattern that should be followed
- Make a mistake that should be prevented
- Learn something about the codebase architecture
- Find a better way to do something
- Notice repeated issues

**Immediately add it to this CLAUDE.md file** so future sessions have the knowledge.

This document should grow smarter over time, not stay static.

---

## Before Starting Any Task

1. Read this file
2. Read REFACTORING-TODO.md
3. Search for existing solutions
4. Read the files you plan to modify
5. Follow established patterns
6. Test on mobile
7. Clean up temp files before commit

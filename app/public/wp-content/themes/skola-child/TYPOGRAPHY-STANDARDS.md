# NYC STEM Club Typography Standards

## Overview
This document defines the standard typography system for consistent design across all pages.

---

## Font Size Scale (CSS Variables)

Define these in `design-system.css` and use throughout:

| Variable | Size | Use Case |
|----------|------|----------|
| `--text-xs` | 12px | Captions, fine print |
| `--text-sm` | 14px | Small labels, metadata |
| `--text-base` | 16px | Body text (minimum for accessibility) |
| `--text-lg` | 18px | Lead paragraphs, emphasized text |
| `--text-xl` | 20px | H4, subheadings |
| `--text-2xl` | 24px | H3, section subheadings |
| `--text-3xl` | 30px | H2 mobile |
| `--text-4xl` | 36px | H2 desktop, H1 tablet |
| `--text-5xl` | 48px | H1 desktop, hero titles |

---

## Responsive Heading Sizes

### H1 (Hero Titles)
| Breakpoint | Size | Variable |
|------------|------|----------|
| Mobile (<768px) | **32px** | Custom or `--text-3xl` + 2px |
| Tablet (768-1024px) | **40px** | Custom |
| Desktop (1024px+) | **48px** | `--text-5xl` |

### H2 (Section Titles)
| Breakpoint | Size | Variable |
|------------|------|----------|
| Mobile (<768px) | **24px** | `--text-2xl` |
| Tablet (768-1024px) | **28px** | Custom |
| Desktop (1024px+) | **36px** | `--text-4xl` |

### H3 (Subsection Titles)
| Breakpoint | Size | Variable |
|------------|------|----------|
| Mobile (<768px) | **20px** | `--text-xl` |
| Tablet (768px+) | **24px** | `--text-2xl` |

### H4 (Minor Headings)
| Breakpoint | Size | Variable |
|------------|------|----------|
| Mobile (<768px) | **18px** | `--text-lg` |
| Tablet (768px+) | **20px** | `--text-xl` |

---

## Body Text Standards

| Element | Size | Line Height |
|---------|------|-------------|
| Body paragraph | 16px | 1.6 |
| Lead paragraph | 18px | 1.7 |
| Small/caption | 14px | 1.5 |
| Fine print | 12px | 1.4 |

---

## Font Weights

| Variable | Weight | Use Case |
|----------|--------|----------|
| `--font-normal` | 400 | Body text |
| `--font-medium` | 500 | Emphasized body |
| `--font-semibold` | 600 | H3, H4, subheadings |
| `--font-bold` | 700 | H2, buttons |
| `--font-extrabold` | 800 | H1, hero titles |

---

## Line Heights

| Variable | Value | Use Case |
|----------|-------|----------|
| `--leading-tight` | 1.2 | Headings |
| `--leading-snug` | 1.375 | Subheadings |
| `--leading-normal` | 1.5 | UI text |
| `--leading-relaxed` | 1.625 | Body text |

---

## CSS Implementation

### Recommended approach (design-system.css):

```css
:root {
    /* Typography Scale */
    --text-xs: 0.75rem;     /* 12px */
    --text-sm: 0.875rem;    /* 14px */
    --text-base: 1rem;      /* 16px */
    --text-lg: 1.125rem;    /* 18px */
    --text-xl: 1.25rem;     /* 20px */
    --text-2xl: 1.5rem;     /* 24px */
    --text-3xl: 1.875rem;   /* 30px */
    --text-4xl: 2.25rem;    /* 36px */
    --text-5xl: 3rem;       /* 48px */

    /* Hero-specific (industry standard) */
    --hero-h1-mobile: 32px;
    --hero-h1-tablet: 40px;
    --hero-h1-desktop: 48px;
}

/* Mobile-first hero h1 */
.course-hero h1,
.shsat-hero h1 {
    font-size: var(--hero-h1-mobile);
}

@media (min-width: 768px) {
    .course-hero h1,
    .shsat-hero h1 {
        font-size: var(--hero-h1-tablet);
    }
}

@media (min-width: 1024px) {
    .course-hero h1,
    .shsat-hero h1 {
        font-size: var(--hero-h1-desktop);
    }
}
```

---

## Refactoring TODO

1. **Add hero-specific variables** to `design-system.css`:
   - `--hero-h1-mobile: 32px`
   - `--hero-h1-tablet: 40px`
   - `--hero-h1-desktop: 48px`

2. **Update all hero sections** to use these variables:
   - `template-shsat-landing.php` (currently inline styles)
   - `course-pages.css` (currently hardcoded 28px mobile)
   - `course-styles.css` (plugin)

3. **Remove duplicate definitions** - consolidate all typography into `design-system.css`

4. **Audit all pages** for consistent application:
   - SHSAT landing page
   - SAT/ACT landing page
   - ISEE landing page
   - Individual course pages

---

## Accessibility Notes

- **Minimum body text**: 16px (Google/WCAG recommendation)
- **Maximum line length**: 60-75 characters
- **Contrast ratio**: 4.5:1 for normal text, 3:1 for large text
- **Heading hierarchy**: Never skip levels (h1 → h2 → h3)

---

*Last updated: 2025-11-22*

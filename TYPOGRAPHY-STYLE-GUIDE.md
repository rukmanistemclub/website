# NYC STEM Club - Typography Style Guide (REVISED)
**Last Updated:** 2025-11-13
**Status:** ✅ REVISED - Ready for Implementation
**Revision:** 2.1 - Added brand colors

---

## Brand Colors

### Primary Colors
```css
/* Core Brand Colors */
--dark-teal: #134958;
--light-teal: #28AFCF;
--orange: #FF7F07;
--light-orange: #FFB84D;
```

### Secondary Colors
```css
/* Supporting Colors */
--light-blue: #5DD3F0;

/* Success/Accent Green (for callouts, key takeaways) */
--mint-light: #f1f8f4;
--sage-light: #e8f5e9;
--green-accent: #a5d6a7;
```

### Usage Guidelines
- **Dark Teal (#134958)**: Primary headings, navigation, footer backgrounds
- **Light Teal (#28AFCF)**: CTAs, links, accents, gradients
- **Orange (#FF7F07)**: Primary buttons, important highlights
- **Light Orange (#FFB84D)**: Secondary accents, warm gradients
- **Light Blue (#5DD3F0)**: Alternative accents, cool tones
- **Green (Mint/Sage)**: Success messages, key takeaways, refreshing callout sections
  - Background: Linear gradient from #f1f8f4 to #e8f5e9
  - Border: 1px solid #a5d6a7

---

## Executive Summary - Approved Standards

### Core Typography Scale
```css
/* BASE */
body {
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}

/* HEADINGS */
h1 {
  font-size: 36px;
  font-weight: 700;
  line-height: 1.3;
  color: #134958;
  margin-bottom: 20px;
}

h1.hero {
  font-size: 48px;
  font-weight: 800;
  line-height: 1.2;
  color: #ffffff;
  letter-spacing: -1px;
}

h2 {
  font-size: 32px;
  font-weight: 700;
  line-height: 1.3;
  color: #134958;
  margin-bottom: 16px;
}

h3 {
  font-size: 24px;
  font-weight: 600;
  line-height: 1.3;
  color: #134958;
  margin-bottom: 12px;
}

h4 {
  font-size: 18px;
  font-weight: 600;
  line-height: 1.3;
  color: #134958;
  margin-bottom: 10px;
}

h5, h6 {
  font-size: 16px;
  font-weight: 600;
  line-height: 1.3;
  color: #134958;
}

/* BODY TEXT VARIANTS */
p {
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 16px;
}

.lead {
  font-size: 18px;
  line-height: 1.6;
  color: #555;
}

.small, .meta, .caption {
  font-size: 14px;
  line-height: 1.5;
  color: #666;
}

/* BUTTONS */
.btn-primary {
  font-size: 18px;
  font-weight: 700;
  padding: 12px 28px;
  border-radius: 50px;
}

.btn-secondary {
  font-size: 16px;
  font-weight: 600;
  padding: 10px 24px;
  border-radius: 8px;
}

.btn-compact {
  font-size: 14px;
  font-weight: 600;
  padding: 8px 18px;
  border-radius: 6px;
}

/* LIST BULLETS */
ul li:before {
  content: "▸";
  font-size: 18px;
  font-weight: 700;
  color: #28AFCF;
}
```

### Typography Standards Summary
- **Font Family:** Roboto for everything (no Inter, no Georgia)
- **Heading Sizes:** H1=36px (hero 48px), H2=32px, H3=24px, H4=18px
- **Font Weights:** H1/H2=700 (bold), H3/H4/H5/H6=600 (semi-bold)
- **Line Heights:** Headings=1.3, Body=1.6, Small text=1.5, Hero=1.2
- **Colors:** All headings=#134958 (teal), body=#333, meta=#666
- **Body Sizes:** Standard 16px, Lead 18px, Small/Meta 14px
- **Button Sizes:** Primary 18px, Secondary 16px, Compact 14px
- **Card Titles (Special):** Course Cards=17.6px, Benefit Cards=17px (both weight 600)
- **List Bullets:** Solid triangle "▸" (18px, #28AFCF, weight 700)

---

## 📊 Visual Hierarchy Scale

### Size Progression
```
48px - Hero H1 (3x base)
36px - Standard H1 (2.25x base)
32px - H2 (2x base)
24px - H3 (1.5x base)
18px - H4 / Primary Button (1.125x base)
17.6px - Course Card Titles (1.1x base) [SPECIAL CASE]
17px - Benefit Card Titles (1.06x base) [SPECIAL CASE]
16px - Body / H5/H6 / Secondary Button (1x base)
14px - Small text / Compact Button (0.875x base)
```

### Line Height System
```
1.2  - Hero headlines only
1.3  - All standard headings (H1-H6)
1.5  - Small text, captions, meta
1.6  - Body text, lead paragraphs, buttons
```

### Weight System
```
800 - Hero H1 only
700 - H1, H2, Primary buttons
600 - H3, H4, H5, H6, Secondary/Compact buttons
400 - Body text, paragraphs
```

---

## 🔨 Implementation Changes from v1.0

### ✅ Changes Made

#### 1. **Heading Sizes Increased**
**Before:**
- H2: 26px (too small, barely larger than H4)
- H3: 20px (too close to H4)

**After:**
- H2: 32px (+6px - now clearly dominant)
- H3: 24px (+4px - proper separation from H4)

**Rationale:** Modern web standards use 2x multiplier for H2. 26px was only 1.625x base, making hierarchy unclear.

#### 2. **Special Cases - Partially Eliminated**

**Consolidated into standard scale:**

| Old Special Case | Old Size | New Standard | New Size |
|-----------------|----------|--------------|----------|
| Module Title | 28px | H2 | 32px |
| Section Title | 24px | H3 | 24px ✓ |
| Course Description H2 | 28px | H2 | 32px |
| Course Description H3 | 22.4px | H3 | 24px |
| Hero Stat Number | 24px | H3 | 24px |

**Special Cases RETAINED (do not change):**

| Component | Size | Weight | Usage |
|-----------|------|--------|-------|
| **Course Card Title** | **17.6px** | **600** | Related courses section, course grid cards |
| **Benefit Card Title ("Why Choose")** | **17px** | **600** | "Why Choose NYC STEM Club" benefit cards |

**Result:** Reduced from 15+ font sizes to 9 approved sizes (including 2 special cases for cards).

#### 3. **Button Hierarchy Rationalized**

**Before:**
- Primary CTA: 24px (too dominant)
- Card Button: 16px
- Compact CTA: 15px

**After:**
- Primary: 18px (balanced, matches H4)
- Secondary: 16px (matches body)
- Compact: 14px (matches small text)

**Rationale:** 24px buttons dominated the page. 18px is large enough to be actionable without overwhelming content.

#### 4. **Line Height Consolidation**

**Before:**
- 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8 (8 values!)

**After:**
- 1.2 (hero headlines)
- 1.3 (all headings)
- 1.5 (small text)
- 1.6 (body text)

**Eliminated:** 1.1, 1.4 (too close to others), 1.7 (unnecessary - use 1.6), 1.8 (only for special lead if needed)

#### 5. **Font Weight Simplification**

**Before:**
- Scattered: 400, 500, 600, 700, 800

**After:**
- 800: Hero H1 only
- 700: H1, H2, primary buttons
- 600: H3-H6, secondary buttons
- 400: Body text

---

## 🎯 Semantic Usage Guidelines

### When to Use Each Heading Level

**H1 (36px):**
- Page title (once per page)
- Main course/program name
- Primary hero headline

**H1 Hero (48px):**
- Homepage hero
- Landing page heroes
- Campaign-specific large headlines

**H2 (32px):**
- Major section headings
- Module titles
- Course feature categories
- "What's Included" / "Program Structure"
- "Frequently Asked Questions"
- "Ready to Achieve Your Target Score?"

**H3 (24px):**
- Subsection headings
- Feature names within sections
- FAQ category headers
- Timeline phase names
- "Why Choose NYC STEM Club?"

**H4 (18px):**
- Sub-subsection headings
- Bullet point elaborations
- Strategy/technique names
- Minor labels and tags
- "Understanding the Recent Changes"

**H5/H6 (16px):**
- Rarely used
- Meta headings if needed
- Small section labels

### Special Card Typography (Retained Sizes)

**Course Card Title (17.6px, weight 600):**
- Course cards in "Related Courses" sections
- Course grid displays
- Course listings
- **Do NOT use H2 for these - keep at 17.6px**

**Benefit Card Title (17px, weight 600):**
- "Why Choose NYC STEM Club" 4-card benefit grid
- Small informational cards
- Icon + text cards
- **Do NOT use H2 for these - keep at 17px**

### When to Use Body Text Variants

**Standard (16px, 1.6):**
- All paragraph text
- FAQ answers
- Course descriptions
- List items

**Lead (18px, 1.6):**
- Opening paragraph after H1
- Hero subheadline
- Key value propositions
- Pull quotes

**Small (14px, 1.5):**
- Captions
- Footnotes
- Meta information (dates, categories)
- Fine print
- Duration labels
- Timeline notes

### When to Use Each Button Size

**Primary (18px):**
- Main CTA on page
- "Schedule Consultation"
- "Enroll Now"
- Hero CTA buttons
- One per major section max

**Secondary (16px):**
- "Learn More" links
- "View Details"
- Card action buttons
- Navigation buttons
- Multiple per section OK

**Compact (14px):**
- Inline text links styled as buttons
- Supplementary actions
- Mobile overflow actions
- "Read More" / "Show Less"

---

## 🔘 Button Shortcodes - Global Components

### Primary Button: `[inquiry_button]`

The global inquiry button shortcode provides a centralized, reusable button component. When you update the shortcode definition, changes automatically reflect across all pages.

**Basic Usage (Default "Inquire Now" button):**
```php
<?php echo do_shortcode('[inquiry_button]'); ?>
```

**Custom Parameters:**
```php
// Custom text
<?php echo do_shortcode('[inquiry_button text="View Programs"]'); ?>

// Custom URL
<?php echo do_shortcode('[inquiry_button url="/sat-act-test-prep/"]'); ?>

// Custom text AND URL
<?php echo do_shortcode('[inquiry_button text="View Programs" url="/sat-act-test-prep/"]'); ?>

// Custom color
<?php echo do_shortcode('[inquiry_button color="teal"]'); ?>

// Disable rounded corners
<?php echo do_shortcode('[inquiry_button rounded="no"]'); ?>

// Add tracking source
<?php echo do_shortcode('[inquiry_button source="timeline-page"]'); ?>

// Combine multiple parameters
<?php echo do_shortcode('[inquiry_button color="teal" text="View SAT/ACT Prep Program" url="/courses/sat-act-prep-course/"]'); ?>
```

**Available Parameters:**
- `text` - Button text (default: "Inquire Now")
- `url` - Destination URL (default: "/student-enrollment/")
- `color` - Color variant: "orange" (default), "teal", "white"
- `rounded` - Rounded corners: "yes" (default), "no"
- `source` - Tracking parameter for analytics

**Default Styling:**
- Background: #FF7F07 (Orange)
- Hover: #e66f00 with lift animation
- Font: 18px, weight 700
- Padding: 18px 45px
- Border radius: 8px
- Transition: all 0.3s ease

**When to Use:**
- Primary CTA in hero sections
- Bottom CTA sections
- Course/program inquiry pages
- Any location needing "Inquire Now" action

**DO NOT:**
- Create hardcoded buttons - always use the shortcode
- Style buttons inline - update the shortcode definition instead
- Copy/paste button HTML - use `<?php echo do_shortcode('[inquiry_button]'); ?>`

### Secondary Button

For secondary actions (e.g., "View All Programs"), use standard HTML with `.cta-button.cta-secondary` classes:

```html
<a href="/sat-act-test-prep/" class="cta-button cta-secondary">View All SAT/ACT Programs</a>
```

**Styling:**
- Background: white
- Color: #134958 (Dark Teal)
- Hover: #F0F9FC background
- Same sizing as primary button

**Button Container:**
```html
<div class="cta-buttons">
    <?php echo do_shortcode('[inquiry_button]'); ?>
    <a href="/programs/" class="cta-button cta-secondary">View All Programs</a>
</div>
```

**CSS for Button Groups:**
```css
.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}
```

---

## How to Prompt for Buttons

When requesting button implementation, use these prompts:

**For Primary CTA:**
> "Add the inquiry button shortcode here"
> "Use the global inquiry button"
> "Add [inquiry_button] shortcode"

**For Custom Button Text/URL:**
> "Add inquiry button with text 'View Programs' linking to /sat-act-test-prep/"
> "Use inquiry button shortcode with custom parameters: text='Schedule Now' url='/contact/'"

**For Button Pairs:**
> "Add inquiry button and secondary button for 'View All Programs' linking to /programs/"

**DO NOT say:**
> "Add an orange button" (too vague)
> "Create a CTA button" (will result in hardcoded HTML)
> "Style a button like..." (use shortcode instead)

---

## 📋 Migration Guide: Old → New

### CSS Class Replacements

```css
/* HEADINGS - Update all custom sizes to standard scale */

/* H2: 26px → 32px */
h2, .h2 {
  font-size: 26px;  /* OLD */
  font-size: 32px;  /* NEW */
}

/* H3: 20px → 24px */
h3, .h3 {
  font-size: 20px;  /* OLD */
  font-size: 24px;  /* NEW */
}

/* Module titles, section headers */
.module-title { font-size: 28px; }
→ Use <h2> with standard 32px

/* Section titles */
.section-title { font-size: 24px; }
→ Use <h3> with standard 24px

/* Card titles */
.card-title { font-size: 17.6px; }
→ Use <h4> with standard 18px

/* Course description H2 */
.course-description-content h2 { font-size: 1.75rem; /* 28px */ }
→ Update to: font-size: 2rem; /* 32px */

/* Course description H3 */
.course-description-content h3 { font-size: 1.4rem; /* 22.4px */ }
→ Update to: font-size: 1.5rem; /* 24px */

/* BUTTONS - Consolidate to 3 sizes */

/* Primary CTA buttons */
.cta-button { font-size: 24px; }
→ Update to: font-size: 18px;

/* Compact buttons */
.btn-compact { font-size: 15px; }
→ Update to: font-size: 14px;

/* LINE HEIGHTS - Eliminate 1.4, 1.7, 1.8 */

/* Body paragraphs */
p { line-height: 1.7; }
→ Update to: line-height: 1.6;

/* Course description paragraphs */
.course-description-content p { line-height: 1.8; }
→ Update to: line-height: 1.6;

/* Hero headlines */
.hero h1 { line-height: 1.1; }
→ Update to: line-height: 1.2;

/* Remove all 1.4 line-heights */
→ Replace with: 1.5 (for small text) or 1.6 (for body)
```

---

## 📝 Implementation Checklist

### High Priority Files

**1. course-styles.css**
- [ ] Line 27: H2 size 26px → 32px
- [ ] Line 34: H3 size 20px → 24px
- [ ] Line 117: Hero H1 line-height 1.1 → 1.2
- [ ] Line 207: Primary button 24px → 18px
- [ ] Line 252: Compact button 15px → 14px
- [ ] Lines 1880: Course H2 28px → 32px
- [ ] Lines 1892: Course H3 22.4px → 24px
- [ ] All body line-height: 1.7 → 1.6

**2. template-shsat-faq.php**
- [ ] Line 85: H2 size 26px → 32px
- [ ] All embedded inline H2/H3 styles

**3. template-sat-act-prep.php**
- [ ] Line 956: H2 "Your Path to Success" 26px → 32px
- [ ] Line 1476: H2 "Ready to Achieve" 26px → 32px
- [ ] Timeline H3 headings 20px → 24px
- [ ] All body line-height: 1.7 → 1.6

---

**Document Owner:** RV
**Version:** 2.2
**Last Updated:** 2025-11-13
**Changelog:**
- v2.2 (2025-11-13): Added Button Shortcodes section with inquiry_button documentation
- v2.1 (2025-11-09): Added brand colors (green accent colors)
- v2.0 (2025-11-09): Initial comprehensive typography standards

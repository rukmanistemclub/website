# NYC STEM Club - Typography Style Guide
**Last Updated:** 2025-11-07
**Status:** ✅ APPROVED - Ready for Implementation

## Executive Summary - Approved Decisions

### Typography Standards
- **Font Family:** Roboto for everything (replace Inter and Georgia)
- **Heading Sizes:** H2=26px, H3=20px, H4=18px
- **Font Weights:** H1/H2=700, H3/H4=600
- **Line Heights:** Body=1.7, Headings=1.3, Meta=1.5
- **Colors:** All headings=#134958 (except white on dark)
- **Small Text:** Standardize to 14px
- **Buttons:** No changes (keep current sizes)

---

## Purpose
This document catalogs all typography styles currently used across the NYC STEM Club website, identifies inconsistencies, and documents approved standardization decisions.

---

## 📊 Current Typography Inventory

### 1. BASE TYPOGRAPHY
**Location:** `course-styles.css` (lines 10-16)
- **Font Family:** Roboto, sans-serif
- **Font Size:** 16px
- **Line Height:** 1.6
- **Color:** #333
- **Weight:** 400

### 2. HEADINGS

#### H1 Standard
**Location:** `course-styles.css` (lines 19-24)
- **Font Size:** 36px
- **Weight:** 700
- **Line Height:** 1.3
- **Margin Bottom:** 20px

#### H1 Hero (Override)
**Location:** `course-styles.css` (lines 115-122)
- **Font Size:** 48px
- **Weight:** 800
- **Color:** #ffffff
- **Line Height:** 1.1
- **Letter Spacing:** -1px
- **Usage:** Hero sections only

#### H2 Standard
**Location:** `course-styles.css` (lines 26-31)
- **Font Size:** 24px
- **Weight:** 700
- **Line Height:** 1.3
- **Margin Bottom:** 12px

#### H2 in Course Description Content
**Location:** `course-styles.css` (lines 1879-1885)
- **Font Size:** 1.75rem (28px)
- **Weight:** 700
- **Color:** #134958
- **Line Height:** 1.3
- **Margin:** 50px 0 25px 0

#### H3 Standard
**Location:** `course-styles.css` (lines 33-38)
- **Font Size:** 18px
- **Weight:** 700
- **Line Height:** 1.4
- **Margin Bottom:** 10px

#### H3 in Course Description Content
**Location:** `course-styles.css` (lines 1891-1897)
- **Font Size:** 1.4rem (22.4px)
- **Weight:** 600 ⚠️ (different from standard h3)
- **Color:** #134958
- **Line Height:** 1.4
- **Margin:** 30px 0 15px 0

#### H4 Standard
**Location:** `course-styles.css` (lines 40-45)
- **Font Size:** 18px
- **Weight:** 700
- **Line Height:** 1.4
- **Margin Bottom:** 10px

#### H4 in Course Description Content
**Location:** `course-styles.css` (lines 1899-1904)
- **Font Size:** 1.1rem (17.6px)
- **Weight:** 600 ⚠️
- **Color:** #134958
- **Margin:** 20px 0 10px 0

### 3. PARAGRAPHS

#### Standard Paragraph
**Location:** `course-styles.css` (lines 48-52)
- **Font Size:** 16px
- **Line Height:** 1.6
- **Margin Bottom:** 16px

#### Course Description Paragraph
**Location:** `course-styles.css` (lines 1907-1910)
- **Font Size:** 16px (inherited)
- **Line Height:** 1.8 ⚠️ (different from standard)
- **Margin:** 0 0 20px 0

#### Lead Paragraph
**Location:** `course-styles.css` (lines 1912-1916)
- **Font Size:** 1.15rem (18.4px)
- **Line Height:** 1.8
- **Color:** #555

### 4. SECTION HEADERS

#### Section Badge
**Location:** `course-styles.css` (lines 422-435)
- **Font Size:** 13px
- **Weight:** 700
- **Color:** #28AFCF
- **Transform:** uppercase
- **Letter Spacing:** 2px
- **Padding:** 10px 24px
- **Border Radius:** 50px

#### Section Title
**Location:** `course-styles.css` (lines 437-444)
- **Font Size:** 24px
- **Weight:** 700
- **Color:** #134958
- **Line Height:** 1.2
- **Text Align:** center
- **Margin Bottom:** 8px

#### Section Title (Course Cards)
**Location:** `course-cards.css` (lines 24-31)
- **Font Family:** Inter, sans-serif ⚠️
- **Font Size:** 1.6rem (25.6px) ⚠️
- **Weight:** 700
- **Color:** #134958
- **Text Align:** center
- **Margin Bottom:** 24px

#### Section Subtitle
**Location:** `course-styles.css` (lines 446-453)
- **Font Size:** 15px
- **Weight:** 400
- **Color:** #666
- **Line Height:** 1.4
- **Max Width:** 700px
- **Margin:** 0 auto

### 5. HERO SECTION

#### Hero Excerpt
**Location:** `course-styles.css` (lines 131-137)
- **Font Size:** 19px
- **Color:** rgba(255, 255, 255, 0.9)
- **Weight:** 400
- **Line Height:** 1.7 ⚠️
- **Margin Bottom:** 40px

#### Hero Stat Number
**Location:** `course-styles.css` (lines 174-180)
- **Font Size:** 24px
- **Weight:** 700
- **Color:** white
- **Line Height:** 1
- **Display:** block

#### Hero Stat Label
**Location:** `course-styles.css` (lines 182-186)
- **Font Size:** 12px
- **Weight:** 400
- **Opacity:** 0.8

### 6. COURSE CARDS

#### Card Title
**Location:** `course-cards.css` (lines 113-121)
- **Font Family:** Inter, -apple-system, sans-serif ⚠️
- **Font Size:** 1.1rem (17.6px)
- **Weight:** 700
- **Color:** #1e3a5f ⚠️ (different from section title color)
- **Line Height:** 1.3
- **Margin:** 0 0 14px 0

#### Card Meta Badges
**Location:** `course-cards.css` (lines 139-148)
- **Font Family:** Inter, sans-serif ⚠️
- **Font Size:** 0.85rem (13.6px)
- **Weight:** 500
- **Color:** #64748b
- **Gap:** 5px

#### Card Description
**Location:** `course-cards.css` (lines 159-174)
- **Font Family:** Inter, sans-serif ⚠️
- **Font Size:** 0.9rem (14.4px)
- **Weight:** 400
- **Line Height:** 1.4 ⚠️
- **Color:** #475569
- **Margin Bottom:** 20px
- **Line Clamp:** 4 lines max

#### Card Button
**Location:** `course-cards.css` (lines 186-199)
- **Font Family:** Inter, sans-serif ⚠️
- **Font Size:** 1rem (16px)
- **Weight:** 600
- **Color:** white
- **Padding:** 14px 24px
- **Border Radius:** 8px

### 7. CTA BUTTONS

#### Primary CTA Button
**Location:** `course-styles.css` (lines 195-212)
- **Font Size:** 24px ⚠️ (much larger than card buttons)
- **Weight:** 700
- **Color:** white
- **Padding:** 8px 26px
- **Border Radius:** 50px
- **Background:** #FF7F07
- **Box Shadow:** 0 10px 40px rgba(255, 127, 7, 0.3)

#### Compact CTA Button
**Location:** `course-styles.css` (lines 250-255)
- **Font Size:** 15px ⚠️
- **Padding:** 10px 20px
- **Min Width:** auto

### 8. SPECIAL SECTIONS

#### Course Details Compact
**Location:** `course-styles.css` (lines 785-789)
- **Font Size:** 16px
- **Line Height:** 1.8
- **Margin:** 10px 0
- **Background:** #f8f9fa
- **Border Left:** 4px solid #28AFCF

#### Module Title
**Location:** `course-styles.css` (lines 1111-1117)
- **Font Size:** 28px ⚠️
- **Weight:** 700
- **Color:** #134958
- **Line Height:** 1.3
- **Margin Bottom:** 10px

#### Module Label
**Location:** `course-styles.css` (lines 1101-1108)
- **Font Size:** 14px
- **Weight:** 700
- **Color:** #28AFCF
- **Transform:** uppercase
- **Letter Spacing:** 1px
- **Display:** block

#### Module Meta
**Location:** `course-styles.css` (lines 1119-1124)
- **Font Size:** 15px
- **Weight:** 500
- **Color:** #555
- **Line Height:** 1.6

#### Module Description
**Location:** `course-styles.css` (lines 1126-1132)
- **Font Size:** 16px
- **Weight:** 500
- **Color:** #333
- **Line Height:** 1.7 ⚠️
- **Margin:** 18px 0 12px

### 9. FAQ SECTION

#### FAQ Question
**Location:** `course-styles.css` (lines 1292-1298)
- **Font Size:** 20px
- **Weight:** 600
- **Color:** #134958 ✓ (standardized)
- **Line Height:** 1.3 ✓ (heading standard)
- **Margin:** 0

#### FAQ Answer Paragraphs
**Location:** `course-styles.css` (lines 1334-1342) + `template-shsat-faq.php`
- **Font Family:** 'Roboto', sans-serif !important
- **Font Size:** 16px !important
- **Weight:** 400 !important
- **Color:** #666
- **Line Height:** 1.7 !important (body paragraph standard)
- **Padding:** 0 16px 0 (course pages) / 0 1.5rem (FAQ page)
- **Margin:** 0 0 8px 0

#### FAQ Answer List Items
**Location:** `course-styles.css` (lines 1358-1367) + `template-shsat-faq.php`
- **Font Family:** 'Roboto', sans-serif !important
- **Font Size:** 16px !important
- **Weight:** 400 !important
- **Color:** #666
- **Line Height:** 1.5 !important (compact standard for lists)
- **Padding Left:** 18px (course pages) / 1.5rem (FAQ page)
- **Margin Bottom:** 2px (course pages) / 0.5rem (FAQ page)

#### FAQ List Item Chevron/Bullet
**Location:** `course-styles.css` (lines 1373-1379) + `template-shsat-faq.php` (lines 234-241)
- **Character:** "▸" (solid right-pointing triangle)
- **Color:** #28AFCF (teal brand color)
- **Font Weight:** 700
- **Font Size:** 18px
- **Position:** Absolute, left: 0

**Note:** FAQ paragraphs and list items use identical typography except for line-height. Paragraphs use 1.7 (relaxed body spacing) while list items use 1.5 (compact spacing). Both enforced with !important to prevent theme overrides.

### 10. TRUST BAR

#### Trust Text
**Location:** `course-styles.css` (lines 393-397)
- **Font Size:** 16px
- **Weight:** 700
- **Color:** #134958

### 11. TIMELINE

#### Timeline Badge (Large)
**Location:** `course-styles.css` (lines 707-721)
- **Font Size:** 28px
- **Weight:** 800
- **Color:** white

#### Timeline Badge (Small)
**Location:** `course-styles.css` (lines 739-749)
- **Font Size:** 13px
- **Weight:** 700
- **Color:** white
- **Padding:** 8px 16px
- **Border Radius:** 20px
- **Min Width:** 85px

#### Timeline Content Compact H4
**Location:** `course-styles.css` (lines 763-768)
- **Font Size:** 16px
- **Weight:** 700
- **Color:** #134958
- **Margin:** 0 0 5px 0

#### Timeline Content Compact P
**Location:** `course-styles.css` (lines 770-775)
- **Font Size:** 14px
- **Weight:** normal
- **Color:** #555
- **Line Height:** 1.5
- **Margin:** 0

### 12. BENEFIT CARDS

#### Benefit Card Title
**Location:** `course-styles.css` (lines 531-538)
- **Font Size:** 17px
- **Weight:** 600
- **Color:** #134958
- **Line Height:** 1.3
- **Margin:** 0 0 6px 0

#### Benefit Card Text
**Location:** `course-styles.css` (lines 540-546)
- **Font Family:** Georgia, 'Times New Roman', serif ⚠️ (SERIF!)
- **Font Size:** 16px
- **Color:** #666
- **Line Height:** 1.4
- **Margin:** 0

---

## 🚨 IDENTIFIED INCONSISTENCIES

### 1. **Font Family Mixing** ⚠️⚠️⚠️
**Problem:** Three different font families used across the site
- **Roboto:** Body text, course description content
- **Inter:** Course cards, card titles, meta badges, buttons
- **Georgia (Serif):** Benefit card descriptions (line 542, course-styles.css)

**Impact:** Inconsistent visual hierarchy and brand identity

---

### 2. **Line Heights Vary for Similar Content** ⚠️⚠️
**Problem:** Paragraph line-heights differ across contexts
- **1.6:** Standard paragraphs, FAQ answers
- **1.7:** Hero excerpt, module descriptions
- **1.8:** Course description paragraphs, .course-details-compact
- **1.4:** Card descriptions, benefit text

**Impact:** Inconsistent readability and visual rhythm

---

### 3. **Section Title Sizes Not Uniform** ⚠️⚠️
**Problem:** H2/H3 section headers have different sizes
- **24px:** Standard section title (course-styles.css:440)
- **25.6px (1.6rem):** Course cards section title (course-cards.css:26)
- **28px:** Module title (course-styles.css:1112)
- **28px:** H2 in course description (course-styles.css:1880)

**Impact:** Visual hierarchy disrupted across pages

---

### 4. **Color Usage for Titles** ⚠️⚠️
**Problem:** Heading colors differ by context
- **#134958:** Section titles, module titles, most h2/h3
- **#1e3a5f:** Card titles specifically
- **#000000:** FAQ questions

**Impact:** Brand inconsistency

---

### 5. **Button Size Variance** ⚠️
**Problem:** CTA buttons have drastically different sizes
- **24px:** Hero CTA buttons (course-styles.css:207)
- **16px:** Card buttons (course-cards.css:195)
- **15px:** Compact CTA (course-styles.css:252)

**Impact:** Unclear visual hierarchy for calls-to-action

---

### 6. **Font Weight Inconsistency for H3/H4** ⚠️
**Problem:** Standard h3 vs. content h3 have different weights
- **H3 Standard:** weight 700
- **H3 in course description:** weight 600
- **H4 Standard:** weight 700
- **H4 in course description:** weight 600

**Impact:** Heading hierarchy unclear

---

### 7. **Meta/Small Text Size Variance** ⚠️
**Problem:** Small text uses different sizes
- **12px:** Hero stat labels, CTA badge text
- **13px:** Section badges, timeline badges, card meta (0.85rem = 13.6px)
- **14px:** Module labels, timeline compact text, small text class
- **15px:** Section subtitles, module meta

**Impact:** Inconsistent secondary information hierarchy

---

## ✅ APPROVED STANDARDIZED STYLE GUIDE
**Status:** Approved by client on 2025-11-07

### **Primary Font Family**
```css
--font-primary: 'Roboto', sans-serif;
--font-body: 'Roboto', sans-serif;
```
**Decision:** Keep Roboto for all text. Replace Inter (cards) and Georgia (benefit cards) with Roboto for consistency.

---

### **Typography Scale**
Based on approved client decisions:

#### **Display (Hero)**
```css
font-size: 48px;
font-weight: 800;
line-height: 1.1;
letter-spacing: -1px;
```

#### **H1 (Page Title)**
```css
font-size: 36px;
font-weight: 700;
line-height: 1.3;
margin-bottom: 20px;
color: #134958;
```

#### **H2 (Major Sections)**
```css
font-size: 26px;
font-weight: 700;
line-height: 1.3;
color: #134958;
margin: 40px 0 20px 0;
```
**Decision:** 26px (compromise between 24px and 28px for better hierarchy)

#### **H3 (Subsections)**
```css
font-size: 20px;
font-weight: 600;
line-height: 1.3;
color: #134958;
margin: 30px 0 15px 0;
```
**Decision:** Weight 600 (semi-bold) to differentiate from H1/H2

#### **H4 (Minor Headings)**
```css
font-size: 18px;
font-weight: 600;
line-height: 1.3;
color: #134958;
margin: 20px 0 10px 0;
```
**Decision:** Weight 600 (semi-bold) to match H3

#### **Body Text (Paragraphs)**
```css
font-size: 16px;
font-weight: 400;
line-height: 1.7;
color: #333;
margin-bottom: 20px;
```
**Decision:** Standardize on 1.7 across all body paragraphs

#### **Lead Text (Intro Paragraphs)**
```css
font-size: 18px;
font-weight: 400;
line-height: 1.7;
color: #555;
```

#### **Small Text (Meta, Labels, Badges)**
```css
font-size: 14px;
font-weight: 500;
line-height: 1.5;
color: #666;
```
**Decision:** Standardize all small text to 14px (was: 12px-15px mix)

#### **Fine Print/Captions**
```css
font-size: 12px;
font-weight: 400;
line-height: 1.5;
color: #666;
```
**Exception:** Keep 12px for very small elements only

---

### **Color Palette**

#### **Text Colors**
```css
--text-primary: #333;           /* Body text */
--text-secondary: #555;         /* Secondary text */
--text-tertiary: #666;          /* Meta text */
--text-muted: #999;            /* Placeholder text */
```

#### **Heading Colors**
```css
--heading-color: #134958;       /* ALL headings use this */
--heading-on-dark: #ffffff;     /* Exception: white on dark backgrounds */
```
**Decision:** Consolidate all heading colors to #134958 (except white on dark backgrounds)

#### **Brand Colors**
```css
--brand-teal: #28AFCF;         /* Primary brand */
--brand-orange: #FF7F07;       /* Secondary brand */
--brand-tan: #F0B268;          /* Tertiary brand */
--brand-dark: #134958;         /* Dark brand */
```

---

### **Button Styles**

#### **Primary CTA (Hero, Important Actions)**
```css
font-size: 24px;
font-weight: 700;
padding: 8px 26px;
border-radius: 50px;
```
**Decision:** Keep current size (client preference)

#### **Secondary CTA (Card Buttons, Standard Actions)**
```css
font-size: 16px;
font-weight: 600;
padding: 12px 24px;
border-radius: 8px;
```

#### **Compact CTA (Inline, Tertiary Actions)**
```css
font-size: 15px;
font-weight: 600;
padding: 10px 20px;
border-radius: 6px;
```
**Decision:** Keep current sizes - no changes to buttons

---

### **Line Height Standards**
```css
--lh-tight: 1.3;     /* Headings, titles, buttons */
--lh-normal: 1.5;    /* Meta, labels, fine print, FAQ list items, timeline details */
--lh-relaxed: 1.7;   /* ALL body paragraphs (standardized) */
```
**Decision:** Simplified to 3 values - eliminates 1.4, 1.6, 1.8 mix

**✅ IMPLEMENTED 2025-11-07:** All instances of line-height: 1.4 have been eliminated and replaced with appropriate values (1.3 for headings, 1.5 for meta/compact content). See implementation details below.

---

## 📋 APPROVED IMPLEMENTATION CHECKLIST

### Phase 1: Font Family Standardization ✓ APPROVED
- [ ] Replace Inter with Roboto in course-cards.css
- [ ] Replace Georgia serif with Roboto in benefit card text (line 542, course-styles.css)
- [ ] Test across all pages to ensure consistency

### Phase 2: Typography Scale ✓ APPROVED
- [ ] Standardize all H2 to 26px, weight 700
- [ ] Standardize all H3 to 20px, weight 600
- [ ] Standardize all H4 to 18px, weight 600
- [ ] Verify module titles match H2 standard

### Phase 3: Line Heights ✓ APPROVED
- [ ] Set all body paragraph line-height to 1.7
- [ ] Set all heading line-height to 1.3
- [ ] Set all meta/small text line-height to 1.5
- [ ] Update .course-description-content p to 1.7

### Phase 4: Colors ✓ APPROVED
- [ ] Consolidate heading colors to #134958 (except white on dark)
- [ ] Change card titles from #1e3a5f to #134958
- [ ] Change FAQ questions from #000000 to #134958
- [ ] Keep white headings on dark backgrounds unchanged

### Phase 5: Small Text ✓ APPROVED
- [ ] Standardize all meta/label text to 14px
- [ ] Update card meta badges to 14px (currently 0.85rem = 13.6px)
- [ ] Update section subtitles to 14px (currently 15px)
- [ ] Keep 12px only for fine print/captions

### Phase 6: Testing
- [ ] Test Grade 7 course page
- [ ] Test all other course pages
- [ ] Test homepage with course cards
- [ ] Test archive page
- [ ] Test related courses sections
- [ ] Verify mobile responsiveness

**Note:** Buttons remain unchanged per client preference

---

## 📄 FILES TO UPDATE

1. **course-styles.css** (Primary plugin CSS)
   - Lines 10-16: Body font family
   - Lines 19-46: Heading standardization
   - Lines 542: Remove Georgia serif
   - Lines 785-789: Line height adjustment
   - Lines 1872-1876: .course-description-content font family
   - Lines 1879-1904: Heading weight/size standardization
   - Lines 1907-1910: Paragraph line height

2. **course-cards.css** (Card-specific CSS)
   - Already uses Inter - keep as reference
   - Verify sizes match proposed standards

3. **All PHP Templates**
   - No changes needed (CSS-only updates)

---

## 🎯 BENEFITS OF STANDARDIZATION

1. **Consistent Brand Identity:** Single font family (Inter) across all pages
2. **Clear Visual Hierarchy:** Uniform heading sizes establish content structure
3. **Better Readability:** Standardized line heights improve reading experience
4. **Easier Maintenance:** One set of typography rules to follow
5. **Professional Appearance:** Polished, cohesive design
6. **Accessibility:** Predictable text sizing aids screen readers and zoom users

---

## 📞 QUESTIONS FOR DECISION

Before implementing, please decide:

1. **Font Choice:** Keep Inter as primary font? (Recommended: Yes)
2. **Line Height:** Use 1.7 for body text? (Compromise between current 1.6 and 1.8)
3. **Heading Colors:** Consolidate all to #134958? (Recommended: Yes)
4. **Button Sizes:** Reduce hero CTA from 24px to 18px for consistency? (Or keep hero larger?)
5. **Benefit Cards:** Change from Georgia serif to Inter? (Recommended: Yes for consistency)

---

## 🔨 IMPLEMENTATION LOG - Line Height 1.4 Elimination

**Date:** 2025-11-07
**Task:** Eliminate all line-height: 1.4 instances from custom files
**Status:** ✅ COMPLETED

### Files Modified:

#### 1. **course-styles.css** (Plugin CSS)
**Location:** `app/public/wp-content/plugins/nyc-stem-courses/assets/css/course-styles.css`

| Line | Element | Old Value | New Value | Affected Pages |
|------|---------|-----------|-----------|----------------|
| 1363 | `.faq-answer li` | 1.4 | 1.5 | All course pages with FAQs |

**Sections Affected:**
- FAQ list items across all course pages (SHSAT, SAT/ACT, ISEE, Admissions Counseling)

---

#### 2. **blog-styles.css** (Theme CSS)
**Location:** `app/public/wp-content/themes/skola-child/blog-styles.css`

| Line | Element | Old Value | New Value | Affected Pages |
|------|---------|-----------|-----------|----------------|
| 242 | `.single-post h3` | 1.4 | 1.3 | All blog post pages |

**Sections Affected:**
- Blog post H3 headings site-wide

---

#### 3. **style.css** (Theme Main CSS)
**Location:** `app/public/wp-content/themes/skola-child/style.css`

| Line | Element | Old Value | New Value | Affected Pages |
|------|---------|-----------|-----------|----------------|
| 676 | `.nyc-blog-content-container h3` | 1.4 | 1.3 | Blog archive, listings |
| 684 | `.nyc-blog-content-container h4` | 1.4 | 1.3 | Blog archive, listings |
| 894 | `.elementor-element-78fc5ee ul li` | 1.4 | 1.5 | Pages with Elementor list items |
| 1043 | `h3` (global) | 1.4 | 1.3 | All pages using global H3 |

**Sections Affected:**
- Blog content containers (archive pages, category pages)
- Elementor-built pages with list items (14px meta lists)
- Global H3 headings across the site

---

#### 4. **template-enhanced-act.php** (Page Template)
**Location:** `app/public/wp-content/themes/skola-child/template-enhanced-act.php`

| Line | Element | Old Value | New Value | Affected Pages |
|------|---------|-----------|-----------|----------------|
| 102 | `h4` (inline style) | 1.4 | 1.3 | Enhanced ACT course page |

**Sections Affected:**
- Enhanced ACT course page H4 headings

---

#### 5. **template-sat-act-prep.php** (Page Template)
**Location:** `app/public/wp-content/themes/skola-child/template-sat-act-prep.php`

| Line | Element | Old Value | New Value | Affected Pages |
|------|---------|-----------|-----------|----------------|
| 1075 | Timeline duration (inline) | 1.4 | 1.5 | SAT/ACT Prep page - Foundational Program |
| 1081 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Foundational timeline |
| 1085 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Foundational timeline |
| 1090 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Foundational timeline |
| 1095 | Caption/note text | 1.4 | 1.5 | SAT/ACT Prep page - ACT availability note |
| 1113 | Caption text | 1.4 | 1.5 | SAT/ACT Prep page - Foundational gaps note |
| 1132 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline suggestion |
| 1136 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline suggestion |
| 1140 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline suggestion |
| 1162 | Timeline duration | 1.4 | 1.5 | SAT/ACT Prep page - Summer/Fall intensive |
| 1168 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline options |
| 1172 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline options |
| 1176 | Timeline list item | 1.4 | 1.5 | SAT/ACT Prep page - Timeline options |

**Sections Affected:**
- SAT/ACT Prep page: Timeline cards (Foundational Program, Summer/Fall Intensive)
- Duration labels, timeline lists, and caption notes

---

### Pages/Sections Affected Summary:

**Course Pages (via course-styles.css):**
- SHSAT Grade 7 Prep - FAQ list items
- SHSAT Grade 8 Prep - FAQ list items
- SHSAT Summer Bootcamp - FAQ list items
- SHSAT Fall Bootcamp - FAQ list items
- Digital SAT Prep - FAQ list items
- SAT/ACT Prep - FAQ list items
- ISEE Prep - FAQ list items
- Enhanced ACT Prep - FAQ list items + H4 headings
- Admissions Counseling - FAQ list items
- Private Tutoring - FAQ list items

**Blog Pages (via blog-styles.css + style.css):**
- All individual blog posts - H3 headings
- Blog archive pages - H3/H4 headings in content containers
- Blog category pages - H3/H4 headings
- Blog search results - H3/H4 headings

**Special Pages (via template files):**
- SAT/ACT Prep page - Timeline cards, duration labels, list items, captions
- Enhanced ACT page - H4 headings

**Elementor Pages (via style.css):**
- Any page using `.elementor-element-78fc5ee` - List items with checkmarks

**Global (via style.css):**
- All pages using global H3 style (28px H3 headings)

---

### Testing Recommendations:

1. **Visual Check:**
   - Visit 2-3 course pages and scroll to FAQ sections - list items should have comfortable spacing
   - Check SAT/ACT Prep page timeline cards - text should be readable with proper spacing
   - Visit blog posts - H3/H4 headings should be tight but readable

2. **Cross-Browser:**
   - Test in Chrome, Firefox, Safari
   - Verify no layout shifts from line-height changes

3. **Mobile:**
   - Check FAQ list items on mobile (should still be readable at 1.5)
   - Verify timeline cards remain properly formatted

---

**Document Created:** 2025-11-07
**Pages Analyzed:** Grade 7 SHSAT Prep (representative course page)
**CSS Files Analyzed:** course-styles.css, course-cards.css
**Line Height 1.4 Elimination:** Completed 2025-11-07

---

## 🔨 IMPLEMENTATION LOG - FAQ Typography Standardization

**Date:** 2025-11-08
**Task:** Standardize FAQ paragraph and list item typography across all pages
**Status:** ✅ COMPLETED

### Issue Identified:

FAQ paragraphs were inheriting 18px font-size from theme defaults instead of the standard 16px, causing visual inconsistency between paragraph text and list items within the same FAQ answer section.

### Solution Implemented:

Added explicit typography declarations with `!important` flags to ensure consistent rendering across all FAQ sections site-wide.

### Files Modified:

#### 1. **course-styles.css** (Plugin CSS)
**Location:** `app/public/wp-content/plugins/nyc-stem-courses/assets/css/course-styles.css`

**Lines 1334-1342:** `.faq-answer p`
- Added: `font-family: 'Roboto', sans-serif !important`
- Added: `font-size: 16px !important`
- Added: `font-weight: 400 !important`
- Changed: `line-height: 1.7 !important` (enforced with !important)

**Lines 1358-1367:** `.faq-answer li`
- Added: `font-family: 'Roboto', sans-serif !important`
- Added: `font-size: 16px !important`
- Added: `font-weight: 400 !important`
- Changed: `line-height: 1.5 !important` (enforced with !important)

#### 2. **template-shsat-faq.php** (SHSAT FAQ Page Template)
**Location:** `app/public/wp-content/themes/skola-child/template-shsat-faq.php`

**Lines 169-177:** `.faq-answer p`
- Added: `font-family: 'Roboto', sans-serif !important`
- Added: `font-size: 16px !important`
- Added: `font-weight: 400 !important`
- All properties enforced with !important

**Lines 207-217:** `.faq-answer ul, .faq-answer ol`
- Added explicit typography with !important flags

**Lines 220-228:** `.faq-answer ul li`
- Added explicit typography with !important flags

**Lines 239-247:** `.faq-answer ol li`
- Added explicit typography with !important flags

### Pages Affected:

**All Course Pages with FAQ Sections:**
- SHSAT Grade 7 Prep
- SHSAT Grade 8 Prep
- SHSAT Summer Bootcamp
- SHSAT Fall Bootcamp
- Digital SAT Prep
- SAT/ACT Prep
- ISEE Prep
- Enhanced ACT Prep
- Admissions Counseling
- Private Tutoring

**Special FAQ Page:**
- SHSAT Frequently Asked Questions (Resources section)

### Typography Specification:

**FAQ Answer Paragraphs:**
- Font: Roboto, 16px, weight 400
- Line-height: 1.7 (relaxed body spacing)
- Color: #666

**FAQ Answer List Items:**
- Font: Roboto, 16px, weight 400
- Line-height: 1.5 (compact list spacing)
- Color: #666

**Key Design Decision:** Paragraphs and list items within FAQ answers now use identical typography (font, size, weight, color) with the only difference being line-height. This creates visual consistency while maintaining appropriate spacing for different content types.

---

## 🔨 IMPLEMENTATION LOG - FAQ Chevron Standardization

**Date:** 2025-11-08
**Task:** Standardize FAQ list chevron/bullet style across all pages
**Status:** ✅ COMPLETED

### Issue Identified:

SHSAT FAQ page (template-shsat-faq.php) was using a lighter chevron style "›" with relative font sizing (1.4em), while course pages used a solid triangle "▸" with absolute sizing (18px) and bold weight (700). This created visual inconsistency.

### Solution Implemented:

Updated SHSAT FAQ template to match the course pages' chevron styling.

### Changes Made:

**File:** `template-shsat-faq.php` (line 234-241)

**Before:**
```css
.faq-answer ul li:before {
    content: "›";          /* Light chevron */
    font-size: 1.4em;      /* Relative size */
    /* No font-weight */
}
```

**After:**
```css
.faq-answer ul li:before {
    content: "▸";          /* Solid triangle */
    font-size: 18px;       /* Absolute size */
    font-weight: 700;      /* Bold */
}
```

### Standardized Chevron Style:

- **Character:** "▸" (Unicode U+25B8 - solid right-pointing triangle)
- **Color:** #28AFCF (teal brand color)
- **Font Weight:** 700 (bold)
- **Font Size:** 18px (absolute)
- **Position:** Absolute positioning, left: 0

### Pages Affected:

- SHSAT Frequently Asked Questions page (Resources section)
- Now matches all 10+ course pages with FAQ sections

---

## Implementation Log: SHSAT Summer Bootcamp - ELA/Math Strategies Typography

**Date:** 2025-11-08
**File Updated:** Course FAQs ACF field for post ID 17149 (SHSAT Summer Bootcamp)
**Location:** https://nycstemclub.local/courses/shsat-summer-bootcamp/

### Issue:
The "ELA Strategies" and "Math Strategies" subheadings within the FAQ section had inconsistent typography that didn't match the standardized H4 heading styles used throughout the site.

### Changes Made:

Updated inline styles for both headings in the `course_faqs` ACF field (FAQ #1 answer):

**Before:**
```html
<h4 style="margin-left: 30px; margin-bottom: 8px; font-size: 16px;">ELA Strategies</h4>
<h4 style="margin-left: 30px; margin-bottom: 8px; font-size: 16px;">Math Strategies</h4>
```

**After:**
```html
<h4 style="font-size: 18px !important; font-weight: 600 !important; line-height: 1.3 !important; color: #134958 !important; margin: 20px 0 10px 30px !important;">ELA Strategies</h4>
<ul style="margin-top: 8px; margin-bottom: 8px; line-height: 1.5; margin-left: 30px;">
  <!-- list items -->
</ul>

<h4 style="font-size: 18px !important; font-weight: 600 !important; line-height: 1.3 !important; color: #134958 !important; margin: 20px 0 10px 30px !important;">Math Strategies</h4>
<ul style="margin-top: 8px; margin-bottom: 8px; line-height: 1.5; margin-left: 30px;">
  <!-- list items -->
</ul>
```

### Typography Applied (H4 Standard):

- **Font Size:** 16px → 18px
- **Font Weight:** (not specified) → 600
- **Line Height:** (not specified) → 1.3
- **Color:** (inherited) → #134958
- **Margin:** 30px left, 8px bottom → 20px top, 10px bottom, 30px left
- **List Indentation:** Added 30px left margin to ul elements

### Implementation Method:

1. Identified content location in `course_faqs` ACF repeater field
2. Located "ELA Strategies" in FAQ #1's answer field
3. Updated inline styles using PHP regex replacement
4. Applied !important flags to ensure consistency across browser cache states

### Result:

Both ELA Strategies and Math Strategies headings now follow the standardized H4 typography pattern, matching all other H4 headings across FAQ sections site-wide.

---

**Last Updated:** 2025-11-08

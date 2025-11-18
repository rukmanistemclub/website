# Template Consolidation Plan

## Summary
Consolidating templates to eliminate waste and improve efficiency. Counseling programs are now **courses** (not pages), and all simple informational pages use **one universal template**.

---

## ✅ What's Done

### 1. Counseling Course Content Ready
- **COLLEGE-COUNSELING-COURSE-CONTENT.html** - Ready to paste into course
- **PRIVATE-SCHOOL-COUNSELING-COURSE-CONTENT.html** - Ready to paste into course
- **CSS added to course-styles.css** (lines 3022-3270) - All styling ready

### 2. Universal Simple Page Template Enhanced
- **template-simple-page.php** - Now supports optional features via ACF fields:
  - `hero_subtitle` (text) - Optional subtitle in hero
  - `show_hero_button` (true/false) - Show inquiry button in hero
  - `show_bottom_cta` (true/false) - Show bottom CTA section
  - `cta_heading` (text) - CTA heading
  - `cta_text` (textarea) - CTA description

---

## 📋 Next Steps

### Step 1: Add Content to Counseling Courses

**College Counseling Course:**
1. Go to WordPress Admin → Courses → "College Counseling"
2. Find ACF field "Course Description" (WYSIWYG editor)
3. Switch to Text/HTML mode
4. Copy content from `COLLEGE-COUNSELING-COURSE-CONTENT.html`
5. Paste into Course Description field
6. Update hero_description field if needed
7. Save and preview

**Private School Counseling Course:**
1. Go to WordPress Admin → Courses → "Private School Admissions Counseling"
2. Find ACF field "Course Description" (WYSIWYG editor)
3. Switch to Text/HTML mode
4. Copy content from `PRIVATE-SCHOOL-COUNSELING-COURSE-CONTENT.html`
5. Paste into Course Description field
6. Update hero_description field if needed
7. Save and preview

### Step 2: Verify Courses Look Perfect
- Visit the course URLs and confirm they render exactly the same
- Check all sections, spacing, typography, colors
- Test mobile responsive
- Verify inquiry buttons work

### Step 3: Update Simple Pages (Optional)
If you want to use template-simple-page.php for other pages:

**Pages to consolidate:**
- Testimonials
- About
- Why Us
- Our Tutors
- Careers

**For each page:**
1. Set Page Template to "Simple Page - Full Width"
2. Optionally add ACF fields:
   - `hero_subtitle` - Add descriptive subtitle
   - `show_hero_button` = true - Show inquiry button in hero
   - `show_bottom_cta` = true - Add bottom CTA
   - `cta_heading` - e.g., "Join Our Team"
   - `cta_text` - Custom CTA message

### Step 4: Clean Up Old Templates (After Confirmation)
**Once you confirm courses look perfect, DELETE:**
- ✅ `template-college-counseling.php` - No longer needed (courses use single-course.php)
- ✅ `template-private-school-counseling.php` - No longer needed (courses use single-course.php)

**Keep:**
- ✅ `template-simple-page.php` - Universal template for all simple pages
- ✅ Other specialized templates (template-testing-timeline.php, template-digital-sat.php, etc.)

---

## 🎯 Final Architecture

### Templates by Type

**Courses (Custom Post Type):**
- Use: `single-course.php` (from nyc-stem-courses plugin)
- Content: ACF `course_description` field
- CSS: `course-styles.css`
- Examples: College Counseling, Private School Counseling, SAT Prep, ACT Prep, etc.

**Simple Pages:**
- Use: `template-simple-page.php` (universal)
- Content: WordPress editor + optional ACF fields
- CSS: Inline in template
- Examples: About, Testimonials, Careers, Why Us, Our Tutors

**Specialized Pages:**
- Use: Custom templates (template-testing-timeline.php, etc.)
- Content: Hardcoded structure with dynamic elements
- CSS: Inline in template
- Examples: NYC Testing Timeline, Digital SAT, SHSAT FAQ

---

## 🔧 Optional ACF Fields to Create

If you want to use template-simple-page.php features, create these ACF fields:

**Field Group: "Simple Page Options"**
- Field: `hero_subtitle` (Text)
- Field: `show_hero_button` (True/False)
- Field: `show_bottom_cta` (True/False)
- Field: `cta_heading` (Text)
- Field: `cta_text` (Textarea)
- Location: Page Template = Simple Page - Full Width

---

## ✨ Benefits

1. **Efficiency**: One universal template instead of multiple page-specific templates
2. **Consistency**: All counseling programs use the same course structure
3. **Maintainability**: Update CSS once in course-styles.css
4. **Flexibility**: ACF fields allow customization without creating new templates
5. **Scalability**: Easy to add new courses or simple pages

---

## 📝 Notes

- **All CSS is global** - Changes to course-styles.css affect all courses
- **Typography compliant** - Everything follows TYPOGRAPHY-STYLE-GUIDE.md
- **Mobile responsive** - All templates include responsive breakpoints
- **Pages kept for now** - Don't delete the page templates until you confirm courses work perfectly

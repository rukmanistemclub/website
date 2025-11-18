# Quick Start Instructions

## What Has Been Built

✅ **Complete WordPress Plugin** for NYC STEM Club Courses
✅ **Custom Post Type**: "Courses" with categories and tags
✅ **ACF Fields**: All course details (programmatically registered)
✅ **Templates**: Single course, archive, category pages with 7 template parts
✅ **Styling**: Complete CSS with brand colors, responsive design
✅ **JavaScript**: FAQ accordion functionality
✅ **Migration Tool**: One-click WooCommerce to Courses migration
✅ **Admin Interface**: Easy-to-use migration page

---

## How to Use This Plugin

### STEP 1: Activate the Plugin

1. Open your WordPress admin: `http://nyc-stem-club.local/wp-admin/`
2. Go to **Plugins**
3. Find "NYC STEM Club Courses"
4. Click **Activate**

### STEP 2: Run the Migration

1. In WordPress admin, go to **Courses > Migration Tool**
2. Click **"Create Default Categories"** button
   - This creates: SAT/ACT Prep, SHSAT Prep, Regents Prep, Summer Programs, Tutoring, Test Prep
3. Click **"Run Migration"** button
   - This converts all WooCommerce products to Course posts
   - Copies titles, descriptions, images, categories
   - Adds default ACF fields with smart values

### STEP 3: Add Menu Item

**Option A: Automatic Menu (easiest)**
1. Go to **Appearance > Menus**
2. Find your main navigation menu
3. In the left panel, expand "Courses" (under Custom Post Types)
4. Check "Courses" and click **Add to Menu**
5. Click **Save Menu**

**Option B: Custom Link**
1. Go to **Appearance > Menus**
2. Expand "Custom Links"
3. URL: `/courses/`
4. Link Text: `Courses`
5. Click **Add to Menu**
6. Click **Save Menu**

### STEP 4: View Your Courses

**See all courses:**
`http://nyc-stem-club.local/courses/`

**See a single course:**
Click any course from the archive

---

## What Each Course Includes

When you edit a course, you'll see these ACF fields:

### Basic Info
- **Course Price**: Display price (e.g., "$1,200")
- **Course Duration**: How long (e.g., "8-12 weeks")
- **Class Format**: Private, Group, Online, In-Person

### Why Choose Us (4 Cards)
- Icon (emoji like 🎯)
- Title
- Description

*Default benefits are already added by migration!*

### FAQs (Accordion)
- Question
- Answer (with formatting)

*Default FAQs are already added by migration!*

### Optional Sections
- **Testimonials**: Student quotes with photos
- **Schedule**: Course dates and times
- **Related Courses**: Select 2-4 related courses

### Inquiry Settings
- **Button Text**: Default "Inquire Now"
- **Custom URL**: Override default enrollment page

---

## Customizing Courses

### Edit Existing Courses
1. Go to **Courses > All Courses**
2. Click any course to edit
3. Modify the default content:
   - Update price and duration
   - Change "Why Choose Us" benefits
   - Add/edit FAQs
   - Add testimonials
   - Set related courses
4. Click **Update**

### Create New Course
1. Go to **Courses > Add New**
2. Add title and description
3. Set featured image (1200x800px recommended)
4. Add excerpt (for archive page cards)
5. Fill ACF fields
6. Assign category
7. Click **Publish**

---

## Pages You'll See

### Archive Page
**URL**: `/courses/`
- Grid of all courses
- Category badges
- Duration and format info
- "Learn More" buttons

### Single Course Page
- **Hero**: Title, price, duration, "Inquire Now" button
- **Description**: Full course details
- **Why Choose Us**: 4 benefit cards
- **FAQs**: Accordion with Q&A
- **Testimonials**: If added
- **Schedule**: If added
- **Related Courses**: Automatic or manual

### Category Page
**URL**: `/course-category/sat-act-prep/`
- Shows only courses in that category
- Same grid layout as archive

---

## Design Features

### Brand Colors (Already Applied)
- Primary Blue: #28AFCF
- Dark Blue: #134958
- Orange: #FF7F07 (CTA buttons)
- Porsche: #F0B268 (accents)

### Responsive Design
- Mobile: 1 column
- Tablet: 2 columns
- Desktop: 3-4 columns

### Animations
- Card hover effects (lift + shadow)
- Button hover effects
- FAQ accordion smooth transitions

---

## Testing Checklist

After activation and migration:

- [ ] Visit `/courses/` - see all courses in grid
- [ ] Click a course - see full course page
- [ ] Click FAQ question - accordion expands
- [ ] Click "Inquire Now" - goes to enrollment page
- [ ] Check on mobile device/resize browser
- [ ] Test different course categories
- [ ] Verify images display correctly
- [ ] Check navigation menu has Courses link

---

## Troubleshooting

### "Page Not Found" for courses
**Fix**: Go to **Settings > Permalinks** and click **Save Changes** (flushes rewrite rules)

### ACF fields not showing
**Fix**: Make sure Advanced Custom Fields plugin is active

### Migration button grayed out
**Fix**: Activate WooCommerce plugin first

### Styles not loading
**Fix**: Clear browser cache and WordPress cache

---

## File Locations

**Plugin**: `wp-content/plugins/nyc-stem-courses/`

**Templates**: Can be overridden in theme by copying to:
`wp-content/themes/skola-child/nyc-stem-courses/`

**Styles**: `wp-content/plugins/nyc-stem-courses/assets/css/course-styles.css`

**Scripts**: `wp-content/plugins/nyc-stem-courses/assets/js/course-scripts.js`

---

## Next Steps

1. ✅ Activate plugin
2. ✅ Run migration
3. ✅ Add menu item
4. ✅ View courses page
5. 📝 Customize each course's ACF fields
6. 📝 Add real testimonials
7. 📝 Set related courses
8. 📝 Test inquiry buttons
9. 🚀 Deploy to production when ready

---

## Production Deployment

When ready to deploy to live site:

1. **Backup production database**
2. Copy plugin folder to production: `wp-content/plugins/nyc-stem-courses/`
3. Activate plugin on production
4. Run migration on production
5. Test all pages
6. Update navigation menu
7. Set up 301 redirects from old WooCommerce URLs (if needed)

---

## Questions?

Check README.md for full documentation.

---

**Built for NYC STEM Club**
**Version 1.0.0**
**Ready to use! 🚀**

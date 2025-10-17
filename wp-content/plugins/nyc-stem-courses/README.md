# NYC STEM Club Courses Plugin

A custom WordPress plugin for managing and displaying courses with modern design, replacing WooCommerce for course display.

## Features

- **Custom Post Type**: "Courses" with categories and tags
- **ACF Fields**: Complete course details (price, duration, format, benefits, FAQs, testimonials, schedule)
- **Modern Design**: Brand colors, responsive layout, smooth animations
- **FAQ Accordion**: Interactive JavaScript-powered FAQ section
- **Migration Tool**: One-click migration from WooCommerce products to courses
- **Inquiry System**: All courses link to enrollment page with course name pre-filled
- **Related Courses**: Automatic or manual course recommendations

## Requirements

- WordPress 5.0+
- PHP 7.4+
- Advanced Custom Fields (ACF) plugin
- WooCommerce (only needed for migration)

## Installation

1. Upload the `nyc-stem-courses` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Make sure ACF is installed and activated

## Setup Instructions

### 1. Activate the Plugin
- Go to **Plugins** in WordPress admin
- Find "NYC STEM Club Courses" and click **Activate**

### 2. Run Migration (if migrating from WooCommerce)
- Go to **Courses > Migration Tool**
- Click **Create Default Categories**
- Click **Run Migration** to convert WooCommerce products to courses
- Review the results

### 3. Add Menu Item
- Go to **Appearance > Menus**
- Add "Courses" archive page to your navigation menu
- Or create a custom link to `/courses/`

### 4. Customize Courses
- Go to **Courses > All Courses**
- Edit each course to customize:
  - Price
  - Duration
  - Class Format
  - Why Choose Us (benefits)
  - FAQs
  - Testimonials (optional)
  - Schedule (optional)
  - Related Courses

## Usage

### Creating a New Course

1. Go to **Courses > Add New**
2. Enter course title
3. Add featured image (1200x800px recommended)
4. Write full description in the editor
5. Add excerpt (for card displays)
6. Fill in ACF fields:
   - **Price**: e.g., "$1,200" or "Contact for pricing"
   - **Duration**: e.g., "8-12 weeks"
   - **Class Format**: Check all that apply
   - **Why Choose Us**: Add 3-4 benefits with icons
   - **FAQs**: Add 3-6 questions and answers
   - **Testimonials**: Optional, add 2-3 student testimonials
   - **Schedule**: Optional course dates/times
   - **Inquiry Settings**: Customize button text and URL
   - **Related Courses**: Select 2-4 related courses
7. Assign to categories
8. **Publish**

### Course Categories

Default categories created by migration:
- SAT/ACT Prep
- SHSAT Prep
- Regents Prep
- Summer Programs
- Tutoring
- Test Prep

Add more at **Courses > Categories**

## File Structure

```
nyc-stem-courses/
├── nyc-stem-courses.php          # Main plugin file
├── includes/
│   ├── post-types.php            # Register course post type
│   ├── acf-fields.php            # Register ACF fields
│   ├── migration.php             # WooCommerce migration logic
│   └── migration-page.php        # Admin migration interface
├── templates/
│   ├── single-course.php         # Single course template
│   ├── archive-course.php        # All courses archive
│   ├── taxonomy-course_category.php  # Category archive
│   └── parts/
│       ├── course-hero.php       # Hero section
│       ├── course-description.php    # Main content
│       ├── course-benefits.php   # Why choose us cards
│       ├── course-faqs.php       # FAQ accordion
│       ├── course-testimonials.php   # Testimonials grid
│       ├── course-schedule.php   # Schedule info
│       └── course-related.php    # Related courses
├── assets/
│   ├── css/
│   │   └── course-styles.css     # All styling
│   └── js/
│       └── course-scripts.js     # FAQ accordion & interactions
└── README.md
```

## Brand Colors

The plugin uses NYC STEM Club brand colors:

- **Primary Blue**: #28AFCF
- **Dark Blue**: #134958
- **Orange**: #FF7F07
- **Porsche**: #F0B268
- **Font**: Roboto (weight 600 for body)

## Customization

### Changing the Enrollment Page URL

By default, all "Inquire Now" buttons link to `/student-enrollment/`. To change this:

**Option 1**: Per-course custom URL
- Edit the course
- In "Inquiry Button Settings", add a custom URL

**Option 2**: Change default globally
- Edit `templates/parts/course-hero.php`
- Change line: `$inquiry_url = $custom_url ? $custom_url : home_url('/student-enrollment/');`

### Modifying Templates

Templates can be overridden in your theme:
1. Copy any template from `plugins/nyc-stem-courses/templates/`
2. Paste to `your-theme/nyc-stem-courses/`
3. Modify as needed

### Adding Custom Fields

To add more ACF fields:
1. Edit `includes/acf-fields.php`
2. Add fields to the array in `register_course_fields()`
3. Update templates to display new fields

## Troubleshooting

### ACF Fields Not Showing
- Make sure ACF plugin is installed and activated
- Deactivate and reactivate the plugin

### Templates Not Loading
- Check file permissions
- Try flushing permalinks: **Settings > Permalinks > Save Changes**

### Migration Issues
- Ensure WooCommerce is active before migration
- Check that products are published
- Backup database before running migration

### Styling Issues
- Clear browser cache
- Clear WordPress cache (if using caching plugin)
- Check for CSS conflicts with theme

## Development

### Local Development
This plugin was built for Local by Flywheel. To develop:
1. Make changes to plugin files
2. Test in Local environment
3. Use browser dev tools for CSS/JS debugging

### Production Deployment
1. Test thoroughly in local environment
2. Backup production database
3. Upload plugin folder to production
4. Activate plugin
5. Run migration if needed
6. Test all course pages
7. Update navigation menus

## Support

For issues or questions:
- Check the troubleshooting section above
- Review ACF field setup in WordPress admin
- Check browser console for JavaScript errors
- Review WordPress debug.log for PHP errors

## Changelog

### Version 1.0.0
- Initial release
- Course custom post type
- Complete ACF field structure
- Modern responsive design
- WooCommerce migration tool
- FAQ accordion functionality
- Related courses system

## Credits

Built for NYC STEM Club
Design follows brand guidelines
Developed with WordPress best practices

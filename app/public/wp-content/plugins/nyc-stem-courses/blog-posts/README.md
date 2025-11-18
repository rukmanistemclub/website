# NYC STEM Club - Unified Blog Architecture 2025

## 🎯 Overview

This is the **streamlined, production-ready blog system** for all NYC STEM Club blog posts.

**Key Benefits:**
- ✅ Modern, visual design (accordions, cards, gradients)
- ✅ No custom blocks needed - works with any theme
- ✅ All styling self-contained (inline CSS)
- ✅ Reusable template system
- ✅ Fast and lightweight
- ✅ Easy to maintain

---

## 📁 File Structure

```
wp-content/plugins/nyc-stem-courses/
├── includes/
│   └── blog-template-system.php    ← MASTER TEMPLATE (all shared code)
└── blog-posts/
    ├── README.md                    ← This file
    └── sat-vs-act-2025.php         ← Example blog post generator
```

---

## 🚀 How to Create a New Blog Post

### Step 1: Copy the Template

Copy `sat-vs-act-2025.php` and rename it for your new blog post:

```bash
cp blog-posts/sat-vs-act-2025.php blog-posts/my-new-blog.php
```

### Step 2: Edit the Content

Open your new file and modify:

1. **Post metadata** (title, slug, excerpt, categories, tags, SEO)
2. **Content sections** (use helper functions)

### Step 3: Run the Generator

Visit the URL in your browser while logged in as admin:

```
https://nycstemclub.local/wp-content/plugins/nyc-stem-courses/blog-posts/my-new-blog.php
```

---

## 🧰 Available Helper Functions

All these functions are in `includes/blog-template-system.php`:

### 1. **Get Shared CSS**

```php
$content = nyc_blog_get_shared_css();
```

This adds all the modern styling (accordions, cards, gradients, etc.)

### 2. **Unified Icon Grid** (Facts + Features)

This is the MAIN visual component - displays quick facts AND features in ONE unified grid. Matches your original Digital SAT layout.

```php
$items = array(
    // Quick Facts (displayed as stat cards with large numbers)
    array('type' => 'fact', 'label' => 'Test Duration', 'value' => '2hr 14min'),
    array('type' => 'fact', 'label' => 'Score Range', 'value' => '400-1600'),

    // Features (displayed as icon cards with descriptions)
    array(
        'type' => 'feature',
        'icon' => '⏱️',
        'title' => 'Shorter Test',
        'description' => '46 minutes less than the old SAT'
    ),
    array(
        'type' => 'feature',
        'icon' => '💻',
        'title' => 'Digital Only',
        'description' => 'Take it on a laptop or tablet'
    ),
);

$content .= nyc_blog_icon_grid($items);
```

**Visual Result:**
- Facts show as: `LABEL` (small, uppercase) → `VALUE` (large, bold, colored)
- Features show as: `ICON` (emoji) → `TITLE` (bold) → `DESCRIPTION` (gray text)
- All items in ONE consistent grid with hover effects

**Why this is better:** Combines your original Quick Facts + Icon Grid layout. First 4 items can be facts, rest can be features - all in ONE visual component!

### 3. **FAQ Accordion**

```php
$faqs = array(
    array(
        'question' => 'What is the ACT?',
        'answer' => 'The ACT is a standardized test...'
    ),
    array(
        'question' => 'When should I take it?',
        'answer' => 'Ideally in spring of sophomore year...'
    ),
);

$content .= nyc_blog_faq_accordion($faqs);
```

Creates an interactive accordion with expandable Q&A.

### 4. **VS Comparison**

```php
$left_card = '<div>...ACT content...</div>';
$right_card = '<div>...SAT content...</div>';

$content .= nyc_blog_vs_comparison($left_card, $right_card);
```

Creates a side-by-side comparison with "VS" divider.

### 5. **Recommendation Cards**

```php
$act_content = '<h3>Choose ACT if...</h3><ul>...</ul>';
$sat_content = '<h3>Choose SAT if...</h3><ul>...</ul>';

$content .= nyc_blog_recommendation_cards($act_content, $sat_content);
```

Creates color-coded recommendation cards.

### 6. **Feature Grid**

```php
$features = array(
    array(
        'icon' => '📝',
        'title' => 'Easy to Use',
        'description' => 'Simple and intuitive interface.'
    ),
    array(
        'icon' => '⚡',
        'title' => 'Fast',
        'description' => 'Lightning-fast performance.'
    ),
);

$content .= nyc_blog_feature_grid($features);
```

Creates a grid of feature boxes with icons.

### 7. **Numbered Process Steps**

```php
$steps = array(
    'Take a diagnostic test',
    'Review your results',
    'Create a study plan',
    'Start practicing'
);

$content .= nyc_blog_process_steps($steps);
```

Creates numbered steps with circular badges.

### 8. **CTA Section**

```php
$content .= nyc_blog_cta(
    'Ready to Get Started?',
    'Join thousands of students who have improved their scores.',
    array(
        array('text' => 'Enroll Now', 'url' => '/enrollment/', 'class' => 'primary'),
        array('text' => 'Learn More', 'url' => '/about/', 'class' => 'secondary')
    )
);
```

Creates a gradient CTA section with buttons.

### 9. **Create Blog Post**

```php
$result = nyc_blog_create_post(array(
    'title' => 'My Blog Post Title',
    'slug' => 'my-blog-post-slug',
    'content' => $content,
    'excerpt' => 'Short description...',
    'categories' => array('Test Prep', 'Study Tips'),
    'tags' => 'SAT,study,tips',
    'seo' => array(
        'title' => 'SEO Title | NYC STEM Club',
        'description' => 'SEO meta description...',
        'focus_keyword' => 'SAT tips'
    )
));
```

---

## 🎨 Design Components

### Modern Accordion FAQs
- Click to expand/collapse
- Smooth animations
- Hover effects
- `+` icon that rotates to `×` when open

### VS Comparison Cards
- Side-by-side layout
- Gradient top borders
- Quick stats grid inside
- Responsive (stacks on mobile)

### Recommendation Cards
- Gradient backgrounds
- Color-coded (teal vs orange)
- Icon bullets
- Clean checkmarks

### Feature Grid
- Emoji icons
- Compact cards
- Hover effects
- Auto-responsive grid

### Process Steps
- Numbered circular badges
- Clean layout
- Easy to scan

### CTA Section
- Gradient background
- Multiple buttons
- Centered layout
- Eye-catching

---

## 📝 Best Practices

### ✅ DO:
- Use the helper functions
- Keep content in Gutenberg block format
- Use semantic headings (h2, h3, h4)
- Include SEO metadata
- Test on mobile

### ❌ DON'T:
- Hard-code inline styles (use helper functions)
- Skip the shared CSS include
- Use custom Gutenberg blocks (we don't need them anymore!)
- Forget to set categories and tags

---

## 🔧 Troubleshooting

### "Permission denied" error
Make sure you're logged in as a WordPress admin before running the generator script.

### "File not found" error
Check that the file path is correct and the file exists.

### CSS not working
Make sure you included `nyc_blog_get_shared_css()` at the start of your content.

### Content looks broken
Check that you're using valid HTML and closing all tags properly.

---

## 📊 Example Blog Posts

### SAT vs ACT 2025
**File:** `blog-posts/sat-vs-act-2025.php`

**Live URL:** `https://nycstemclub.local/sat-vs-act-2025-which-test-is-right-for-you/`

**Components Used:**
- Quick Answer callout
- VS Comparison cards
- Recommendation cards (ACT vs SAT)
- Feature grid (4 reasons)
- FAQ accordion (6 questions)
- Process steps (4 steps)
- CTA section

### Digital SAT 2025
**File:** `blog-posts/digital-sat-2025.php`

**Live URL:** `https://nycstemclub.local/digital-sat-2025-complete-guide-to-the-new-format/`

**Components Used:**
- **Unified Icon Grid** (10 items: 4 quick facts + 6 key changes) - REORGANIZED!
- Icon Grid (4 prep tips)
- Icon Grid (3 NYC STEM features)
- Comparison table (styled)
- FAQ accordion (6 questions)
- CTA section

**Key Innovation:** The Quick Facts are now INTEGRATED into the "What's Different" section as the first 4 items in the grid, followed by 6 feature cards - all in ONE visual component matching your original layout!

---

## 🚨 What Was Removed

### Custom Gutenberg Blocks System (DELETED)
- `includes/custom-blocks-init.php`
- `assets/css/custom-blocks.css`
- `assets/js/custom-blocks.js`

**Why?** Over-engineered. Inline CSS approach is simpler, faster, and more portable.

### Old Blog Creation Scripts (DELETED)
- `create-sat-act-blog-post.php`
- `create-sat-act-blog-modern.php`
- `create-digital-sat-blog-modern.php`
- `create-digital-sat-blog-visual.php`
- `create-sat-vs-act-2025-blog.php`

**Why?** Replaced with the unified template system.

---

## 🎯 Migration Path

If you have existing blog posts created with the old system:

1. They will continue to work (no breaking changes)
2. To update them: Re-run the generator using the new template
3. Content will be preserved, styling will be modernized

---

## 📚 Additional Resources

- **WordPress Codex:** https://codex.wordpress.org/
- **Gutenberg Blocks:** https://wordpress.org/gutenberg/
- **Roboto Font:** https://fonts.google.com/specimen/Roboto

---

## 💡 Tips

- Use emojis in headings for visual interest (📊 🎯 💡 ❓ ✅)
- Keep paragraphs short (2-3 sentences max)
- Use bullet points liberally
- Add white space between sections
- Test on mobile devices

---

**Last Updated:** October 18, 2025
**Version:** 1.0
**Author:** NYC STEM Club Development Team

<?php
/**
 * ACF Field Definitions for Courses
 * ORGANIZED IN PAGE ORDER with clear help text
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', 'nyc_stem_register_organized_course_fields');

function nyc_stem_register_organized_course_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_course_content',
        'title' => '📄 Course Page Content',
        'fields' => array(

            // ========================================
            // SECTION 1: HERO SECTION
            // ========================================
            array(
                'key' => 'field_hero_divider',
                'label' => '🎯 HERO SECTION (Top of page with blue gradient)',
                'type' => 'message',
                'message' => 'The hero displays at the very top with the course title, excerpt, stats, and CTA buttons.',
            ),

            // Hero Stats (Left Column Mini Stats)
            array(
                'key' => 'field_hero_stats',
                'label' => 'Hero Stats (Left Column)',
                'name' => 'hero_stats',
                'type' => 'repeater',
                'instructions' => '📊 Small stats displayed below the title on the left side (e.g., "Ages 11-13", "2x/week"). Recommended: 2-3 stats.',
                'required' => 0,
                'layout' => 'block',
                'button_label' => 'Add Stat',
                'max' => 3,
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_stat_icon_svg',
                        'label' => 'Icon SVG (Optional)',
                        'name' => 'icon_svg',
                        'type' => 'textarea',
                        'instructions' => 'Paste SVG code or leave empty for default icon',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_hero_stat_number',
                        'label' => 'Number/Value',
                        'name' => 'number',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'Ages 11-13',
                    ),
                    array(
                        'key' => 'field_hero_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'Age Range',
                    ),
                ),
            ),

            // Hero Card (Right Column Track Record)
            array(
                'key' => 'field_hero_card_title',
                'label' => 'Hero Card Title',
                'name' => 'hero_card_title',
                'type' => 'text',
                'instructions' => '🏆 Title for the stats card on the right (default: "Our Track Record")',
                'default_value' => 'Our Track Record',
                'placeholder' => 'Our Track Record',
            ),
            array(
                'key' => 'field_hero_card_stats',
                'label' => 'Hero Card Stats',
                'name' => 'hero_card_stats',
                'type' => 'repeater',
                'instructions' => '📈 Stats in the white card on the right (e.g., "90%+ Acceptance Rate"). Each stat has an icon. Recommended: 3-4 stats.',
                'layout' => 'block',
                'button_label' => 'Add Stat',
                'max' => 4,
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_card_stat_icon_svg',
                        'label' => 'Icon SVG (Optional)',
                        'name' => 'icon_svg',
                        'type' => 'textarea',
                        'instructions' => 'Each stat can have a unique icon - paste SVG code here',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_hero_card_stat_number',
                        'label' => 'Number/Value',
                        'name' => 'number',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => '90%+',
                    ),
                    array(
                        'key' => 'field_hero_card_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'Acceptance Rate',
                    ),
                ),
            ),

            // ========================================
            // SECTION 2: TRUST BAR (Optional)
            // ========================================
            array(
                'key' => 'field_trust_divider',
                'label' => '✅ TRUST BAR (Optional white bar below hero)',
                'type' => 'message',
                'message' => 'Trust indicators like "Expert SHSAT Specialists", "Digital Test Ready". Leave empty to hide this section.',
            ),
            array(
                'key' => 'field_trust_bar_items',
                'label' => 'Trust Bar Items (Optional)',
                'name' => 'trust_bar_items',
                'type' => 'repeater',
                'instructions' => '🛡️ OPTIONAL: Trust badges shown below the hero. Leave empty to hide. Recommended: 3-4 items.',
                'layout' => 'block',
                'button_label' => 'Add Trust Item',
                'max' => 4,
                'sub_fields' => array(
                    array(
                        'key' => 'field_trust_item_icon_svg',
                        'label' => 'Icon SVG (Optional)',
                        'name' => 'icon_svg',
                        'type' => 'textarea',
                        'instructions' => 'Optional custom icon',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_trust_item_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'Expert SHSAT Specialists',
                    ),
                ),
            ),

            // ========================================
            // SECTION 3: COURSE DESCRIPTION
            // ========================================
            array(
                'key' => 'field_description_divider',
                'label' => '📝 COURSE DESCRIPTION (Program Timeline, Schools, etc.)',
                'type' => 'message',
                'message' => 'This is where you add your 3-module timeline, specialized schools grid, or any custom HTML content. You can use the HTML classes from your design (timeline, schools-grid, etc.)',
            ),
            array(
                'key' => 'field_course_description',
                'label' => 'Course Description Content',
                'name' => 'course_description',
                'type' => 'wysiwyg',
                'instructions' => '📖 Add your program timeline, schools list, or any custom content here. You can use HTML and the pre-built CSS classes (timeline, schools-grid, etc.). This section appears after the Trust Bar.',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),

            // ========================================
            // SECTION 4: WHY CHOOSE US (Global with Optional Override)
            // ========================================
            array(
                'key' => 'field_why_choose_divider',
                'label' => '💎 WHY CHOOSE NYC STEM CLUB (Usually the same for all courses)',
                'type' => 'message',
                'message' => 'This section shows 4 benefit boxes in a grid. By default, it shows: Proven Track Record, Comprehensive Curriculum, Small Classes, and Digital Ready. Only add custom benefits if this course needs different messaging.',
            ),
            array(
                'key' => 'field_why_choose_us',
                'label' => 'Custom Benefits (Optional Override)',
                'name' => 'why_choose_us',
                'type' => 'repeater',
                'instructions' => '🌐 OPTIONAL: Leave empty to use default global benefits. Only customize if needed (e.g., change "Digital Ready" to "Convenient Location").',
                'layout' => 'block',
                'button_label' => 'Add Custom Benefit',
                'max' => 4,
                'sub_fields' => array(
                    array(
                        'key' => 'field_benefit_icon_svg',
                        'label' => 'Icon SVG (Optional)',
                        'name' => 'icon_svg',
                        'type' => 'textarea',
                        'instructions' => 'Custom icon for this benefit',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_benefit_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'Convenient Downtown Location',
                    ),
                    array(
                        'key' => 'field_benefit_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 3,
                    ),
                ),
            ),

            // ========================================
            // SECTION 5: FAQs
            // ========================================
            array(
                'key' => 'field_faq_divider',
                'label' => '❓ FAQS SECTION (Accordion with 2-column grid)',
                'type' => 'message',
                'message' => 'Premium FAQ accordion. Customize the header or use defaults. Add your Q&A pairs below.',
            ),
            array(
                'key' => 'field_faq_badge',
                'label' => 'FAQ Badge (Optional)',
                'name' => 'faq_badge',
                'type' => 'text',
                'instructions' => 'Small badge above FAQ title (e.g., "QUESTIONS?")',
                'placeholder' => 'QUESTIONS?',
            ),
            array(
                'key' => 'field_faq_title',
                'label' => 'FAQ Title',
                'name' => 'faq_title',
                'type' => 'text',
                'instructions' => 'Main FAQ section title',
                'default_value' => 'Frequently Asked Questions',
                'placeholder' => 'Frequently Asked Questions',
            ),
            array(
                'key' => 'field_faq_subtitle',
                'label' => 'FAQ Subtitle (Optional)',
                'name' => 'faq_subtitle',
                'type' => 'text',
                'instructions' => 'Subtitle below the title',
                'placeholder' => 'Everything you need to know about...',
            ),
            array(
                'key' => 'field_course_faqs',
                'label' => 'FAQ Items',
                'name' => 'course_faqs',
                'type' => 'repeater',
                'instructions' => '❓ Add your frequently asked questions here. They display in a 2-column grid with expand/collapse.',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
                'sub_fields' => array(
                    array(
                        'key' => 'field_faq_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'When should my child start SHSAT prep?',
                    ),
                    array(
                        'key' => 'field_faq_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'wysiwyg',
                        'required' => 1,
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                ),
            ),
            array(
                'key' => 'field_faq_footer_text',
                'label' => 'FAQ Footer Text (Optional)',
                'name' => 'faq_footer_text',
                'type' => 'text',
                'instructions' => 'Text below FAQs (e.g., "Still have questions?")',
                'placeholder' => 'Still have questions?',
            ),
            array(
                'key' => 'field_faq_link_url',
                'label' => 'FAQ Link URL (Optional)',
                'name' => 'faq_link_url',
                'type' => 'url',
                'instructions' => 'Link to full FAQ page',
                'placeholder' => 'https://nycstemclub.com/faqs/',
            ),
            array(
                'key' => 'field_faq_link_text',
                'label' => 'FAQ Link Text',
                'name' => 'faq_link_text',
                'type' => 'text',
                'instructions' => 'Link text',
                'default_value' => 'View All FAQs',
                'placeholder' => 'View All FAQs',
            ),

            // ========================================
            // SECTION 6: TESTIMONIALS (Optional)
            // ========================================
            array(
                'key' => 'field_testimonials_divider',
                'label' => '⭐ TESTIMONIALS (Optional - can filter by category)',
                'type' => 'message',
                'message' => 'Add student/parent testimonials. You can tag them with categories (e.g., "SHSAT") to show only relevant ones.',
            ),
            array(
                'key' => 'field_testimonial_category_filter',
                'label' => 'Testimonial Category Filter (Optional)',
                'name' => 'testimonial_category_filter',
                'type' => 'text',
                'instructions' => '🏷️ OPTIONAL: Enter a category to show only testimonials tagged with that category (e.g., "SHSAT", "SAT", "General"). Leave empty to show all testimonials.',
                'placeholder' => 'SHSAT',
            ),
            array(
                'key' => 'field_testimonials',
                'label' => 'Testimonials (Optional)',
                'name' => 'testimonials',
                'type' => 'repeater',
                'instructions' => '💬 OPTIONAL: Add testimonials specific to this course. Leave empty to show all site testimonials.',
                'layout' => 'block',
                'button_label' => 'Add Testimonial',
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_testimonial_role',
                        'label' => 'Role/Description',
                        'name' => 'role',
                        'type' => 'text',
                        'placeholder' => 'Parent of Stuyvesant Student',
                    ),
                    array(
                        'key' => 'field_testimonial_text',
                        'label' => 'Testimonial',
                        'name' => 'text',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 4,
                    ),
                    array(
                        'key' => 'field_testimonial_category',
                        'label' => 'Category Tag',
                        'name' => 'category',
                        'type' => 'text',
                        'instructions' => 'Tag for filtering (e.g., "SHSAT", "SAT")',
                        'placeholder' => 'SHSAT',
                    ),
                ),
            ),

            // ========================================
            // SECTION 7: CTA SECTION
            // ========================================
            array(
                'key' => 'field_cta_divider',
                'label' => '🎯 FINAL CTA SECTION (Blue gradient at bottom)',
                'type' => 'message',
                'message' => 'Final call-to-action before related courses. Customize text or use defaults.',
            ),
            array(
                'key' => 'field_cta_badge',
                'label' => 'CTA Badge (Optional)',
                'name' => 'cta_badge',
                'type' => 'text',
                'instructions' => 'Badge above CTA title',
                'placeholder' => 'GET STARTED TODAY',
            ),
            array(
                'key' => 'field_cta_title',
                'label' => 'CTA Title',
                'name' => 'cta_title',
                'type' => 'text',
                'instructions' => 'Main CTA headline',
                'default_value' => 'Ready to Begin Your Journey?',
                'placeholder' => 'Ready to Begin Your Journey?',
            ),
            array(
                'key' => 'field_cta_subtitle',
                'label' => 'CTA Subtitle (Optional)',
                'name' => 'cta_subtitle',
                'type' => 'text',
                'instructions' => 'Subtitle below title',
                'placeholder' => 'Join hundreds of students who have...',
            ),
            array(
                'key' => 'field_cta_button_text',
                'label' => 'CTA Button Text (Optional)',
                'name' => 'cta_button_text',
                'type' => 'text',
                'instructions' => '🌐 Leave empty to use global "Inquire Now"',
                'placeholder' => 'Inquire Now',
            ),
            array(
                'key' => 'field_cta_button_url',
                'label' => 'CTA Button URL (Optional)',
                'name' => 'cta_button_url',
                'type' => 'url',
                'instructions' => '🌐 Leave empty to use global /student-enrollment/',
                'placeholder' => 'https://nycstemclub.local/student-enrollment/',
            ),

            // ========================================
            // SECTION 8: RELATED COURSES
            // ========================================
            array(
                'key' => 'field_related_divider',
                'label' => '🔗 RELATED COURSES (Shows at the very bottom)',
                'type' => 'message',
                'message' => 'By default, shows all other courses except this one. You can manually select specific courses or leave empty for automatic.',
            ),
            array(
                'key' => 'field_related_courses',
                'label' => 'Related Courses (Optional)',
                'name' => 'related_courses',
                'type' => 'relationship',
                'instructions' => '🔗 OPTIONAL: Leave empty to automatically show all other courses. Or select specific courses to feature.',
                'post_type' => array('course'),
                'filters' => array('search'),
                'return_format' => 'object',
            ),

            // ========================================
            // ADDITIONAL SETTINGS
            // ========================================
            array(
                'key' => 'field_additional_divider',
                'label' => '⚙️ ADDITIONAL COURSE SETTINGS',
                'type' => 'message',
                'message' => 'Price, duration, format, and global inquiry button settings.',
            ),
            array(
                'key' => 'field_course_price',
                'label' => 'Course Price',
                'name' => 'course_price',
                'type' => 'text',
                'instructions' => 'Display price (e.g., "$1,200" or "Contact for pricing")',
                'placeholder' => 'Contact for pricing',
            ),
            array(
                'key' => 'field_course_duration',
                'label' => 'Duration',
                'name' => 'course_duration',
                'type' => 'text',
                'instructions' => 'Course duration (e.g., "Year-Long (September–June)")',
                'placeholder' => 'Year-Long (September–June)',
            ),
            array(
                'key' => 'field_class_format',
                'label' => 'Class Format',
                'name' => 'class_format',
                'type' => 'checkbox',
                'instructions' => 'Select all formats available',
                'choices' => array(
                    'private' => 'Private (1-on-1)',
                    'group' => 'Group Classes',
                    'online' => 'Online',
                    'in-person' => 'In-Person',
                ),
                'layout' => 'vertical',
            ),

            // Inquiry Button Settings - GLOBAL
            array(
                'key' => 'field_inquiry_settings',
                'label' => 'Inquiry Button Settings (GLOBAL)',
                'name' => 'inquiry_settings',
                'type' => 'group',
                'instructions' => '🌐 GLOBAL: By default, all "Inquire Now" buttons link to /student-enrollment/. Only customize if this specific course needs different settings.',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_inquiry_button_text',
                        'label' => 'Button Text (Optional Override)',
                        'name' => 'inquiry_button_text',
                        'type' => 'text',
                        'instructions' => 'Leave empty for default "Inquire Now"',
                        'placeholder' => 'Inquire Now',
                    ),
                    array(
                        'key' => 'field_custom_inquiry_url',
                        'label' => 'Custom URL (Optional Override)',
                        'name' => 'custom_inquiry_url',
                        'type' => 'url',
                        'instructions' => 'Leave empty for default /student-enrollment/',
                        'placeholder' => 'https://nycstemclub.local/student-enrollment/',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}

<?php
/**
 * NYC STEM Club - Unified Blog Post Template System
 *
 * This is the MASTER template for all blog posts.
 * All modern styling, components, and utilities are here.
 *
 * Usage: Include this file, then use the helper functions to build blog content.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get the shared CSS library for all blog posts
 * This includes all modern visual components
 */
function nyc_blog_get_shared_css() {
    return <<<'CSS'
<style>
/* === TYPOGRAPHY & BASE STYLES === */
.entry-content, .post-content {
    font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
}
.entry-meta, .post-meta, .entry-footer, .post-date, .cat-links, .tags-links {
    font-size: 0.75rem !important;
    font-style: italic;
    opacity: 0.8;
}

/* === MODERN FAQ ACCORDION === */
.faq-accordion {
    margin-bottom: 1rem;
}
.faq-accordion details {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 0;
    margin-bottom: 0.75rem;
    transition: all 0.3s ease;
}
.faq-accordion details:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: #28AFCF;
}
.faq-accordion summary {
    cursor: pointer;
    padding: 1.25rem 1.5rem;
    font-weight: 600;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    user-select: none;
}
.faq-accordion summary::-webkit-details-marker {
    display: none;
}
.faq-accordion summary::after {
    content: '+';
    font-size: 1.5rem;
    color: #28AFCF;
    font-weight: 300;
    transition: transform 0.3s ease;
}
.faq-accordion details[open] summary::after {
    transform: rotate(45deg);
}
.faq-accordion .faq-answer {
    padding: 0 1.5rem 1.5rem 1.5rem;
    line-height: 1.7;
    color: #64748b;
    border-top: 1px solid #f1f5f9;
}

/* === COMPARISON CARDS (VS Layout) === */
.vs-comparison {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: 1.5rem;
    align-items: center;
    margin: 2rem 0;
}
.vs-divider {
    font-size: 2rem;
    font-weight: 700;
    color: #e2e8f0;
}
.comparison-card {
    position: relative;
    overflow: hidden;
}
.comparison-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #28AFCF, #1a8fb0);
}
.comparison-card.sat-card::before {
    background: linear-gradient(90deg, #FF7F07, #e67200);
}

/* === QUICK STATS GRID === */
.quick-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
    margin: 2rem 0;
}
.quick-stat-item {
    text-align: center;
    padding: 1.5rem 1rem;
    background: white;
    border-radius: 12px;
    border: 2px solid #f1f5f9;
    transition: all 0.3s ease;
}
.quick-stat-item:hover {
    border-color: #28AFCF;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(40, 175, 207, 0.15);
}

/* === ICON-BASED FEATURE BOXES === */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
    margin: 2rem 0 3rem 0;
}
.feature-box {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    border-left: 4px solid #28AFCF;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}
.feature-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(40, 175, 207, 0.15);
}

/* === RECOMMENDATION CARDS === */
.recommendation-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}
.recommendation-card {
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.recommendation-card.act {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    border-left: 5px solid #28AFCF;
}
.recommendation-card.sat {
    background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
    border-left: 5px solid #FF7F07;
}

/* === NUMBERED PROCESS STEPS === */
.process-steps {
    display: grid;
    gap: 1rem;
}
.process-step {
    display: flex;
    align-items: start;
    gap: 1rem;
}
.process-number {
    background: #28AFCF;
    color: white;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

/* === CALLOUT BOXES === */
.callout-box {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    border-left: 4px solid #28AFCF;
    border-radius: 12px;
    padding: 2rem 2.5rem;
    margin: 3rem 0;
    box-shadow: 0 2px 8px rgba(40, 175, 207, 0.1);
}

/* === CTA SECTION === */
.cta-section {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 3rem;
    border-radius: 16px;
    text-align: center;
    margin: 3rem 0;
}
.cta-section h2 {
    color: white !important;
    margin: 0 0 1rem 0;
}
.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 2rem;
}
.cta-button {
    display: inline-block;
    padding: 14px 32px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1rem;
}
.cta-button.primary {
    background: #FF7F07;
    color: white;
}
.cta-button.primary:hover {
    background: #e67200;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 127, 7, 0.3);
}
.cta-button.secondary {
    background: white;
    color: #134958;
}
.cta-button.secondary:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
}

/* === UNIFIED ICON GRID (Facts + Features) === */
.nyc-icon-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin: 2.5rem 0;
}
.nyc-icon-grid-item {
    background: white;
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border: 2px solid #f1f5f9;
    transition: all 0.3s ease;
}
.nyc-icon-grid-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(40, 175, 207, 0.15);
    border-color: #28AFCF;
}
.nyc-icon-grid-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    line-height: 1;
}
.nyc-icon-grid-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #134958;
    margin: 0 0 0.75rem 0;
    line-height: 1.3;
}
.nyc-icon-grid-description {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0;
}
/* Quick Fact variant (for stats/numbers) */
.nyc-icon-grid-item.fact-item .nyc-icon-grid-title {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #64748b;
    font-weight: 600;
    margin-bottom: 0.5rem;
}
.nyc-icon-grid-item.fact-item .nyc-icon-grid-description {
    font-size: 2.25rem;
    font-weight: 800;
    color: #28AFCF;
    line-height: 1.1;
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
    .faq-accordion summary {
        padding: 1rem;
        font-size: 0.95rem;
    }
    .vs-comparison {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    .vs-divider {
        display: none;
    }
    .cta-section {
        padding: 2rem 1.5rem;
    }
    .cta-buttons {
        flex-direction: column;
    }
    .cta-button {
        width: 100%;
    }
    .nyc-quick-facts {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
}
</style>
CSS;
}

/**
 * Create unified icon grid (can display facts, features, or both)
 * Matches your original Digital SAT layout
 *
 * @param array $items Array of items with 'type' => 'fact' or 'feature'
 *   - For facts: ['type' => 'fact', 'label' => '...', 'value' => '...']
 *   - For features: ['type' => 'feature', 'icon' => '...', 'title' => '...', 'description' => '...']
 */
function nyc_blog_icon_grid($items) {
    $html = '<div class="nyc-icon-grid">';

    foreach ($items as $item) {
        $type = $item['type'] ?? 'feature';

        if ($type === 'fact') {
            // Quick Fact card (label + large value)
            $label = esc_html($item['label']);
            $value = esc_html($item['value']);

            $html .= <<<HTML
    <div class="nyc-icon-grid-item fact-item">
        <div class="nyc-icon-grid-title">{$label}</div>
        <div class="nyc-icon-grid-description">{$value}</div>
    </div>
HTML;
        } else {
            // Feature card (icon + title + description)
            $icon = $item['icon'];
            $title = esc_html($item['title']);
            $description = esc_html($item['description']);

            $html .= <<<HTML
    <div class="nyc-icon-grid-item">
        <div class="nyc-icon-grid-icon">{$icon}</div>
        <h4 class="nyc-icon-grid-title">{$title}</h4>
        <p class="nyc-icon-grid-description">{$description}</p>
    </div>
HTML;
        }
    }

    $html .= '</div>';
    return $html;
}

/**
 * Create an FAQ accordion section
 */
function nyc_blog_faq_accordion($faqs) {
    $html = '<div class="faq-accordion">';

    foreach ($faqs as $faq) {
        $question = esc_html($faq['question']);
        $answer = wp_kses_post($faq['answer']);

        $html .= <<<HTML
    <details>
        <summary>{$question}</summary>
        <div class="faq-answer">
            <p>{$answer}</p>
        </div>
    </details>
HTML;
    }

    $html .= '</div>';
    return $html;
}

/**
 * Create a VS comparison layout (two cards with VS divider)
 */
function nyc_blog_vs_comparison($left_card, $right_card) {
    return <<<HTML
<div class="vs-comparison">
    <div class="comparison-card">
        {$left_card}
    </div>
    <div class="vs-divider">VS</div>
    <div class="comparison-card sat-card">
        {$right_card}
    </div>
</div>
HTML;
}

/**
 * Create recommendation cards (ACT vs SAT style)
 */
function nyc_blog_recommendation_cards($act_content, $sat_content) {
    return <<<HTML
<div class="recommendation-cards">
    <div class="recommendation-card act">
        {$act_content}
    </div>
    <div class="recommendation-card sat">
        {$sat_content}
    </div>
</div>
HTML;
}

/**
 * Create numbered process steps
 */
function nyc_blog_process_steps($steps) {
    $html = '<div class="process-steps">';

    foreach ($steps as $index => $step) {
        $number = $index + 1;
        $text = esc_html($step);

        $html .= <<<HTML
    <div class="process-step">
        <span class="process-number">{$number}</span>
        <p style="margin: 0; line-height: 1.6;">{$text}</p>
    </div>
HTML;
    }

    $html .= '</div>';
    return $html;
}

/**
 * Create a feature grid with icons
 */
function nyc_blog_feature_grid($features) {
    $html = '<div class="feature-grid">';

    foreach ($features as $feature) {
        $icon = $feature['icon'];
        $title = esc_html($feature['title']);
        $description = esc_html($feature['description']);

        $html .= <<<HTML
    <div class="feature-box">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
            <span style="font-size: 1.8rem;">{$icon}</span>
            <h4 style="margin: 0; font-size: 1.05rem; color: #134958;">{$title}</h4>
        </div>
        <p style="margin: 0; line-height: 1.6; color: #64748b; font-size: 0.95rem;">{$description}</p>
    </div>
HTML;
    }

    $html .= '</div>';
    return $html;
}

/**
 * Create a CTA section
 */
function nyc_blog_cta($title, $description, $buttons) {
    $buttons_html = '';
    foreach ($buttons as $button) {
        $text = esc_html($button['text']);
        $url = esc_url($button['url']);
        $class = $button['class'] ?? 'primary';

        $buttons_html .= <<<HTML
        <a href="{$url}" class="cta-button {$class}">{$text}</a>
HTML;
    }

    return <<<HTML
<div class="cta-section">
    <h2 style="font-size: 2rem;">{$title}</h2>
    <p style="line-height: 1.7; margin-bottom: 0;">{$description}</p>
    <div class="cta-buttons">
        {$buttons_html}
    </div>
</div>
HTML;
}

/**
 * Helper function to create a blog post
 */
function nyc_blog_create_post($args) {
    // Check if post exists
    $existing = get_page_by_path($args['slug'], OBJECT, 'post');

    $post_data = array(
        'post_title'    => $args['title'],
        'post_name'     => $args['slug'],
        'post_content'  => $args['content'],
        'post_excerpt'  => $args['excerpt'],
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_author'   => 1,
    );

    if ($existing) {
        $post_data['ID'] = $existing->ID;
        $post_id = wp_update_post($post_data);
        $action = 'updated';
    } else {
        $post_id = wp_insert_post($post_data);
        $action = 'created';
    }

    if (is_wp_error($post_id)) {
        return array('success' => false, 'error' => $post_id->get_error_message());
    }

    // Set categories
    if (!empty($args['categories'])) {
        $cat_ids = array();
        foreach ($args['categories'] as $cat_name) {
            $cat = term_exists($cat_name, 'category');
            if (!$cat) {
                $cat = wp_insert_term($cat_name, 'category');
            }
            $cat_ids[] = is_array($cat) ? $cat['term_id'] : $cat;
        }
        wp_set_post_categories($post_id, $cat_ids);
    }

    // Set tags
    if (!empty($args['tags'])) {
        wp_set_post_tags($post_id, $args['tags'], false);
    }

    // Set SEO if Yoast is available
    if (function_exists('wpseo_init') && !empty($args['seo'])) {
        if (!empty($args['seo']['title'])) {
            update_post_meta($post_id, '_yoast_wpseo_title', $args['seo']['title']);
        }
        if (!empty($args['seo']['description'])) {
            update_post_meta($post_id, '_yoast_wpseo_metadesc', $args['seo']['description']);
        }
        if (!empty($args['seo']['focus_keyword'])) {
            update_post_meta($post_id, '_yoast_wpseo_focuskw', $args['seo']['focus_keyword']);
        }
    }

    return array(
        'success' => true,
        'post_id' => $post_id,
        'action' => $action,
        'url' => get_permalink($post_id),
        'edit_url' => admin_url('post.php?post=' . $post_id . '&action=edit')
    );
}

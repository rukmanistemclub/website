<?php
/**
 * Template Name: Hunter Prep Landing Page
 * Description: Hunter College High School admissions prep landing page (hub for Hunter Admissions course category)
 * Version: 2.0
 */

get_header();
?>

<style>
    /* Reset WordPress theme width on this template */
    #primary.content-area,
    .site-main,
    .entry-content,
    article {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: #ffffff !important;
    }

    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    .hunter-page * { box-sizing: border-box; }

    /* Force brand orange on inquiry/CTA buttons */
    .hunter-page .nyc-stem-inquiry-btn,
    .hunter-page a.nyc-stem-inquiry-btn,
    .hunter-page button.nyc-stem-inquiry-btn {
        background-color: #FF7F07 !important;
        background-image: none !important;
    }

    /* ---------- Hero ---------- */
    .hunter-hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 56px 20px;
        color: #ffffff;
    }
    .hunter-hero .hp-container { max-width: 1100px; margin: 0 auto; text-align: left; }
    .hunter-hero h1 {
        font-family: 'Roboto', sans-serif;
        font-size: 32px; line-height: 1.2; font-weight: 700;
        color: #ffffff; margin: 0 0 16px 0;
    }
    .hunter-hero .hp-sub {
        font-size: 17px; line-height: 1.6; color: #ffffff;
        max-width: 920px; margin: 0 0 24px 0;
    }
    .hunter-hero .hp-eyebrow {
        display: inline-block; background: #FF7F07; color: #ffffff;
        font-size: 13px; font-weight: 800; letter-spacing: 0.05em;
        text-transform: uppercase; padding: 6px 12px; margin-bottom: 16px;
    }
    .hunter-hero .hp-points { list-style: none; padding: 0; margin: 0 0 26px 0; }
    .hunter-hero .hp-points li {
        font-size: 16px; font-weight: 600; margin-bottom: 8px;
        padding-left: 26px; position: relative;
    }
    .hunter-hero .hp-points li:before {
        content: "\2713"; position: absolute; left: 0; color: #FFC785; font-weight: 800;
    }
    .hunter-hero .hp-buttons { display: flex; flex-wrap: wrap; gap: 14px; }

    /* ---------- Sections ---------- */
    .hp-section { padding: 50px 20px; background: #ffffff; }
    .hp-section-alt { padding: 50px 20px; background: #EBFCFF; }
    .hp-container { max-width: 1100px; margin: 0 auto; }
    .hp-section h2, .hp-section-alt h2 {
        font-family: 'Roboto', sans-serif; font-size: 28px; font-weight: 700;
        color: #134958; margin: 0 0 18px 0;
    }
    .hp-section h3, .hp-section-alt h3 { font-size: 20px; color: #134958; margin: 0 0 10px 0; }
    .hp-section p, .hp-section-alt p { font-size: 16px; line-height: 1.7; color: #333; margin: 0 0 16px 0; }
    .hp-section a, .hp-section-alt a { color: #28AFCF; font-weight: 600; }

    /* ---------- Cards ---------- */
    .hp-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-top: 24px; }
    .hp-card { background: #ffffff; border: 1px solid #e3eef1; border-top: 4px solid #FF7F07; padding: 24px; }
    .hp-card ul { margin: 0; padding-left: 20px; }
    .hp-card li { font-size: 16px; line-height: 1.7; color: #333; margin-bottom: 6px; }

    /* ---------- Callout ---------- */
    .hp-callout {
        background: #fff6ee; border-left: 5px solid #FF7F07; padding: 16px 20px;
        margin: 20px 0; font-size: 16px; line-height: 1.6; color: #333;
    }

    /* ---------- FAQ ---------- */
    .hp-faq details {
        border: 1px solid #e3eef1; border-left: 4px solid #28AFCF; margin-bottom: 12px; background: #ffffff;
    }
    .hp-faq summary {
        cursor: pointer; padding: 16px 20px; font-weight: 700; color: #134958; font-size: 17px; list-style: none;
    }
    .hp-faq summary::-webkit-details-marker { display: none; }
    .hp-faq summary:after { content: "+"; float: right; color: #FF7F07; font-weight: 800; }
    .hp-faq details[open] summary:after { content: "\2013"; }
    .hp-faq .hp-faq-body { padding: 0 20px 18px 20px; font-size: 16px; line-height: 1.7; color: #333; }

    /* ---------- CTA ---------- */
    .hp-cta { background: linear-gradient(135deg, #134958 0%, #1B6B81 100%); color: #ffffff; text-align: center; padding: 50px 20px; }
    .hp-cta h2 { color: #ffffff; }
    .hp-cta p { color: #ffffff; max-width: 720px; margin: 0 auto 24px auto; }
    .hp-buttons-center { display: flex; flex-wrap: wrap; gap: 14px; justify-content: center; margin-top: 10px; }

    /* ---------- Responsive ---------- */
    @media (min-width: 768px) {
        .hunter-hero h1 { font-size: 42px; }
        .hunter-hero .hp-sub { font-size: 19px; }
    }
    @media (max-width: 768px) {
        .hp-grid { grid-template-columns: 1fr; }
    }

    /* Program cards: force 2 wide columns (plugin defaults to 4) and blend into the section */
    .hunter-page .course-related { padding: 8px 0 0 0 !important; background: transparent !important; }
    .hunter-page .course-related .related-container { max-width: 100% !important; padding: 0 !important; }
    .hunter-page .course-related .related-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        max-width: 100% !important;
        gap: 24px !important;
        margin: 0 !important;
    }
    .hunter-page .course-related .related-title { display: none !important; }
    @media (max-width: 768px) {
        .hunter-page .course-related .related-grid { grid-template-columns: 1fr !important; }
    }
</style>

<article class="hunter-page">

    <!-- Hero -->
    <section class="hunter-hero">
        <div class="hp-container">
            <span class="hp-eyebrow">Hunter College High School Admissions</span>
            <h1>Hunter College High School Prep</h1>
            <p class="hp-sub" style="color: #ffffff !important;">Preparation for the <strong style="color: #ffffff !important;">Hunter College High School entrance exam</strong> &mdash; from building the foundation the summer before, to training for the January test in 6th grade. Small in-person classes at our downtown Manhattan center, with the teachers who prepare our SHSAT and ISEE students.</p>
            <ul class="hp-points">
                <li>Built for the updated 2026 Hunter exam format</li>
                <li>A clear path: summer foundation &rarr; fall exam prep</li>
                <li>Small in-person classes at 65 Broadway, Lower Manhattan</li>
            </ul>
            <div class="hp-buttons">
                <?php echo do_shortcode('[inquiry_button text="Inquire Now"]'); ?>
                <?php echo do_shortcode('[inquiry_button text="Jump to Programs" url="#hunter-programs" color="teal"]'); ?>
            </div>
        </div>
    </section>

    <!-- About the Hunter exam -->
    <section class="hp-section">
        <div class="hp-container">
            <h2>About the Hunter exam</h2>
            <p>Hunter College High School admits students for <strong>7th-grade entry</strong> through a single entrance exam taken in <strong>January of 6th grade</strong>. Eligibility to sit the exam is based on a student's <strong>5th-grade New York State ELA and Math scores</strong> (qualifying cutoffs are set each year). It is one of the most competitive admissions tests in the city.</p>

            <div class="hp-grid">
                <div class="hp-card">
                    <h3>English</h3>
                    <ul>
                        <li><strong>Reading Comprehension</strong> &mdash; passages with multiple-choice questions on interpretation and analysis</li>
                        <li><strong>Writing Assignment</strong> &mdash; an essay or personal story written to an assigned prompt</li>
                    </ul>
                </div>
                <div class="hp-card">
                    <h3>Mathematics</h3>
                    <ul>
                        <li><strong>Quantitative Reasoning</strong> and <strong>Mathematics Achievement</strong></li>
                        <li>As of 2026, the math draws on the <strong>ISEE Middle Level</strong> framework</li>
                    </ul>
                </div>
            </div>

            <div class="hp-callout">
                <strong>Note:</strong> the exam format and timing are set by Hunter and can change year to year. For official specifics, we direct families to the <a href="https://www.hunterschools.org/high-school/admissions" target="_blank" rel="noopener">Hunter College High School admissions page</a>, which we follow closely &mdash; and we prepare students for it directly.
            </div>
        </div>
    </section>

    <!-- Programs (course cards) -->
    <section class="hp-section-alt" id="hunter-programs">
        <div class="hp-container">
            <h2>Our Hunter programs</h2>
            <p>Two programs that build on each other: a summer foundation for rising 6th graders, then the fall course that trains directly for the January exam.</p>
            <?php echo do_shortcode('[course_category category="hunter-admissions" title="Hunter Admissions Programs" columns="2"]'); ?>
        </div>
    </section>

    <!-- How we prepare -->
    <section class="hp-section">
        <div class="hp-container">
            <h2>How we prepare students</h2>
            <div class="hp-grid">
                <div class="hp-card">
                    <h3>Start with a baseline</h3>
                    <p style="margin:0;">Every student begins with a Math + ELA assessment so we can see exactly where they stand and build a targeted plan, with a score breakdown and a class recommendation.</p>
                </div>
                <div class="hp-card">
                    <h3>Cover all three demands</h3>
                    <p style="margin:0;">Reading comprehension, the timed writing assignment, and ISEE-style math are distinct skills. We work all three in parallel, under realistic conditions.</p>
                </div>
                <div class="hp-card">
                    <h3>Write, don't just answer</h3>
                    <p style="margin:0;">The writing assignment is where many strong students lose ground. We coach structure, voice, and timing so students can produce a complete, polished piece to a prompt.</p>
                </div>
                <div class="hp-card">
                    <h3>Small classes, expert teachers</h3>
                    <p style="margin:0;">Classes are small and in-person at our 65 Broadway center, with the same experienced teachers who prepare our SHSAT and ISEE students.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="hp-section-alt">
        <div class="hp-container">
            <h2>Frequently asked questions</h2>
            <div class="hp-faq">
                <details>
                    <summary>When is the Hunter exam, and what grade takes it?</summary>
                    <div class="hp-faq-body">Students take the Hunter College High School entrance exam in <strong>January of 6th grade</strong> for entry into 7th grade.</div>
                </details>
                <details>
                    <summary>How does my child become eligible to sit the exam?</summary>
                    <div class="hp-faq-body">Eligibility is based on your child's <strong>5th-grade New York State ELA and Math scores</strong>, with qualifying cutoffs set each year. For official details we direct families to the <a href="https://www.hunterschools.org/high-school/admissions" target="_blank" rel="noopener">Hunter admissions page</a>.</div>
                </details>
                <details>
                    <summary>What's on the exam?</summary>
                    <div class="hp-faq-body">English &mdash; <strong>Reading Comprehension</strong> and a <strong>Writing Assignment</strong> &mdash; plus Mathematics. As of 2026 the math draws on the <strong>ISEE Middle Level</strong> framework. Exact format and timing are set by Hunter and can change year to year.</div>
                </details>
                <details>
                    <summary>Which program should my child start with?</summary>
                    <div class="hp-faq-body">Rising 6th graders benefit from the <strong>Pre-Hunter Summer Intensive</strong> to build the foundation, then roll into <strong>Fall Hunter Prep</strong> for direct exam preparation. Not sure? Start with a baseline assessment and we'll recommend the right track.</div>
                </details>
                <details>
                    <summary>Where are classes held?</summary>
                    <div class="hp-faq-body">In person at our center at <strong>65 Broadway, Suite 1105</strong>, in Lower Manhattan. If the schedule doesn't fit, ask us about private instruction, which can be done remotely if needed.</div>
                </details>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="hp-cta">
        <div class="hp-container">
            <h2 style="color: #ffffff !important;">Ready to prepare for Hunter?</h2>
            <p style="color: #ffffff !important;">Start with a baseline assessment and we'll build the right plan for your child. Classes are small and fill on a rolling basis.</p>
            <div class="hp-buttons-center">
                <?php echo do_shortcode('[inquiry_button text="Inquire Now"]'); ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <?php echo do_shortcode('[testimonials]'); ?>

</article>

<?php
$hunter_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Hunter College High School Admissions Prep',
    'description' => 'Preparation for the Hunter College High School entrance exam: a Pre-Hunter summer intensive for rising 6th graders and a fall Hunter Prep program covering reading comprehension, the writing assignment, and ISEE Middle Level mathematics, taught in small in-person classes in Lower Manhattan.',
    'serviceType' => 'Test Preparation',
    'provider' => array(
        '@type' => 'EducationalOrganization',
        'name' => 'NYC STEM Club',
        'url' => 'https://nycstemclub.com'
    )
);
echo '<script type="application/ld+json">' . wp_json_encode($hunter_schema, JSON_UNESCAPED_SLASHES) . '</script>';

get_footer(); ?>

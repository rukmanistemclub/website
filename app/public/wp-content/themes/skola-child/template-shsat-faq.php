<?php
/**
 * Template Name: SHSAT FAQ - Redesigned
 * Description: Beautiful FAQ page matching site aesthetic
 */

get_header();
?>

<style>
    /* Reset WordPress theme styles */
    #primary.content-area,
    .site-main,
    .entry-content,
    article {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: white !important;
    }

    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.8;
        color: #2d3748;
    }

    /* Hero Section */
    .faq-hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 40px 10px;
        text-align: center;
    }

    .faq-hero h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        line-height: 1.2;
        color: white;
    }

    .faq-hero .subtitle {
        font-size: 1.2rem;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto;
    }

    /* FAQ Container */
    .faq-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 10px;
    }

    .faq-intro {
        text-align: center;
        margin-bottom: 30px;
    }

    .faq-intro h2 {
        font-size: 2rem;
        color: #134958;
        margin-bottom: 15px;
    }

    .faq-intro p {
        font-size: 1.1rem;
        color: #666;
    }

    /* FAQ Items */
    .faq-item {
        background: white;
        border: 3px solid #28AFCF;
        border-radius: 12px;
        margin-bottom: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item:nth-child(3n+2) {
        border-color: #FF7F07;
    }

    .faq-item:nth-child(3n+3) {
        border-color: #F0B268;
    }

    .faq-item:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .faq-question {
        background: linear-gradient(to right, #f8f9fa, #ffffff);
        padding: 12px 15px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: #134958;
        transition: all 0.3s;
    }

    .faq-question:hover {
        background: linear-gradient(to right, #e8f5f7, #f8f9fa);
    }

    .faq-question.active {
        background: linear-gradient(to right, #28AFCF, #1a9bb5);
        color: white;
    }

    .faq-toggle {
        font-size: 1.5rem;
        font-weight: 700;
        transition: transform 0.3s;
        flex-shrink: 0;
        margin-left: 20px;
    }

    .faq-question.active .faq-toggle {
        transform: rotate(45deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.4s ease;
        padding: 0 6px;
    }

    .faq-answer.active {
        max-height: 3000px;
        padding: 12px 16px;
        border-top: 2px solid #e8f5f7;
    }

    /* Paragraphs - tight spacing with small gap after */
    .faq-answer p {
        margin: 0 0 0.75rem 0 !important;
        padding: 0 1.5rem !important;
        line-height: 1.7 !important;
        color: #64748b !important;
    }

    /* Paragraph after paragraph - no extra gap (bottom margin handles it) */
    .faq-answer p + p {
        margin-top: 0 !important;
    }

    /* Lists/tables immediately after paragraph - no gap */
    .faq-answer p + ul,
    .faq-answer p + ol {
        margin-top: -2px;
    }

    .faq-answer p + table {
        margin-top: -2px;
    }

    /* Paragraph after list/table - proper spacing */
    .faq-answer ul + p,
    .faq-answer ol + p {
        margin-top: 12px;
    }

    .faq-answer table + p {
        margin-top: 10px;
    }

    /* Strong tags (subheadings) */
    .faq-answer p strong {
        color: #134958;
        font-weight: 700;
    }

    /* Lists - match SAT-ACT page spacing */
    .faq-answer ul,
    .faq-answer ol {
        margin: 0 0 0.75rem 2rem;
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        list-style: none;
        color: #64748b;
        line-height: 1.7;
    }

    /* List items - comfortable spacing like SAT-ACT page */
    .faq-answer ul li {
        margin-bottom: 0.5rem;
        line-height: 1.7;
        padding-left: 1.5rem;
        position: relative;
    }

    .faq-answer ul li:before {
        content: "›";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-size: 1.4em;
    }

    /* Ordered list items */
    .faq-answer ol li {
        margin-bottom: 0.5rem;
        line-height: 1.7;
        padding-left: 1.5rem;
        position: relative;
    }

    /* Remove extra margins on first/last elements */
    .faq-answer > *:first-child {
        margin-top: 0 !important;
    }

    .faq-answer > *:last-child {
        margin-bottom: 0 !important;
    }

    /* Tables - compact and indented like bullets */
    .faq-answer table {
        width: 100%;
        max-width: 650px;
        border-collapse: collapse;
        margin: 0 0 10px 35px;
        background: #f8f9fa;
        font-size: 0.75em;
    }

    .faq-answer table th,
    .faq-answer table td {
        padding: 5px 7px;
        text-align: left;
        border: 1px solid #ddd;
    }

    /* First column - wider for section names */
    .faq-answer table th:first-child,
    .faq-answer table td:first-child {
        width: 35%;
        padding: 5px 4px;
        text-align: left;
    }

    /* Second column - smaller */
    .faq-answer table th:nth-child(2),
    .faq-answer table td:nth-child(2) {
        width: 20%;
        text-align: left;
        padding-left: 8px;
    }

    /* Third column - smaller */
    .faq-answer table th:nth-child(3),
    .faq-answer table td:nth-child(3) {
        width: 20%;
        text-align: left;
        padding-left: 8px;
    }

    /* Fourth column - wider */
    .faq-answer table th:nth-child(4),
    .faq-answer table td:nth-child(4) {
        width: 25%;
        text-align: left;
        padding-left: 8px;
    }

    /* Any additional columns */
    .faq-answer table th:nth-child(n+5),
    .faq-answer table td:nth-child(n+5) {
        width: auto;
        text-align: center;
    }

    .faq-answer table th {
        background: #28AFCF;
        color: white;
        font-weight: 700;
    }

    .faq-answer table tr:nth-child(even) {
        background: white;
    }

    /* Testimonials Section */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 40px 10px;
        margin: 30px 0;
    }

    .nyc-testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .nyc-testimonials-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #134958;
        text-align: center;
        margin-bottom: 40px;
    }

    .nyc-testimonials-content {
        margin: 0 auto;
    }

    /* CTA Section */
    .faq-cta {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        text-align: center;
        padding: 30px 10px;
        margin-top: 40px;
    }

    .faq-cta h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .faq-cta p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-btn {
        background: #FF9574;
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .cta-btn:hover {
        background: #e66f00;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(255, 127, 7, 0.3);
        color: white;
        text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .faq-hero h1 {
            font-size: 2rem;
        }

        .faq-hero .subtitle {
            font-size: 1rem;
        }

        .faq-container {
            padding: 20px 7px;
        }

        .faq-question {
            font-size: 1rem;
            padding: 10px;
        }

        .faq-answer.active {
            padding: 10px 12px;
        }

        .nyc-testimonials-section {
            padding: 30px 10px;
        }

        .nyc-testimonials-title {
            font-size: 2rem;
        }

        .faq-cta h2 {
            font-size: 1.5rem;
        }
    }
</style>

<article>
    <div class="faq-wrapper">

        <!-- Hero Section -->
        <section class="faq-hero">
            <h1>SHSAT – Frequently Asked Questions (FAQs)</h1>
            <p class="subtitle">Get answers to the most common questions about SHSAT preparation, test format, specialized high schools, and the admissions process.</p>
        </section>

        <!-- FAQ Container -->
        <div class="faq-container">

            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>When should my child start SHSAT prep?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>We recommend starting <strong>at least one year before the test date</strong>—typically beginning in 7th grade if your child will take the test in 8th grade. This timeline allows students to:</p>
                    <ul>
                        <li>Build strong foundations in math and reading</li>
                        <li>Learn test-taking strategies specific to the SHSAT</li>
                        <li>Get exposure to the SHSAT digital test platform and format</li>
                        <li>Identify and strengthen weak areas</li>
                        <li>Build confidence and stamina</li>
                    </ul>
                    <p>That said, students can start at any time. We offer programs ranging from year-long courses to intensive 3-month bootcamps.</p>
                    <p><strong>Timeline recommendations:</strong></p>
                    <ul>
                        <li><strong>12+ months:</strong> Ideal – Year-long program + bootcamps</li>
                        <li><strong>6-9 months:</strong> Great – Semester program + summer/fall bootcamp</li>
                        <li><strong>3-6 months:</strong> Good – Intensive bootcamp</li>
                        <li><strong>Under 3 months:</strong> Possible – Crash course bootcamp</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can my child take the SHSAT more than once?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>No.</strong> Students get one opportunity to take the SHSAT—either in 8th grade (for 9th grade admission) or in 9th grade (for 10th grade admission). There are no retakes or second chances, which makes proper preparation absolutely essential.</p>
                    <p>This one-shot policy is why we emphasize:</p>
                    <ul>
                        <li>Starting preparation early</li>
                        <li>Taking multiple practice tests</li>
                        <li>Building stamina and confidence before test day</li>
                        <li>Having backup school plans</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What score does my child need to get into Stuyvesant?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>How Admissions Work:</strong><br>
                    Offers to specialized high schools are made in descending order of SHSAT score, combined with each student's school preferences. The student with the highest score gets their first choice. This continues until a school fills up, then lower-scoring students are considered for their second choice, and so on. The SHSAT score is the only criteria used for admission.</p>

                    <p><strong>Recent Cutoff Scores:</strong></p>
                    <table>
                        <thead>
                            <tr>
                                <th>School</th>
                                <th>2021</th>
                                <th>2022</th>
                                <th>2023</th>
                                <th>2024</th>
                                <th>2025</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Stuyvesant</strong></td>
                                <td>559</td>
                                <td>563</td>
                                <td>561</td>
                                <td>561</td>
                                <td>556</td>
                            </tr>
                            <tr>
                                <td><strong>Bronx Science</strong></td>
                                <td>517</td>
                                <td>524</td>
                                <td>521</td>
                                <td>526</td>
                                <td>518</td>
                            </tr>
                            <tr>
                                <td><strong>Brooklyn Tech</strong></td>
                                <td>493</td>
                                <td>506</td>
                                <td>503</td>
                                <td>507</td>
                                <td>505</td>
                            </tr>
                            <tr>
                                <td><strong>Staten Island Tech</strong></td>
                                <td>519</td>
                                <td>525</td>
                                <td>519</td>
                                <td>523</td>
                                <td>515</td>
                            </tr>
                            <tr>
                                <td><strong>HSMSE @ CCNY</strong></td>
                                <td>493</td>
                                <td>504</td>
                                <td>500</td>
                                <td>505</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td><strong>HSAS @ Lehman</strong></td>
                                <td>509</td>
                                <td>516</td>
                                <td>512</td>
                                <td>514</td>
                                <td>508</td>
                            </tr>
                            <tr>
                                <td><strong>Brooklyn Latin</strong></td>
                                <td>483</td>
                                <td>493</td>
                                <td>488</td>
                                <td>491</td>
                                <td>487</td>
                            </tr>
                            <tr>
                                <td><strong>Queens Sci @ York</strong></td>
                                <td>530</td>
                                <td>537</td>
                                <td>532</td>
                                <td>536</td>
                                <td>528</td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>Our Recommendation:</strong> Aim for <strong>590+</strong> to ensure admission even if cutoffs rise or to counter any test-day score variation. The cutoff is the <em>lowest</em> score that received an offer—students with higher scores have better chances.</p>

                    <p><em>Note: Cutoffs change each year based on the testing pool's scores and school preferences. The table shows the minimum qualifying scores for recent years.</em></p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>I scored 570 on the SHSAT (which is above Stuyvesant's cutoff) but I ranked Brooklyn Tech higher on my list because I thought it would be strategically safe to rank a safety school. Will I still get into Stuyvesant?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>No.</strong> Even though your score qualifies you for Stuyvesant, you will be placed at Brooklyn Tech because you ranked it higher.</p>

                    <p><strong>The most important rule:</strong> Always rank your true first choice first. There is no "strategic advantage" to ranking a safety school higher—this approach actually prevents you from getting into your top choice.</p>

                    <p><strong>Here's why your strategy backfired:</strong></p>
                    <p>Your ranking does NOT affect your chances of getting in anywhere—it only determines which school you're placed at among the ones you qualify for.</p>

                    <p><strong>How the system actually works:</strong></p>
                    <p>The system goes through your ranked list from top to bottom and places you at the first school where your score meets or exceeds the cutoff. Once you're placed, it stops immediately and never reconsiders.</p>

                    <p><strong>In your case:</strong></p>
                    <ul>
                        <li>Your score: 570</li>
                        <li>Stuyvesant's cutoff: 560</li>
                        <li>Brooklyn Tech's cutoff: 520</li>
                    </ul>

                    <p><strong>Since you ranked Brooklyn Tech #1, Stuyvesant #2:</strong></p>
                    <ul>
                        <li>System checks Brooklyn Tech first: 570 &gt;= 520 ✓ &rarr; You're placed at Brooklyn Tech</li>
                        <li>System stops here and never looks at Stuyvesant, even though you scored well above their cutoff</li>
                    </ul>

                    <p><strong>If you had ranked Stuyvesant #1, Brooklyn Tech #2:</strong></p>
                    <ul>
                        <li>System checks Stuyvesant first: 570 &gt;= 560 ✓ &rarr; You'd be placed at Stuyvesant</li>
                    </ul>

                    <p><strong>Important general rule:</strong> If you rank ANY school above Stuyvesant and your score is high enough to get into that school, you are NOT getting into Stuyvesant—even if you scored well above Stuyvesant's cutoff. The system places you at the first school on your list where you meet the cutoff and stops there.</p>

                    <p><strong>The key lesson:</strong> There's no such thing as "playing it safe" with your rankings. You can't increase your overall chances of getting into a specialized high school by ranking strategically. If your score is high enough for your top choice, you'll get in. If it's not, ranking it lower wouldn't have helped anyway—you simply wouldn't qualify regardless of where you ranked it.</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>How long is the SHSAT? What's the format?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Test Overview:</strong><br>
                    The Specialized High Schools Admissions Test (SHSAT) is a three-hour, computer-based exam with two sections: English Language Arts (ELA) and Mathematics. Starting in fall 2025, the SHSAT transitioned to a fully digital format with universal accessibility features and tech-enhanced question types.</p>

                    <p><strong>Test Length:</strong></p>
                    <ul>
                        <li>Standard time: 180 minutes (3 hours) total</li>
                        <li>Extended time: 1.5x or double time available for eligible students</li>
                        <li>Flexible timing: Students can allocate time between sections as they choose (no fixed time per section)</li>
                    </ul>

                    <p><strong>Test Structure:</strong></p>
                    <table>
                        <thead>
                            <tr>
                                <th>Section</th>
                                <th>Total Items</th>
                                <th>Scored Items</th>
                                <th>Field-Test Items*</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>English Language Arts</td>
                                <td>57 questions</td>
                                <td>47 scored</td>
                                <td>10 unscored</td>
                            </tr>
                            <tr>
                                <td>Mathematics</td>
                                <td>57 questions</td>
                                <td>47 scored</td>
                                <td>10 unscored</td>
                            </tr>
                        </tbody>
                    </table>
                    <p><em>*Field-test items are experimental questions used to develop future tests. Students cannot identify which questions are field-test items, so they should answer every question.</em></p>

                    <p><strong>ELA Section Content:</strong></p>
                    <ul>
                        <li>Reading Comprehension: 5-6 passages covering diverse topics</li>
                        <li>Literary texts, poetry, and informational passages</li>
                        <li>Science, history, social studies, and philosophy topics</li>
                        <li>Revising/Editing: Grammar and editing skills</li>
                        <li>Identifying and correcting errors</li>
                        <li>Improving sentence structure and clarity</li>
                    </ul>

                    <p><strong>Math Section Content:</strong></p>
                    <ul>
                        <li>Word problems and computational problems</li>
                        <li>Topics covered: Arithmetic, algebra, geometry, probability, statistics, and more</li>
                        <li>Majority of questions align with 8th-grade math curriculum, with some advanced concepts</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Is the SHSAT still a paper test, or is it digital now?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Starting in fall 2025, the SHSAT is now <strong>fully digital</strong> and taken on a computer. This change aligns with other major standardized tests like the SAT, PSAT, and New York State tests, which have all moved to computer-based formats.</p>

                    <p><strong>What This Means for Your Child:</strong></p>
                    <p>The digital format allows students to:</p>
                    <ul>
                        <li>Move freely between questions and sections (just like paper tests)</li>
                        <li>Zoom, highlight, and take notes on the digital platform</li>
                        <li>Flag questions to review later</li>
                        <li>Choose which section (ELA or Math) to start with</li>
                    </ul>

                    <p><strong>"My child isn't comfortable with computers – will they be okay?"</strong></p>
                    <p>This is a common concern! Here's the good news:</p>
                    <ul>
                        <li>Free online practice tests are available that look exactly like the real test</li>
                        <li>Students can practice as many times as they want before test day</li>
                    </ul>

                    <p><strong>How NYC STEM CLUB Prepares Students:</strong></p>
                    <p>We integrate digital test practice throughout our program:</p>
                    <ul>
                        <li>Students take full-length practice tests on computer to build familiarity</li>
                        <li>We teach students how to use the digital tools strategically (highlighting key info, using the notepad for math work)</li>
                        <li>Practice with navigating between questions efficiently</li>
                        <li>Build stamina for screen-based testing (different from paper tests)</li>
                    </ul>
                    <p>By test day, our students are completely comfortable with the digital format – they know exactly what to expect and how to use the tools to their advantage.</p>

                    <p><strong>Important Details:</strong></p>
                    <ul>
                        <li>Students take the test on DOE-provided computers (at their school or at a testing center)</li>
                        <li>Cannot use personal devices</li>
                        <li>Practice Resources: NYC SHSAT Practice Tests | Tutorial</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What challenges did students face when practicing with the digital SHSAT format?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Since we've been preparing students with computer-based practice tests throughout 2025, we've seen several common challenges – and how students overcome them with practice.</p>

                    <p><strong>Screen Fatigue</strong></p>
                    <ul>
                        <li>Students initially experienced tired eyes and difficulty focusing after 30-40 minutes</li>
                        <li>With practice, most adapt to reading comfortably for the full 90-minute session</li>
                        <li>We teach strategies like micro-breaks, strategic highlighting, using elimination strategies, and flagging questions to return to later</li>
                    </ul>

                    <p><strong>Digital Math Scratch Work</strong></p>
                    <ul>
                        <li>The digital notepad is awkward compared to paper</li>
                        <li>Students now organize their work systematically on scratch paper they are provided and know how to work with both mediums to maximize their outcomes</li>
                        <li>Practice with tech-enhanced math items (drag-and-drop, graphing tools) builds confidence</li>
                    </ul>

                    <p><strong>Navigation and Time Management</strong></p>
                    <ul>
                        <li>Initial confusion about flagging questions and toggling between sections</li>
                        <li>After several practice tests, navigation becomes automatic</li>
                        <li>Students learn to use the digital timer and pacing strategies effectively</li>
                    </ul>

                    <p><strong>Over-Using Digital Tools</strong></p>
                    <ul>
                        <li>Students initially highlighted too much or got distracted by features</li>
                        <li>We teach strategic tool use: highlight only key phrases, flag only truly difficult questions</li>
                        <li>Tools become helpful aids rather than distractions</li>
                    </ul>

                    <p><strong>The Bottom Line:</strong><br>
                    These challenges can be best mitigated by proper practice. The students who will struggle most are those who practice only on paper and walk into a digital test cold. Set them up with the right tools for success.</p>

                    <p>Students who have been with us for over 6 months have had ample practice with the digital format and are very comfortable with navigating the test and pacing themselves.</p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What if my child is struggling in math or reading?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>This is exactly why we recommend starting early! Our year-long program is designed to:</p>
                    <ul>
                        <li>Identify gaps in foundational knowledge</li>
                        <li>Build skills systematically</li>
                        <li>Provide extra support in weak areas</li>
                        <li>Boost confidence over time</li>
                    </ul>

                    <p>Students who struggle initially often show the most dramatic improvement. With proper instruction and practice, we've helped countless students overcome challenges and achieve their goals. Some of our students have had dramatic 200-250 point score increases.</p>

                    <p>We also offer:</p>
                    <ul>
                        <li>Diagnostic testing to identify specific weaknesses</li>
                        <li>Small group instruction for personalized attention</li>
                        <li>Additional practice materials for struggling students</li>
                        <li>One-on-one tutoring options (if needed)</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 10 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Do you offer online SHSAT prep?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Yes!</strong> We offer both in-person classes at our Manhattan Financial District location and live online instruction.</p>

                    <ul>
                        <li><strong>In-person:</strong> Small group classes at our Financial District location</li>
                        <li><strong>Online:</strong> Primarily 1-on-1 instruction, with group classes available when we have multiple students requesting virtual sessions</li>
                    </ul>

                    <p>Both formats include:</p>
                    <ul>
                        <li>Comprehensive curriculum</li>
                        <li>Same expert instructors</li>
                        <li>Same practice materials</li>
                        <li>Same proven results</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 11 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>How much does SHSAT prep cost?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Our programs are tailored to each student's needs, so pricing varies based on:</p>
                    <ul>
                        <li>Program length (year-long foundational program vs. intensive bootcamp)</li>
                        <li>Class size (small group vs. 1-on-1)</li>
                        <li>Format (in-person vs. online)</li>
                    </ul>
                    <p>For current pricing and to discuss which program is right for your child, please fill out our <a href="/student-enrollment/" style="color: #28AFCF; text-decoration: underline;">enrollment form</a>.</p>
                </div>
            </div>

            <!-- FAQ Item 12 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Which specialized high school is best?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>There's no single "best" school – it depends on your child's interests and strengths:</p>

                    <p><strong>Stuyvesant High School – Manhattan</strong></p>
                    <ul>
                        <li>Most competitive (highest cutoff scores)</li>
                        <li>Strong STEM focus</li>
                        <li>Elite college placement</li>
                        <li>Very large school (~3,000 students)</li>
                        <li>Best for: Self-driven, organized and academically driven students who thrive in competitive environments</li>
                    </ul>

                    <p><strong>Bronx High School of Science – The Bronx</strong></p>
                    <ul>
                        <li>Strong science research program</li>
                        <li>Excellent STEM and humanities</li>
                        <li>Best Debate team in the country with Science research programs</li>
                        <li>Most number of Nobel Laureates and Pulitzer Prize winners any single High School has produced in the world.</li>
                    </ul>

                    <p><strong>Brooklyn Technical High School – Brooklyn</strong></p>
                    <ul>
                        <li>Largest specialized high school</li>
                        <li>Multiple technical majors (engineering, architecture, etc.)</li>
                        <li>Strong career preparation</li>
                        <li>Best for: Students with specific technical interests</li>
                    </ul>

                    <p><strong>Other Specialized Schools:</strong></p>
                    <ul>
                        <li>Smaller, more intimate settings</li>
                        <li>Excellent academics and college placement</li>
                        <li>Good fit for students who prefer smaller schools and specialty such as tech (SI Tech, HSMSE) or Humanities (HSAS, Brooklyn Latin etc.)</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Item 11 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What's the difference between the SHSAT and ISEE?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Many NYC families prepare for both tests simultaneously. Here's how they differ:</p>

                    <table>
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>SHSAT</th>
                                <th>Upper Level ISEE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Purpose</td>
                                <td>NYC public specialized high schools</td>
                                <td>Private school admissions</td>
                            </tr>
                            <tr>
                                <td>Schools</td>
                                <td>8 specialized high schools</td>
                                <td>200+ private schools nationwide</td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>Free</td>
                                <td>~$225</td>
                            </tr>
                            <tr>
                                <td>Retakes</td>
                                <td>Once only (8th or 9th grade)</td>
                                <td>3 times per year</td>
                            </tr>
                            <tr>
                                <td>Sections</td>
                                <td>ELA + Math (2 sections)</td>
                                <td>Verbal + Quant + Reading + Math + Essay (5 sections)</td>
                            </tr>
                            <tr>
                                <td>Length</td>
                                <td>3 hours</td>
                                <td>~3 hours</td>
                            </tr>
                            <tr>
                                <td>Scoring</td>
                                <td>400-800 scale</td>
                                <td>Percentile rankings (Stanine Score)</td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>Good news:</strong> The content overlaps significantly. Students preparing for the SHSAT are also well-prepared for the ISEE, and vice versa. Many of our students take both tests to maximize their school options.</p>
                </div>
            </div>

            <!-- FAQ Item 12 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Should my child also prepare for private schools?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Absolutely!</strong> We recommend a multi-pronged approach:</p>

                    <ol>
                        <li><strong>Specialized high schools (via SHSAT)</strong> – Tuition-free, excellent education</li>

                        <li><strong>Private schools (via ISEE)</strong> – Small classes, extensive resources. Our students have done very well on the ISEE and many have secured admissions to top schools like Trinity, Dalton, Collegiate, Brearley, Riverdale, Horace Mann, and other private and boarding schools. NYC STEM CLUB provides admissions counseling and interview/essay prep as well.</li>

                        <li><strong>Catholic schools (via TACHS/HSPT)</strong> – SHSAT students require minimal additional prep for Catholic school entrance exams. Most students take 1-2 practice tests to familiarize themselves with the format and may need just 1-2 private sessions at most. Our students have been accepted to Regis, Loyola, Dominican Academy, Notre Dame, Xavier, St. Peter's Prep, and more – many with merit scholarships. For families seeking excellent education without private school tuition, Catholic schools offer a strong option.</li>

                        <li><strong>Strong zoned school</strong> – Backup option</li>
                    </ol>

                    <p>This strategy maximizes your child's chances of attending a top school. Many NYC STEM CLUB students gain admission to both specialized AND private/Catholic schools, giving families more choices.</p>
                </div>
            </div>

            <!-- FAQ Item 13 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What happens after the SHSAT?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Test Day:</strong> November (exact date varies by year)</p>

                    <p><strong>Timeline:</strong></p>
                    <ul>
                        <li>October/November: Take SHSAT</li>
                        <li>March: Results released</li>
                        <li>Spring: Accept or decline offer</li>
                        <li>September: Start 9th grade at specialized high school</li>
                    </ul>

                    <p><strong>If admitted:</strong></p>
                    <ul>
                        <li>You'll receive one offer from your highest-ranked choice where you qualified</li>
                        <li>You have ~2 weeks to accept or decline</li>
                        <li>If you decline, the spot goes to the next student on the waitlist</li>
                    </ul>

                    <p><strong>If not admitted:</strong></p>
                    <ul>
                        <li>Students attend their zoned high school or accepted private school</li>
                        <li>Can still have excellent high school experience and college outcomes</li>
                        <li>Many paths to success beyond specialized high schools</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Why Choose NYC STEM Club Section -->
        <?php
        // Enqueue course styles if not already loaded
        wp_enqueue_style(
            'nyc-stem-course-styles',
            plugin_dir_url(__FILE__) . '../../plugins/nyc-stem-courses/assets/css/course-styles.css',
            array(),
            filemtime(plugin_dir_path(__FILE__) . '../../plugins/nyc-stem-courses/assets/css/course-styles.css')
        );
        include(WP_PLUGIN_DIR . '/nyc-stem-courses/templates/parts/course-benefits.php');
        ?>

        <!-- SHSAT Courses Section -->
        <?php echo do_shortcode('[course_category category="shsat" title="SHSAT Preparation Programs" columns="4"]'); ?>

        <!-- CTA Section -->
        <section class="faq-cta">
            <h2>Ready to Start Your SHSAT Prep Journey?</h2>
            <p>Join the program where 90%+ of students gain admission to NYC specialized high schools and 50%+ qualify for Stuyvesant.</p>
            <?php echo do_shortcode('[inquiry_button]'); ?>
        </section>

        <!-- Testimonials Section -->
        <section class="nyc-testimonials-section">
            <div class="nyc-testimonials-container">
                <h2 class="nyc-testimonials-title">What Our Students & Parents Say</h2>
                <div class="nyc-testimonials-content">
                    <?php
                    $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
                    echo do_shortcode($reviews_shortcode);
                    ?>
                </div>
            </div>
        </section>

    </div>
</article>

<script>
function toggleFAQ(element) {
    const answer = element.nextElementSibling;
    const isActive = element.classList.contains('active');

    // Close all other FAQs
    document.querySelectorAll('.faq-question.active').forEach(q => {
        q.classList.remove('active');
        q.nextElementSibling.classList.remove('active');
    });

    // Toggle current FAQ
    if (!isActive) {
        element.classList.add('active');
        answer.classList.add('active');
    }
}
</script>

<?php
get_footer();
?>

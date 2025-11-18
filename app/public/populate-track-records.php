<?php
/**
 * Populate Hero Card Stats for 10 courses
 * Run once: http://nycstemclub.local/populate-track-records.php
 */

require_once(__DIR__ . '/wp-load.php');

// Helper function to populate stats
function populate_stats($course_id, $stats) {
    for ($i = 0; $i < count($stats); $i++) {
        $field_num = $i + 1;
        update_field("hero_card_stat_{$field_num}_number", $stats[$i]['number'], $course_id);
        update_field("hero_card_stat_{$field_num}_label", $stats[$i]['label'], $course_id);
    }
}

// SAT/ACT Courses (17138-17142) - 4 stats each
$sat_act_stats = [
    ['number' => '96%', 'label' => 'Score Improvement Rate'],
    ['number' => '6-9 Points', 'label' => 'Average ACT Increase'],
    ['number' => '100+ Points', 'label' => 'Average SAT Increase'],
    ['number' => 'Up to 13 Points', 'label' => 'Top ACT Student Improvement']
];

$sat_act_courses = [17138, 17139, 17140, 17141, 17142];

echo "<h2>Populating SAT/ACT Courses (17138-17142)</h2>";
foreach ($sat_act_courses as $course_id) {
    populate_stats($course_id, $sat_act_stats);
    echo "✓ Updated course $course_id<br>";
}

// Private School Admissions (17143) - 2 stats
$private_school_stats = [
    ['number' => '', 'label' => 'Our students have received offers in their top 3 schools'],
    ['number' => '', 'label' => 'Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Anns, prestigious boarding schools and many more top schools']
];

echo "<h2>Populating Private School Admissions (17143)</h2>";
populate_stats(17143, $private_school_stats);
echo "✓ Updated course 17143<br>";

// College Counseling (17145) - 2 stats
$college_counseling_stats = [
    ['number' => '', 'label' => 'Our students have received offers in their top 3 schools'],
    ['number' => '', 'label' => 'Harvard, Princeton, UPenn, UChicago, Cornell, Carnegie Mellon, Georgia Tech and many more']
];

echo "<h2>Populating College Counseling (17145)</h2>";
populate_stats(17145, $college_counseling_stats);
echo "✓ Updated course 17145<br>";

// ISEE Courses (17343-17345) - 2 stats each
$isee_stats = [
    ['number' => 'Over 85%', 'label' => 'Scored a Stanine of 7-9 on the ISEE'],
    ['number' => 'Top 3 Schools', 'label' => 'Our students have received offers in one of their top 3 schools']
];

$isee_courses = [17343, 17344, 17345];

echo "<h2>Populating ISEE Courses (17343-17345)</h2>";
foreach ($isee_courses as $course_id) {
    populate_stats($course_id, $isee_stats);
    echo "✓ Updated course $course_id<br>";
}

// SHSAT Courses - Find all courses with SHSAT category - 4 stats each
$shsat_stats = [
    ['number' => '90%+', 'label' => 'Acceptance Rate'],
    ['number' => '50%+', 'label' => 'Stuy Score Rate'],
    ['number' => 'Expert', 'label' => 'Instructors'],
    ['number' => 'Small', 'label' => 'Group Classes']
];

$shsat_courses = get_posts([
    'post_type' => 'course',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'course_category',
            'field' => 'slug',
            'terms' => 'shsat'
        ]
    ],
    'fields' => 'ids'
]);

echo "<h2>Populating SHSAT Courses</h2>";
if (!empty($shsat_courses)) {
    foreach ($shsat_courses as $course_id) {
        populate_stats($course_id, $shsat_stats);
        echo "✓ Updated course $course_id<br>";
    }
} else {
    echo "No SHSAT courses found<br>";
}

echo "<h2 style='color: green;'>✓ All Done!</h2>";
echo "<p>All courses have been populated with track record data.</p>";
echo "<p><strong>Next:</strong> Delete this file and test the courses.</p>";

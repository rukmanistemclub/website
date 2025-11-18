/**
 * NYC STEM Club - Course Scripts
 * FAQ Accordion and other interactive elements
 */

(function($) {
    'use strict';

    /**
     * FAQ Accordion
     */
    function initFAQAccordion() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        if (faqQuestions.length === 0) {
            return;
        }

        faqQuestions.forEach(function(question) {
            question.addEventListener('click', function(e) {
                e.preventDefault();

                const isActive = this.classList.contains('active');
                const answer = this.nextElementSibling;

                // Close all other FAQs
                faqQuestions.forEach(function(q) {
                    if (q !== question) {
                        q.classList.remove('active');
                        q.setAttribute('aria-expanded', 'false');
                        const a = q.nextElementSibling;
                        if (a && a.classList.contains('faq-answer')) {
                            a.classList.remove('active');
                        }
                    }
                });

                // Toggle current FAQ
                if (isActive) {
                    this.classList.remove('active');
                    this.setAttribute('aria-expanded', 'false');
                    if (answer && answer.classList.contains('faq-answer')) {
                        answer.classList.remove('active');
                    }
                } else {
                    this.classList.add('active');
                    this.setAttribute('aria-expanded', 'true');
                    if (answer && answer.classList.contains('faq-answer')) {
                        answer.classList.add('active');
                    }
                }
            });

            // Set initial ARIA attributes
            question.setAttribute('role', 'button');
            question.setAttribute('aria-expanded', 'false');
            question.setAttribute('tabindex', '0');

            // Keyboard accessibility
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }

    /**
     * Smooth Scroll to Inquiry Button
     */
    function initSmoothScroll() {
        if (window.location.hash === '#inquire') {
            const inquiryCta = document.querySelector('.inquiry-cta');
            if (inquiryCta) {
                setTimeout(function() {
                    inquiryCta.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            }
        }
    }

    /**
     * Pre-fill Enrollment Form with Course Name
     * If enrollment page has a course name field, pre-fill it
     */
    function preFillEnrollmentForm() {
        const urlParams = new URLSearchParams(window.location.search);
        const courseName = urlParams.get('course');

        if (courseName) {
            // Try different common field name patterns
            const possibleSelectors = [
                'input[name="course-name"]',
                'input[name="course_name"]',
                'input[name="courseName"]',
                'input[name*="course"]',
                'select[name*="course"]'
            ];

            possibleSelectors.forEach(function(selector) {
                const field = document.querySelector(selector);
                if (field) {
                    field.value = decodeURIComponent(courseName);
                }
            });
        }
    }

    /**
     * Make entire course card clickable
     */
    function initClickableCards() {
        const courseCards = document.querySelectorAll('.course-card');

        courseCards.forEach(function(card) {
            card.addEventListener('click', function(e) {
                // Don't follow link if clicking on the button itself
                if (e.target.classList.contains('course-card-button')) {
                    return;
                }

                // Find the main course link
                const link = card.querySelector('.course-card-title a');
                if (link) {
                    window.location.href = link.href;
                }
            });
        });
    }

    /**
     * Search & Filter Functionality
     */
    function initSearchAndFilters() {
        const searchInput = document.getElementById('course-search');
        const categoryFilter = document.getElementById('category-filter');
        const courseCards = document.querySelectorAll('.course-card');

        if (!searchInput || courseCards.length === 0) {
            return;
        }

        // Track current filters
        let searchTerm = '';
        let activeCategory = 'all';

        // Filter function
        function filterCourses() {
            courseCards.forEach(function(card) {
                const title = card.querySelector('.course-card-title')?.textContent.toLowerCase() || '';
                const excerpt = card.querySelector('.course-card-excerpt')?.textContent.toLowerCase() || '';
                const categories = card.getAttribute('data-categories') || '';

                let showCard = true;

                // Search filter
                if (searchTerm && !title.includes(searchTerm) && !excerpt.includes(searchTerm)) {
                    showCard = false;
                }

                // Category filter
                if (activeCategory !== 'all' && !categories.includes(activeCategory)) {
                    showCard = false;
                }

                card.style.display = showCard ? '' : 'none';
            });
        }

        // Search input listener
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                searchTerm = this.value.toLowerCase().trim();
                filterCourses();
            });
        }

        // Category dropdown listener
        if (categoryFilter) {
            categoryFilter.addEventListener('change', function() {
                activeCategory = this.value;
                filterCourses();
            });
        }
    }

    /**
     * Initialize all functions when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initFAQAccordion();
        initSmoothScroll();
        preFillEnrollmentForm();
        initClickableCards();
        initSearchAndFilters();
    });

    /**
     * jQuery version for compatibility
     */
    $(document).ready(function() {
        // Add any jQuery-dependent code here if needed
        console.log('NYC STEM Courses scripts loaded');
    });

})(jQuery);

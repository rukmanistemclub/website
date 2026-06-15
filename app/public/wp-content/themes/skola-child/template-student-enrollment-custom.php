<?php
/**
 * Template Name: Student Enrollment (Custom Form)
 * Description: Custom enrollment form that posts to multiple destinations
 */

get_header();
?>

<div class="enrollment-page">

    <!-- Hero Section -->
    <section class="enrollment-hero">
        <div class="enrollment-hero-container">
            <h1>Inquire About NYC STEM Club Programs</h1>
        </div>
    </section>

    <!-- Form Section -->
    <section class="enrollment-form-section">
        <div class="enrollment-form-container">

            <form id="enrollment-form" class="enrollment-form" novalidate>
                <?php wp_nonce_field('enrollment_form_submit', 'enrollment_nonce'); ?>

                <!-- Parent Information -->
                <div class="form-group">
                    <label for="parent_first_name">Parent's First name <span class="required">*</span></label>
                    <input type="text" id="parent_first_name" name="parent_first_name" placeholder="Start typing..." required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="parent_last_name">Parent's Last name <span class="required">*</span></label>
                    <input type="text" id="parent_last_name" name="parent_last_name" placeholder="Start typing..." required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="parent_email">Parent - Email Address <span class="required">*</span></label>
                    <input type="email" id="parent_email" name="parent_email" placeholder="Email Address" required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="parent_phone">Parent - Cell Phone Number <span class="required">*</span></label>
                    <div class="phone-input-wrapper">
                        <select id="phone_country" name="phone_country" class="country-code">
                            <option value="+1" selected>🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+91">🇮🇳 +91</option>
                            <option value="+86">🇨🇳 +86</option>
                            <option value="+81">🇯🇵 +81</option>
                            <option value="+82">🇰🇷 +82</option>
                        </select>
                        <input type="tel" id="parent_phone" name="parent_phone" placeholder="Phone Number" required>
                    </div>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="referral_source">For First-time families: How did you hear about us?</label>
                    <input type="text" id="referral_source" name="referral_source" placeholder="Please indicate name of person who referred, social media/internet marketing etc.">
                </div>

                <div class="form-group">
                    <label for="city">City <span class="required">*</span></label>
                    <input type="text" id="city" name="city" placeholder="City" required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="state">State <span class="required">*</span></label>
                    <input type="text" id="state" name="state" placeholder="State" required>
                    <span class="error-message"></span>
                </div>

                <!-- Child Information -->
                <div class="form-group">
                    <label for="child_first_name">Child's First Name <span class="required">*</span></label>
                    <input type="text" id="child_first_name" name="child_first_name" placeholder="Start typing..." required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="child_last_name">Child's Last Name <span class="required">*</span></label>
                    <input type="text" id="child_last_name" name="child_last_name" placeholder="Start typing..." required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="child_school">Child's School <span class="required">*</span></label>
                    <input type="text" id="child_school" name="child_school" placeholder="Start typing..." required>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="child_grade">Child's Grade <span class="required">*</span></label>
                    <select id="child_grade" name="child_grade" required>
                        <option value="">Click to select</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                        <option value="Grade 7">Grade 7</option>
                        <option value="Grade 8">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                        <option value="College">College</option>
                    </select>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="programs_interested">Select Programs that you are interested in <span class="required">*</span></label>
                    <select id="programs_interested" name="programs_interested" required>
                        <option value="">Click to select</option>
                        <option value="Math">Math</option>
                        <option value="ELA: Reading Comprehension, Critical writing, grammar, vocabulary">ELA: Reading Comprehension, Critical writing, grammar, vocabulary</option>
                        <option value="Homeschool/Micro-school (Limited availability)">Homeschool/Micro-school (Limited availability)</option>
                        <option value="SHSAT/ ISEE/ SSAT/ TACHS Test Prep">SHSAT/ ISEE/ SSAT/ TACHS Test Prep</option>
                        <option value="Middle School Science: Grades 7 and 8">Middle School Science: Grades 7 and 8</option>
                        <option value="Hunter High School Admissions Prep">Hunter High School Admissions Prep</option>
                        <option value="High School AP Level Courses">High School AP Level Courses: AP Calc, AP Physics, AP Chemistry, AP Bio, AP Comp Sci, AP Lit, AP Stats, AP History...</option>
                        <option value="High School - Algebra 2">High School - Algebra 2</option>
                        <option value="High School Geometry">High School Geometry</option>
                        <option value="High School Physics">High School Physics</option>
                        <option value="High School Chemistry">High School Chemistry</option>
                        <option value="Other High School Courses">Other High School Courses: Algebra 1, Precalculus, US History...</option>
                        <option value="SAT / ACT Prep">SAT / ACT Prep</option>
                        <option value="College Essay and/or College Counseling">College Essay and/or College Counseling</option>
                        <option value="PSAT Prep for Grade 9 and 10 students">PSAT Prep for Grade 9 and 10 students</option>
                        <option value="MS Excel for High school Students">MS Excel for High school Students</option>
                        <option value="Creative Writing">Creative Writing</option>
                        <option value="Analytical Writing">Analytical Writing</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="error-message"></span>
                </div>

                <div class="form-group" id="other-details-group" style="display: none;">
                    <label for="other_details">If you choose other, please provide additional details</label>
                    <textarea id="other_details" name="other_details" rows="5" placeholder="Start typing..."></textarea>
                </div>

                <div class="form-group">
                    <label for="unavailable_times">Which days and times DO NOT work for your child</label>
                    <textarea id="unavailable_times" name="unavailable_times" rows="5" placeholder="Start typing..."></textarea>
                </div>

                <div class="form-group">
                    <label for="remote_instruction">Remote Instruction <span class="required">*</span></label>
                    <select id="remote_instruction" name="remote_instruction" required>
                        <option value="">Click to select</option>
                        <option value="In-Person">In-Person</option>
                        <option value="Remote">Remote</option>
                        <option value="Either Remote or In-Person">Either Remote or In-Person</option>
                    </select>
                    <span class="error-message"></span>
                </div>

                <div class="form-group form-submit">
                    <button type="submit" id="submit-btn" class="submit-button">
                        <span class="btn-text">Submit Now</span>
                        <span class="btn-loading" style="display: none;">
                            <svg class="spinner" viewBox="0 0 24 24" width="20" height="20">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="31.4 31.4" stroke-linecap="round">
                                    <animateTransform attributeName="transform" type="rotate" dur="1s" from="0 12 12" to="360 12 12" repeatCount="indefinite"/>
                                </circle>
                            </svg>
                            Submitting...
                        </span>
                    </button>
                </div>

                <div id="form-message" class="form-message" style="display: none;"></div>
            </form>

        </div>
    </section>

</div>

<style>
/* Enrollment Page Styles */
.enrollment-page {
    background: #fff;
}

.enrollment-hero {
    background: linear-gradient(135deg, #134958 0%, #1a5a6e 100%);
    padding: 60px 20px;
    text-align: center;
}

.enrollment-hero-container {
    max-width: 800px;
    margin: 0 auto;
}

.enrollment-hero h1 {
    color: #fff;
    font-size: 28px;
    font-weight: 600;
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

.enrollment-form-section {
    padding: 40px 20px 60px;
}

.enrollment-form-container {
    max-width: 800px;
    margin: 0 auto;
}

.enrollment-form {
    background: #fff;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
    font-family: 'Roboto', sans-serif;
}

.form-group label .required {
    color: #e53935;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    font-size: 15px;
    font-family: 'Roboto', sans-serif;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #fff;
    color: #333;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #999;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #28AFCF;
    box-shadow: 0 0 0 3px rgba(40, 175, 207, 0.1);
}

.form-group select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
    cursor: pointer;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

/* Phone input wrapper */
.phone-input-wrapper {
    display: flex;
    gap: 10px;
}

.phone-input-wrapper .country-code {
    width: 100px;
    flex-shrink: 0;
}

.phone-input-wrapper input[type="tel"] {
    flex: 1;
}

/* Error states */
.form-group.error input,
.form-group.error select,
.form-group.error textarea {
    border-color: #e53935;
}

.form-group .error-message {
    display: none;
    color: #e53935;
    font-size: 13px;
    margin-top: 6px;
}

.form-group.error .error-message {
    display: block;
}

/* Submit button */
.form-submit {
    text-align: center;
    margin-top: 32px;
}

.submit-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #134958;
    color: #fff;
    border: none;
    padding: 14px 40px;
    font-size: 16px;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease;
    min-width: 180px;
}

.submit-button:hover {
    background: #0d3640;
    transform: translateY(-1px);
}

.submit-button:disabled {
    background: #999;
    cursor: not-allowed;
    transform: none;
}

.submit-button .spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Form message */
.form-message {
    margin-top: 20px;
    padding: 16px 20px;
    border-radius: 4px;
    text-align: center;
    font-size: 15px;
}

.form-message.success {
    background: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #a5d6a7;
}

.form-message.error {
    background: #ffebee;
    color: #c62828;
    border: 1px solid #ef9a9a;
}

/* Responsive */
@media (max-width: 768px) {
    .enrollment-hero {
        padding: 40px 20px;
    }

    .enrollment-hero h1 {
        font-size: 24px;
    }

    .enrollment-form-section {
        padding: 30px 16px 50px;
    }

    .phone-input-wrapper {
        flex-direction: column;
        gap: 10px;
    }

    .phone-input-wrapper .country-code {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enrollment-form');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const formMessage = document.getElementById('form-message');
    const programsSelect = document.getElementById('programs_interested');
    const otherDetailsGroup = document.getElementById('other-details-group');

    // Show/hide "Other" details field
    programsSelect.addEventListener('change', function() {
        if (this.value === 'Other') {
            otherDetailsGroup.style.display = 'block';
        } else {
            otherDetailsGroup.style.display = 'none';
        }
    });

    // Form validation
    function validateField(field) {
        const formGroup = field.closest('.form-group');
        const errorMessage = formGroup.querySelector('.error-message');
        let isValid = true;
        let message = '';

        // Required check
        if (field.hasAttribute('required') && !field.value.trim()) {
            isValid = false;
            message = "Can't be empty";
        }

        // Email validation
        if (field.type === 'email' && field.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                isValid = false;
                message = 'Please enter a valid email address';
            }
        }

        // Phone validation
        if (field.type === 'tel' && field.value.trim()) {
            const phoneRegex = /^[\d\s\-\(\)]+$/;
            if (!phoneRegex.test(field.value) || field.value.replace(/\D/g, '').length < 10) {
                isValid = false;
                message = 'Please enter a valid phone number';
            }
        }

        if (!isValid) {
            formGroup.classList.add('error');
            if (errorMessage) errorMessage.textContent = message;
        } else {
            formGroup.classList.remove('error');
            if (errorMessage) errorMessage.textContent = '';
        }

        return isValid;
    }

    // Validate on blur
    form.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('blur', () => validateField(field));
        field.addEventListener('change', () => validateField(field));
    });

    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Validate all fields
        let isFormValid = true;
        form.querySelectorAll('input[required], select[required]').forEach(field => {
            if (!validateField(field)) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            // Scroll to first error
            const firstError = form.querySelector('.form-group.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-flex';
        formMessage.style.display = 'none';

        // Collect form data
        const formData = new FormData(form);
        formData.append('action', 'process_enrollment_form');

        try {
            const response = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                formMessage.className = 'form-message success';
                formMessage.textContent = result.data.message || 'Thank you! Your inquiry has been submitted successfully. We will contact you soon.';
                formMessage.style.display = 'block';
                form.reset();
                otherDetailsGroup.style.display = 'none';

                // Scroll to message
                formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                formMessage.className = 'form-message error';
                formMessage.textContent = result.data.message || 'Something went wrong. Please try again or contact us directly.';
                formMessage.style.display = 'block';
            }
        } catch (error) {
            console.error('Form submission error:', error);
            formMessage.className = 'form-message error';
            formMessage.textContent = 'Network error. Please check your connection and try again.';
            formMessage.style.display = 'block';
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
        }
    });
});
</script>

<?php
get_footer();

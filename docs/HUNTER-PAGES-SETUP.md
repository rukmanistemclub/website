# Hunter Admissions pages — setup guide

This mirrors how your SHSAT setup works:
- **One landing page** (the hub) = `template-hunter-prep.php` → page "Hunter College High School Prep"
- **A "Hunter Admissions" course category**
- **Two Course entries** (the cards you "jump to" from the landing page) → each opens its own course page

The landing page's "Jump to Programs" button scrolls to a course-card grid
(`[course_category category="hunter-admissions"]`). That grid is **empty until the two
Course entries below exist** in the Hunter Admissions category.

---

## STEP 1 — Upload the landing template
File Manager → `public_html/wp-content/themes/skola-child/` → upload **`template-hunter-prep.php`**
from your Downloads folder. (New file — nothing to overwrite.)

## STEP 2 — Create the category
WP admin → **Courses → Categories** → Add New:
- **Name:** Hunter Admissions
- **Slug:** `hunter-admissions`

## STEP 3 — Create the landing page
WP admin → **Pages → Add New**:
- **Title:** Hunter College High School Prep
- **Permalink/slug:** `hunter-college-high-school-prep`
- **Page Attributes → Template:** "Hunter Prep Landing Page"
- Leave the body **empty** (the template provides everything) → **Publish**

## STEP 4 — Create the two Course entries
**Easiest method:** open an existing **SHSAT course** (Courses → All Courses), use
**"Duplicate"** (or copy its fields) so all the ACF fields carry over, then edit. For each
new course set: **Category = Hunter Admissions**, a **Featured Image**, the **Excerpt**,
the **Course Duration** and **Class Format** fields, and paste the HTML into the
**Course Description** (WYSIWYG) field — switch that editor to its **"Text"/code** tab first.

You already have images in your Media Library: `pre-hunter.png` and `Hunter-Prep.jpg`.

---

### COURSE 1 — Pre-Hunter Summer Intensive
- **Title:** `Pre-Hunter Summer Intensive (Rising 6th Grade)`
- **Excerpt (card text):** `A six-week summer ELA + Math intensive for rising 6th graders — the head start before Fall Hunter Prep.`
- **Course Duration field:** `6 weeks · Summer 2026`
- **Class Format:** Group
- **Featured image:** `pre-hunter.png`
- **Course Description (paste as HTML):**

```html
<h2>Pre-Hunter Summer Intensive (Rising 6th Grade)</h2>
<p>A focused six-week head start for rising 6th graders aiming for Hunter College High School. We build the reading, writing, and math foundation now — so your child steps into the Fall Hunter Prep program (and the January exam) already ahead. <strong>ELA on Tuesdays, Math on Thursdays.</strong></p>

<p><strong>Tuesdays &amp; Thursdays · 3:30–5:00 PM · 12 sessions over 6 weeks · In-person at 65 Broadway, Suite 1105</strong></p>

<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;width:100%;">
  <thead>
    <tr style="background:#134958;color:#fff;text-align:left;">
      <th>Week</th><th>Day</th><th>Date</th><th>Subject</th><th>Time</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>1</td><td>Tuesday</td><td>Jul 21, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>1</td><td>Thursday</td><td>Jul 23, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
    <tr><td>2</td><td>Tuesday</td><td>Jul 28, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>2</td><td>Thursday</td><td>Jul 30, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
    <tr><td>3</td><td>Tuesday</td><td>Aug 4, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>3</td><td>Thursday</td><td>Aug 6, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
    <tr><td>4</td><td>Tuesday</td><td>Aug 11, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>4</td><td>Thursday</td><td>Aug 13, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
    <tr><td>5</td><td>Tuesday</td><td>Aug 18, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>5</td><td>Thursday</td><td>Aug 20, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
    <tr><td>6</td><td>Tuesday</td><td>Aug 25, 2026</td><td>ELA</td><td>3:30–5:00 PM</td></tr>
    <tr><td>6</td><td>Thursday</td><td>Aug 27, 2026</td><td>Math</td><td>3:30–5:00 PM</td></tr>
  </tbody>
</table>

<p><em>If the summer schedule doesn't fit, ask us about a custom plan or private instruction (which can be done remotely if needed). Courses are subject to minimum enrollment. Inquire for pricing and current availability.</em></p>
```

---

### COURSE 2 — Hunter Prep (Fall)
- **Title:** `Hunter Prep — Fall (6th Grade, ELA + Math)`
- **Excerpt (card text):** `Fall program training 6th graders for the January Hunter entrance exam — reading, writing, and ISEE-style math.`
- **Course Duration field:** `18 sessions · Sep 2026–Jan 2027`
- **Class Format:** Group
- **Featured image:** `Hunter-Prep.jpg`
- **Course Description (paste as HTML):**

```html
<h2>Hunter Prep — Fall (6th Grade)</h2>
<p>Our Fall program trains 6th graders directly for the January Hunter College High School entrance exam, covering <strong>both ELA and Math</strong> in one combined class: reading comprehension, the writing assignment, and ISEE Middle Level mathematics.</p>

<p><strong>Mondays · 3:30–6:30 PM · 18 sessions · In-person at 65 Broadway, Suite 1105</strong></p>

<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;width:100%;">
  <thead>
    <tr style="background:#134958;color:#fff;text-align:left;">
      <th>Session</th><th>Day</th><th>Date</th><th>Time</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>1</td><td>Monday</td><td>Sep 14, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>2</td><td>Monday</td><td>Sep 21, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>3</td><td>Monday</td><td>Sep 28, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>4</td><td>Monday</td><td>Oct 5, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>5</td><td>Monday</td><td>Oct 12, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>6</td><td>Monday</td><td>Oct 19, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>7</td><td>Monday</td><td>Oct 26, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>8</td><td>Monday</td><td>Nov 2, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>9</td><td>Monday</td><td>Nov 9, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>10</td><td>Monday</td><td>Nov 16, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>11</td><td>Monday</td><td>Nov 23, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>12</td><td>Monday</td><td>Nov 30, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>13</td><td>Monday</td><td>Dec 7, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>14</td><td>Monday</td><td>Dec 14, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr><td>15</td><td>Monday</td><td>Dec 21, 2026</td><td>3:30–6:30 PM</td></tr>
    <tr style="background:#fff4e6;font-style:italic;"><td>—</td><td>Monday</td><td>Dec 28, 2026</td><td>No class · Winter Break</td></tr>
    <tr><td>16</td><td>Monday</td><td>Jan 4, 2027</td><td>3:30–6:30 PM</td></tr>
    <tr><td>17</td><td>Monday</td><td>Jan 11, 2027</td><td>3:30–6:30 PM</td></tr>
    <tr style="background:#fff4e6;font-style:italic;"><td>—</td><td>Monday</td><td>Jan 18, 2027</td><td>No class · MLK Day</td></tr>
    <tr><td>18</td><td>Monday</td><td>Jan 25, 2027</td><td>3:30–6:30 PM</td></tr>
  </tbody>
</table>

<p><em>A Friday section may be added subject to demand — ask us. Courses are subject to minimum enrollment. Inquire for pricing and current availability.</em></p>
```

## STEP 5 — Clear cache
WP Rocket **Clear Cache** (not preload) + RoseHosting **Cloudflare purge**.

---

## Result
- `/hunter-college-high-school-prep/` = the landing hub (hero, exam info, the two program
  cards, how-we-prepare, FAQ, CTA).
- Each program card → its own course page with the schedule.
- The "Jump to Programs" button scrolls to the card grid.

(Optional next steps: add the landing page to your nav menu, and/or add the two courses to
the homepage featured-courses set — tell Claude if you want help.)

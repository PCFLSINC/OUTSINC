# OUTSINC

⸻

Landing Page Spec v1 (outsinc.ca)

Goals (at a glance)
	•	Welcome new visitors, route them to the right action in 1–2 clicks.
	•	Keep it accessible (dark/light, high-contrast, font size, dyslexia font).
	•	Surface live chat with presence status (“Live now / Recently / Leave a message”).
	•	Keep everything public, fast, and mobile-first.

⸻

Table of Contents / Section Order (anchors)
	1.	Top Navigation  (#top-nav)
	2.	Scrolling Marquee  (#marquee)
	3.	Rotating Call-to-Actions (5)  (#ctas)
	4.	Featured App Spotlight  (#featured-app)
	5.	Other Apps Showcase  (#apps-showcase)
	6.	Contact Us  (#contact)
	7.	Report an Issue  (#report-issue)
	8.	Service Providers We Offer  (#providers)
	9.	Resource Directory  (#resources)
	10.	Footer  (#footer)
	11.	Chat Bubble (persistent UI)  (#chat-bubble) — floats bottom-right on all sections

Optional (toggle in Admin): Impact Counters just below CTAs.

⸻

Visual & Theme Notes
	•	Style: “Minimal Line + Neon Glow” (your chosen vibe).
	•	Motion: Subtle fades / slides; 7–10s auto-rotation for CTAs with keyboard and swipe controls.
	•	Accessibility: High-contrast toggle, dark/light theme, font-size control, dyslexia-friendly font. All controls are persistent and stored per-browser.
	•	Icons/Imagery: Clean line icons with gentle glow; avoid clutter; retain generous spacing.

⸻

Component Map (IDs • purpose • behavior • data)

1) Top Navigation (comp-nav)
	•	Purpose: Global navigation without fixed-on-scroll; collapses on mobile.
	•	Items: Home, About, Services, Intake, Data, Contact; Login / Create Account open as modals (no role labels).
	•	Right Rail: Accessibility toggles; Theme switch.
	•	Behavior: Hide on scroll down, show on scroll up.

2) Scrolling Marquee (comp-marquee)
	•	Purpose: Urgent or timely notices.
	•	Copy (examples):
	•	“OUTSINC helps you navigate housing, health, ID, and more.”
	•	“All questions are optional. You stay in control.”
	•	“Live chat available—say hello.”
	•	Behavior: Continuous left-to-right scroll; pause on hover; dismissible banner per session.

3) Rotating CTAs (5) (comp-ctas)
	•	Purpose: Drive core actions.
	•	Rotation: Auto every 7–10s; users can swipe / arrow; no mini progress ring.
	•	Set (final copy + button labels):
	1.	Start Your Care Plan
	•	Headline: “Start your care plan.”
	•	Sub: “One place, your pace—questions are optional.”
	•	Button: Begin
	2.	MOMCARE Onboarding (Families)
	•	Headline: “MOMCARE onboarding for families.”
	•	Sub: “Organize care, appointments, and supports.”
	•	Button: Open MOMCARE
	3.	Explore Our Apps
	•	Headline: “Explore our apps.”
	•	Sub: “Tools for clients, staff, and providers.”
	•	Button: Browse Apps
	4.	Take the Survey
	•	Headline: “Take the Needs Assessment.”
	•	Sub: “See your starting point. Edit anytime.”
	•	Button: Start Survey
	5.	Resource Directory
	•	Headline: “Find local help fast.”
	•	Sub: “Shelter, food, health & more—save favorites.”
	•	Button: Open Directory

Optional row after CTAs (toggle): Impact Counters (e.g., “Cases opened this week”, “Partner orgs live”, “Chats answered today”). Static/demo now; wired to real data later.

4) Featured App Spotlight (comp-featured-app)
	•	Purpose: Deep-dive highlight of one app (initially MOMCARE).
	•	Copy:
	•	Title: “MOMCARE: organize care and feel supported.”
	•	Bullets: Appointments calendar • Symptom & medication logs • Family-sharing options • Printable summaries.
	•	Button: Open MOMCARE
	•	Visual: App frame mock + 2–3 key screenshots.

5) Other Apps Showcase (comp-apps-grid)
	•	Purpose: Grid of cards for other apps.
	•	Cards (examples): Client Portal • Staff Workspace • Provider Portal • Case Reports • Events & Announcements (toggle later).
	•	Each card: short 1-line value + Open button.

6) Contact Us (comp-contact)
	•	Purpose: Simple reach-out options.
	•	Copy:
	•	Title: “Contact us”
	•	Text: “Have questions or need help getting started? We’ll point you in the right direction.”
	•	Buttons: Open Chat, Send Message, Find a Resource
	•	Fallback: If operator not live → routes to message form.

7) Report an Issue (comp-report)
	•	Purpose: Public intake for concerns.
	•	Fields: Category • Location • Description • Photo upload (enabled by default) • Name/Contact (optional).
	•	Copy:
	•	Title: “Report an issue”
	•	Note: “You can submit without sharing your name.”
	•	Button: Submit Report
	•	After submit: Thank-you + case ID; triage to staff queue.

8) Service Providers We Offer (comp-providers)
	•	Purpose: Show service categories and example partners.
	•	Layout: Category tiles (Housing, Health, Harm Reduction, ID, Employment, Legal).
	•	Copy: Short explainer: “We hand off cases to the right provider—with your consent at the moment it’s needed.”
	•	Action: See Provider Portal (learn-more page for partners).

9) Resource Directory (comp-directory)
	•	Purpose: Quick-access directory with Save Favorites.
	•	Filters: Category, Open Now toggle.
(No geo “nearest-first” ranking per your choice; list ordering is curated/admin-set.)
	•	Card fields: Name • What they offer • Hours • How to contact • “Save to my favorites” (if logged-in).
	•	Button: Open Directory

10) Footer (comp-footer)
	•	Columns: About • Services • Resources • Legal • Contact.
	•	Links: Privacy • Terms • Accessibility • What’s New (internal release notes) • Data Exports (Admin-only, hidden here).
	•	Copy: “© OUTSINC. We ask consent before any external sharing.”

11) Chat Bubble (comp-chat)
	•	Placement: Bottom-right, persistent.
	•	Presence badge:
	•	Live now (operator active)
	•	Recently (operator seen within last 2 hours)
	•	Leave a message (no operator in past 2 hours)
	•	Behavior: Opens mini window; if you’re on the operator page, it shows Live now in real time. Transcripts link to a profile later if the visitor signs up.

⸻

Final Copy (short form text you can use verbatim)
	•	Hero/Above-the-fold (paired with CTAs):
“We help you navigate housing, health, ID, and more—at your pace. Start a care plan, take the needs assessment, or chat with us. You’re in control.”
	•	Accessibility tooltip:
“Prefer high-contrast or a bigger font? Toggle your view here—your choices are saved.”
	•	Privacy line (footer & consent reminders):
“We don’t share outside OUTSINC without your permission.”

⸻

Behavior & Timings (key interactions)
	•	CTAs: Auto-rotate every 7–10s; pause on hover/focus; keyboard accessible.
	•	Chat presence: “Live now” if operator page is open; “Recently” if operator active within last 2h; otherwise “Leave a message.”
	•	Banner nudges: Dismiss or Snooze (1h / 4h / 24h); persists per-user in local storage until login links them to account settings.
	•	Browser push: Prompt on first login; users can toggle later in Settings. In-app banners & badges remain always-on.

⸻

Telemetry & Admin Controls (essentials)
	•	Track CTA impressions/clicks; Chat opens; Report submissions.
	•	Admin toggles: Impact Counters on/off; Events & Announcements on/off; Directory filters; CTA order; copy text fields.
	•	Exports & KPIs (Admin): provider time-to-accept and time-to-first-note, case volumes, survey throughput.

⸻

Implementation Cheatsheet (dev-facing)
	•	Routes:
	•	/ (landing)
	•	/chat-ops (operator console; powers “Live now”)
	•	/directory (full-screen directory)
	•	/report (standalone issue form deep-link)
	•	/providers (info for partner orgs)
	•	Accessibility: ARIA roles; color-contrast AA+; focus-visible styles; all motions reduced with prefers-reduced-motion.
	•	Performance: Lazy-load heavy images, defer chat script until first interaction, cache marquee text.

⸻

Optional “Impact Counters” Copy (if enabled)
	•	“Cases started today:” 42
	•	“Partners live:” 18
	•	“Chats answered this week:” 127

⸻

What you’ll see on first build
	•	Exact section order above with working rotation, marquee, chat bubble with presence logic, fully wired Report form with photo upload, Resource Directory with “Open Now” filter and Favorites (tied to logged-in sessions), and accessibility controls baked in.

⸻

Quick yes/no set (to finalize this page for dev)
	1.	Add the Impact Counters row under the CTAs at launch (yes/no)?
	2.	Keep Events & Announcements off the landing page for now (yes/no)?t
	3.	Should Contact Us also show a simple FAQ quick-links strip (top 5 from your 50) (yes/no)?
	4.	Allow directory suggestions from visitors (“Suggest an update” form) (yes/no)?
	5.	Show a subtle privacy line under the CTAs: “We ask consent before any external sharing.” (yes/no)?
	6.	Enable keyboard shortcuts for CTA carousel (←/→) (yes/no)?
	7.	Load chat script on first user interaction (for speed) instead of immediately (yes/no)?
	8.	Add a “Back to top” floating button after 600px scroll (yes/no)?
	9.	Include social meta cards (Open Graph/Twitter) for the landing page (yes/no)?
	10.	Surface a tiny cookie/settings pop (non-tracking, just theme/accessibility storage notice) (yes/no)?


If you answer “Yes to all,” I’ll mark this landing spec as final and move straight to the Client Dashboard spec next.







Locked in. Here’s what I just applied to the landing page spec:
	•	Impact Counters: now shown directly under the rotating CTAs (count-up animation ready to toggle).
	•	Events & Announcements: not on the landing page, but present in the top nav as its own link.
	•	Contact Us: includes a strip of quick FAQ links (top 5) for fast answers.
	•	Resource Directory: “Suggest an update” is available to visitors (no login required).
	•	Privacy line: subtle line under the CTAs — “We ask consent before any external sharing.” (links to full policy).
	•	Keyboard shortcuts: CTA carousel supports ← / →.
	•	Chat script: lazy-loads on first interaction (for speed).

and yes—please show me whatever you want to share. I’m ready.

⸻

Quick yes/no (to finalize this page for build)
	1.	Should the Impact Counters animate from 0 to their value on load?
	2.	Auto-refresh counters every 60 seconds (yes/no)?
	3.	Show a tiny “ⓘ” tooltip on each counter that explains what it measures (yes/no)?
	4.	In the nav, show a small badge on “Events & Announcements” when there’s something new (yes/no)?
	5.	In Contact Us, include a “Call me back” request form (name + phone) in addition to chat/message (yes/no)?
	6.	Allow anonymous directory suggestions (no email required) (yes/no)?
	7.	Allow file/photo attachment on directory suggestions (yes/no)?
	8.	For chat lazy-load, trigger on first click/tap only (exclude mere scroll/hover) (yes/no)?
	9.	Show a tiny hint under the CTAs: “Use ←/→ to navigate” (yes/no)?
	10.	Add a “Learn how sharing works” link next to the privacy line that opens a short modal (yes/no)?

And a couple tiny follow-ups you can answer any time:
	•	If you want the counters live now, are demo values OK for v1 (yes/no)?
	•	When you share your thing now: want me to adapt the spec immediately based on it (yes/no)?


m









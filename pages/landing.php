<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'OUTSINC'); ?></title>
    <meta name="description" content="OUTSINC helps you navigate housing, health, ID, and more—at your pace. Start a care plan, take the needs assessment, or chat with us. You're in control.">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="OUTSINC - Navigate housing, health, ID, and more">
    <meta property="og:description" content="We help you navigate housing, health, ID, and more—at your pace. You're in control.">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta property="twitter:title" content="OUTSINC - Navigate housing, health, ID, and more">
    <meta property="twitter:description" content="We help you navigate housing, health, ID, and more—at your pace. You're in control.">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.png">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    
    <!-- Dyslexia-friendly font -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=OpenDyslexic:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
</head>
<body>
    <!-- Skip Link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Top Navigation -->
    <nav class="main-nav" role="navigation" aria-label="Main navigation">
        <div class="container">
            <div class="nav-brand">
                <a href="/" aria-label="OUTSINC Home">
                    <h1 class="brand-logo">OUTSINC</h1>
                </a>
            </div>
            
            <button class="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
            
            <div class="nav-menu">
                <ul class="nav-links">
                    <li><a href="/" aria-current="page">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/intake">Intake</a></li>
                    <li><a href="/data">Data</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li>
                        <a href="/events" class="has-badge">
                            Events & Announcements
                            <span class="nav-badge" aria-label="New items available">3</span>
                        </a>
                    </li>
                </ul>
                
                <div class="nav-actions">
                    <button type="button" class="btn btn-outline" data-modal="login">Login</button>
                    <button type="button" class="btn btn-primary" data-modal="signup">Create Account</button>
                </div>
            </div>
            
            <div class="accessibility-controls">
                <button id="theme-toggle" class="accessibility-btn" aria-label="Change theme">Light</button>
                <div class="font-size-controls">
                    <button data-font-size-btn="small" class="accessibility-btn" aria-label="Small font">A</button>
                    <button data-font-size-btn="medium" class="accessibility-btn active" aria-label="Medium font">A</button>
                    <button data-font-size-btn="large" class="accessibility-btn" aria-label="Large font">A</button>
                    <button data-font-size-btn="xl" class="accessibility-btn" aria-label="Extra large font">A</button>
                </div>
                <button id="font-type-toggle" class="accessibility-btn" aria-label="Toggle dyslexia-friendly font">Default Font</button>
            </div>
        </div>
    </nav>

    <main id="main-content" role="main">
        <!-- Scrolling Marquee -->
        <section class="marquee" role="banner" aria-label="Important announcements">
            <div class="marquee-content">
                <span class="marquee-text">OUTSINC helps you navigate housing, health, ID, and more. All questions are optional. You stay in control. Live chat available—say hello.</span>
            </div>
            <button class="marquee-dismiss" aria-label="Dismiss announcement">×</button>
        </section>

        <!-- Hero Section with Rotating CTAs -->
        <section class="hero-section" id="ctas">
            <div class="container">
                <div class="hero-content">
                    <h2 class="hero-title">We help you navigate housing, health, ID, and more—at your pace.</h2>
                    <p class="hero-subtitle">Start a care plan, take the needs assessment, or chat with us. You're in control.</p>
                </div>
                
                <div class="cta-carousel" role="region" aria-label="Call to action carousel" tabindex="0">
                    <div class="carousel-slides">
                        <div class="cta-slide active" aria-hidden="false">
                            <h3>Start your care plan.</h3>
                            <p>One place, your pace—questions are optional.</p>
                            <a href="/care-plan" class="btn btn-primary btn-large">Begin</a>
                        </div>
                        
                        <div class="cta-slide" aria-hidden="true">
                            <h3>MOMCARE onboarding for families.</h3>
                            <p>Organize care, appointments, and supports.</p>
                            <a href="/momcare" class="btn btn-primary btn-large">Open MOMCARE</a>
                        </div>
                        
                        <div class="cta-slide" aria-hidden="true">
                            <h3>Explore our apps.</h3>
                            <p>Tools for clients, staff, and providers.</p>
                            <a href="/apps" class="btn btn-primary btn-large">Browse Apps</a>
                        </div>
                        
                        <div class="cta-slide" aria-hidden="true">
                            <h3>Take the Needs Assessment.</h3>
                            <p>See your starting point. Edit anytime.</p>
                            <a href="/assessment" class="btn btn-primary btn-large">Start Survey</a>
                        </div>
                        
                        <div class="cta-slide" aria-hidden="true">
                            <h3>Find local help fast.</h3>
                            <p>Shelter, food, health & more—save favorites.</p>
                            <a href="/directory" class="btn btn-primary btn-large">Open Directory</a>
                        </div>
                    </div>
                    
                    <div class="carousel-controls">
                        <button class="carousel-prev" aria-label="Previous slide">‹</button>
                        <div class="carousel-indicators">
                            <button class="carousel-indicator active" aria-label="Slide 1" aria-current="true"></button>
                            <button class="carousel-indicator" aria-label="Slide 2" aria-current="false"></button>
                            <button class="carousel-indicator" aria-label="Slide 3" aria-current="false"></button>
                            <button class="carousel-indicator" aria-label="Slide 4" aria-current="false"></button>
                            <button class="carousel-indicator" aria-label="Slide 5" aria-current="false"></button>
                        </div>
                        <button class="carousel-next" aria-label="Next slide">›</button>
                    </div>
                    
                    <p class="carousel-hint">Use ←/→ to navigate</p>
                </div>
                
                <!-- Privacy Line -->
                <div class="privacy-notice">
                    <p>We ask consent before any external sharing. 
                        <a href="#" data-modal="privacy-modal">Learn how sharing works</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- Impact Counters -->
        <section class="impact-counters" aria-label="Impact statistics">
            <div class="container">
                <div class="counters-grid">
                    <div class="counter-item">
                        <span class="impact-counter" data-target="<?php echo get_impact_counters()['cases_today']; ?>" data-counter="cases_today">0</span>
                        <p>Cases started today 
                            <button class="info-tooltip" aria-label="Cases started today means new care plans or intake forms begun">ⓘ</button>
                        </p>
                    </div>
                    <div class="counter-item">
                        <span class="impact-counter" data-target="<?php echo get_impact_counters()['partners_live']; ?>" data-counter="partners_live">0</span>
                        <p>Partners live 
                            <button class="info-tooltip" aria-label="Partners live means service providers currently active on the platform">ⓘ</button>
                        </p>
                    </div>
                    <div class="counter-item">
                        <span class="impact-counter" data-target="<?php echo get_impact_counters()['chats_week']; ?>" data-counter="chats_week">0</span>
                        <p>Chats answered this week 
                            <button class="info-tooltip" aria-label="Chats answered this week includes completed chat sessions with operators">ⓘ</button>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured App Spotlight -->
        <section class="featured-app" id="featured-app">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>MOMCARE: organize care and feel supported.</h2>
                        <ul class="feature-list">
                            <li>Appointments calendar</li>
                            <li>Symptom & medication logs</li>
                            <li>Family-sharing options</li>
                            <li>Printable summaries</li>
                        </ul>
                        <a href="/momcare" class="btn btn-primary btn-large">Open MOMCARE</a>
                    </div>
                    <div class="col">
                        <div class="app-preview">
                            <img src="/assets/images/momcare-preview.png" alt="MOMCARE app interface showing calendar and health tracking features" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Other Apps Showcase -->
        <section class="apps-showcase" id="apps-showcase">
            <div class="container">
                <h2>Other Apps</h2>
                <div class="apps-grid">
                    <div class="app-card">
                        <h3>Client Portal</h3>
                        <p>Manage your care plan and appointments</p>
                        <a href="/client-portal" class="btn">Open</a>
                    </div>
                    <div class="app-card">
                        <h3>Staff Workspace</h3>
                        <p>Tools for case management and coordination</p>
                        <a href="/staff" class="btn">Open</a>
                    </div>
                    <div class="app-card">
                        <h3>Provider Portal</h3>
                        <p>Connect with clients and manage referrals</p>
                        <a href="/providers" class="btn">Open</a>
                    </div>
                    <div class="app-card">
                        <h3>Case Reports</h3>
                        <p>Analytics and insights for administrators</p>
                        <a href="/reports" class="btn">Open</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us -->
        <section class="contact-section" id="contact">
            <div class="container">
                <h2>Contact us</h2>
                <p>Have questions or need help getting started? We'll point you in the right direction.</p>
                
                <div class="contact-options">
                    <button class="btn btn-primary" id="open-chat">Open Chat</button>
                    <a href="/contact" class="btn">Send Message</a>
                    <a href="/directory" class="btn">Find a Resource</a>
                </div>
                
                <!-- Call me back form -->
                <div class="callback-form">
                    <h3>Call me back</h3>
                    <form data-ajax action="/api/callback-request.php" method="POST">
                        <div class="form-group">
                            <label for="callback-name">Name</label>
                            <input type="text" id="callback-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="callback-phone">Phone Number</label>
                            <input type="tel" id="callback-phone" name="phone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Request Callback</button>
                    </form>
                </div>
                
                <!-- FAQ Quick Links -->
                <div class="faq-quick-links">
                    <h3>Quick Answers</h3>
                    <ul>
                        <li><a href="/faq#getting-started">How do I get started?</a></li>
                        <li><a href="/faq#privacy">How is my information protected?</a></li>
                        <li><a href="/faq#services">What services are available?</a></li>
                        <li><a href="/faq#emergency">What if I have an emergency?</a></li>
                        <li><a href="/faq#hours">What are your hours?</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Report an Issue -->
        <section class="report-section" id="report-issue">
            <div class="container">
                <h2>Report an issue</h2>
                <p>You can submit without sharing your name.</p>
                
                <form data-ajax action="/api/submit-report.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="report-category">Category</label>
                        <select id="report-category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="housing">Housing</option>
                            <option value="health">Health</option>
                            <option value="safety">Safety</option>
                            <option value="access">Access</option>
                            <option value="discrimination">Discrimination</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="report-location">Location</label>
                        <input type="text" id="report-location" name="location" placeholder="General area or intersection">
                    </div>
                    
                    <div class="form-group">
                        <label for="report-description">Description</label>
                        <textarea id="report-description" name="description" rows="4" required placeholder="Describe the issue..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="report-photo">Photo (optional)</label>
                        <input type="file" id="report-photo" name="photo" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label for="reporter-name">Name (optional)</label>
                        <input type="text" id="reporter-name" name="reporter_name" placeholder="Leave blank to submit anonymously">
                    </div>
                    
                    <div class="form-group">
                        <label for="reporter-contact">Contact (optional)</label>
                        <input type="text" id="reporter-contact" name="reporter_contact" placeholder="Phone or email for follow-up">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Report</button>
                </form>
            </div>
        </section>

        <!-- Service Providers We Offer -->
        <section class="providers-section" id="providers">
            <div class="container">
                <h2>Service Providers We Offer</h2>
                <p>We hand off cases to the right provider—with your consent at the moment it's needed.</p>
                
                <div class="provider-categories">
                    <div class="provider-tile">
                        <h3>Housing</h3>
                        <p>Emergency shelter, transitional housing, housing search</p>
                    </div>
                    <div class="provider-tile">
                        <h3>Health</h3>
                        <p>Medical care, mental health, addiction services</p>
                    </div>
                    <div class="provider-tile">
                        <h3>Harm Reduction</h3>
                        <p>Safe use supplies, overdose prevention, support</p>
                    </div>
                    <div class="provider-tile">
                        <h3>ID & Documentation</h3>
                        <p>Birth certificates, health cards, benefit applications</p>
                    </div>
                    <div class="provider-tile">
                        <h3>Employment</h3>
                        <p>Job search, skills training, income support</p>
                    </div>
                    <div class="provider-tile">
                        <h3>Legal</h3>
                        <p>Legal aid, advocacy, court support</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <a href="/providers" class="btn btn-large">See Provider Portal</a>
                </div>
            </div>
        </section>

        <!-- Resource Directory -->
        <section class="directory-section" id="resources">
            <div class="container">
                <h2>Resource Directory</h2>
                <p>Quick-access directory with Save Favorites</p>
                
                <div class="directory-filters">
                    <select id="category-filter">
                        <option value="">All Categories</option>
                        <option value="food">Food & Nutrition</option>
                        <option value="health">Health & Medical</option>
                        <option value="housing">Housing</option>
                        <option value="transportation">Transportation</option>
                        <option value="legal">Legal</option>
                    </select>
                    
                    <label class="toggle-switch">
                        <input type="checkbox" id="open-now-filter">
                        <span class="toggle-slider"></span>
                        Open Now
                    </label>
                </div>
                
                <div class="resources-grid">
                    <?php
                    // Fetch and display sample resources
                    try {
                        $stmt = $pdo->prepare("SELECT * FROM resources WHERE is_active = 1 ORDER BY is_featured DESC, name ASC LIMIT 6");
                        $stmt->execute();
                        $resources = $stmt->fetchAll();
                        
                        foreach ($resources as $resource): ?>
                        <div class="resource-card">
                            <h3><?php echo escape_output($resource['name']); ?></h3>
                            <p class="resource-category"><?php echo escape_output($resource['category']); ?></p>
                            <p><?php echo escape_output($resource['description']); ?></p>
                            <p class="resource-hours"><?php echo escape_output($resource['hours']); ?></p>
                            <div class="resource-actions">
                                <button class="btn btn-sm favorite-btn" data-resource-id="<?php echo $resource['id']; ?>">
                                    ♡ Save to favorites
                                </button>
                            </div>
                        </div>
                        <?php endforeach;
                    } catch (Exception $e) {
                        echo '<p>Resources temporarily unavailable.</p>';
                    }
                    ?>
                </div>
                
                <div class="text-center">
                    <a href="/directory" class="btn btn-large">Open Directory</a>
                    <a href="#" class="btn" data-modal="suggest-resource">Suggest an update</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="main-footer" id="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About</h3>
                    <ul>
                        <li><a href="/about">Our Mission</a></li>
                        <li><a href="/team">Team</a></li>
                        <li><a href="/partners">Partners</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="/care-plans">Care Plans</a></li>
                        <li><a href="/assessments">Assessments</a></li>
                        <li><a href="/directory">Directory</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="/help">Help Center</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="/privacy">Privacy</a></li>
                        <li><a href="/terms">Terms</a></li>
                        <li><a href="/accessibility">Accessibility</a></li>
                        <li><a href="/releases">What's New</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="tel:555-0100">Phone: (555) 010-0100</a></li>
                        <li><a href="mailto:info@outsinc.ca">Email: info@outsinc.ca</a></li>
                        <li>123 Main Street<br>Toronto, ON M1A 1A1</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> OUTSINC. We ask consent before any external sharing.</p>
            </div>
        </div>
    </footer>

    <!-- Chat Bubble -->
    <div class="chat-bubble" role="button" tabindex="0" aria-label="Open chat">
        <div class="chat-icon">💬</div>
        <div class="chat-status status-<?php echo is_chat_operator_live(); ?>">
            <?php 
            $status = is_chat_operator_live();
            $statusText = [
                'live' => 'Live now',
                'recent' => 'Recently active', 
                'offline' => 'Leave a message'
            ];
            echo $statusText[$status];
            ?>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="Back to top">↑</button>

    <!-- Message Container for notifications -->
    <div class="message-container"></div>

    <!-- Modal containers will be injected here by JavaScript -->
    
    <script src="/assets/js/main.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'Service Providers - OUTSINC'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Service Providers</h1>
            <p>Information for partner organizations</p>
        </header>
        
        <main class="providers-content">
            <section class="provider-intro">
                <h2>Partner with OUTSINC</h2>
                <p>We hand off cases to the right provider—with your consent at the moment it's needed.</p>
                <p>Our platform connects clients with trusted service providers across multiple categories, ensuring seamless care coordination and referrals.</p>
            </section>
            
            <section class="provider-categories">
                <h2>Service Categories</h2>
                <div class="provider-categories-grid">
                    <div class="provider-tile">
                        <h3>Housing</h3>
                        <p>Emergency shelter, transitional housing, housing search assistance, rent supplements</p>
                        <ul>
                            <li>Emergency shelter services</li>
                            <li>Transitional housing programs</li>
                            <li>Housing search assistance</li>
                            <li>Rent supplement programs</li>
                        </ul>
                    </div>
                    
                    <div class="provider-tile">
                        <h3>Health & Medical</h3>
                        <p>Primary healthcare, mental health support, addiction services, specialized care</p>
                        <ul>
                            <li>Primary healthcare clinics</li>
                            <li>Mental health counseling</li>
                            <li>Addiction treatment programs</li>
                            <li>Specialized medical care</li>
                        </ul>
                    </div>
                    
                    <div class="provider-tile">
                        <h3>Harm Reduction</h3>
                        <p>Safe use supplies, overdose prevention, needle exchange, peer support</p>
                        <ul>
                            <li>Safe use supply distribution</li>
                            <li>Overdose prevention sites</li>
                            <li>Needle exchange programs</li>
                            <li>Peer support services</li>
                        </ul>
                    </div>
                    
                    <div class="provider-tile">
                        <h3>ID & Documentation</h3>
                        <p>Birth certificates, health cards, benefit applications, document replacement</p>
                        <ul>
                            <li>Birth certificate assistance</li>
                            <li>Health card applications</li>
                            <li>Benefit enrollment support</li>
                            <li>Document replacement services</li>
                        </ul>
                    </div>
                    
                    <div class="provider-tile">
                        <h3>Employment</h3>
                        <p>Job search support, skills training, income assistance, career counseling</p>
                        <ul>
                            <li>Job search assistance</li>
                            <li>Skills training programs</li>
                            <li>Income support services</li>
                            <li>Career counseling</li>
                        </ul>
                    </div>
                    
                    <div class="provider-tile">
                        <h3>Legal</h3>
                        <p>Legal aid services, advocacy, court support, rights information</p>
                        <ul>
                            <li>Legal aid clinics</li>
                            <li>Advocacy services</li>
                            <li>Court support programs</li>
                            <li>Rights information and education</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <section class="how-it-works">
                <h2>How It Works</h2>
                <div class="process-steps">
                    <div class="step">
                        <h3>1. Client Consent</h3>
                        <p>Clients provide explicit consent before any information is shared with external providers.</p>
                    </div>
                    <div class="step">
                        <h3>2. Secure Referral</h3>
                        <p>We securely transmit relevant case information to the appropriate service provider.</p>
                    </div>
                    <div class="step">
                        <h3>3. Direct Contact</h3>
                        <p>Provider contacts the client directly to arrange services and follow-up care.</p>
                    </div>
                    <div class="step">
                        <h3>4. Ongoing Coordination</h3>
                        <p>We facilitate communication between providers to ensure comprehensive care.</p>
                    </div>
                </div>
            </section>
            
            <section class="current-partners">
                <h2>Current Partners</h2>
                <div class="partners-grid">
                    <?php
                    try {
                        $stmt = $pdo->prepare("SELECT * FROM service_providers WHERE is_active = 1 ORDER BY category, name");
                        $stmt->execute();
                        $providers = $stmt->fetchAll();
                        
                        foreach ($providers as $provider): ?>
                        <div class="partner-card">
                            <h4><?php echo escape_output($provider['name']); ?></h4>
                            <p class="partner-category"><?php echo ucfirst(str_replace('_', ' ', escape_output($provider['category']))); ?></p>
                            <p><?php echo escape_output($provider['description']); ?></p>
                            <p class="services-offered"><?php echo escape_output($provider['services_offered']); ?></p>
                            
                            <?php if ($provider['phone']): ?>
                            <p class="partner-contact">📞 <?php echo escape_output($provider['phone']); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($provider['website']): ?>
                            <p class="partner-website">🌐 <a href="<?php echo escape_output($provider['website']); ?>" target="_blank" rel="noopener">Visit Website</a></p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach;
                    } catch (Exception $e) {
                        echo '<p>Partner information temporarily unavailable.</p>';
                    }
                    ?>
                </div>
            </section>
            
            <section class="become-partner">
                <h2>Become a Partner</h2>
                <p>Interested in partnering with OUTSINC? We're always looking for qualified service providers to join our network.</p>
                
                <div class="partnership-requirements">
                    <h3>Requirements</h3>
                    <ul>
                        <li>Licensed and accredited service provider</li>
                        <li>Commitment to client-centered care</li>
                        <li>Ability to respond to referrals within 24-48 hours</li>
                        <li>Compliance with privacy and data protection standards</li>
                        <li>Experience serving vulnerable populations</li>
                    </ul>
                </div>
                
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <p>Contact our partnership team to learn more about joining our network:</p>
                    <p>📧 Email: <a href="mailto:partnerships@outsinc.ca">partnerships@outsinc.ca</a></p>
                    <p>📞 Phone: <a href="tel:555-0100">(555) 010-0100</a></p>
                </div>
            </section>
        </main>
        
        <nav class="page-nav">
            <a href="/" class="btn">← Back to Home</a>
        </nav>
    </div>
    
    <script src="/assets/js/main.js"></script>
    
    <style>
    .provider-categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-xl) 0;
    }
    
    .provider-tile ul {
        margin-top: var(--spacing-md);
        padding-left: var(--spacing-lg);
    }
    
    .provider-tile li {
        margin-bottom: var(--spacing-xs);
        color: var(--secondary-text);
    }
    
    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-xl) 0;
    }
    
    .step {
        background: var(--secondary-bg);
        padding: var(--spacing-lg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
        text-align: center;
    }
    
    .step h3 {
        color: var(--accent-color);
        margin-bottom: var(--spacing-sm);
    }
    
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-xl) 0;
    }
    
    .partner-card {
        background: var(--secondary-bg);
        padding: var(--spacing-lg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }
    
    .partner-category {
        color: var(--accent-color);
        font-weight: 500;
        font-size: var(--font-size-sm);
        text-transform: uppercase;
        margin-bottom: var(--spacing-xs);
    }
    
    .services-offered {
        font-style: italic;
        color: var(--secondary-text);
        margin: var(--spacing-sm) 0;
    }
    
    .partnership-requirements {
        background: var(--tertiary-bg);
        padding: var(--spacing-lg);
        border-radius: 8px;
        margin: var(--spacing-lg) 0;
    }
    
    .contact-info {
        background: var(--secondary-bg);
        padding: var(--spacing-lg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }
    </style>
</body>
</html>
<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'Report an Issue - OUTSINC'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Report an Issue</h1>
            <p>You can submit without sharing your name.</p>
        </header>
        
        <main class="report-form-container">
            <form data-ajax action="/api/submit-report.php" method="POST" enctype="multipart/form-data" class="report-form">
                <div class="form-group">
                    <label for="report-category">Category *</label>
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
                    <small>Optional - helps us understand where issues are occurring</small>
                </div>
                
                <div class="form-group">
                    <label for="report-description">Description *</label>
                    <textarea id="report-description" name="description" rows="5" required 
                              placeholder="Please describe the issue in detail..."></textarea>
                    <small>Required - provide as much detail as you're comfortable sharing</small>
                </div>
                
                <div class="form-group">
                    <label for="report-photo">Photo (optional)</label>
                    <input type="file" id="report-photo" name="photo" accept="image/*">
                    <small>Max file size: 5MB. Accepted formats: JPG, PNG, GIF</small>
                </div>
                
                <div class="form-group">
                    <label for="reporter-name">Your Name (optional)</label>
                    <input type="text" id="reporter-name" name="reporter_name" 
                           placeholder="Leave blank to submit anonymously">
                    <small>Optional - you can submit this report without providing your name</small>
                </div>
                
                <div class="form-group">
                    <label for="reporter-contact">Contact Information (optional)</label>
                    <input type="text" id="reporter-contact" name="reporter_contact" 
                           placeholder="Phone or email for follow-up">
                    <small>Optional - only if you want us to contact you about this report</small>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large">Submit Report</button>
                    <a href="/" class="btn">Cancel</a>
                </div>
            </form>
            
            <div class="report-info">
                <h3>What happens after you submit?</h3>
                <ul>
                    <li>You'll receive a case ID for reference</li>
                    <li>Your report goes to our staff queue for review</li>
                    <li>We may contact you if you provided contact information</li>
                    <li>Anonymous reports are welcome and equally important</li>
                </ul>
                
                <div class="emergency-notice">
                    <h4>🚨 Emergency?</h4>
                    <p>If this is a life-threatening emergency, please call 911 immediately.</p>
                    <p>For mental health crisis support, text HOME to 741741.</p>
                </div>
            </div>
        </main>
        
        <nav class="page-nav">
            <a href="/" class="btn">← Back to Home</a>
        </nav>
    </div>
    
    <script src="/assets/js/main.js"></script>
    
    <style>
    .report-form-container {
        max-width: 800px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: var(--spacing-xl);
    }
    
    .report-form {
        background: var(--secondary-bg);
        padding: var(--spacing-xl);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }
    
    .report-info {
        background: var(--tertiary-bg);
        padding: var(--spacing-lg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
        height: fit-content;
    }
    
    .emergency-notice {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        padding: var(--spacing-md);
        border-radius: 4px;
        margin-top: var(--spacing-lg);
    }
    
    .emergency-notice h4 {
        margin-top: 0;
        color: #856404;
    }
    
    .emergency-notice p {
        margin-bottom: var(--spacing-xs);
        color: #856404;
    }
    
    small {
        display: block;
        color: var(--secondary-text);
        font-size: var(--font-size-sm);
        margin-top: var(--spacing-xs);
    }
    
    @media (max-width: 768px) {
        .report-form-container {
            grid-template-columns: 1fr;
        }
    }
    </style>
</body>
</html>
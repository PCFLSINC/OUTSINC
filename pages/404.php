<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'Page Not Found - OUTSINC'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <div class="container">
        <main class="error-page">
            <div class="error-content">
                <h1>404 - Page Not Found</h1>
                <p>Sorry, the page you're looking for doesn't exist.</p>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary">Go Home</a>
                    <a href="/directory" class="btn">Browse Resources</a>
                    <a href="/contact" class="btn">Contact Us</a>
                </div>
            </div>
        </main>
    </div>
    
    <style>
    .error-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    
    .error-content h1 {
        font-size: var(--font-size-4xl);
        color: var(--accent-color);
        margin-bottom: var(--spacing-lg);
    }
    
    .error-content p {
        font-size: var(--font-size-lg);
        color: var(--secondary-text);
        margin-bottom: var(--spacing-xl);
    }
    
    .error-actions {
        display: flex;
        gap: var(--spacing-md);
        justify-content: center;
        flex-wrap: wrap;
    }
    </style>
</body>
</html>
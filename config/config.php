<?php
// Site configuration
define('SITE_NAME', 'OUTSINC');
define('SITE_URL', 'https://outsinc.ca');
define('DEBUG', true); // Set to false in production

// Accessibility settings
define('THEMES', ['light', 'dark', 'high-contrast']);
define('FONT_SIZES', ['small', 'medium', 'large', 'xl']);
define('FONTS', ['default', 'dyslexia-friendly']);

// Chat settings
define('CHAT_TIMEOUT_MINUTES', 120); // Operator considered "recently" if active within 2 hours
define('IMPACT_COUNTER_REFRESH_SECONDS', 120); // Auto-refresh every 2 minutes

// File upload settings
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx']);

// Error logging
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

// Ensure logs directory exists
if (!file_exists(__DIR__ . '/../logs')) {
    mkdir(__DIR__ . '/../logs', 0755, true);
}
?>
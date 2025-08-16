#!/usr/bin/env php
<?php
/**
 * OUTSINC Validation Script
 * Tests basic functionality and validates setup
 */

echo "OUTSINC Portal Validation\n";
echo "========================\n\n";

$errors = [];
$warnings = [];

// Check PHP version
echo "1. Checking PHP version... ";
if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
    echo "✓ PHP " . PHP_VERSION . " (OK)\n";
} else {
    echo "✗ PHP " . PHP_VERSION . " (Requires 7.4+)\n";
    $errors[] = "PHP version too old";
}

// Check required directories
echo "2. Checking directory structure... ";
$dirs = ['api', 'assets', 'config', 'includes', 'pages', 'logs', 'uploads'];
$missing_dirs = [];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        $missing_dirs[] = $dir;
    }
}
if (empty($missing_dirs)) {
    echo "✓ All directories present\n";
} else {
    echo "✗ Missing directories: " . implode(', ', $missing_dirs) . "\n";
    $errors[] = "Missing directories";
}

// Check file permissions
echo "3. Checking permissions... ";
$writable_dirs = ['logs', 'uploads', 'uploads/reports'];
$permission_issues = [];
foreach ($writable_dirs as $dir) {
    if (is_dir($dir) && !is_writable($dir)) {
        $permission_issues[] = $dir;
    }
}
if (empty($permission_issues)) {
    echo "✓ Write permissions OK\n";
} else {
    echo "⚠ Not writable: " . implode(', ', $permission_issues) . "\n";
    $warnings[] = "Permission issues";
}

// Check PHP syntax on all files
echo "4. Checking PHP syntax... ";
$php_files = glob('{api,config,includes,pages}/*.php', GLOB_BRACE);
$syntax_errors = [];
foreach ($php_files as $file) {
    $output = shell_exec("php -l \"$file\" 2>&1");
    if (strpos($output, 'No syntax errors') === false) {
        $syntax_errors[] = $file;
    }
}
if (empty($syntax_errors)) {
    echo "✓ All PHP files valid\n";
} else {
    echo "✗ Syntax errors in: " . implode(', ', $syntax_errors) . "\n";
    $errors[] = "PHP syntax errors";
}

// Check required files
echo "5. Checking core files... ";
$required_files = [
    'index.php',
    'database_schema.sql',
    'assets/css/main.css',
    'assets/css/components.css',
    'assets/js/main.js',
    'config/database.php',
    'config/config.php',
    'includes/functions.php'
];
$missing_files = [];
foreach ($required_files as $file) {
    if (!file_exists($file)) {
        $missing_files[] = $file;
    }
}
if (empty($missing_files)) {
    echo "✓ All core files present\n";
} else {
    echo "✗ Missing files: " . implode(', ', $missing_files) . "\n";
    $errors[] = "Missing core files";
}

// Check database connection (if config exists)
echo "6. Testing database connection... ";
if (file_exists('config/database.php')) {
    try {
        require_once 'config/database.php';
        require_once 'config/config.php';
        echo "✓ Database configuration loaded\n";
        
        // Note: Actual connection test would require database setup
        echo "   (Actual database test requires MySQL setup)\n";
    } catch (Exception $e) {
        echo "✗ Database configuration error: " . $e->getMessage() . "\n";
        $errors[] = "Database configuration issue";
    }
} else {
    echo "✗ Database config missing\n";
    $errors[] = "Database configuration missing";
}

// Check CSS and JS files
echo "7. Checking assets... ";
$css_files = ['assets/css/main.css', 'assets/css/components.css'];
$js_files = ['assets/js/main.js'];
$asset_issues = [];

foreach ($css_files as $file) {
    if (!file_exists($file) || filesize($file) == 0) {
        $asset_issues[] = $file;
    }
}

foreach ($js_files as $file) {
    if (!file_exists($file) || filesize($file) == 0) {
        $asset_issues[] = $file;
    }
}

if (empty($asset_issues)) {
    echo "✓ All assets present\n";
} else {
    echo "⚠ Asset issues: " . implode(', ', $asset_issues) . "\n";
    $warnings[] = "Asset issues";
}

// Summary
echo "\nValidation Summary\n";
echo "=================\n";

if (empty($errors) && empty($warnings)) {
    echo "✓ All checks passed! The OUTSINC portal is ready.\n";
    exit(0);
} else {
    if (!empty($errors)) {
        echo "✗ ERRORS (" . count($errors) . "):\n";
        foreach ($errors as $error) {
            echo "  - $error\n";
        }
    }
    
    if (!empty($warnings)) {
        echo "⚠ WARNINGS (" . count($warnings) . "):\n";
        foreach ($warnings as $warning) {
            echo "  - $warning\n";
        }
    }
    
    echo "\nPlease fix the errors before deployment.\n";
    exit(empty($errors) ? 0 : 1);
}
?>
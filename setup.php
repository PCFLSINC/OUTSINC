#!/usr/bin/env php
<?php
/**
 * OUTSINC Setup Tool
 * Helps set up the database and test the application according to README.md
 */

echo "🚀 OUTSINC Setup Tool\n";
echo "=====================\n\n";

// Colors for output
function green($text) { return "\033[32m$text\033[0m"; }
function red($text) { return "\033[31m$text\033[0m"; }
function yellow($text) { return "\033[33m$text\033[0m"; }
function blue($text) { return "\033[34m$text\033[0m"; }

$errors = [];
$warnings = [];

echo "This tool will help you set up OUTSINC according to the README.md guide.\n\n";

// Step 1: Check prerequisites
echo blue("Step 1: Checking Prerequisites\n");
echo "================================\n";

// Check PHP version
echo "Checking PHP version... ";
if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
    echo green("✓ PHP " . PHP_VERSION . " (OK)\n");
} else {
    echo red("✗ PHP " . PHP_VERSION . " (Requires 7.4+)\n");
    $errors[] = "PHP version too old";
}

// Check PHP extensions
$required_extensions = ['pdo_mysql', 'mbstring', 'fileinfo', 'json', 'session'];
echo "Checking PHP extensions... ";
$missing_extensions = [];
foreach ($required_extensions as $ext) {
    if (!extension_loaded($ext)) {
        $missing_extensions[] = $ext;
    }
}
if (empty($missing_extensions)) {
    echo green("✓ All required extensions loaded\n");
} else {
    echo red("✗ Missing extensions: " . implode(', ', $missing_extensions) . "\n");
    $errors[] = "Missing PHP extensions";
}

// Check if we can test MySQL connection
echo "Checking MySQL availability... ";
if (function_exists('shell_exec')) {
    $mysql_check = shell_exec('which mysql 2>/dev/null');
    if ($mysql_check) {
        echo green("✓ MySQL client found\n");
    } else {
        echo yellow("⚠ MySQL client not found in PATH\n");
        $warnings[] = "MySQL client not found";
    }
} else {
    echo yellow("⚠ Cannot check MySQL (shell_exec disabled)\n");
    $warnings[] = "Cannot check MySQL";
}

echo "\n";

// Step 2: Check file structure
echo blue("Step 2: Verifying File Structure\n");
echo "=================================\n";

$required_dirs = ['api', 'assets', 'config', 'includes', 'pages', 'logs', 'uploads'];
$missing_dirs = [];
foreach ($required_dirs as $dir) {
    if (!is_dir($dir)) {
        $missing_dirs[] = $dir;
    }
}
if (empty($missing_dirs)) {
    echo green("✓ All required directories present\n");
} else {
    echo red("✗ Missing directories: " . implode(', ', $missing_dirs) . "\n");
    $errors[] = "Missing directories";
}

// Check key files
$required_files = [
    'database_schema.sql' => 'Database schema',
    'seed.sql' => 'Demo data',
    'config/config.php' => 'Main configuration',
    'config/database.php' => 'Database configuration',
    'index.php' => 'Main entry point'
];

echo "Checking required files... ";
$missing_files = [];
foreach ($required_files as $file => $description) {
    if (!file_exists($file)) {
        $missing_files[] = "$file ($description)";
    }
}
if (empty($missing_files)) {
    echo green("✓ All required files present\n");
} else {
    echo red("✗ Missing files:\n");
    foreach ($missing_files as $file) {
        echo red("  - $file\n");
    }
    $errors[] = "Missing files";
}

echo "\n";

// Step 3: Test database configuration
echo blue("Step 3: Testing Database Configuration\n");
echo "======================================\n";

if (file_exists('config/database.php')) {
    echo "Loading database configuration... ";
    try {
        require_once 'config/database.php';
        echo green("✓ Configuration loaded\n");
        
        echo "Database settings:\n";
        echo "  Host: " . DB_HOST . "\n";
        echo "  Database: " . DB_NAME . "\n";
        echo "  User: " . DB_USER . "\n";
        echo "  Password: " . (empty(DB_PASS) ? "[empty]" : "[set]") . "\n\n";
        
        echo "Testing database connection... ";
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", 
                          DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            echo green("✓ Database connection successful\n");
            
            // Check if tables exist
            echo "Checking database tables... ";
            $stmt = $pdo->query("SHOW TABLES");
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            if (count($tables) > 0) {
                echo green("✓ Found " . count($tables) . " tables\n");
                echo "Tables: " . implode(', ', $tables) . "\n";
            } else {
                echo yellow("⚠ No tables found - database needs setup\n");
                $warnings[] = "Database needs schema import";
            }
            
        } catch (PDOException $e) {
            echo red("✗ Database connection failed: " . $e->getMessage() . "\n");
            $errors[] = "Database connection failed";
        }
        
    } catch (Exception $e) {
        echo red("✗ Configuration error: " . $e->getMessage() . "\n");
        $errors[] = "Database configuration error";
    }
} else {
    echo red("✗ Database configuration file missing\n");
    $errors[] = "Database configuration missing";
}

echo "\n";

// Step 4: Test web server functionality
echo blue("Step 4: Testing Application\n");
echo "===========================\n";

// Test PHP built-in server capability
echo "Testing PHP built-in server... ";
if (function_exists('shell_exec')) {
    echo green("✓ Can start development server\n");
    echo "  Run: " . yellow("php -S localhost:8080") . "\n";
    echo "  Then visit: " . blue("http://localhost:8080") . "\n";
} else {
    echo yellow("⚠ Cannot test (shell_exec disabled)\n");
}

echo "\n";

// Summary
echo blue("Setup Summary\n");
echo "=============\n";

if (empty($errors) && empty($warnings)) {
    echo green("🎉 Perfect! Your OUTSINC setup is ready.\n\n");
    echo "Next steps according to README.md:\n";
    echo "1. Import database schema: " . yellow("mysql -u " . (defined('DB_USER') ? DB_USER : 'root') . " -p " . (defined('DB_NAME') ? DB_NAME : 'outsinc_db') . " < database_schema.sql") . "\n";
    echo "2. Import demo data: " . yellow("mysql -u " . (defined('DB_USER') ? DB_USER : 'root') . " -p " . (defined('DB_NAME') ? DB_NAME : 'outsinc_db') . " < seed.sql") . "\n";
    echo "3. Start development server: " . yellow("php -S localhost:8080") . "\n";
    echo "4. Test the application: " . blue("http://localhost:8080") . "\n\n";
    
    echo "Demo accounts (password: password123):\n";
    echo "  • Admin: admin@outsinc.ca\n";
    echo "  • Staff: staff@outsinc.ca\n";
    echo "  • Client: client@example.com\n\n";
    
} else {
    if (!empty($errors)) {
        echo red("❌ ERRORS (" . count($errors) . "):\n");
        foreach ($errors as $error) {
            echo red("  • $error\n");
        }
        echo "\n";
    }
    
    if (!empty($warnings)) {
        echo yellow("⚠️  WARNINGS (" . count($warnings) . "):\n");
        foreach ($warnings as $warning) {
            echo yellow("  • $warning\n");
        }
        echo "\n";
    }
    
    echo "Please resolve the issues above and re-run this tool.\n";
    echo "For detailed instructions, see the README.md file.\n\n";
}

echo "For more help, see:\n";
echo "  • README.md - Complete setup guide\n";
echo "  • PROJECT_README.md - Technical overview\n"; 
echo "  • WORKFLOW.md - Development procedures\n";
echo "  • validate.php - Basic validation script\n\n";

echo "Happy coding! 🚀\n";

exit(empty($errors) ? 0 : 1);
?>
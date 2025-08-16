#!/usr/bin/env php
<?php
/**
 * OUTSINC Feature Test Suite
 * Tests the features documented in README.md
 */

echo "🧪 OUTSINC Feature Test Suite\n";
echo "=============================\n\n";

$tests_passed = 0;
$tests_total = 0;

function test($description, $condition) {
    global $tests_passed, $tests_total;
    $tests_total++;
    
    echo sprintf("%-50s", $description . "...");
    
    if ($condition) {
        echo " ✅ PASS\n";
        $tests_passed++;
        return true;
    } else {
        echo " ❌ FAIL\n";
        return false;
    }
}

echo "Testing application structure and files:\n";
echo "=======================================\n";

// Test core files exist
test("README.md exists", file_exists('README.md'));
test("seed.sql exists", file_exists('seed.sql'));
test("setup.php exists", file_exists('setup.php'));
test("database_schema.sql exists", file_exists('database_schema.sql'));

// Test directory structure
test("API directory exists", is_dir('api'));
test("Assets directory exists", is_dir('assets'));
test("Config directory exists", is_dir('config'));
test("Pages directory exists", is_dir('pages'));

// Test configuration files
test("Main config file exists", file_exists('config/config.php'));
test("Database config exists", file_exists('config/database.php'));

echo "\nTesting API endpoints exist:\n";
echo "============================\n";

test("Chat status API exists", file_exists('api/chat-status.php'));
test("Impact counters API exists", file_exists('api/impact-counters.php'));
test("Submit report API exists", file_exists('api/submit-report.php'));
test("Callback request API exists", file_exists('api/callback-request.php'));

echo "\nTesting PHP syntax:\n";
echo "==================\n";

$php_files = glob('{api,config,includes,pages}/*.php', GLOB_BRACE);
$syntax_ok = true;

foreach ($php_files as $file) {
    $output = shell_exec("php -l \"$file\" 2>&1");
    if (strpos($output, 'No syntax errors') === false) {
        $syntax_ok = false;
        echo "Syntax error in $file\n";
    }
}

test("All PHP files have valid syntax", $syntax_ok);

echo "\nTesting documentation completeness:\n";
echo "==================================\n";

// Test README.md has required sections
$readme_content = file_get_contents('README.md');
test("Prerequisites section exists", strpos($readme_content, '## 🔧 Prerequisites') !== false);
test("Local Setup section exists", strpos($readme_content, '## 🚀 Local Setup') !== false);
test("Database Configuration exists", strpos($readme_content, '## 🗄️ Database Configuration') !== false);
test("Demo Accounts section exists", strpos($readme_content, '## 👥 Demo Accounts') !== false);
test("AJAX Endpoints documented", strpos($readme_content, '## 🔌 AJAX Endpoints') !== false);
test("Security section exists", strpos($readme_content, '## 🔒 Security & Validation') !== false);
test("Error Logging documented", strpos($readme_content, '## 📝 Error Logging') !== false);
test("Responsive UI testing exists", strpos($readme_content, '## 📱 Responsive UI Testing') !== false);
test("QA Testing checklist exists", strpos($readme_content, '## ✅ QA Testing Checklist') !== false);

echo "\nTesting seed.sql content:\n";
echo "========================\n";

$seed_content = file_get_contents('seed.sql');
test("Demo users in seed.sql", strpos($seed_content, 'INSERT INTO users') !== false);
test("Demo passwords documented", strpos($seed_content, 'password123') !== false);
test("Service providers in seed", strpos($seed_content, 'INSERT INTO service_providers') !== false);
test("Demo resources in seed", strpos($seed_content, 'INSERT INTO resources') !== false);
test("Admin settings in seed", strpos($seed_content, 'INSERT INTO admin_settings') !== false);

echo "\nTesting file permissions:\n";
echo "========================\n";

test("Logs directory writable", is_writable('logs'));
test("Uploads directory writable", is_writable('uploads'));
test("Setup script executable", is_executable('setup.php'));

echo "\nTesting security features:\n";
echo "=========================\n";

// Test htaccess exists
test(".htaccess file exists", file_exists('.htaccess'));

// Test includes/functions.php has security functions
if (file_exists('includes/functions.php')) {
    $functions_content = file_get_contents('includes/functions.php');
    test("Input sanitization function exists", strpos($functions_content, 'sanitize_input') !== false);
    test("Error logging function exists", strpos($functions_content, 'log_error') !== false);
} else {
    test("Functions file exists", false);
    test("Input sanitization function exists", false);
    test("Error logging function exists", false);
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "📊 Test Results Summary\n";
echo str_repeat("=", 50) . "\n";

$pass_rate = ($tests_passed / $tests_total) * 100;

echo "Tests passed: $tests_passed / $tests_total (" . number_format($pass_rate, 1) . "%)\n";

if ($tests_passed === $tests_total) {
    echo "🎉 All tests passed! OUTSINC is ready for setup.\n";
    echo "\nNext steps:\n";
    echo "1. Run: php setup.php (interactive setup guide)\n";
    echo "2. Set up MySQL database\n";
    echo "3. Import schema and demo data\n";
    echo "4. Test with: php -S localhost:8080\n";
} else {
    echo "⚠️  Some tests failed. Please check the issues above.\n";
    echo "See README.md for detailed setup instructions.\n";
}

echo "\nFor more information:\n";
echo "• README.md - Complete setup guide\n";
echo "• setup.php - Interactive setup tool\n";
echo "• validate.php - System validation\n";

exit($tests_passed === $tests_total ? 0 : 1);
?>
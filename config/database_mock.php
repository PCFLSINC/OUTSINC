<?php
/**
 * Mock Database Configuration for Testing
 * This provides fallback data when the database is not available
 */

// Use original database config first
$original_config = __DIR__ . '/database.php.original';
if (file_exists($original_config)) {
    require_once $original_config;
    return;
}

// Mock database connection for testing
define('DB_HOST', 'localhost');
define('DB_NAME', 'outsinc_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Mock PDO object that returns demo data
class MockPDO {
    public function prepare($sql) {
        return new MockStatement();
    }
    
    public function query($sql) {
        return new MockStatement();
    }
}

class MockStatement {
    public function execute($params = []) {
        return true;
    }
    
    public function fetch($mode = null) {
        // Return demo data based on the SQL query context
        return [
            'count' => rand(10, 50),
            'status' => 'offline',
            'last_active' => date('Y-m-d H:i:s', strtotime('-1 hour'))
        ];
    }
    
    public function fetchAll($mode = null) {
        return [
            ['count' => rand(10, 50)],
            ['count' => rand(5, 25)]
        ];
    }
}

// For testing, create a mock PDO connection
try {
    $pdo = new MockPDO();
    error_log("Using mock database for testing - database connection not available");
} catch (Exception $e) {
    error_log("Mock database setup failed: " . $e->getMessage());
    die("Database configuration error");
}
?>
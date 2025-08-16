<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require_once '../config/database.php';
require_once '../config/config.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

try {
    // Sanitize inputs
    $name = sanitize_input($_POST['name'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone)) {
        echo json_encode([
            'success' => false,
            'message' => 'Name and phone number are required'
        ]);
        exit;
    }
    
    // Basic phone validation
    $phone_clean = preg_replace('/[^0-9+\-\(\)\s]/', '', $phone);
    if (strlen($phone_clean) < 10) {
        echo json_encode([
            'success' => false,
            'message' => 'Please enter a valid phone number'
        ]);
        exit;
    }
    
    // Insert into database
    $stmt = $pdo->prepare("
        INSERT INTO contact_requests (type, name, phone, subject, message)
        VALUES ('callback', ?, ?, 'Callback Request', 'User requested a callback')
    ");
    
    $stmt->execute([$name, $phone_clean]);
    
    log_error("Callback request submitted", [
        'name' => $name,
        'phone' => substr($phone_clean, 0, 3) . '***' // Log partial phone for privacy
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => "Thank you! We'll call you back within 24 hours."
    ]);
    
} catch (Exception $e) {
    log_error("Callback request error", ['error' => $e->getMessage()]);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while submitting your request. Please try again.'
    ]);
}
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../config/config.php';
require_once '../includes/functions.php';

try {
    $status = is_chat_operator_live();
    
    echo json_encode([
        'success' => true,
        'status' => $status,
        'timestamp' => time()
    ]);
    
} catch (Exception $e) {
    log_error("Chat status API error", ['error' => $e->getMessage()]);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Unable to fetch chat status'
    ]);
}
?>
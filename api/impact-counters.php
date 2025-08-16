<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../config/config.php';
require_once '../includes/functions.php';

try {
    $counters = get_impact_counters();
    
    echo json_encode([
        'success' => true,
        'cases_today' => $counters['cases_today'],
        'partners_live' => $counters['partners_live'],
        'chats_week' => $counters['chats_week'],
        'timestamp' => time()
    ]);
    
} catch (Exception $e) {
    log_error("Impact counters API error", ['error' => $e->getMessage()]);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Unable to fetch impact counters'
    ]);
}
?>
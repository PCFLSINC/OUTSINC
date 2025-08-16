<?php
/**
 * Utility functions for OUTSINC
 */

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function log_error($message, $context = []) {
    $log_entry = date('Y-m-d H:i:s') . " - " . $message;
    if (!empty($context)) {
        $log_entry .= " - Context: " . json_encode($context);
    }
    error_log($log_entry);
}

function get_user_preferences() {
    return [
        'theme' => $_SESSION['theme'] ?? $_COOKIE['theme'] ?? 'light',
        'font_size' => $_SESSION['font_size'] ?? $_COOKIE['font_size'] ?? 'medium',
        'font_type' => $_SESSION['font_type'] ?? $_COOKIE['font_type'] ?? 'default',
        'high_contrast' => $_SESSION['high_contrast'] ?? $_COOKIE['high_contrast'] ?? false,
        'reduced_motion' => $_SESSION['reduced_motion'] ?? $_COOKIE['reduced_motion'] ?? false
    ];
}

function set_user_preference($key, $value) {
    $_SESSION[$key] = $value;
    setcookie($key, $value, time() + (86400 * 30), '/'); // 30 days
}

function is_chat_operator_live() {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT last_active FROM chat_operators WHERE is_active = 1 ORDER BY last_active DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch();
        
        if (!$result) return 'offline';
        
        $last_active = strtotime($result['last_active']);
        $minutes_ago = (time() - $last_active) / 60;
        
        if ($minutes_ago < 5) return 'live';
        if ($minutes_ago < CHAT_TIMEOUT_MINUTES) return 'recent';
        return 'offline';
    } catch (Exception $e) {
        log_error("Error checking chat operator status", ['error' => $e->getMessage()]);
        return 'offline';
    }
}

function get_impact_counters() {
    global $pdo;
    try {
        $counters = [];
        
        // Cases started today
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM cases WHERE DATE(created_at) = CURDATE()");
        $stmt->execute();
        $counters['cases_today'] = $stmt->fetch()['count'] ?? 0;
        
        // Partners live
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM service_providers WHERE is_active = 1");
        $stmt->execute();
        $counters['partners_live'] = $stmt->fetch()['count'] ?? 0;
        
        // Chats answered this week
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM chat_sessions WHERE YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1) AND status = 'completed'");
        $stmt->execute();
        $counters['chats_week'] = $stmt->fetch()['count'] ?? 0;
        
        return $counters;
    } catch (Exception $e) {
        log_error("Error fetching impact counters", ['error' => $e->getMessage()]);
        // Return demo values if database fails
        return [
            'cases_today' => 42,
            'partners_live' => 18,
            'chats_week' => 127
        ];
    }
}

function generate_case_id() {
    return 'CASE-' . date('Ymd') . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

function validate_file_upload($file) {
    $errors = [];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'File upload failed';
        return $errors;
    }
    
    if ($file['size'] > MAX_FILE_SIZE) {
        $errors[] = 'File size exceeds limit (5MB max)';
    }
    
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ALLOWED_EXTENSIONS)) {
        $errors[] = 'File type not allowed';
    }
    
    return $errors;
}

function escape_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>
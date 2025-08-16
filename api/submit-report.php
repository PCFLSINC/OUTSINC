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
    $category = sanitize_input($_POST['category'] ?? '');
    $location = sanitize_input($_POST['location'] ?? '');
    $description = sanitize_input($_POST['description'] ?? '');
    $reporter_name = sanitize_input($_POST['reporter_name'] ?? '');
    $reporter_contact = sanitize_input($_POST['reporter_contact'] ?? '');
    
    // Validate required fields
    if (empty($category) || empty($description)) {
        echo json_encode([
            'success' => false,
            'message' => 'Category and description are required'
        ]);
        exit;
    }
    
    // Handle file upload
    $photo_path = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_errors = validate_file_upload($_FILES['photo']);
        
        if (empty($upload_errors)) {
            $upload_dir = '../uploads/reports/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            $file_extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
            $new_filename = uniqid('report_') . '.' . $file_extension;
            $photo_path = $upload_dir . $new_filename;
            
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
                log_error("Failed to upload report photo", ['filename' => $new_filename]);
                $photo_path = null;
            } else {
                $photo_path = 'uploads/reports/' . $new_filename; // Store relative path
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => implode(', ', $upload_errors)
            ]);
            exit;
        }
    }
    
    // Generate case ID
    $case_id = generate_case_id();
    
    // Insert into database
    $stmt = $pdo->prepare("
        INSERT INTO reports (case_id, category, location, description, photo_path, reporter_name, reporter_contact)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    
    $stmt->execute([
        $case_id,
        $category,
        $location,
        $description,
        $photo_path,
        $reporter_name ?: null,
        $reporter_contact ?: null
    ]);
    
    log_error("New report submitted", [
        'case_id' => $case_id,
        'category' => $category,
        'anonymous' => empty($reporter_name)
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => "Thank you! Your report has been submitted. Case ID: {$case_id}",
        'case_id' => $case_id
    ]);
    
} catch (Exception $e) {
    log_error("Report submission error", ['error' => $e->getMessage()]);
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while submitting your report. Please try again.'
    ]);
}
?>
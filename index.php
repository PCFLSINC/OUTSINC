<?php
session_start();
require_once 'config/database.php';
require_once 'config/config.php';
require_once 'includes/functions.php';

// Get current route
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = rtrim($request_uri, '/') ?: '/';

// Basic routing
switch ($route) {
    case '/':
        $page_title = 'OUTSINC - Navigate housing, health, ID, and more';
        include 'pages/landing.php';
        break;
    case '/chat-ops':
        $page_title = 'OUTSINC - Chat Operations';
        include 'pages/chat-ops.php';
        break;
    case '/directory':
        $page_title = 'OUTSINC - Resource Directory';
        include 'pages/directory.php';
        break;
    case '/report':
        $page_title = 'OUTSINC - Report an Issue';
        include 'pages/report.php';
        break;
    case '/providers':
        $page_title = 'OUTSINC - Service Providers';
        include 'pages/providers.php';
        break;
    default:
        http_response_code(404);
        $page_title = 'OUTSINC - Page Not Found';
        include 'pages/404.php';
        break;
}
?>
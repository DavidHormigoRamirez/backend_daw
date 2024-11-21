<?php

// Include the necessary files
require_once 'db.php';
require_once 'students.php';
require_once 'health.php';

// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'];

// Remove the base path (if any)
$requestUri = parse_url($requestUri, PHP_URL_PATH);

// Strip the leading slash for easier matching
$requestUri = ltrim($requestUri, '/');

// Remove trailing slash (if any)
$requestUri = rtrim($requestUri, '/');

// Routing logic for `/api/health` and `/api/students`
switch ($requestUri) {
    case 'api/health':
        respondHealth(); // Call health controller function
        break;

    case 'api/students':
        handleStudentsRequest(); // Call students controller function
        break;

    default:
        respondNotFound(); // Handle unknown endpoints
        break;
}

// Handle requests related to students (GET/POST)
function handleStudentsRequest() {
    // Check the request method and call the appropriate function in students.php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        getStudents(); // Get students from students.php
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createStudent(); // Create a new student from students.php
    } else {
        respondMethodNotAllowed();
    }
}

// Respond with a 404 not found message
function respondNotFound() {
    http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'message' => 'Not Found'
    ]);
}

// Method not allowed for unsupported HTTP methods
function respondMethodNotAllowed() {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method Not Allowed'
    ]);
}

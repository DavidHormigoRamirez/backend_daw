<?php

// Include the database connection
require_once 'db.php';

// GET /api/students - Retrieve the list of students
function getStudents() {
    // Get the PDO connection
    $pdo = getDB();

    try {
        // Query to get all students from the database
        $stmt = $pdo->prepare("SELECT * FROM students");
        $stmt->execute();

        // Fetch all students as an associative array
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Respond with the students data
        echo json_encode([
            'status' => 'success',
            'data' => $students
        ]);
    } catch (PDOException $e) {
        // If the query fails, respond with an error
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to retrieve students: ' . $e->getMessage()
        ]);
    }
}

// POST /api/students - Create a new student
function createStudent() {
    // Get the raw POST data
    $data = json_decode(file_get_contents("php://input"));

    // Validate the data
    if (!isset($data->name) || !isset($data->email)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Missing required fields: name and email are required'
        ]);
        return;
    }

    // Prepare the insert query
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO students (name, email) VALUES (:name, :email)");

    // Bind parameters to prevent SQL injection
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':email', $data->email);

    try {
        // Execute the insert query
        $stmt->execute();

        // Respond with a success message
        echo json_encode([
            'status' => 'success',
            'message' => 'Student created successfully',
            'data' => [
                'id' => $pdo->lastInsertId(),
                'name' => $data->name,
                'email' => $data->email
            ]
        ]);
    } catch (PDOException $e) {
        // If the query fails, respond with an error
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to create student: ' . $e->getMessage()
        ]);
    }
}

<?php

// Health check endpoint
function respondHealth() {
    echo json_encode([
        'status' => 'success',
        'message' => 'API is healthy',
        'timestamp' => time()
    ]);
}

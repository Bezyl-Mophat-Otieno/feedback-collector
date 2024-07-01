<?php

// Define constants for database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'T33nwo!f'); // Consider storing this securely
define('DB_NAME', 'php_tutorials');

// Establish a connection to the database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check if the connection failed
if (!$connection) {
    // Log the error message for debugging
    error_log('Database connection failed: '. mysqli_connect_error());
    // Optionally, display a user-friendly message
    echo '
        <div class="alert text-center alert-danger" role="alert">
            Failed to connect to the database.
        </div>
    ';
} else {
    // Successfully connected to the database
    echo '
        <div class="alert text-center alert-success" role="alert">
            Connected to the database.
        </div>
    
    ';
}
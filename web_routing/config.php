<?php

// Function to parse .env file and set environment variables
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("The .env file does not exist.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        // Skip comments and empty lines
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Split the line into key and value by '='
        list($key, $value) = explode('=', $line, 2);
        
        // Remove potential surrounding spaces
        $key = trim($key);
        $value = trim($value);
        
        // Set environment variable
        putenv("{$key}={$value}");
    }
}

// Load .env file
loadEnv(__DIR__ . '/.env');


return [
    'database' => [
        'host' => getenv('DB_HOST'),
        'port' => getenv('DB_PORT'),
        'dbname' => getenv('DB_NAME'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8mb4'
    ],

    'extra_config' => []
];



?>
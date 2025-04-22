<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Path Test</h1>";

echo "<p>Current directory: " . __DIR__ . "</p>";

$submit_path = __DIR__ . '/php/submit.php';
echo "<p>Submit.php path: " . $submit_path . "</p>";
echo "<p>Submit.php exists: " . (file_exists($submit_path) ? 'Yes' : 'No') . "</p>";

try {
    require_once __DIR__ . '/php/db/config.php';
    echo "<p>Database connection: Success!</p>";
} catch (Exception $e) {
    echo "<p>Database connection failed: " . $e->getMessage() . "</p>";
}
?> 
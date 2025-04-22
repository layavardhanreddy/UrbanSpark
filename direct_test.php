<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1>POST Data Received</h1>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Direct Test</title>
</head>
<body>
    <h1>Direct Form Test</h1>
    <form method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html> 
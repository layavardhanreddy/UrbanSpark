<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Database Connection Test</h2>";

try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL server successfully.<br>";

    $stmt = $pdo->query("SHOW DATABASES LIKE 'urbanspark'");
    if ($stmt->rowCount() > 0) {
        echo "Database 'urbanspark' exists.<br>";
        
        $pdo->exec("USE urbanspark");
        
        $stmt = $pdo->query("SHOW TABLES LIKE 'admins'");
        if ($stmt->rowCount() > 0) {
            echo "Table 'admins' exists.<br>";
            
            $stmt = $pdo->query("SELECT * FROM admins WHERE username = 'admin'");
            $admin = $stmt->fetch();
            if ($admin) {
                echo "Admin user exists.<br>";
                echo "Username: " . htmlspecialchars($admin['username']) . "<br>";
            } else {
                echo "Admin user does not exist.<br>";
            }
        } else {
            echo "Table 'admins' does not exist.<br>";
        }
    } else {
        echo "Database 'urbanspark' does not exist.<br>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "Make sure MySQL is running and the credentials are correct.<br>";
}
?> 
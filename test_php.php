<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>PHP Test Page</h1>";
echo "<pre>";

echo "Error Reporting Level: " . error_reporting() . "\n";
echo "Display Errors: " . ini_get('display_errors') . "\n\n";

echo "POST Data:\n";
print_r($_POST);
echo "\n";

echo "FILES Data:\n";
print_r($_FILES);
echo "\n";

try {
    require_once 'db/config.php';
    echo "Database Connection Test:\n";
    if (isset($pdo)) {
        echo "PDO object exists\n";
        echo "Database type: " . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . "\n\n";

        if (!empty($_POST)) {
            echo "Attempting database insert...\n";
            
            $file_path = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = __DIR__ . '/uploads/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                $file_name = uniqid() . '.' . $file_extension;
                $target_path = $upload_dir . $file_name;
                
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                    $file_path = 'uploads/' . $file_name;
                    echo "File uploaded: $file_path\n";
                }
            }

            $sql = "INSERT INTO ideas (
                title, description, category, email, file_path,
                people_affected, cost_savings, environmental_impact, implementation_time
            ) VALUES (
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?
            )";

            $stmt = $pdo->prepare($sql);
            
            $result = $stmt->execute([
                $_POST['title'],
                $_POST['description'],
                $_POST['category'],
                $_POST['email'],
                $file_path,
                0,  
                0,  
                0,  
                1  
            ]);

            if ($result) {
                $id = $pdo->lastInsertId();
                echo "Success! Record inserted with ID: $id\n";
            } else {
                echo "Failed to insert record\n";
            }
        }
    } else {
        echo "PDO object not found\n";
    }
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}

echo "</pre>";
?> 
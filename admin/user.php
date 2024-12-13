<?php
try {
    include '../include/DatabaseConnection.php';
    include '../include/DatabaseFunction.php';

    $user = allUsers($pdo);
    $title = 'User list';

    ob_start();
    include '../teamplates/user.html.php';
    $output = ob_get_clean();    
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'teamplates/user_layout.html.php';
?>
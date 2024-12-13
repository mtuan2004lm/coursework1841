<?php
try {
    include '../include/DatabaseConnection.php';
    include '../include/DatabbaseFunction.php';   
    deleteUser($pdo, $_POST['id']);
    header('location:user.php');
}catch  (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete post:' .$e -> getMessage();
}
include '../user_layout.html.php';
?>
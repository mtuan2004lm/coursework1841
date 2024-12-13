<?php
if (isset($_POST['user'])){
    try {
        include '../include/DatabaseConnection.php';
        include '../include/DataBaseFunction.php';

        insertUser($pdo, $_POST['user'], $_POST['email'], $_POST['password']);
        header('location:user.php');
    }catch(PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error:' . $e -> getMessage();
}
}else{
    include '../include/DatabaseConnection.php';
    include '../include/DatabaseFunction.php';
    $title = 'Add new user';
    $user = allUser($pdo);
    ob_start();
    include '../templates/user.html.php';
    $output = ob_get_clean();
}
include '../templates/user_layout.html.php';
?>
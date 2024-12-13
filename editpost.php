<?php
include 'include/DatabaseConnection.php';
include 'include/DatabaseFunction.php';
include 'include/uploadFile.php';
try{
    if(isset($_POST['posttext'])){
        updatePost($pdo, $_POST['postid'], $_POST['posttext'], $_POST['module'],$_FILES['fileToUpload']['name'] );
        header('location: Post.php');
    } else {
        $post = getPost($pdo,$_GET['id']);
        $title = 'Edit Post';
        $module = allModule($pdo);
        

        ob_start();
        include 'templates/editpost.html.php';
        $output = ob_get_clean();
    }
} catch(PDOException $e) {
    $title = 'error has occurred';
    $output = 'Error editing post ' . $e->getMessage();
}
include 'templates/layout.html.php';

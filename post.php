<?php
try{
    include 'include/DatabaseConnection.php';
    include 'include/DatabaseFunction.php';


    $posts = allPost($pdo);
    $title= 'Post list';
    $totalpost = totalPost($pdo);
    
    ob_start();
    include 'templates/post.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output= 'Database error:' . $e->getMessage();
}
include 'templates/layout.html.php'; 

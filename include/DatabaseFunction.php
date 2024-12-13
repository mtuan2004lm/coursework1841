<?php
function totalpost($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM post');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}
    function allUsers($pdo) {
        $users = query($pdo, 'SELECT * FROM user');
        return $users->fetchALL();
}

function getPost($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM post WHERE id = :id', $parameters);
    return $query->fetch();
}
function updatePost($pdo, $postId, $posttext, $moduleid, $fileToUpload) {
    $query = 'UPDATE post 
              SET posttext = :posttext, 
                  uploads = :uploads, 
                  moduleid = :moduleid 
              WHERE id = :id';
    $parameters = [
        ':posttext' => $posttext,
        ':moduleid' => $moduleid,
        ':id' => $postId,
        ':uploads' => $fileToUpload
    ];

    $stmt = $pdo->prepare($query);
    return $stmt->execute($parameters);
}
function deletePost($pdo, $id){
    $parameters = [':id'=> $id];
    query($pdo, 'DELETE FROM post WHERE id= :id', $parameters);
}
function insertPost($pdo, $posttext, $userid, $moduleid, $fileToUpload ) {
   $query = 'INSERT INTO post (posttext, postdate, uploads, userid, moduleid)
   VALUES (:posttext, CURDATE(), :fileToUpLoad, :userid, :moduleid)';
   $parameters= [':posttext' => $posttext, ':fileToUpLoad' =>$fileToUpload, ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}


function allUser($pdo){
    $user = query($pdo, 'SELECT * FROM user');
    return $user->fetchAll();
}
function allModule($pdo){
    $module = query($pdo, 'SELECT * FROM module');
    return $module->fetchAll();
}
function allPost($pdo) {
    $post = query($pdo,'SELECT post.id, posttext, postdate, uploads,  `name`, email, moduleName FROM post
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $post->fetchAll();

}
function isAdmin($userId, $pdo) {
    $query = query($pdo, "SELECT role FROM users WHERE id = :id", [':id' => $userId]);
    $user = $query->fetch();
    return $user['role'] === 'admin';
}

function userHasPosts($pdo, $userId) {
    $sql = 'SELECT COUNT(*) FROM post WHERE userid = :userid';
    $parameters = [':userid' => $userId];
    $query = query($pdo, $sql, $parameters);
    $count = $query->fetchColumn();
    return $count > 0;
}
# add user gồm name email vs password
function insertUser($pdo, $name, $email, $Password) {
    $query = 'INSERT INTO user (name, email, password)
    VALUES (:name, :email, :password)';
    $parameters = [':name' => $name, ':email' => $email, ':password' => $Password];
    query($pdo, $query, $parameters);
}
#delete user
function deleteUser($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM user WHERE id = :id', $parameters);
}
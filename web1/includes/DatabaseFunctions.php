<?php
function totalQuestions($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateQuestion($pdo, $questionId, $questiontext, $image) {
    $query = 'UPDATE question SET questiontext = :questiontext, image = :image WHERE id = :id';
    $parameters = [':questiontext' => $questiontext, ':image' => $image, ':id' => $questionId ];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

function insertQuestion($pdo, $questiontext, $postid, $moduleid, $image) {
    $query = 'INSERT INTO question (questiontext, questiondate, postid, moduleid, image)
    VALUES (:questiontext, CURDATE(), :postid, :moduleid, :image)';
    $parameters = [':questiontext' => $questiontext, ':postid' => $postid, ':moduleid' => $moduleid, ':image' => $image ];
    query($pdo, $query, $parameters);
}

function allPosts($pdo){
    $posts = query($pdo, 'SELECT * FROM post');
    return $posts->fetchAll();
}

function allCategories($pdo){
    $categories = query($pdo, 'SELECT * FROM  module');
    return $categories->fetchAll();
}

function allQuestions($pdo){
    $questions = query($pdo, 'SELECT question.id, questiontext, question.image, `name`, email, moduleName FROM question
    INNER JOIN post ON postid = post.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}

// function allUsers($pdo) {
//     $stmt = $pdo->query('SELECT id, username FROM user');
//     return $stmt->fetchAll();
// }

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM modules');
    return $modules->fetchAll();
    $totalModules = $pdo->query('SELECT COUNT(*) FROM modules')->fetchColumn();
    
}

function insertModules($pdo, $moduleName){
    $query = 'INSERT INTO module (moduleName) VALUES (:moduleName)';
    $parameters = [':moduleName' => $moduleName];
    query($pdo, $query, $parameters);
}

function deleteModules ($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM module WHERE id = :id', $parameters);
}

function updateModules ($pdo, $moduleId, $moduleName){
    $query = 'UPDATE module SET moduleName = :moduleName WHERE id = :id';
    $parameters = [':moduleName' => $moduleName, ':id' => $moduleId];
    query($pdo, $query, $parameters);
}

// Lấy tất cả user
function allUsers($pdo) {
    $query = query($pdo, 'SELECT * FROM post');
    return $query->fetchAll();
}

// Thêm user
function insertUser($pdo, $name, $email, $role, $password) {
    $query = 'INSERT INTO post (name, email, role, password) VALUES (:name, :email, :role, :password)';
    $parameters = [':name' => $name, ':email' => $email, ':role' => $role, ':password' => password_hash($password, PASSWORD_DEFAULT) 
    // Băm mật khẩu
    ];
    query($pdo, $query, $parameters);
}

// <?php
// function insertUsers($pdo, $name, $email, $role) {
//     $sql = "INSERT INTO users (name, email, role) VALUES (:name, :email, :role)";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(['name' => $name, 'email' => $email, 'role' => $role]);
// }
// Sửa user
function updateUser($pdo, $userId, $name, $email, $role) {
    $query = 'UPDATE post SET name = :name, email = :email, role = :role WHERE id = :id';
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':role' => $role,
        ':id' => $userId
    ];
    query($pdo, $query, $parameters);
}

// Xóa user
function deleteUser($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM post WHERE id = :id', $parameters);
}


function insertPost($pdo, $postContent, $userId, $moduleId, $image) {
    $query = 'INSERT INTO posts (postContent, created_at, user_id, module_id, image)
              VALUES (:postContent, NOW(), :user_id, :module_id, :image)';
    $parameters = [
        ':postContent' => $postContent,
        ':user_id'     => $userId,
        ':module_id'   => $moduleId,
        ':image'       => $image
    ];
    $stmt = $pdo->prepare($query);
    $stmt->execute($parameters);
}
?>
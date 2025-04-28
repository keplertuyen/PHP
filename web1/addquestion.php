<?php
if (isset($_POST['questiontext'])){
    try{
        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunctions.php';
        insertQuestion($pdo, $_POST['questiontext'], $_POST['posts'],$_POST['categories'], $_POST['image']);

        // $sql = 'INSERT INTO question SET
        // questiontext = :questiontext,
        // questiondate = CURDATE(),
        // postid = :postid,
        // moduleid= 3,
        // image = :image';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':questiontext', $_POST['questiontext']);
        // $stmt->bindValue(':postid', $_POST['posts']);
        // $stmt->bindValue(':image', $_POST['image']);
        // $stmt->execute();
        header('location: question.php');
    }catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    $title = 'Add a new question';
    $posts = allPosts($pdo);
    $categories = allCategories($pdo);
    ob_start(); 
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
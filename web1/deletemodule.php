<?php
try {
    include './includes/DatabaseConnection.php';
    include './includes/DatabaseFunctions.php';

    deleteModules($pdo, $_POST['id']);
    header('location: question.php');
    exit;
}

catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete post: ' . $e->getMessage();
}
include './templates/layout.html.php';
<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

try {
    if (isset($_POST['questiontext'])) {
        updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext'], $_POST['image']);
        header('location: question.php');
    } else {
        $question = getQuestion($pdo, $_GET['id']);
        $title = 'Edit question';

        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'error has occured';
    $output = 'Error editing question: ' . $e->getMessage();
}

include 'templates/layout.html.php';

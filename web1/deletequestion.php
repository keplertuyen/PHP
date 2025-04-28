<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    deleteQuestion($pdo, $_POST ['id']);
    header('location: question.php');
    
}

catch(PDOException $e){
    $title = 'An error has occured';
    $output = 'Unabale to connect to delete question:'.$e->getMessage();
}
include 'templates/layout.html.php';
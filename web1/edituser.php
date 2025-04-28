<?php
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

try {
    if(isset($_POST['name'])){
        updateUser($pdo, $_POST['id'], $_POST['name'], $_POST['email'], $_POST['role']);
        header('Location: manageuser.php');
        exit();
    }
} catch (PDOException $e) {
    $error = 'Error updating users: ' . $e->getMessage();
    include './templates/layout.html.php';
}

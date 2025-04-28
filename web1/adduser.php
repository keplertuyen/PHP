<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './includes/session.php';
require_once './includes/DatabaseFunctions.php';

    try {
        include './includes/DatabaseConnection.php';

        insertUser($pdo, $_POST['name'], $_POST['email'], $_POST['role'], $_POST['password']);

        header('location: manageuser.php');
        exit;
    } 
    
    catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
        $users = allUsers($pdo);
        ob_start();
        include './templates/controlpanel.html.php';
        $output = ob_get_clean();
    }
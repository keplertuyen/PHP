<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './includes/session.php';
    try {
        include './includes/DatabaseConnection.php';
        include './includes/DatabaseFunctions.php';

        
        insertModules($pdo, $_POST['moduleName']);

        header('location: managemodule.php');
        exit;
    } 
    
    catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
        $modules = allModules($pdo);
        ob_start();
        include '../templates/controlpanel.html.php';
        $output = ob_get_clean();
    }
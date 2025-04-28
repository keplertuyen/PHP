<?php
// require_once 'includes/session.php';
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

try {
    $title = 'Control Panel';
    session_start();
    ob_start();
    
    include 'templates/controlpanel.html.php';
    $output = ob_get_clean();
    include 'templates/layout.html.php';

} 

catch (PDOException $e) {
    $error = 'Database error: ' . $e->getMessage();
    include 'templates/layout.html.php';
}
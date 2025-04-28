<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './includes/session.php';
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

try {
    $modules = $pdo->query('
        SELECT m.*, COUNT(p.id) as post_count 
        FROM module m 
        LEFT JOIN post p ON m.id = p.id 
        GROUP BY m.id
    ')->fetchAll();
    $title = 'Manage Modules';
    ob_start();
    include './templates/managemodule.html.php';
    $output = ob_get_clean();
    include './templates/layout.html.php';

} catch (PDOException $e) {
    $error = 'Error fetching modules: ' . $e->getMessage();
    include './templates/layout.html.php';
}  
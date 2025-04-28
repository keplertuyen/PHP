<?php
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

// $users = allUsers($pdo);
try {
    $users = allUsers($pdo);
    $title = 'User list';

    ob_start();
    include './templates/manageuser.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include './templates/layout.html.php';

?>

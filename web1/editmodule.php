<?php
require_once './includes/session.php';
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

try {
    if (isset($_POST['id']) && isset($_POST['moduleName'])) {
        $stmt = $pdo->prepare('UPDATE module SET moduleName = ? WHERE id = ?');
        $stmt->execute([$_POST['moduleName'], $_POST['id']]);
        header('Location: managemodule.php');
        exit();
    }
} catch (PDOException $e) {
    $error = 'Error updating module: ' . $e->getMessage();
    include './templates/layout.html.php';
}

include './templates/layout.html.php';
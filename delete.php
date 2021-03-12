<?php
if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} 

$newDatabaseDeleteInstance = new DatabaseConnection();
$newDatabaseDeleteInstance->deleteData('registered_users', $id);
?>
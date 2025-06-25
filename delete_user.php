<?php

session_start();  
require_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE id = $id");
    
    $_SESSION['message'] = "user deleted sucessfully!";
}
else{
    $_SESSION['message'] = "user not deleted sucessfully";
}

header("Location: index.php?message=deleted");
exit();
?>

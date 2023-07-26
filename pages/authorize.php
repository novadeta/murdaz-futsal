<?php 
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['username']) && !isset($_SESSION['role'])) {
   return header('Location: index.php');
}
if ($_SESSION['role'] < 2) {
    return header('Location: index.php');
}

?>
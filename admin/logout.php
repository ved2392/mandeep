<?php
session_destroy();
session_unset($_SESSION['user_id']);
header('location: index.php');
?>
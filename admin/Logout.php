<?php

unset($_SESSION["name"]);
unset($_SESSION["user_id"]);
header("Location: login.php");
session_destroy();
?>
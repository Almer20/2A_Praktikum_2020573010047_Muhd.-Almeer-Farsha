<?php
session_start();
session_destroy();
header("Location: sign-in/index.php");
?>
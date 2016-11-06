<?php
session_start();
$_SESSION["login"]="no";
session_destroy();
header("location:login.html");
?>
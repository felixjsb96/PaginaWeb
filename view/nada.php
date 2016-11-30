<?php
session_start();
if(!$_SESSION['login']){
session_destroy();
header('location: ../view/login.html');
}
echo ($_SESSION['codigo']);

?> 
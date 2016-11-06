<?PHP
session_start();
if($_SESSION["login"]!="si"){
session_destroy();
header("location:login.html");
}
?>
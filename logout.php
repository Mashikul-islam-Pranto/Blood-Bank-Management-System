<?php
session_start();
$un=$_SESSION["un"];
session_destroy();
header("Location:login.php");
?>
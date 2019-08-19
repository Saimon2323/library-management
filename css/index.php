<?php
session_start();
if(isset($_SESSION['site_admin'])){
    header("Location:../cpanel.php");
}else{
header("Location:../index.php");
}

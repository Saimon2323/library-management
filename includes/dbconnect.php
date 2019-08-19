<?php
$hostName='localhost';
$userName='root';
$password='';
$database='libsys';

$link = mysqli_connect($hostName,$userName,$password,$database);
if($link){
    $con = mysqli_select_db($link,$database);
    mysqli_query($link,'SET CHARACTER SET utf8');
    if(!$con){
        echo "Database not found.";
    }
}

<?php
    $email=$_REQUEST['email']??'';
    $pass1=$_REQUEST['pass']??'';
    $pass1=md5($pass1);
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $query="SELECT id_usuarios, email, nombre FROM usuarios WHERE email='".$email."' AND pass='".$pass1."'; ";
    $res=mysqli_query($con,$query);
?>


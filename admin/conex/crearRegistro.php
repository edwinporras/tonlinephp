<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $email=mysqli_real_escape_string($con, $_REQUEST['email']??'');
    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $pass=md5(mysqli_real_escape_string($con, $_REQUEST['pass']??''));

    $query2="INSERT INTO usuarios 
    (email, pass, nombre)VALUES
    ('".$email."', '".$pass."', '".$nombre."');
    ";

    $res=mysqli_query($con, $query2);
?>
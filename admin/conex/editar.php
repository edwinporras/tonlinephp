<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $email=mysqli_real_escape_string($con, $_REQUEST['email']??'');
    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $pass=md5(mysqli_real_escape_string($con, $_REQUEST['pass']??''));
    $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');


    $query2="UPDATE usuarios SET
    email='".$email."', pass='".$pass."', nombre='".$nombre."' 
    WHERE id_usuarios= '".$id."';
    ";

    $result=mysqli_query($con,$query2);
?>
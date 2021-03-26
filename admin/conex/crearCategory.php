<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');

    $query2="INSERT INTO categorias 
    (nombre) VALUES ('".$nombre."');
    ";

    $res=mysqli_query($con, $query2);
?>
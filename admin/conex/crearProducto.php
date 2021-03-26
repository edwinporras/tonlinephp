<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $precio=mysqli_real_escape_string($con, $_REQUEST['precio']??'');
    $categoria=mysqli_real_escape_string($con, $_REQUEST['categoria']??'');
    $existencia=mysqli_real_escape_string($con, $_REQUEST['existencia']??'');
    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $descripcion=mysqli_real_escape_string($con, $_REQUEST['descripcion']??'');

    $query2="INSERT INTO productos 
    (nombre, precio, existencia, id_categoria, descripcion)VALUES
    ('".$nombre."', '".$precio."', '".$existencia."', '".$categoria."', '".$descripcion."');
    ";

    $res=mysqli_query($con, $query2);
?>
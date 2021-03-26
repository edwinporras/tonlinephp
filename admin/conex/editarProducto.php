<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $existencia=mysqli_real_escape_string($con, $_REQUEST['existencia']??'');
    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $precio=mysqli_real_escape_string($con, $_REQUEST['precio']??'');
    $descripcion=mysqli_real_escape_string($con, $_REQUEST['descripcion']??'');
    $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');


    $query2="UPDATE productos SET
    nombre='".$nombre."', precio='".$precio."', existencia='".$existencia."', descripcion='".$descripcion."' 
    WHERE id_producto= '".$id."';
    ";

    $result=mysqli_query($con,$query2);
    
?>
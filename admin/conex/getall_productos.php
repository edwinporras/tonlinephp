<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $query="SELECT id_producto, nombre, precio, existencia, descripcion FROM productos";
    $res1=mysqli_query($con,$query);
?>
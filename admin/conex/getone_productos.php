<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    // $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');

    $query="SELECT id_producto, nombre, precio, existencia, descripcion FROM productos WHERE id_producto='".$id."' ";
    $res1=mysqli_query($con,$query);
    $row3 = mysqli_fetch_assoc($res1);

?>

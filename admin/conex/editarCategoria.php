<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');


    $query2="UPDATE categorias SET
    nombre='".$nombre."'
    WHERE id_categoria= '".$id."';
    ";

    $result=mysqli_query($con,$query2);
    
?>
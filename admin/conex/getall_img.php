<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $queryf="SELECT productos.id_producto, productos.nombre, productos.existencia, productos.precio, files.id_files, files.file_name 
    FROM productos 
    JOIN files ON productos.id_producto = files.id_producto 
    JOIN categorias ON productos.id_categoria = categorias.id_categoria 
    GROUP BY productos.id_producto ";
    //group by : obtener la primera imagen de cada grupo ver lista productos, las demas imagenes estaran vuando sele de click en detalles
    $resu=mysqli_query($con,$queryf);


    // $queryf="SELECT *, productos.nombre AS nombrealterno FROM productos 
    // JOIN files ON productos.id_producto = files.id_producto 
    // JOIN categorias ON productos.id_categoria = categorias.id_categoria 
    // WHERE categorias.id_categoria = 3; ";
?>
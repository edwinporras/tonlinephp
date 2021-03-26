<?php 
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $queryb = "SELECT * FROM categorias";
    $res=mysqli_query($con,$queryb);
?>
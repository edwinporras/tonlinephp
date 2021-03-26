<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $query="SELECT id_usuarios, email, nombre FROM usuarios";
    $res=mysqli_query($con,$query);
?>
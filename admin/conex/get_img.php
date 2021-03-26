<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $queryf="SELECT * FROM files WHERE id_producto='".$id."' ";
    $resu=mysqli_query($con,$queryf);
    // $rowc = mysqli_fetch_assoc($resu);
?>
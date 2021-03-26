<?php
    include "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    // $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');

    $query="SELECT id_usuarios, email, nombre FROM usuarios WHERE id_usuarios='".$id."' ";
    $resu=mysqli_query($con,$query);
    $row2 = mysqli_fetch_assoc($resu);
    // $vara= $_SERVER['DOCUMENT_ROOT'].'/T_OnlinePHP/upload/__ID__.__EXTN__';

?>
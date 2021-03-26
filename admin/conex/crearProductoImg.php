<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $img=mysqli_real_escape_string($con, $_REQUEST['img']??'');

    $file_img=$_FILES["img"]["name"];
    $ruta=$_FILES["img"]["tmp_name"];
    $destino="fotos/".$file_img;
    copy($ruta,$destino);

    // if ($img=count($img>0)) {
        $query2="INSERT INTO files 
        (file_name, id_producto)VALUES
        ('".$destino."', '".$id."');
        ";

        $querydelete="DELETE FROM files WHERE file_name='fotos/' ";
        

        $res=mysqli_query($con, $query2);
        $resdelete=mysqli_query($con, $querydelete);

    // }else{
    //     header('location: index.php');
    // }
    
?>
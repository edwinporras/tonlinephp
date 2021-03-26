<?php
    include_once "config.php";
    $con=mysqli_connect($host,$user,$pass,$db);

    $img=mysqli_real_escape_string($con, $_REQUEST['img']??'');

    // $file_img=$_FILES["img"]["name"];
    $ruta=$_FILES["img"]["tmp_name"];
    // $destino="fotos/".$file_img;
    // copy($ruta,$destino);

    if (count($_FILES["img"]["tmp_name"])>0) {
        for ($count=0; $count < count($_FILES["img"]["tmp_name"]); $count++) { 
            $image_file=addslashes(file_get_contents($_FILES["img"][$count]));
            $destino="fotos/".$image_file;
            

            $query2="INSERT INTO files 
            (file_name, id_producto)VALUES
            ('".$destino."', '".$id."');
            ";
            $querydelete="DELETE FROM files WHERE file_name='fotos/' ";

            $res=mysqli_query($con, $query2);
            $resdelete=mysqli_query($con, $querydelete);
        }
        

        

        

    }
    //     header('location: index.php');
    // }
    
?>
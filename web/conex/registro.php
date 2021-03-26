<?php
    $email=$_REQUEST['email']??'';
    $nombre=$_REQUEST['nombre']??'';
    $pass1=$_REQUEST['pass']??'';
    $pass1=md5($pass1);
    include_once "../admin/conex/config.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $query="INSERT INTO clientes(email, pass, nombre) VALUES ('$email','$pass1','$nombre')";
    $res=mysqli_query($con,$query);
?>
<!-- https://pandrama.com/episodio/belleza-verdadera-episodio-6/ -->

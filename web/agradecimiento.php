TRANSFERENCIA REALIZADA
<?php 
    $parametro = $_REQUEST['k'];
    $queryTransaccion="INSERT INTO ventas 
    (fecha, id_cliente, id_pago)VALUES(now(), '".$_SESSION['id_cliente']."','1')";
    $resTransaccion = mysqli_query($con,$queryTransaccion);
    $idTransaccion = mysqli_insert_id($con);

    if ($resTransaccion) {
        echo "la venta fue exitosa con el id=".$idTransaccion;
        echo "la respuesta es= ".$parametro;
        header("Location: fin.php");
    }
?>

<!-- id_venta	fecha	id_cliente	id_pago -->
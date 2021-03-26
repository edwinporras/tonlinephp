<?php 
$id= mysqli_real_escape_string($con, $_REQUEST['id']??'');
    $queryProducto="SELECT id_producto, nombre, precio, existencia, descripcion 
    FROM productos WHERE id_producto = '$id' ";
    $resProducto=mysqli_query($con,$queryProducto);
    $rowProducto=mysqli_fetch_assoc($resProducto);
?>

<?php 
    $queryimagenes= "SELECT fl.id_files, fl.file_name
    FROM files AS fl
    JOIN productos AS pd ON pd.id_producto = fl.id_producto 
    JOIN categorias AS ct ON pd.id_categoria = ct.id_categoria 
    WHERE pd.id_producto = '$id' ";
    $resimagenes= mysqli_query($con, $queryimagenes);
    $resimagenprincipal= mysqli_query($con, $queryimagenes);
    $rowimagenprincipal= mysqli_fetch_assoc($resimagenprincipal);
?>

<div class="cont_pd_main">
    <div class="cont_pd_inf">
        <img src="../admin/<?php echo $rowimagenprincipal['file_name'] ?>" height="300px">
    </div>
    <div class="cont_pd_infe cont_pd_inf2">
        <h2 class="cont_pd_tittle"><?php echo $rowProducto['nombre'] ?></h2>
        <p class="cont_pd_desc">
            <?php echo $rowProducto['descripcion'] ?>
        </p>
        <p class="cont_pd_exist">Existencia: <?php echo $rowProducto['existencia'] ?></p>
        <div class="cont_pd_val">
            <p>$ <?php  echo $rowProducto['precio']; ?></p>
        </div>
        <a id="agregarCarrito" href="#" 
        data-id="<?php echo $_REQUEST['id'] ?>" 
        data-nombre="<?php echo $rowProducto['nombre'] ?>"
        data-urls="<?php echo $rowimagenprincipal['file_name'] ?>"
        data-precio="<?php echo $rowProducto['precio'] ?>"
        >
            <div class="cont_pd_img">
                <i class="cont_pd_int_img1 fa fa-cart-arrow-down" aria-hidden="true"></i>
                <p class="cont_pd_int_img2" >Agregar Al carrito</p>
            </div>
        </a>
        <div class="mt-4">
            Cantidad
            <input type="number" name="cantidadProducto" id="cantidadProducto" class="form-control" value="1">
        </div>
    </div>
</div>
<div class="cont_pd_img_alt">
    <?php 
        
        while ($rowimagenesf=mysqli_fetch_assoc($resimagenes)) {  
    ?>

    <div class="cont_pd_img_alter">
        <img src="../admin/<?php echo $rowimagenesf['file_name'] ?>" height="150px" alt="img">
    </div>
    <?php 
        }
    ?>
</div>
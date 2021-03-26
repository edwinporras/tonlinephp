<?php 
    if (isset($_SESSION['id_cliente'])) {
        if (isset($_REQUEST['guardar'])) {
            $nombreCli=mysqli_real_escape_string($con, $_REQUEST['nombreCli']??'');
            $emailCli=mysqli_real_escape_string($con, $_REQUEST['emailCli']??'');
            $direccionCli=mysqli_real_escape_string($con, $_REQUEST['direccionCli']??'');
            $queryCli="UPDATE clientes SET nombre='$nombreCli', email='$emailCli', direccion='$direccionCli' WHERE id_cliente='".$_SESSION['id_cliente']."' ";
            $resCli=mysqli_query($con,$queryCli);

            $nombreRec=mysqli_real_escape_string($con, $_REQUEST['nombreRec']??'');
            $emailRec=mysqli_real_escape_string($con, $_REQUEST['emailRec']??'');
            $direccionRec=mysqli_real_escape_string($con, $_REQUEST['direccionRec']??'');
            $queryRec="INSERT INTO recibe(nombre, email, direccion, id_cliente) VALUES ( '$nombreRec', '$emailRec', '$direccionRec', '".$_SESSION['id_cliente']."')
            ON DUPLICATE KEY UPDATE
            nombre='$nombreRec', email='$emailRec', direccion='$direccionRec' ;";
            $resRec=mysqli_query($con,$queryRec);

            if ($resCli && $resRec) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=pasarela" /> ';
            }
            else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Error
                </div>
                <?php
            }
        }
        $queryCli="SELECT nombre, email, direccion FROM clientes WHERE id_cliente='".$_SESSION['id_cliente']."' ";
        $resCli = mysqli_query($con,$queryCli);
        $rowCli = mysqli_fetch_assoc($resCli);
        
        $queryRec="SELECT nombre, email, direccion FROM recibe WHERE id_cliente='".$_SESSION['id_cliente']."' ";
        $resRec = mysqli_query($con,$queryRec);
        $rowRec = mysqli_fetch_assoc($resRec);

        ?>
        <form method="post" action="index.php?modulo=pasarela">
            <div class="container">
                <div class="cont_cliente1">
                    <div class="cont_cliente2">
                        <h3 class="cont_cliente3">Datos del cliente</h3>
                        <div class="form-group">
                            <label for="nombreCli">Nombre</label>
                            <input id="nombreCli" class="form-control" type="text" name="nombreCli" value="<?php echo $rowCli['nombre']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="emailCli">Email</label>
                            <input id="emailCli" class="form-control" type="email" name="emailCli" readonly="readonly" value="<?php echo $rowCli['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="direccionCli">Direccion</label>
                            <input id="direccionCli" class="form-control" type="text" name="direccionCli" value="<?php echo $rowCli['direccion']; ?>">
                        </div>
                    </div>
                    <div class="cont_cliente2">
                        <h3 class="cont_cliente3">Datos de quien recibe</h3>
                        <div class="form-group">
                            <label for="nombreRec">Nombre</label>
                            <input id="nombreRec" class="form-control" type="text" name="nombreRec" value="<?php echo $rowRec['nombre']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="emailRec">Email</label>
                            <input id="emailRec" class="form-control" type="email" name="emailRec" value="<?php echo $rowRec['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="direccionRec">Direccion</label>
                            <input type="hidden" name="verificar" value="<?php echo $totalprov=$_REQUEST['sumatotal']; ?>">
                            <input id="direccionRec" class="form-control" type="text" name="direccionRec" value="<?php echo $rowRec['direccion']; ?>">
                        </div>
                        <div class="form-check check_prop">
                            <label>
                                <input type="checkbox" id="obtdatos" > Obtener datos del cliente
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="index.php?modulo=carrito">Regresar al carrito</a>
            <button class="btn btn-primary" type="submit" name="guardar" value="Guardar">Ir a Pagar</button>
        </form>
        <?php
    }else{
        ?>
        <div class="enviar_reg">
            Debe <a href="login.php">Logearse</a> o <a href="registro.php">registrarse</a> registrarse para poder continuar con la compra
        </div>
        <?php
    }
?>
<?php
    if (isset($_REQUEST['guardar'])) {
        include_once "conex/crearProducto.php";
        if ($res) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto creado exitosamente" />';
        }else{
            ?>
            <div class="msj_error alert alert-danger" role="alert">
                <h4 class="alert-heading">Error</h4>
                Hay un problema al crear el Producto 
            </div>
            <?php
        }
    }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Crear Producto
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-shopping-cart"></i> Ecommerce</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="panel.php?modulo=crearProducto" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripci&oacute;n</label>
                        <input class="form-control" type="text" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input class="form-control" type="text" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input class="form-control" type="number" name="existencia" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Categoria</label>
                        <select class="form-control" name="categoria">
                            <?php
                                include "conex/get_category.php";
                                while($row = mysqli_fetch_assoc($res)){
                                  echo "<option value='".$row["id_categoria"]."'>".$row["nombre"]."</option>";
                                }
                            ?>
                        </select>
                        
                      </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  
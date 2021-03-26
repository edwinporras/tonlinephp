<?php
    if (isset($_REQUEST['guardar'])) {
        include "conex/crearCategory.php";
        if ($res) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=categoria&mensaje=Categoria creada exitosamente" />';
        }else{
            ?>
            <div class="msj_error alert alert-danger" role="alert">
                <h4 class="alert-heading">Error</h4>
                Hay un problema al crear la Categoria 
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
      Crear Categoria
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-shopping-cart"></i> Ecommerce</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Categoria</li>
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
                <form action="panel.php?modulo=crearCategory" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre Categoria</label>
                        <input class="form-control" type="text" name="nombre" required>
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

  
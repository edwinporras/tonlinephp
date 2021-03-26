<?php 
  include_once "conex/getall_productos.php";
  if (isset($_REQUEST['idBorrar'])) {
    $id=mysqli_real_escape_string($con, $_REQUEST['idBorrar']??'');
    $querys="DELETE FROM productos WHERE id_producto='".$id."' ";
    $resul=mysqli_query($con,$querys);
    if ($resul) {
  ?>
    <div class="alert alert-warning msj_borrar" role="alert">
      Producto Borrado con exito (Recargar pagina)
    </div>
  <?php
    }else{
  ?>
    <div class="alert alert-danger msj_err" role="alert">
      Error al borrar
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
      Productos
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-shopping-cart"></i> Ecommerce</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Productos</li>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Acciones <a href="panel.php?modulo=crearProducto"><i class="fa fa-plus"></i></a></th>

                </tr>
                </thead>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_assoc($res1)) {
                        
                ?>
                <tr>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['precio'] ?></td>
                  <td><?php echo $row['existencia'] ?></td>
                  <td>
                      <a href="panel.php?modulo=editarProductos&id=<?php echo $row['id_producto'] ?>" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>
                      <a href="panel.php?modulo=productos&idBorrar=<?php echo $row['id_producto'] ?>" class="text-danger borrar"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
              </table>
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
  <script src="js/confirm_delete.js"></script>
  <script src="js/paginador.js"></script>
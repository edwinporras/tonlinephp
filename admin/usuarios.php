<?php 
  include_once "conex/getall_user.php";
  if (isset($_REQUEST['idBorrar'])) {
    $id=mysqli_real_escape_string($con, $_REQUEST['idBorrar']??'');
    $querys="DELETE FROM usuarios WHERE id_usuarios='".$id."' ";
    $resul=mysqli_query($con,$querys);
    if ($resul) {
  ?>
    <div class="alert alert-warning msj_borrar" role="alert">
      Usuario Borrado con exito (Recargar pagina)
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
      Usuarios
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-shopping-cart"></i> Ecommerce</a></li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Usuarios</li>
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
                  <th>Email</th>
                  <th>Acciones <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus"></i></a></th>

                </tr>
                </thead>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_assoc($res)) {
                        
                ?>
                <tr>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td>
                      <a href="panel.php?modulo=editarUsuario&id=<?php echo $row['id_usuarios'] ?>" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>
                      <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $row['id_usuarios'] ?>" class="text-danger borrar"><i class="fa fa-trash"></i></a>
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
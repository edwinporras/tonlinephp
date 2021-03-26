<?php
    
    include_once "conex/getall_productos.php";

    if (isset($_REQUEST['guardar'])) {
      // include "conex/config.php";
      // $con=mysqli_connect($host,$user,$pass,$db);
      include "conex/editarProducto.php";
      include "conex/crearProductoImg.php";
      // $email=mysqli_real_escape_string($con, $_REQUEST['email']??'');
      // $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
      // $pass=md5(mysqli_real_escape_string($con, $_REQUEST['pass']??''));
      // $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');
  
  
      // $query2="UPDATE usuarios SET
      // email='".$email."', pass='".$pass."', nombre='".$nombre."' 
      // WHERE id_usuarios= '".$id."';
      // ";
  
      // $result=mysqli_query($con,$query2);

        if ($result) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto '.$nombre.' Editado exitosamente" />';
        }else{
            ?>
            <div class="msj_error alert alert-danger" role="alert">
                <h4 class="alert-heading">Error</h4>
                Hay un problema al Editar el producto 
            </div>
            <?php
        }
    }
    $id=mysqli_real_escape_string($con, $_REQUEST['id']??'');

    include "conex/getone_productos.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Editar Producto
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
                <form id="upload_multiple_images" action="panel.php?modulo=editarProductos" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $row3['nombre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" value="<?php echo $row3['descripcion']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input class="form-control" type="text" name="precio" value="<?php echo $row3['precio']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input class="form-control" type="number" name="existencia" value="<?php echo $row3['existencia']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="img" id="img">
                        <input type="hidden" name="id" value="<?php echo $row3['id_producto']; ?>">
                        <button id="insert" type="submit" class="btn btn-primary" name="guardar">Guardar</button>

                    </div>
                    
                </form>

                <!-- <script>
                    $(document).ready(function(){
                        $('#upload_multiple_images').on('submit', function(event){
                            event.preventDefault();
                            var image_name = $('#img').val();
                            if (image_name=='') {
                                alert('Por favor seleccione imagen');
                                return false;
                            }
                            else{
                                $.ajax({
                                   url:"conex/borrar.php",
                                   method:"POST",
                                   data: new FormData(this),
                                   contentType:false,
                                   cache:false,
                                   processData:false,
                                   success: function(data){
                                       $('#img').val('');
                                   } 
                                })
                            }
                        })
                    })
                </script> -->

                <style>
                    .img_conte{
                        /* width: 50%; */
                        height: 150px;
                        text-align: center;
                        margin: 0 auto;
                    }
                    
                    .conte{
                        display: grid;
                        text-align: center;
                        border: 2px solid #000;                        
                    }
                </style>
                <?php 
                    include "conex/get_img.php";
                    while ($res=mysqli_fetch_array($resu)) {
                        echo '<div class="conte col-md-6">';
                        echo '<p class="title_conte">'.$_SERVER['DOCUMENT_ROOT'].'/T_OnlinePHP/admin/'. $res['file_name']."</p><br/>";
                        echo '<p class="title_conte">'. $res['file_name']."</p><br/>";
                        echo '<img class="img_conte" src="'.$res["file_name"].'">';
                        echo "<br/>";
                        echo '</div>';
                    }
                ?>
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

  
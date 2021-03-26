<!DOCTYPE html>
<html>
  <?php
    session_start();
    session_regenerate_id(true);
    if (isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar") {
      session_destroy();
      header("location: index.php");
    }
    if (isset($_SESSION['id_usuarios'])==false) {
      header("location: index.php");
    }
    $modulo=$_REQUEST['modulo']??'';
  ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="./documentation/estilospersonalizados.css">
  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>On</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Tienda Online</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a style="z-index: 1080;" href="panel.php?modulo=&sesion=cerrar">
            <i class="fa fa-power-off"></i>
            <!-- <span class="label label-success">4</span> -->
          </a>
        </li> 
        </ul>
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="label label-success">4</span>
            </a>
            
            <ul class="dropdown-menu">
              <!-- <li class="header">You have 4 messages</li> -->
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="panel.php?modulo=editarUsuario&id=<?php echo $_SESSION['id_usuarios']; ?>">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Editar Perfil
                        <!-- <small><i class="fa fa-clock-o"></i> 5 mins</small> -->
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p> -->
                    </a>
                  </li>
                  <!-- end message -->
                  <!-- <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li> -->
                  <!-- <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li> -->
                  <!-- <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li> -->
                  <!-- <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li> -->
              <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
            </ul>
          </li>
                    
          <!-- User Account: style can be found in dropdown.less -->
         
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
        
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <div style="height: 50px;">

          </div>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombre']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-shopping-cart nav-icon"></i> <span>Ecommerce</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li class="<?php echo($modulo=="estadisticas" || $modulo=="")?"active":" "; ?>"><a href="panel.php?modulo=estadisticas"><i class="fa fa-signal"></i> Estadisticas</a></li>
            <li class="<?php echo($modulo=="usuarios" || $modulo=="crearUsuario" || $modulo=="editarUsuario")?"active":" "; ?>"><a href="panel.php?modulo=usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
            <li class="<?php echo($modulo=="productos" || $modulo=="editarProductos" || $modulo=="crearProducto")?"active":" "; ?>"><a href="panel.php?modulo=productos"><i class="fa fa-shopping-bag"></i> Productos</a></li>
            <li class="<?php echo($modulo=="categoria" || $modulo=="editarCategoria")?"active":" "; ?>"><a href="panel.php?modulo=categoria"><i class="fa fa-folder"></i> Categorias</a></li>
            <li class="<?php echo($modulo=="ventas")?"active":" "; ?>"><a href="panel.php?modulo=ventas"><i class="fa fa-table"></i> Ventas</a></li>

          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php 
  if (isset($_REQUEST['mensaje'])) {
    ?>
    <div class="msj_ok alert alert-success alert-dismissible show float-right" role="alert">
      <button type="button" class="close btn_cerrar" data-dismiss="alert" aria-label="Close">
        <span class="equix" aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
        <p class="msj_mod"><?php echo $_REQUEST['mensaje']; ?></p>
      </button>
    </div>
    <?php
  }
  if ($modulo=="estadisticas" || $modulo=="") {
    include_once "estadisticas.php";
  }
  if ($modulo=="usuarios") {
    include_once "usuarios.php";
    // include_once "estadisticas.php";
  }
  if ($modulo=="productos") {
    include_once "productos.php";
    // include_once "estadisticas.php";
  }
  if ($modulo=="ventas") {
    // include_once "ventas.php";
    include_once "estadisticas.php";
  }
  if ($modulo=="crearUsuario") {
    include_once "crearUsuario.php";
  }
  if ($modulo=="crearProducto") {
    include_once "crearProducto.php";
  }
  if ($modulo=="editarUsuario") {
    include_once "editarUsuario.php";
  }
  if ($modulo=="editarProductos") {
    include_once "editarProductos.php";
  }
  if ($modulo=="categoria") {
    include_once "categoria.php";
  }
  if ($modulo=="crearCategory") {
    include_once "crearCategory.php";
  }
  if ($modulo=="categoria") {
    include_once "categoria.php";
  }
  if ($modulo=="editarCategoria") {
    include_once "editarCategoria.php";
  }
?>

  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


</body>
</html>

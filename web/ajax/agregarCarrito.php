<?php 
    $productos=unserialize($_COOKIE['productos']??'');
    if (is_array($productos)==false) 
        $productos=array();
    $siYaestaProducto=false;
    foreach ($productos as $key => $value) {
        if ($value['id']==$_REQUEST['id']) {
            $productos[$key]['cantidad']=$productos[$key]['cantidad']+$_REQUEST['cantidad'];
            $siYaestaProducto=true;
        }
    }
    if ($siYaestaProducto==false) {
        $nuevo=array(
            "id"=>$_REQUEST['id'],
            "nombre"=>$_REQUEST['nombre'],
            "urls"=>$_REQUEST['urls'],
            "cantidad"=>$_REQUEST['cantidad'],
            "precio"=>$_REQUEST['precio']
        );
        array_push($productos,$nuevo);
    }
    setcookie("productos",serialize($productos));
    echo json_encode($productos);
?>
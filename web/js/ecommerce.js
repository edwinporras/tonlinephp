$(document).ready(function(){
    $.ajax({
        type:"POST",
            url:"ajax/leerCarrito.php",
            dataType:"json",
            success: function (response) {
                llenarCarrito(response);
            }
    });
    //VER CARRITO
    $.ajax({
        type: "POST",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarTablaCarrito(response);
        }
    });
    function llenarTablaCarrito(response) {
        $("#tablaCarrito tbody").text("");
        var totalf=0;
        response.forEach(element => {
            var prec= parseFloat(element['precio']);
            var totalProdu=element['cantidad']*prec;
            totalf= totalf+totalProdu;
            $("#tablaCarrito tbody").append(
                `
                <tr class="img_columna">
                    <td><img src="../admin/${element['urls']}" class="img_columna_img"/></td>
                    <td>${element['nombre']}</td>
                    <td>
                        <button class="btn-xs btn-danger menos" type="button" data-id="${element['id']}" data-tipo="menos">-</button>
                        ${element['cantidad']}
                        <button class="btn-xs btn-primary mas" type="button" data-id="${element['id']}" data-tipo="mas">+</button>
                    </td>
                    <td>$${prec.toFixed(2)}</td>
                    <td>$${totalProdu.toFixed(2)}</td>
                    <td><i class="fa fa-trash borrarProducto" data-id="${element['id']}"></i></td>
                </tr>
                `
            );
        });
        $("#tablaCarrito tbody").append(
            `
            <tr class="img_columna tb_img_tot">
                <td  colspan="4"> Total</td>
                <td>$${totalf.toFixed(2)}</td>
                <input name="sumatotal"   type="hidden"  value="${totalf.toFixed(2)}"  >
                <td></td>
            </tr>
            `
        );
    }

    //PASARELA
    $.ajax({
        type: "POST",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarTablaPasarela(response);
        }
    });
    function llenarTablaPasarela(response) {
        $("#tablaPasarela tbody").text("");
        var totalf=0;
        response.forEach(element => {
            var prec= parseFloat(element['precio']);
            var totalProdu=element['cantidad']*prec;
            totalf= totalf+totalProdu;
            $("#tablaPasarela tbody").append(
                `
                <tr class="img_columna">
                    <td><img src="../admin/${element['urls']}" class="img_columna_img"/></td>
                    <td>${element['nombre']}</td>
                    <td>
                        ${element['cantidad']}
                    </td>
                    <td>$${prec.toFixed(2)}</td>
                    <td>$${totalProdu.toFixed(2)}</td>
                </tr>
                `
            );
        });
        $("#tablaPasarela tbody").append(
            `
            <tr class="img_columna tb_img_tot">
                <td  colspan="4"> Total</td>
                <td>$${totalf.toFixed(2)}</td>
                <input name="sumatotal"   type="hidden"  value="${totalf.toFixed(2)}"  >
            </tr>
            `
        );
    }

    $(document).on("click",".mas, .menos", function (e) {
        e.preventDefault();
        var id=$(this).data('id');
        var tipo=$(this).data('tipo');
        $.ajax({
            type: "POST",
            url: "ajax/cambiaCantidadProductos.php",
            data: {"id": id, "tipo":tipo},
            dataType: "json",
            success: function (response) {
                llenarTablaCarrito(response);
                llenarCarrito(response);
            }
        });
    })
    $(document).on("click",".borrarProducto", function (e) {
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            type: "POST",
            url: "ajax/borrarProductoCarrito.php",
            data: {"id": id},
            dataType: "json",
            success: function (response) {
                llenarTablaCarrito(response);
                llenarCarrito(response);
            }
        });
    })
    $('#agregarCarrito').click(function(e){
        e.preventDefault();
        var id =$(this).data('id');
        var nombre =$(this).data('nombre');
        var urls =$(this).data('urls');
        var precio =$(this).data('precio');
        var cantidad =$("#cantidadProducto").val();

        $.ajax({
            type:"POST",
            url:"ajax/agregarCarrito.php",
            data:{"id":id, "nombre":nombre, "urls":urls, "cantidad":cantidad, "precio":precio},
            dataType:"json",
            success: function (response) {
                llenarCarrito(response);
                $('#badgeProducto').hide(500).show(500).hide(500).show(500);
                $("#navbarDropdownMenuLink").click();
            }
        })
    });
    function llenarCarrito(response) {
        var cantidad = Object.keys(response).length;
        if (cantidad>0) {
            $('#badgeProducto').text(cantidad);
        }else{
            $('#badgeProducto').text("");
        }
        $('#listaCarrito').text("");
        response.forEach(element => {
           $("#listaCarrito").append(
            `<a class="dropdown-item" href="index.php?modulo=detalleProductos&id=${element['id']}">
                <div class="list_detallada">
                    <div class="list_deta_inf"><img src="../admin/${element['urls']}" width="100px"></div>
                    <div class="list_deta_inf">
                        <div class="lis_deta_inf1">${element['nombre']}</div>
                        <div class="lis_deta_inf1">Cantidad: ${element['cantidad']}</div>
                    </div>
                </div>
             </a>`
           ) 
        });
        $("#listaCarrito").append(
            `<a class="dropdown-item" href="index.php?modulo=carrito" id="ver_carrito">Ver carrito <i class="fa fa-cart-plus"></i> </a>
            <a class="dropdown-item" href="#" id="borrarCarrito">Borrar Carrito <i class="fa fa-trash"></i> </a>`
        );
            
    }
    $(document).on("click","#borrarCarrito",function (e) {
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"ajax/borrarCarrito.php",
            dataType:"json",
            success: function (response) {
                llenarCarrito(response);
            }
        });
    });
    
    var nombreRec=$("nombreRec").val();
    var emailRec=$("emailRec").val();
    var direccionRec=$("direccionRec").val();

    // Obtener datos checkbox
    $("#obtdatos").click(function (e) { 
        var nombreCli=$("#nombreCli").val();
        var emailCli=$("#emailCli").val();
        var direccionCli=$("#direccionCli").val();

        if ($(this).prop("checked")==true) {
            $("#nombreRec").val(nombreCli);
            $("#emailRec").val(emailCli);
            $("#direccionRec").val(direccionCli);
        }else{
            $("#nombreRec").val(nombreRec);
            $("#emailRec").val(emailRec);
            $("#direccionRec").val(direccionRec);
        }
    });
});

//badgeProducto
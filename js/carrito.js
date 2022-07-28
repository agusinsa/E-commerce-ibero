$(document).ready(function() {

    var sesion = $("#sesion").val();


    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function(response) {
            llenaCarrito(response);
        }
    });

    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function(response) {
            llenarTablaCarrito(response);
        }
    });

    function llenarTablaCarrito(response) {
        $("#tablaCarrito tbody").text("");
        var TOTAL = 0;
        if (sesion == 'ok') {
            if (response == false) {
                $("#tablaCarrito tbody").append(`
                <div style="font-size:20px; margin-left:10%;">
               <p>No hay productos en su carrito
                <p><a href="?sesion=ok&m=productos&pagina=1"><button class="btn btn-primary">Ir a productos</button></a>
                </div>
                `);
            } else {
                response.forEach(element => {
                    var precio = parseFloat(element['precio']);
                    var totalProd = element['cantidad'] * precio;
                    TOTAL = TOTAL + totalProd;
                    $("#tablaCarrito tbody").append(
                        `   
                    <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"></td>
                    <td>${element['nom_prod']}</td>
                    <td>
                    ${element['cantidad']} 
                    <button type="button" class="btn-md btn-primary mas" style="width:16px; border-radius:4px;"
                    data-id="${element['id']}"
                    data-tipo="mas"
                    >+</button>
                    <button type="button" class="btn-xs btn-danger menos" style="width:16px; border-radius:4px;"
                    data-id="${element['id']}"
                    data-tipo="menos"
                    >-</button>
                    
                    </td>
                    <td>$ ${precio.toFixed(2)}</td>
                    <td>$ ${totalProd.toFixed(2)}</td>
                    <td><i style="cursor:pointer;" class="fa fa-trash text-danger borrarProducto" data-id="${element['id']}"></i></td>
                    </tr> 
                    `
                    );
                });
                $("#tablaCarrito tbody").append(
                    `   
                <tr>
                <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                <td><td>$ ${TOTAL.toFixed(2)}</td></td>
                </tr> 
                `
                );
            }

        } else {
            if (response == false) {
                $("#tablaCarrito tbody").append(`
                    <div style="font-size:20px; margin-left:10%;">
                    <p>No hay productos en su carrito
                    <p><a href="?m=productos&pagina=1"><button class="btn btn-primary">Ir a productos</button></a>
                    </div>
                `);
            } else {
                response.forEach(element => {
                    var precio = parseFloat(element['precio']);
                    var totalProd = element['cantidad'] * precio;
                    TOTAL = TOTAL + totalProd;
                    $("#tablaCarrito tbody").append(
                        `   
                        <tr>
                        <td><img src="${element['web_path']}" class="img-size-50"></td>
                        <td>${element['nom_prod']}</td>
                        <td>
                        ${element['cantidad']} 
                        <button type="button" class="btn-md btn-primary mas" style="width:16px; border-radius:4px;"
                        data-id="${element['id']}"
                        data-tipo="mas"
                        >+</button>
                        <button type="button" class="btn-xs btn-danger menos" style="width:16px; border-radius:4px;"
                        data-id="${element['id']}"
                        data-tipo="menos"
                        >-</button>
                        
                        </td>
                        <td>$ ${precio.toFixed(2)}</td>
                        <td>$ ${totalProd.toFixed(2)}</td>
                        <td><i style="cursor:pointer;" class="fa fa-trash text-danger borrarProducto" data-id="${element['id']}"></i></td>
                        </tr> 
                        `
                    );
                });
                $("#tablaCarrito tbody").append(
                    `   
                        <tr>
                        <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                        <td><td>$ ${TOTAL.toFixed(2)}</td></td>
                        </tr> 
                        `
                );
            }
        }
    }

    //TABLA PASARELA
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function(response) {
            llenarTablaPasarela(response);
        }
    });

    function llenarTablaPasarela(response) {
        $("#tablaPasarela tbody").text("");
        var TOTAL = 0;
        if (sesion == 'ok') {
            if (response == false) {
                $("#tablaPasarela tbody").append(`
                <div style="font-size:20px; margin-left:10%;">
               <p>No hay productos en su carrito
                <p><a href="?sesion=ok&m=productos&pagina=1"><button class="btn btn-primary">Ir a productos</button></a>
                </div>
                `);
            } else {
                response.forEach(element => {
                    var precio = parseFloat(element['precio']);
                    var totalProd = element['cantidad'] * precio;
                    TOTAL = TOTAL + totalProd;
                    $("#total_compra").val(TOTAL);
                    $("#tablaPasarela tbody").append(
                        `   
                    <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"></td>
                    <td>${element['nom_prod']}</td>
                    <td>${element['cantidad']}</td>
                    <td>$ ${precio.toFixed(2)}</td>
                    <td>$ ${totalProd.toFixed(2)}</td>
                    </tr> 
                    `
                    );
                    $("#mercado_pago").append(
                        `
                        
                        <input type="hidden" name="id_c[]" value="${element['id']}" >
                        <input type="hidden" name="cant_c[]" value="${element['cantidad']}" >
                        <input type="hidden" name="precio_c[]" value="${precio.toFixed(2)}" >
                        `
                    );
                });
                $("#tablaPasarela tbody").append(
                    `   
                <tr>
                <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                <td>$ ${TOTAL.toFixed(2)}
                <input type="hidden" value="${TOTAL.toFixed(2)}">
                </td>                
                </tr> 
                `
                );
            }

        } else {
            if (response == false) {
                $("#tablaPasarela tbody").append(`
                    <div style="font-size:20px; margin-left:10%;">
                    <p>No hay productos en su carrito
                    <p><a href="?m=productos&pagina=1"><button class="btn btn-primary">Ir a productos</button></a>
                    </div>
                `);
            } else {
                response.forEach(element => {
                    var precio = parseFloat(element['precio']);
                    var totalProd = element['cantidad'] * precio;
                    TOTAL = TOTAL + totalProd;
                    $("#total_compra").val(TOTAL);
                    $("#")
                    $("#tablaPasarela tbody").append(
                        `   
                        <tr>
                        <td><img src="${element['web_path']}" class="img-size-50"></td>
                        <td>${element['nom_prod']}</td>
                        <td>
                        ${element['cantidad']}  
                        <input type="hidden" name="id[]" value="${element['id']}">                       
                        </td>
                        <td>$ ${precio.toFixed(2)}</td>
                        <td>$ ${totalProd.toFixed(2)}</td>
                        <input type="text">
                        </tr> 
                        `
                    );
                });
                $("#tablaPasarela tbody").append(
                    `   
                        <tr>
                        <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                        <td>$ ${TOTAL.toFixed(2)}
                        <input type="hidden" value="${TOTAL.toFixed(2)}">
                        </td>
                        
                        </tr> 
                        `
                );
            }
        }
    }
    //FIN TABLA PASARELA

    $(document).on("click", ".mas,.menos", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tipo = $(this).data('tipo');
        $.ajax({
            type: "post",
            url: "ajax/cantCarrito.php",
            data: { "id": id, "tipo": tipo },
            dataType: "json",
            success: function(response) {
                llenarTablaCarrito(response);
                llenaCarrito(response);
            }
        });
    });

    $(document).on("click", ".borrarProducto", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "ajax/borrarProductoCarrito.php",
            data: { "id": id },
            dataType: "json",
            success: function(response) {
                llenarTablaCarrito(response);
                llenaCarrito(response);
            }
        });
    });

    $("#agregarCarrito").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var nom_prod = $(this).data('nombre');
        var web_path = $(this).data('web_path');
        var cantidad = $("#cantidadProducto").val();
        var precio = $(this).data('precio');

        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: { "id": id, "nom_prod": nom_prod, "web_path": web_path, "cantidad": cantidad, "precio": precio },
            dataType: "json",
            success: function(response) {
                llenaCarrito(response);
                $("#badgeProducto").hide(500).show(300);
                $("#iconoCarrito").click();
            }
        });
    });


    function llenaCarrito(response) {
        var cantidad = Object.keys(response).length;
        if (cantidad > 0) {
            $("#badgeProducto").text(cantidad);
        } else {
            $("#badgeProducto").text("");
        }
        $("#listaCarrito").text("");
        if (sesion == 'ok') {
            if (response == false) {
                $("#listaCarrito").append(`<a href="#" class="dropdown-item dropdown-footer">No hay productos en el carrito</a>`);
            } else {
                response.forEach(element => {

                    $("#listaCarrito").append(
                        ` 
                    <a href="index.php?sesion=ok&m=prod&pid=${element['id']}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="${element['web_path']}" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                        ${element['nom_prod']}
                          <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                        </h3>
                        <p class="text-sm">Cantidad ${element['cantidad']}</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  `
                    );
                });
                $("#listaCarrito").append(
                    ` 
                <a href="?sesion=ok&m=carrito" class="dropdown-item dropdown-footer text-primary" style="padding:0px!important;">Ver Carrito <i class="fa fa-shopping-cart"></i></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito" style="padding:0px!important;">Borrar Carrito <i class="fa fa-trash"></i></a>
                `
                );
            }

        } else {
            if (response == false) {
                $("#listaCarrito").append(`<a href="#" class="dropdown-item dropdown-footer">No hay productos en el carrito</a>`);
            } else {
                response.forEach(element => {

                    $("#listaCarrito").append(
                        ` 
                    <a href="index.php?m=prod&pid=${element['id']}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="${element['web_path']}" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                        ${element['nom_prod']}
                          <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                        </h3>
                        <p class="text-sm">Cantidad ${element['cantidad']}</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  `
                    );
                });
                $("#listaCarrito").append(
                    ` 
                <a href="?m=carrito" class="dropdown-item dropdown-footer text-primary" style="padding:0px!important;">Ver Carrito <i class="fa fa-shopping-cart"></i></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito" style="padding:0px!important;">Borrar Carrito <i class="fa fa-trash"></i></a>
                `
                );
            }
        }

    }
    $(document).on("click", "#borrarCarrito", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response) {
                llenaCarrito(response);
                llenarTablaCarrito(response);
            }
        });
    });

    //CERRAR SESION Y BORRAR CARRITO
    $(document).on("click", "#saliryborrar", function(e) {
        e.preventDefault();
        $(location).attr('href', "php/salir.php");
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response) {
                llenaCarrito(response);
                llenarTablaCarrito(response);
                $(location).attr('href', "php/salir.php");

            }
        });
    });
});
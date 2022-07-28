<?php 
 require "php/conexion.php";

    if(isset($_REQUEST['metodo']) && isset($_REQUEST['pago'])){
        $id_user=$_SESSION['id'];
        $id_pago=$_REQUEST['pago'];
        $metodo=$_REQUEST['metodo'];

        //VERIFICAR SI EL PAGO NO ESTÁ REPETIDO
        $pago_r="SELECT * FROM ventas WHERE id_pago='".$id_pago."' ";
        $query_pr=mysqli_query($conexion, $pago_r);
        $res_r=mysqli_fetch_array($query_pr);

        //SI NO EXISTE EL ID DE PAGO EN LA TABLA LO INSERTA
        if($res_r['id_pago']!=$id_pago){
            //INSERTAR PAGO EN BASE DE DATOS
            $venta="INSERT INTO ventas (id_usuario, id_pago, fecha_pedido) VALUES (".$id_user.", '".$id_pago."', now()) ";
            $query_venta=mysqli_query($conexion,$venta);
            $id=mysqli_insert_id($conexion);//ID VENTA

            $insertarDetalle="";
            $cantProd=count($_REQUEST['id_c']);
            for ($i=0; $i < $cantProd; $i++) { 
                $subtotal=$_REQUEST['cant_c'][$i]*$_REQUEST['precio_c'][$i];
                //AGREGA UNA COMA AL FINAL PARA SEGUIR SUMANDO REGISTROS EN UNA MISMA TABLA
                $insertarDetalle=$insertarDetalle."('".$_REQUEST['id_c'][$i]."','$id','".$_REQUEST['cant_c'][$i]."','".$_REQUEST['precio_c'][$i]."','$subtotal'),";
            }
            $insertarDetalle=rtrim($insertarDetalle,",");//QUITA LA ULTIMA COMA QUE SOBRA
            $queryDetalle="INSERT INTO detalle_pedido(id_producto, id_pedido, cant, precio, subtotal) VALUES $insertarDetalle;";
            $res_detalle=mysqli_query($conexion, $queryDetalle);

            if($query_venta && $res_detalle){
                ?>
                    <div class="row">
                        <div class="col-6">
                        <?php muestraRecibe($id); ?>
                        </div>
                        <div class="col-6">
                            <?php muestraDetalle($id); ?>
                        </div>
                    </div>
                 <a name="" id="" class="btn btn-primary float-right" href="?sesion=ok&m=inicio" role="button">Volver al inicio</a>
                 <?php
                 borrarCarrito(); 
            }
        }
        else{
            ?>
                <div class="row">
                    <div class="col-6">
                       <?php muestraRecibe($id); ?>
                    </div>
                    <div class="col-6">
                        <?php muestraDetalle($id); ?>
                    </div>
                </div>
                <a name="" id="" class="btn btn-primary float-right" href="?sesion=ok&m=inicio" role="button">Volver al inicio</a>
            <?php
            borrarCarrito();                    
        }
    }

//FUNCIONES

//BORRAR CARRITO
 function borrarCarrito(){
     ?>
     <script>
      $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response) {
                $("#badgeProducto").text("");
                $("#listaCarrito").text("");
            }
        });
     </script>
     <?php 
 }


//MOSTRAR QUIEN RECIBE
    function muestraRecibe($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Persona que recibe</th>
                </tr>
                <tr>
                    <th>Nombre y Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Código Postal</th>
                    <th>Provincia</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            global $conexion;
            global $id_user;
                $queryRecibe="SELECT * FROM recibe WHERE idcliente='".$id_user."' ";
                $resRecibe=mysqli_query($conexion,$queryRecibe);
                $arrayRecibe=mysqli_fetch_array($resRecibe);
            ?>
                <tr>
                    <td><?php echo $arrayRecibe['nombre']; ?></td>
                    <td><?php echo $arrayRecibe['tel']; ?></td>
                    <td><?php echo $arrayRecibe['direccion']; ?></td>
                    <td><?php echo $arrayRecibe['localidad']; ?></td>
                    <td><?php echo $arrayRecibe['cp']; ?></td>
                    <td><?php echo $arrayRecibe['provincia']; ?></td>
                </tr>
            </tbody>
        </table>
        <?php 
    }
    //MOSTRAR DETALLES
    function muestraDetalle($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-center float-right">Detalle de compra</th>
                </tr>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            global $conexion;
            global $id_user;
                $queryDetalle="SELECT
                dp.subtotal,
                dp.precio,
                dp.cant,
                p.nom_prod
                FROM
                ventas AS v
                INNER JOIN detalle_pedido AS dp ON dp.id_pedido = v.id_pedido
                INNER JOIN productos AS p ON dp.id_producto = p.id
                WHERE
                v.id_pedido = '$idVenta' ";
                $resDetalle=mysqli_query($conexion,$queryDetalle);
                $total=0;
                while($arrayDetalle=mysqli_fetch_array($resDetalle)){
                    $total=$total+$arrayDetalle['subtotal'];
            ?>
                <tr>
                    <td><?php echo $arrayDetalle['nom_prod']; ?></td>
                    <td><?php echo $arrayDetalle['cant']; ?></td>
                    <td><?php echo $arrayDetalle['precio']; ?></td>
                    <td><?php echo $arrayDetalle['subtotal']; ?></td>
                </tr>
                <?php 
                }
                ?>
                <tr>
                    <td colspan="3" class="text-right"> TOTAL:</td>
                    <td><?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <?php 
    }
?>
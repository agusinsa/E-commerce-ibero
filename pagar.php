<?php

$total=$_REQUEST['total_compra']??'';

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-3787783378103124-073015-42c94c5522c442a6b6e497372cd420e5-617995943');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://http://localhost/MODELO%202/thankyou.php",
    "failure" => "http://http://localhost/MODELO%202/errorpago.php?error=failure",
    "pending" => "http://http://localhost/MODELO%202/errorpago.php?error=pending"
);

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Compra Pinturería Iberoamericana';
$item->quantity = 1;
$item->unit_price = $total;
$preference->items = array($item);
$preference->save();


//{"id":617996680,"nickname":"TETE2310706","password":"qatest1988","site_status":"active","email":"test_user_63363654@testuser.com"} CLIENTE
//{"id":617995943,"nickname":"TETE8073105","password":"qatest7682","site_status":"active","email":"test_user_50375755@testuser.com"} VENDEDOR
//curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-1322435370412296-073015-b3bf5242dc9703c691569828256e109f-617996680" -d "{'site_id':'MLA'}"


?>

    <table class="table table-striped table-inverse" id="tablaPasarela">
    <thead class="thead-inverse">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <a class="btn btn-primary mb-5 ml-5" href="?m=envio&sesion=ok" role="button">Volver a Envio</a>
 

    <!--BOTON MERCADO PAGO-->
    <div class="float-right mb-5 mr-5">
        <form action="?sesion=ok&m=checkout&metodo=mp&pago=<?php echo $preference->id;?>" method="POST" id="mercado_pago">
            <script
            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
            data-button-label="Pagar con Mercado Pago"
            data-preference-id="<?php echo $preference->id; ?>">
            </script>
        </form>
    </div>

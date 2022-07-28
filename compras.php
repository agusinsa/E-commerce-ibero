<table class="table table-striped table-inverse" id="tablaCarrito">
    <thead class="thead-inverse">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
</table>
<a class="btn btn-primary mb-5 ml-5" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=productos&pagina=1" role="button">Ir a productos</a>
<a class="btn btn-success mb-5 mr-5 col float-right" href="?<?php if($sesion=='ok'){echo 'sesion=ok&';}?>m=envio" role="button" style="width:15%;">Confirmar compra</a>


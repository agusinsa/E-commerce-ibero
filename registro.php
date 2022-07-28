
  <style>
  .boton_personalizado{
     border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
  width: 150px;
  margin: 2%;
  }
  .boton_personalizado:hover{
   cursor: pointer;
  background: #ffc107;
  color: #000;
  }
</style>
  

</head>
<body>
  <?php

    require "php/conexion.php";

  ?>

<div id="wrapper">
  

  <div class="titreg">Registro</div>
 
  <div id="alerta"><input type="hidden" id="focuss" name="focuss"></div>
  <form class="regi"  method="post" name="registr">
  <div class="colu-2">
    <label>
      Nombre
      <input type="text" name="nom" id="nom" placeholder="Ingrese Nombre" onkeyup="capitalizarPrimeraLetraR();" tabindex="1" required>
    </label>
  </div>
  <div class="colu-2">
    <label>
      Apellido
      <input type="text" name="ape" id="ape" placeholder="Ingrese Apellido" onkeyup="capitalizarPrimeraLetraR();" tabindex="2" required>
    </label>
  </div>
  
  <div class="colu-3">
    <label>
      DNI
      <input type="text" name="dni" id="dni" placeholder="Ingrese DNI" tabindex="3" required>
    </label id="lab">
  </div>
  <div class="colu-3">
    <label >
      Teléfono
      <input type="text" name="tel" id="tel" placeholder="Ingrese Número de Télefono" tabindex="4" required>
    </label>
  </div>
  <div class="colu-3">
    <label>
      Correo Electrónico
      <input type="email" name="mail" id="mail" placeholder="Ingrese Correo Electrónico"  tabindex="5" required>
    </label>
  </div>
  <div class="colu-4">
    <label>
      Dirección
      <input type="direccion" name="direccion" id="direccion" placeholder="Ingrese dirección" onkeyup="capitalizarPrimeraLetraR();" tabindex="6" required>
    </label>
  </div>
   <div class="colu-4">
    <label>
      Localidad
      <input type="cp" name="localidad" id="localidad" placeholder="Ingrese Localidad" onkeyup="capitalizarPrimeraLetraR();" tabindex="7" required>
    </label>
  </div>
  <div class="colu-4">
    <label>
      Código Postal
      <input type="cp" name="cp" id="cp" placeholder="Ingrese Código Postal" tabindex="8" required>
    </label>
  </div>
  <div class="colu-4">
    <label>
     Provincia
      <select name="provincia" id="provincia" class="select-css" tabindex="9">
      <option value="Buenos Aires">Buenos Aires</option>
          <option value="Catamarca">Catamarca</option>
          <option value="Chaco">Chaco</option>
          <option value="Chubut">Chubut</option>
          <option value="Cordoba">Cordoba</option>
          <option value="Corrientes">Corrientes</option>
          <option value="Entre Rios">Entre Rios</option>
          <option value="Formosa">Formosa</option>
          <option value="Jujuy">Jujuy</option>
          <option value="La Pampa">La Pampa</option>
          <option value="La Rioja">La Rioja</option>
          <option value="Mendoza">Mendoza</option>
          <option value="Misiones">Misiones</option>
          <option value="Neuquen">Neuquen</option>
          <option value="Rio Negro">Rio Negro</option>
          <option value="Salta">Salta</option>
          <option value="San Juan">San Juan</option>
          <option value="San Luis">San Luis</option>
          <option value="Santa Cruz">Santa Cruz</option>
          <option value="Santa Fe">Santa Fe</option>
          <option value="Sgo. del Estero">Sgo. del Estero</option>
          <option value="Tierra del Fuego">Tierra del Fuego</option>
         <option value="Tucuman">Tucuman</option>
    </select>
    </label>
  </div>

  <div class="colu-2">
    <label>
      Nombre Usuario
      <input type="text" name="usu" id="usu" placeholder="Ingrese Nombre de Usuario" tabindex="10" required>
    </label>
  </div>
  <div class="colu-4">
    <label>
      Contraseña
      <input type="password" name="clave" id="clave" placeholder="Ingrese Contraseña" tabindex="11" required>
    </label>
  </div>
  <div class="colu-4">
    <label>
     Confirmar Contraseña
      <input type="password" name="confc" id="confc" placeholder="Confirmar Contraseña" tabindex="12" required>
    </label>
  </div>
   <div class="colu-4">
    <label>
      Tipo de Actividad
      <select name="act" id="tact" class="select-css" tabindex="13">
        <option value="">--Seleccione una opción--</option>
        <option value="TALLER CHAPA Y PINTURA">TALLER CHAPA Y PINTURA</option>
        <option value="CONTRATISTA OBRA">CONTRATISTA OBRA</option>
        <option value="CONTRATATISTA INDUSTRIAL">CONTRATATISTA INDUSTRIAL</option>
        <option value="CONTRATATISTA INDUSTRIAL">TALLER DATAILING</option>
        <option value="MANTENIMIENTO EMPRESA">MANTENIMIENTO EMPRESA</option>
        <option value="PARTICULAR">PARTICULAR</option>
        <option value="OTRO">OTRO</option>
    </select>
    </label>
  </div>


  
  
    <center>
    <input type="submit" id="regs" class="boton_personalizado" onclick="validarreg();" name="reg" value="Registrar" tabidex="14">
    </center>
 
  
  </form>
  </div> 
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>

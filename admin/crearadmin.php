<?php 
 include_once "db_admin.php";

 if(isset($_REQUEST['guardar'])){//ISSET=SI SE LE DIO CLICK AL BOTON GUARDAR
    $mail= mysqli_real_escape_string($con, $_REQUEST['email']??'');
    $clave= mysqli_real_escape_string($con, $_REQUEST['clave'])??'';
    $nombre= mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
 
    $sql="INSERT INTO admin(`mail`, `clave`, `nombre`) VALUES ('".$mail."','".$clave."','".$nombre."')";
    $res=mysqli_query($con,$sql);

    if($res){ 
      ?>
        </div>
        <?php 
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=admins&mensaje=Administrador Creado"/>';
    }
    else{
       ?>
        <div class="alert alert-danger" role="alert">
        Error al editar usuario  <?php echo mysqli_error($con); ?> 
        </div>
        <?php
      }      
    }    
?>
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
               <form action="panel.php?modulo=crearadmin" method="POST">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="clave" class="form-control" required> 
                    </div>
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                    </div>
               </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
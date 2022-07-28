<?php 
 include_once "db_admin.php";

 if(isset($_REQUEST['guardar'])){//ISSET=SI SE LE DIO CLICK AL BOTON GUARDAR
    $mail= mysqli_real_escape_string($con, $_REQUEST['email']??'');
    $clave= mysqli_real_escape_string($con, $_REQUEST['clave'])??'';
    $nombre= mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    $id= mysqli_real_escape_string($con, $_REQUEST['id']??'');
 
    $sql="UPDATE admin SET mail='".$mail."', clave='".$clave."', nombre='".$nombre."'
    WHERE id='".$id."' ";
    $res=mysqli_query($con,$sql);

    if($res){ 
      ?>
        </div>
        <?php 
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=admins&mensaje=Administrador ' .$nombre.' Modificado"/>';
    }
    else{
       ?>
        <div class="alert alert-danger float-right" role="alert">
        Error al crear usuario  <?php echo $sql; ?> 
        </div>
        <?php
      }      
    }
    $id=mysqli_real_escape_string($con,$_REQUEST['id']??'');
    $query2="SELECT * FROM admin WHERE id=$id";
    $res2=mysqli_query($con,$query2);
    $row=mysqli_fetch_assoc($res2); 
    $_SESSION['nombre']=$row['nombre'];
?>
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Administrador</h1>
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
               <form action="panel.php?modulo=editaradmin" method="POST">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $row['mail'];?>">
                    </div>
                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="clave" class="form-control" required> 
                    </div>
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
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
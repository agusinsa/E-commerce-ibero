<?php 
 include_once "db_admin.php";
  if(isset($_REQUEST['iDborrar'])){
    $id=mysqli_real_escape_string($con,$_REQUEST['iDborrar']??'');
    if($id==$_SESSION['id']){
      ?>
      <div class="alert alert-danger alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        No se puede eliminar Administrador con la sesión iniciada
      </div>
      <?php
    }else{
        $query2="DELETE from admin WHERE id='".$id."'";
        $res2=mysqli_query($con,$query2);
        if($res2){
          ?>
          <div class="alert alert-warning alert-dismissible fade show float-right" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            Administrador Eliminado
          </div>
          <?php
       }else{
         ?>
         <div class="alert alert-danger" role="alert">
           Error al eliminar Administrador <?php echo mysqli_error($con); ?> 
         </div>
         <?php
       }
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
            <h1>Administradores</h1>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones
                        <a href="panel.php?modulo=crearadmin"><i class="fa fa-plus"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM admin";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['mail'];?></td>
                      <td>
                        <a href="panel.php?modulo=editaradmin&id=<?php echo $row['id'];?>" style="margin-r"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="panel.php?modulo=admins&iDborrar=<?php echo $row['id'];?>" class="text-danger borrar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  <?php 
                  } 
                  ?>
                  </tbody>
                  </table>
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
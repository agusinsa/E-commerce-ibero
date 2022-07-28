 <?php 
 include_once "db_admin.php";
  ?>
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
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
                    <th>Apellido</th>
                    <th>Dni</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Nombre de Usuario</th>
                    <th>Actividad</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM usuarios ";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['apellido']; ?></td>
                      <td><?php echo $row['dni'];?></td>
                      <td><?php echo $row['tel'];?></td>
                      <td><?php echo $row['mail'];?></td>
                      <td><?php echo $row['usuario'];?></td>
                      <td><?php echo $row['act']; ?></td>
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
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
                <table id="tablaProductos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th>Formato</th>
                    <th>Descripcion</th>
                    <th>Outlet</th>
                    <th>Imagenes</th>
                  </tr>
                  </thead>
                  <!--<tbody>
                   <?php
                   /* $query="SELECT * FROM productos ";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                      <td><?php echo $row['nom_prod']; ?></td>
                      <td><?php echo $row['marca']; ?></td>
                      <td><?php echo $row['precio'];?></td>
                      <td><?php echo $row['cantidad'];?></td>
                      <td><?php echo $row['categoria'];?></td>
                      <td><?php echo $row['formato'];?></td>
                      <td><img src="<?php echo $row['imagenes']?>" alt=""></td>
                      <td><?php echo $row['descripcion']; ?></td>                      
                    </tr>
                    <?php 
                    } */
                    ?>
                  </tbody>-->
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
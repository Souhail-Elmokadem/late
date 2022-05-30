<?php 
include 'dashbord.php' ?>
<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css"></head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Articles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
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
              <div class="card-header">
                <h3 class="card-title">you can use any thing here</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                  <th>magazin</th>
                 
                 <th>document achat</th>
                 <th>post</th>
                 <th>Article</th>
                 <th>Designation add art</th>
                 <th>quantite receptioner</th>
                 <th>date livraison contructual</th>
                 <th>stock S</th>
                 <th>stock S+1</th>
                 <th>stock S+2</th>
                 <th>stock S+3</th>

                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
$sqlnbSemain = "SELECT (`nb_zmm`) FROM `nb_semain` WHERE 1;";
    $semains = $con->query($sqlnbSemain);
    $semain = $semains->fetch();

    if($semain[0]===1){
      $base = 'zmm';
    }elseif($semain[0]===2){
      $base = 'zmm_s2';
    }elseif($semain[0]===3){
      $base = 'zmm_s3';
    }elseif($semain[0]===4){
      $base = 'zmm_s4';
    }

$sql = "select * from $base";
$st = $con->query($sql);
while($lin = $st->fetch())
{
?>
<tr>
  <td><?php echo $lin[0] ?></td>
  <td><?php echo $lin[1] ?></td>
  <td><?php echo $lin[2] ?></td>
  <td><?php echo $lin[3] ?></td>
  <td><?php echo $lin[4] ?></td>
  <td><?php echo $lin[5] ?></td>
  <td><?php echo $lin[6] ?></td>
  <td><?php echo $lin[7] ?></td>
  <td><?php echo $lin[8] ?></td>
  <td><?php echo $lin[9] ?></td>
  <td><?php echo $lin[10] ?></td>
</tr>



<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>magazin</th>
                 
                 <th>document achat</th>
                 <th>post</th>
                 <th>Article</th>
                 <th>Designation add art</th>
                 <th>quantite receptioner</th>
                 <th>date livraison contructual</th>
                 <th>stock S</th>
                 <th>stock S+1</th>
                 <th>stock S+2</th>
                 <th>stock S+3</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              
              
              <!--  -->
            </div>
            <!-- /.card -->
            <!--  -->
            <!--  -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <br>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php' ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src=" plugins/datatables/jquery.dataTables.min.js"></script>
<script src=" plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src=" plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src=" plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src=" plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src=" plugins/jszip/jszip.min.js"></script>
<script src=" plugins/pdfmake/pdfmake.min.js"></script>
<script src=" plugins/pdfmake/vfs_fonts.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src=" plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src=" dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

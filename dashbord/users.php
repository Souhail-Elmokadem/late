<?php
  session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
    }else{
session_commit();
      if($_SESSION['role']==='admin'){

      
      
        ?>

<?php 
include 'dashbord.php' ?>
<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <h3 class="card-title float-left" style="margin-top:8px">you can use any thing here</h3>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#ModalAdd">+ Nouveau article </button>
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
                      <th>ID</th>
                  <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
$sql = "select * from users;";
$st = $con->query($sql);
while($lin = $st->fetch())
{
?>
<tr id="<?php echo $lin[0]; ?>">
  <td data-target="4"><?php echo $lin['id'] ?></td>
  <td data-target="0" ><?php echo $lin['nom'] ?></td>
  <td data-target="1" ><?php echo $lin['prenom'] ?></td>
  <td data-target="2" ><?php echo $lin['Email'] ?></td>
  <td data-target="3" ><?php echo $lin['role'] ?></td>
  <td >
  <?php if($_SESSION['user']!==$lin['Email']) 
  {
  ?>
  <a href="#" data-role="del" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn" data-toggle="modal" data-target="#Modaldel">
    <img src="img/del.png" width="20" alt="" style="cursor: pointer;">
    </button></a> 

  <a href="#" data-role="edit" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalEdit">
    <!-- <img src="img/edit.png" width="20" alt="" style="cursor: pointer;"> --> Modifier
    </button></a>
    <?php } ?>
     </td>
</tr>



<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>ID</th>
                  <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- Modal Edit -->
              <form method="POST">
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="ModalEditTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier les information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="id" class="">Utilisateur ID:</label>
        <input type="text" name="iduser" id="iduser" class="form-control" readonly>

            <label for="id" class="">Nom</label>
            <input type="text" name="num" id="num" class="form-control" placeholder="Nom user">
            
            <label for="nom" class=" mt-3">Prenom</label>
            <input type="text" name="grp" id="grp" class="form-control" placeholder="Prenom user">
            
            <label for="prenom" class=" mt-3">Email</label>
            <input type="email" name="appro" id="appro" class="form-control" placeholder="ex :e-mail@name.com">

            
            <label for="prenom" class=" mt-3">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="admin">admin</option>
                <option value="moderateur">moderateur</option>
                <option value="utilisateur">utilisateur</option>
            </select>
            
            <label for="prenom" class=" mt-3">Password</label>
            <input type="password" name="pass" id="editpass" class="form-control" placeholder="Nouveau mot pass">
            
            <input type="hidden" name="" id="userid">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
        <button type="button" id="btnedit" class="btn btn-primary">Save Modification</button>
      </div>
    </div>
  </div>
</div>

            </form>
        
    <!-- Modal delete -->
    <form method="post">
<div class="modal fade" id="Modaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      êtes-vous sûr de supprimer cet utilisateur ? <input type="hidden" name="" id="useriddel"> 
        <!-- // pour souvgardez id de tr dans un label   -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
        <button type="button" class="btn btn-danger" id="btndel">Supprimer</button>
      </div>
    </div>
  </div>
</div>
    </form> 
<!-- modal add  -->
<form method="post">
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalEditTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="nomadd">Nom</label>
          <input type="text" class="form-control" name="nomadd" id="nomadd" placeholder="saisir nom " value="User">
          <label for="prenomadd"  class="mt-4">Prenom</label>
          <input type="text" class="form-control" name="prenomadd" id="prenomadd" placeholder="saisir prenom" value="guest">
          <label for="emailadd"  class="mt-4">Email</label>
          <input type="email" class="form-control" name="emailadd" id="emailadd" placeholder="saisir Email" required>
          <small id="emailHelp" class="form-text text-muted"></small>
          <label for="roleadd"  class="mt-4">Choisi role :*</label>
          <select name="roleadd" id="roleadd" class="form-control" required>
              <option value="admin">admin</option>
              <option value="moderateur" >moderateur</option>
              <option value="utilisateur" selected>utilisateur</option>
          </select>
          <label for="passadd"  class="mt-4">Nouveau Password</label>
          <input type="password" class="form-control" name="passadd" id="passadd" placeholder="saisir password" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
          <button type="button" id="btnAdd" class="btn btn-primary">+ Ajouter</button>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
  </form>
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
      "autoWidth": true,
      "responsive": true,
    });
  });

//   ajout

  
  // ajax insert user
  $('#btnAdd').click(function(){
      if($('#emailadd').val().indexOf('@') > 0 && $('#emailadd').val().indexOf('.') > 0){

      
    var nomadd = $('#nomadd').val();
    var prenomadd = $('#prenomadd').val();
    var emailadd = $('#emailadd').val();
    var roleadd = $('#roleadd').val();
    var passadd = $('#passadd').val();

    $.ajax({
        url     :'adduser.php',
        method  :'POST',
        data    :{nomadd:nomadd,prenomadd:prenomadd,emailadd:emailadd,roleadd:roleadd,passadd:passadd},
        success :function(){
            $('.modal-backdrop.show').hide();
          $('#ModalAdd').modal('toggle');
            $('#example1').load(location.href + " #example1");
        }
    });}else{$('#emailHelp').text('format e-mail incorrect !')}
  });

  // delete user

  $(document).ready(function(){
    $(document).on('click','a[data-role=del]',function(){
       var id = $(this).data('id');
       var art = $('#'+id).children('td[data-target=2]').text();
       $('#num').val(art);
       $('#useriddel').val(id);
       $('#Modaldel').modal('toggle');
    });
  
  // ajax delete
  $('#btndel').click(function(){
    var id= $('#useriddel').val();
    var num = $('#num').val();

    $.ajax({
        url     :'deluser.php',
        method  :'POST',
        data    :{num:num},
        success :function(){
          
          $('#Modaldel').modal('toggle');
          $('.modal-backdrop.show').hide();

          $('#example1').load(location.href + " #example1");
          $('#alert-late-del').slideDown().show();
          setTimeout(function(){
          $('#alert-late-del').slideUp().hide();
          },3000);
        }
    });
  });

});

// modifier
$(document).ready(function(){
    $(document).on('click','a[data-role=edit]',function(){
       var id = $(this).data('id');
       var nom = $('#'+id).children('td[data-target=0]').text();
       var prenom = $('#'+id).children('td[data-target=1]').text();
       var email = $('#'+id).children('td[data-target=2]').text();
       var role = $('#'+id).children('td[data-target=3]').text();
       var iduser = $('#'+id).children('td[data-target=4]').text();
       $('#num').val(nom);
       $('#grp').val(prenom);
       $('#appro').val(email);
       $('#role').val(role);
       $('#iduser').val(iduser);
       $('#userid').val(id);
       $('#ModalEdit').modal('toggle');
    });
  
  // ajax edit
  $('#btnedit').click(function(){
    var id= $('#userid').val();
    var num = $('#num').val();
    var grp = $('#grp').val();
    var appro = $('#appro').val();
    var role = $('#role').val();
    var iduser=$('#iduser').val();
    var pass=$('#editpass').val();
    $.ajax({
        url     :'edituser.php',
        method  :'POST',
        data    :{num:num,grp:grp,appro:appro,role:role,iduser:iduser,pass:pass},
        success :function(response){
             
              $('#ModalEdit').modal('toggle');
              $('.modal-backdrop.show').hide();

           $('#'+id).children('td[data-target=0]').text(num);
           $('#'+id).children('td[data-target=1]').text(grp);
           $('#'+id).children('td[data-target=2]').text(appro);
           $('#'+id).children('td[data-target=3]').text(role);
           $('#'+id).children('td[data-target=4]').text(iduser);
           $('#alert-late').slideDown().show();
           setTimeout(function(){
            $('#alert-late').slideUp().hide();
           },3000);
        }
    });
  });

});


</script>
</body>
</html>
<?php }else{
  include '404.php';
}

}?>
<?php
  session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
    }else{
      session_commit();
      ?>

<?php include 'dashbord.php' ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" id="imgprofileicon"
                       src="<?php if(!empty($rw['img'])) {echo $rw['img'];}
                       elseif(isset($_SESSION['img'])) {echo  $_SESSION['img'];}
                       else{echo 'img/user.jpg';} ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php if(isset($rw['nom'])) echo $rw['nom'].' '.$rw['prenom'] ?></h3>
                <?php if(empty($_SESSION['job'])) $_SESSION['job']='without Job' ?>
                <p class="text-muted text-center"><?php if(isset($_SESSION['job']))  echo $_SESSION['job'] ?></p>

             

                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#profileimgModal"><b>Modifier image</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            <!-- About Me Box -->
            <div class="card card-primary" id="contentaboutme">
            <div class="overlay" id="waiting">
  <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
              <div class="card-header">
                <h3 class="card-title"><?php if(!empty($rw['nomcategorie'])) 
                {echo $rw['nomcategorie'];} else{echo 'ajouter un categorie';} ?></h3>
                <button type="button" class="float-right" style="background-color: transparent;border:none;outline:none;position:relative;top:-3px" data-toggle="modal" data-target="#aboutmeModal">
                <img src="img/editw.png"  width="20" alt="edit Icon" >
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i><span id="cate-about"><?php if(!empty($rw['categorie'])) 
                {echo $rw['categorie'];} else{echo 'Titre';} ?></span></strong>

                <p class="text-muted">
                  <span id="descrshow">
                    <?php if(!empty($rw['description'])) 
                {echo $rw['description'];} else{echo 'ajouter un description';} ?>
                  </span></p>

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- modal about me -->
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                  Launch Success Toasty
                </button>
<!-- Modal -->
<div class="modal fade" id="aboutmeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <label for="nomcate">Nom De Card</label>
          <input type="text" class="form-control" name="nomcate" id="nomcate" placeholder="saisir le nom de card" value="<?php if(isset($rw['nomcategorie'])) echo $rw['nomcategorie'] ?>"><br>
          <label for="cate">Categorie</label>
          <input type="text" class="form-control" name="cate" id="cate" placeholder="saisir le nom de categorie" value="<?php if(isset($rw['categorie'])) echo $rw['categorie'] ?>"><br>
          <label for="descer">description</label>
          <textarea class="form-control" name="descr" id="descr" placeholder="ecrivez un description ..." ><?php if(isset($rw['description'])) echo $rw['description'] ?></textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnabout" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link " href="#">Parametres</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->
                  <form method="post">
                  <div class="w-100" id="alr"><h1 id="alrt"></h1></div>
                  <div class="active tab-pane pt-3" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputPrenom" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" placeholder="Prenom" value="<?php if(isset($rw['prenom'])) echo $rw['prenom'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNom" name="inputNom" placeholder="Nom" value="<?php if(isset($rw['nom'])) echo $rw['nom'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php if(isset($rw['Email'])) echo $rw['Email'] ?>">
                          <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputProfession" class="col-sm-2 col-form-label">La Profession</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputProfession" name="inputProfession" placeholder="Votre profession.."><?php if(isset($rw['job'])) echo $rw['job'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputRole" class="col-sm-2 col-form-label">Rôle</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputRole" name="inputRole" placeholder="" value="<?php if(isset($_SESSION['role'])) echo $_SESSION['role'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> j'accepte <a href="#">pour changer mes informations</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn btn-primary" name="savepr" id="savepr" style="width: 120px;">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  </form>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card" style="width: 100%;height:auto">
            <div class="card-body">
            <div class="card-title">Changer mot passe</div><br>
              <hr>
              <div class="form-group">
                <form method="post">
    <label for="exampleInputEmail1">ancien mot de passe</label>
    <input type="password" class="form-control" id="pass-anc" aria-describedby="passHelp" placeholder="Enter votre mot passe">
    <small id="passHelp" class="form-text text-muted"></small>
    <label for="passnew" class="mt-3">Nouveau mot passe</label>
    <input type="password" class="form-control mb-2" id="passnew" name="passnew" placeholder="Nouveau mot passe">
    <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Confirmer votre mot passe">
    <small id="passconfhelp" class="form-text text-muted"></small>
    <button type="button" class="btn btn-default mt-4" id="change">Changer mot passe</button></form>
  </div>

            </div>
              </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- modal edit image profile -->

<!-- Modal -->
<div class="modal fade" id="profileimgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo de Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <form method="POST" runat="server" enctype="multipart/form-data">
  <input accept="image/*" type='file' id="imgInp" name="imgfile" />
  <img id="blah" src="img/image-preview.png.opdownload" alt="your image" width="128"/>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="exit" data-dismiss="modal">Quitter</button>
        <button type="submit" class="btn btn-primary" name="imgsave">Enregistrer</button>
      </div>
    </form>
    </div>
  </div>
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

<script src="plugins/jquery/jquery.min.js"></script>

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src=" dist/js/demo.js"></script> -->
<?php 
// imgfile
$errorupload=0;
if(isset($_POST['imgsave'])){

 if($_FILES["imgfile"]["name"] != '')
{
 $allowed_extension = array('png', 'jpg', 'jpeg','gif');
 $file_array = explode(".", $_FILES["imgfile"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
 if($_FILES['imgfile']['size']/1024/1024<6){
  $name = $_FILES['imgfile']['name'];
  move_uploaded_file($_FILES['imgfile']['tmp_name'],'img/'.$name);
  $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
  $email = $_SESSION['user'];
  $sql = "UPDATE `users` SET `img`='img/$name' WHERE `Email`='$email';";
  $stm = $con->prepare($sql);
  $stm->execute();
  $_SESSION['img'] ='img/'.$name;
  echo "<script>$('#alr').addClass('alert alert-success');
  $('#alr').text('image uploaded success  !');
  $('#alr').show();
  setTimeout(function(){
    $('#alr').slideDown().hide();
   },6000);
   $('#imgprofileicon').attr('src', 'img/".$name."');</script>";
 }else{
  echo "<script>$('#alr').addClass('alert alert-danger');
  $('#alr').text('image doit etre inferieur a 6MB !');
  $('#alr').show();
  setTimeout(function(){
    $('#alr').slideDown().hide();
   },6000);</script>";
   
 }
}else{
  echo "<script>$('#alr').addClass('alert alert-danger');
  $('#alr').text('only images have extension jpg - jpeg - png');
  $('#alr').show();
  setTimeout(function(){
    $('#alr').slideDown().hide();
   },6000);</script>";
}
}
}

?>


<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  


  });
</script>
<script>
  

  // image preview before upload 
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
$('#waiting').hide()
// edit info profile

$('#inputEmail').keyup(function(){
  var emailHelp = $('#emailHelp');
  var inputEmail = $('#inputEmail').val();
    $.ajax({
        url     :'emailcheck.php',
        method  :'POST',
        data    :{inputEmail:inputEmail},
        success :function(data){
          $('#emailHelp').html(data);
         if($('#emailHelp').text()==''){
          $('#savepr').removeAttr('disabled');
         }else if($('#emailHelp').text()!=''){
          $('#savepr').attr('disabled','disabled');

         }
        }
    });
  });


$('#savepr').click(function(){
    var inputPrenom= $('#inputPrenom').val();
    var inputNom = $('#inputNom').val();
    var inputEmail = $('#inputEmail').val();
    var inputProfession = $('#inputProfession').val();
    var inputRole = $('#inputRole').val();

    $.ajax({
        url     :'profilephp.php',
        method  :'POST',
        data    :{inputPrenom:inputPrenom,inputNom:inputNom,inputEmail:inputEmail,inputProfession:inputProfession},
        success :function(response){
        
          $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'success',
        title: 'Les information de profile sera bien enregistrer.'
      })
    });
   

           $('.profile-username').text(inputNom+' '+inputPrenom);
           
        }
    });
  });
  

  // edit info profile about me

$('#btnabout').click(function(){
    var nomcate= $('#nomcate').val();
    var cate = $('#cate').val();
    var descr = $('#descr').val();

    $.ajax({
        url     :'aboutme.php',
        method  :'POST',
        data    :{nomcate:nomcate,cate:cate,descr:descr},
        success :function(response){
          
          $('#aboutmeModal').modal('hide');
          $('.modal-backdrop.show').hide();
    $('#alr').addClass('alert alert-primary');
  $('#alr').text('les information de card sera modifier avec succes !');
  $('#alr').show();
  setTimeout(function(){
    $('#alr').slideDown().hide();
   },6000);
   $('.card-title').text(nomcate);
   $('#cate-about').text(cate);
   $('#descrshow').text(descr);
        }
    });
  });
 
  <?php
  $id = $_SESSION['id'];
  $sqlpass = "select password from users where id=$id";
  $stm = $con->query($sqlpass);
  $passtrue = $stm->fetch();
  
  ?>
  $('#change').click(function(){
    var passanc= $('#pass-anc').val();
    var passnew = $('#passnew').val();
    var passconf = $('#passconf').val();
    
if(passanc!='<?php echo $passtrue[0] ?>'){
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'error',
        title: 'Le mot pass est incorrect !'
      })
    });

$('#pass-anc').focus();
return false;
  };

  
});
  // changer mot pass
  $('#change').click(function(){
    var passanc= $('#pass-anc').val();
    var passnew = $('#passnew').val();
    var passconf = $('#passconf').val();
    
if(passnew=='' && passconf=='' && passanc==''){
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'error',
        title: 'Les champs est obligatoire !'
      })
    });

$('#pass-anc').focus();
return false;
  };

  
});

  
  $('#passconf').keyup(function(){
  var passnew = $('#passnew').val();
    var passconf = $('#passconf').val();
    if(passconf != passnew){
      $('#passconfhelp').show();
      $('#change').attr('disabled','disabled');
      $('#passconfhelp').text("mot passe c'est pas le meme !");
    }else{
      $('#passconfhelp').hide();
      $('#change').removeAttr('disabled');
$('#change').click(function(){
    var passanc= $('#pass-anc').val();
    var passnew = $('#passnew').val();
    var passconf = $('#passconf').val();
if(passnew=='' || passconf=='' || passanc==''){
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'warning',
        title: 'Les champs est obligatoire !'
      })
    });
}else{


    $.ajax({
        url     :'changepass.php',
        method  :'POST',
        data    :{passnew:passnew},
        success :function(response){
  
          $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'success',
        title: 'Le mot passe est bien change !'
      })
    }); 
        }
    });
  }
  });
    }
  });


</script>
</body>
</html>
<?php } ?>
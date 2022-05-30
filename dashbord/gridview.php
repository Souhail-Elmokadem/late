<?php
$pagename='Les articles';
include_once 'dashbord.php' ?>
<div class="content-wrapper">


<div style="min-width:700px;width: 70%;height: 300px;margin-left:10%;" class="pt-3" >
       <div>
         
         <span id="alert-late" style="display: none; width:100%">
         <div class=" alert alert-success" role="alert" id="alr" style="width: 100%;">Modifier avec succes !</div>
         </span>
         <span id="alert-late-del" style="display: none; width:100%">
         <div class=" alert alert-success" role="alert" id="alr" style="width: 100%;">Supprimer avec succes !</div>
         </span>
         <span id="alert-late-Add" style="display: none; width:100%">
         <div class=" alert alert-success" role="alert" id="alr" style="width: 100%;">Inserer avec succes !</div>
         </span>
         <div id="txt"></div>
       </div>
        
<!-- Main content -->
    <section class="content">
    
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Gestion des Articles</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <?php

$con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
$sql = "select * from marc limit 6;";
$st = $con->query($sql);
?>
<table class="table table-hover" id="table">
<thead class='thead-light'>
<tr><th>Numero de l'article</th><th>Groupe d'acheteurs</th><th>Approvisionn spécial</th><th> Action</th></tr>
</thead>


<?php

while($lin = $st->fetch())
{
?>
<tr id="<?php echo $lin[0]; ?>">
  <td data-target="0"><?php echo $lin[0] ?></td>
  <td data-target="1"><?php echo $lin[1] ?></td>
  <td data-target="2"><?php echo $lin[2] ?></td>
  <td >
    <a href="#" data-role="edit" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEdit">
    <!-- <img src="img/edit.png" width="20" alt="" style="cursor: pointer;"> --> Modifier
    </button></a>

    <a href="#" data-role="del" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn" data-toggle="modal" data-target="#Modaldel">
    <img src="img/del.png" width="20" alt="" style="cursor: pointer;">
    </button></a>
</td>
</tr>



<?php } ?>
</table>      
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          


        <div class="input-group float-left" style="width: 350px;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Rechercher</span>
  </div>
  <input type="search" name="" class="form-control float-left" id="recherch" style="max-width: 250px;" placeholder="Numero d'un Article...">
</div>
        
        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#ModalAdd">+ Nouveau article </button>
        </div>
      
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


</div>


<!-- ./wrapper -->
<!-- modal -->
<!-- Button trigger modal -->
<!-- Modal Add -->
<!-- Large modal -->


<!-- Modal Add -->

<!-- Large modal -->
<div class="container">
  <!-- <h2>Modal Example</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal Add -->
  <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalEditTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="numarticle">Numero de l'article</label>
          <input type="text" class="form-control" name="numarticle" id="numarticle" placeholder="saisir numero de l'article">
          <label for="grpachat"  class="mt-4">Groupe d'Acheteurs</label>
          <input type="text" class="form-control" name="grpachat" id="grpachat" placeholder="saisir Groupe de l'acheteurs">
          <label for="appros"  class="mt-4">Approvisionn spécial</label>
          <input type="text" class="form-control" name="appros" id="appros" placeholder="saisir une approvision spécial">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
          <button type="button" id="btnAdd" class="btn btn-primary">+ Ajouter</button>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->
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
        <!-- <form method="POST"> -->
            <label for="id" class="">Numero de l'article</label>
            <input type="text" name="num" id="num" class="form-control" placeholder="saisir numero d'article.." readonly>
            
            <label for="nom" class=" mt-3">Groupe d'acheteurs</label>
            <input type="text" name="grp" id="grp" class="form-control" >
            
            <label for="prenom" class=" mt-3">Approvisionn.spécial</label>
            <input type="text" name="appro" id="appro" class="form-control" >
            <input type="hidden" name="" id="userid">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
        <button type="button" id="btnedit" class="btn btn-primary">Save Modification</button>
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>
<!-- model delete  -->


<!-- Modal -->
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
      êtes-vous sûr de supprimer cet article ? <input type="hidden" name="" id="useriddel"> 
        <!-- // pour souvgardez id de tr dans un label   -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
        <button type="button" class="btn btn-danger" id="btndel">Supprimer</button>
      </div>
    </div>
  </div>
</div>

</div>


<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(document).ready(function(){
    $(document).on('click','a[data-role=edit]',function(){
       var id = $(this).data('id');
       var art = $('#'+id).children('td[data-target=0]').text();
       var grp = $('#'+id).children('td[data-target=1]').text();
       var appro = $('#'+id).children('td[data-target=2]').text();
       $('#num').val(art);
       $('#grp').val(grp);
       $('#appro').val(appro);
       $('#userid').val(id);
       $('#ModalEdit').modal('toggle');
    });
  
  // ajax edit
  $('#btnedit').click(function(){
    var id= $('#userid').val();
    var num = $('#num').val();
    var grp = $('#grp').val();
    var appro = $('#appro').val();

    $.ajax({
        url     :'Modifier.php',
        method  :'POST',
        data    :{num:num,grp:grp,appro:appro},
        success :function(response){
             
              $('#ModalEdit').modal('toggle');
              $('.modal-backdrop.show').hide();

           $('#'+id).children('td[data-target=0]').text(num);
           $('#'+id).children('td[data-target=1]').text(grp);
           $('#'+id).children('td[data-target=2]').text(appro);
           $('#alert-late').slideDown().show();
           setTimeout(function(){
            $('#alert-late').slideUp().hide();
           },3000);
        }
    });
  });

});

/// delete

$(document).ready(function(){
    $(document).on('click','a[data-role=del]',function(){
       var id = $(this).data('id');
       var art = $('#'+id).children('td[data-target=0]').text();
       $('#num').val(art);
       $('#useriddel').val(id);
       $('#Modaldel').modal('toggle');
    });
  
  // ajax delete
  $('#btndel').click(function(){
    var id= $('#useriddel').val();
    var num = $('#num').val();

    $.ajax({
        url     :'supprimer.php',
        method  :'POST',
        data    :{num:num},
        success :function(){
          
          $('#Modaldel').modal('toggle');
          $('.modal-backdrop.show').hide();

          $('#table').load(location.href + " #table");
          $('#alert-late-del').slideDown().show();
          setTimeout(function(){
          $('#alert-late-del').slideUp().hide();
          },3000);
        }
    });
  });

});
// ajout
$(document).ready(function(){
  
  // ajax insert article
  $('#btnAdd').click(function(){
    var num = $('#numarticle').val();
    var grp = $('#grpachat').val();
    var appro = $('#appros').val();
    $.ajax({
        url     :'Ajouter.php',
        method  :'POST',
        data    :{num:num,grp:grp,appro:appro},
        success :function(){
          
          $('#ModalAdd').modal('toggle');
          $('.modal-backdrop.show').hide();
          $('#table').load(location.href + " #table");
          $('#alert-late-Add').slideDown().show();
          setTimeout(function(){
          $('#alert-late-Add').slideUp().hide();
          },3000);
        }
    });
  });

});

// rechercher
$(document).ready(function(){
  
  // ajax insert article
  $('#recherch').keyup(function(){
    var num = $('#recherch').val();
    $.ajax({
        url     :'rechercher.php',
        method  :'POST',
        data    :{num:num},
        success :function(data){
          $('#table').html(data);
        }
    });
  });

});
</script>

<?php include_once 'footer.php' ?>

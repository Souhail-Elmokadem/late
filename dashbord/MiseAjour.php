<?php
  session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
    }else{
      session_commit();
      if($_SESSION['role']==='admin'){
      ?>






<?php 
$pagename='Mise a jour';
include 'dashbord.php' ?>
        <head>
        <link rel="stylesheet" href=" plugins/dropzone/min/dropzone.min.css">
        <style>
            .table td, .table th{
                border-top: 1px solid #ffffff;
            }
        </style>
   </head>
   
   <div class="content-wrapper pt-5 ">
      <div class="w-50 ml-5">
       <span id="message"></span>
       </div> 

   <section class="card ml-5 mr-5">
       
   <form method="post" id="import_excel_formOne" enctype="multipart/form-data">
       <div class="card" style="background-color: white;width:100%; height:170px">
            <section class="card-header"><h3 class="card-title">Excel Me80fN <small><em>only file extension like</em> xls xlsx csv</small></h3></section>
            <div class="row mt-3" style="margin-left: 10px;">
                   <div class="col-lg-6 d-flex align-items-center">
                  <table class="table">
                  <tr>
                    <td width="25%"  align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <!-- <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary col start" value="Import" /></td> -->
                  </tr>
                </table> 
        </div> 
                  <div class="col-lg-6">
                    <div class="btn-group w-100 pr-5 pt-2">
                        
                      <button type="submit" name="import" id="import" class="btn btn-primary col start" value="Import">
                        <i class="fas fa-upload"></i>
                        <span id="importtextone">Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  
            </div>
        </form>
            
    </div> 

    <form method="post" id="import_excel_formTwo" enctype="multipart/form-data">
       <div class="card" style="background-color: white;width:100%; height:170px">
            <section class="card-header"><h3 class="card-title">Excel Mb52 <small><em>only file extension like</em> xls xlsx csv</small></h3></section>
            <div class="row mt-3" style="margin-left: 10px;">
                   <div class="col-lg-6 d-flex align-items-center">
                  <table class="table">
                  <tr>
                    <td width="25%"  align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <!-- <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary col start" value="Import" /></td> -->
                  </tr>
                </table> 
        </div> 
                  <div class="col-lg-6">
                    <div class="btn-group w-100 pr-5 pt-2">
                        
                      <button type="submit" name="import" id="import2" class="btn btn-primary col start" value="Import">
                        <i class="fas fa-upload"></i>
                        <span id="importtexttwo">Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  
            </div>
        </form>
            
    </div> 

    <form method="post" id="import_excel_formTree" enctype="multipart/form-data">
       <div class="card" style="background-color: white;width:100%; height:170px">
            <section class="card-header"><h3 class="card-title">Excel ZMm <small><em>only file extension like</em> xls xlsx csv</small></h3></section>
            <div class="row mt-3" style="margin-left: 10px;">
                   <div class="col-lg-6 d-flex align-items-center">
                  <table class="table">
                  <tr>
                    <td width="25%"  align="right">Select Excel File</td>
                    <td width="50%"><input type="file"  name="import_excel" /></td>
                    <!-- <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary col start" value="Import" /></td> -->
                  </tr>
                </table> 
        </div> 
                  <div class="col-lg-6">
                    <div class="btn-group w-100 pr-5 pt-2">
                        
                      <button type="submit" name="import" id="import0" class="btn btn-primary col start" value="Import">
                        <i class="fas fa-upload"></i>
                        <span id="importtexttree">Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  
            </div>
        </form>
            
    </div> 

    <form method="post" id="import_excel_form" enctype="multipart/form-data">
     <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Excel Marc <small><em>only file extension like</em> xls xlsx csv</small></h3>
              </div>
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-6 d-flex align-items-center">
                  <table class="table">
                  <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="50%"><input type="file"  id="mrcfile" name="import_excel" /></td>
                    <!-- <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary col start" value="Import" /></td> -->
                  </tr>
                </table> 
        </div>
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                        
                      <button type="submit" name="import" id="import3" class="btn btn-primary col start" value="Import">
                        <i class="fas fa-upload"></i>
                        <span id="importtext">Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                                       
                    </div>
                  </div>
                </div>
                
              </div>
              </form>
              
            </div>

        
            <!-- /.card -->
          </div>
                    hhhh
        </div>  
   
    
  </div>  

    
</section>
<!-- mb52 -->



   </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#import_excel_form').submit(function(event){
    event.preventDefault();
    $.ajax({
      url:"importExcelMarc.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import3').attr('disabled', 'disabled');
        $('#importtext').text('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import3').attr('disabled', false);
        $('#importtext').text('Start upload');
      }
    })
  });
});
$(document).ready(function(){
  $('#import_excel_formOne').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importExcelMe80fn.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#importtextone').text('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#importtextone').text('Start upload');
      }
    })
  });
});
$(document).ready(function(){
  $('#import_excel_formTwo').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importExcelMb52.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import2').attr('disabled', 'disabled');
        $('#importtexttwo').text('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import2').attr('disabled', false);
        $('#importtexttwo').text('Start upload');
      }
    })
  });
});
$(document).ready(function(){
  $('#import_excel_formTree').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importExcelZmm.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import0').attr('disabled', 'disabled');
        $('#importtexttree').text('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import0').attr('disabled', false);
        $('#importtexttree').text('Start upload');
      }
    })
  });
});


  
</script>

<?php }else{
  header('location:404.php');
}
} ?>
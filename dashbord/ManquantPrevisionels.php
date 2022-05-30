<?php
  session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
    }else{
      session_commit();
      ?>


<?php
$pagename='mnqprev';
include 'dashbord.php' ?>

<div class="content-wrapper p-4">


<h3>Semain Actuel</h3>

<br>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 400px;">
                        <div style="width: 100%;height: 400px;">
                        <figure class="highcharts-figure">
                            <div id="stock_charts"></div>
                            <p class="highcharts-description">
                              
                            </p>
                          </figure>
                        <?php
                         
                         // ... 1

                        ?>
                      </div>
                      </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 400px;">
                   
                  <?php
            //.. 1-2
 
 ?>

 <div id="chartContainer" style="height: 100%; width: 50%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                  </div>
                </div>
              </div>











</div>

<br>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 400px;">
                        <div style="width: 100%;height: 300px;">
                        <figure class="highcharts-figure">
                            <div id="stock_charts1"></div>
                            <p class="highcharts-description">
                              
                            </p>
                          </figure>
                        <?php
                         
                         // ... 1

                        ?>
                      </div>
                      </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 400px;">
                   
                  <?php
            //.. 1-2
 
 ?>

 <div id="chartContainer" style="height: 100%; width: 50%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                  </div>
                </div>
              </div>











</div>



<?php 
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

    $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
    
    //semain S+3
    $doble = "SELECT `stock_s+3` FROM $base WHERE `stock_s+3`<0;";
    $NoDobl = "SELECT `stock_s+3` FROM $base WHERE `stock_s+3`>0;";
    $stm1 = $con->query($doble);
    $stm = $con->query($NoDobl);
    $nok_s3 = $stm1->rowCount();
    $ok_s3 = $stm->rowCount();
    
    
    //semain S+2
    $doble = "SELECT `stock_s+2` FROM $base WHERE `stock_s+2`<0;  ";
    $NoDobl = "SELECT `stock_s+2` FROM $base WHERE `stock_s+2`>0;;";
    $stm1 = $con->query($doble);
    $stm = $con->query($NoDobl);
    $nok_s2 = $stm1->rowCount();
    $ok_s2 = $stm->rowCount();
    
    //semain S+1
    $doble = "SELECT `stock_s+1` FROM $base WHERE `stock_s+1`<0; ";
    $NoDobl = "SELECT `stock_s+1` FROM $base WHERE `stock_s+1`>0;;";
    $stm1 = $con->query($doble);
    $stm = $con->query($NoDobl);
    $nok_s1 = $stm1->rowCount();
    $ok_s1 = $stm->rowCount();

    // semain S
    $doble = "SELECT `stock_s` FROM $base WHERE `stock_s`<0;";
    $NoDobl = "SELECT `stock_s` FROM $base WHERE `stock_s`>0;";
    $stm1 = $con->query($doble);
    $stm = $con->query($NoDobl);
    $nok_s = $stm1->rowCount();
    $ok_s = $stm->rowCount();
    // echo '<script>alert("'.$nok.'");</script>';
    
    


    

    
   

  
  ?>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
     Highcharts.chart('stock_charts', {

chart: {
  type: 'column'
},

title: {
  text: 'Manquant Prévisionnels CAS'
},

xAxis: {
  categories: ['S', 'S+1', 'S+2', 'S+3']
},

yAxis: {
  allowDecimals: false,
  min: 0,
  title: {
    text: ''
    
  }
},
credits: {
    enabled: false
  },
menuItems: ['downloadPNG','downloadJPEG'],
tooltip: {
  formatter: function () {
    return '<b>' + this.x + '</b><br/>' +
      this.series.name + ': ' + this.y + '<br/>' +
      'Total: ' + this.point.stackTotal;
  }
},

plotOptions: {
  column: {
    stacking: 'normal'
  }
},

series: [{
  name: 'NOK',
  data: [<?php echo $nok_s ?>, <?php echo $nok_s1 ?>, <?php echo $nok_s2 ?>, <?php echo $nok_s3 ?>],
  stack: 'male',
  color:'red'
}, {
  name: 'OK',
  data: [<?php echo $ok_s ?>,<?php echo $ok_s1 ?>,<?php echo $ok_s2 ?> , <?php echo $ok_s3 ?>],
  stack: 'male',
  color:'#45B35E'
  
}]
});
// fin bar



Highcharts.chart('stock_charts1', {

chart: {
  type: 'bar'
},

title: {
  text: 'Manquant Prévisionnels CAS'
},

xAxis: {
  categories: ['S', 'S+1', 'S+2', 'S+3']
},

yAxis: {
  allowDecimals: false,
  min: 0,
  title: {
    text: ''
    
  }
},
credits: {
    enabled: false
  },
menuItems: ['downloadPNG','downloadJPEG'],
tooltip: {
  formatter: function () {
    return '<b>' + this.x + '</b><br/>' +
      this.series.name + ': ' + this.y + '<br/>' +
      'Total: ' + this.point.stackTotal;
  }
},

plotOptions: {
  column: {
    stacking: 'normal'
  }
},

series: [{
  name: 'NOK',
  data: [<?php echo $nok_s ?>, <?php echo $nok_s1 ?>, <?php echo $nok_s2 ?>, <?php echo $nok_s3 ?>],
  stack: 'male',
  color:'red'
}, {
  name: 'OK',
  data: [<?php echo $ok_s ?>,<?php echo $ok_s1 ?>,<?php echo $ok_s2 ?> , <?php echo $ok_s3 ?>],
  stack: 'male',
  color:'#45B35E'
  
}]
});
// fin bar
</script>


<?php } ?>
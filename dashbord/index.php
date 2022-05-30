

<?php
  session_start();
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
    }else{
      session_commit();
      $pagename='dashboard';
        ?>

<?php include_once 'dashbord.php' ?>
<head>
  <link rel="stylesheet" href="dist/css/chart.css">
  <link rel="stylesheet" href="dist/css/chartline.css">
 <link rel="stylesheet" href="dist/cmdinterco.css">
 <link rel="stylesheet" href="dist/css/actioncmd.css">
</head>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1> 
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <div>
        <?php 
        $sqlnbSemain = "SELECT (`nb_zmm`) FROM `nb_semain` WHERE 1;";
        $semains = $con->query($sqlnbSemain);
        $semain = $semains->fetch();
    
        if($semain[0]===1){
          $base = 'me80fn';
        }elseif($semain[0]===2){
          $base = 'me80fn_s2';
        }elseif($semain[0]===3){
          $base = 'me80fn_s3';
        }elseif($semain[0]===4){
          $base = 'me80fn_s4';
        }
    
        $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
        $sql = "SELECT DISTINCT Document_achat FROM $base";
        $sqluser = "select * from users";
        $st = $con->query($sql);
        $lign = $st->rowCount();

        $stm = $con->query($sqluser);
        $user = $stm->rowCount();
        ?>
      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?PHP echo $lign ?></h3>

                <p>documents achates</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="cmdinterco.php" class="small-box-footer">Plus info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $user ?></h3>

                <p>Utilisateurs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="users.php" class="small-box-footer">Plus info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 400px;">
                        <div style="width: 100%;height: 300px;">
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
              </div><!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  statistique
                </h3>
                <div class="card-tools">

                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 400px;">
                        <div style="width: 100%;height: 300px;">
                        <figure class="highcharts-figure">
      <div id="cmdinterco"></div>
</figure>

                        <?php
                         
                         // ... 2

                        ?>
                      </div>
                      </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  statistique
                </h3>
                <div class="card-tools">

                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 400px;">
                        <div style="width: 100%;height: 300px;">
                        


                        
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<figure class="highcharts-figure">
    <div id="actioncmd"></div>
    <p class="highcharts-description">
        Chart showing stacked columns for comparing quantities. Stacked charts
        are often used to visualize data that accumulates to a sum. This chart
        is showing data labels for each individual section of the stack.
    </p>
</figure>
               
                      </div>
                      </div>
                </div>
              </div><!-- /.card-body -->
            </div>

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
  <!-- solid sales graph -->
  <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
        <center><div style="width:100%;height: 500px;background-color: white;"><center></center>

<figure class="highcharts-figure pt-3" >
  <div id="donat"></div>
  <p class="highcharts-description">
    
  </p>
</figure>
        </div>
                <!-- <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
              <!-- /.card-body -->
              <!-- calendar -->
              <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            <!-- Map card -->
            
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1" style="display: none;"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2" style="display: none;"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3" style="display: none;"></div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

          

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
  
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="stock_charts"></div>
  <p class="highcharts-description">
    
  </p>
</figure>

  <?php include 'footer.php'?>
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
    
    


    

    
    $sqlannee = "SELECT DISTINCT year(`date_livr_contractual`) FROM $base ORDER BY `year(``date_livr_contractual``)` ASC;";
    $annees = $con->query($sqlannee);
    }

  
  ?>

 
  <script>
    

    Highcharts.chart('cmdinterco', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'CMD interco'
    },
    subtitle: {
    },
 
    
    yAxis: {
        min: 0,
        title: {
            text:''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Achats</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    }, 
    series: [  {
        name: 'Document achats',
        color:'#45B35E',
        data: [
          
 <?php
      
      while($annee = $annees->fetch()){
        $an = $annee[0];
        $sqlmonth = "SELECT DISTINCT month(`date_livr_contractual`) FROM $base WHERE year(`date_livr_contractual`)=$an ORDER BY `month(``date_livr_contractual``)` ASC";
        $monthes = $con->query($sqlmonth);
            
        while($month = $monthes->fetch()){
            $mnth=$month[0];
            $sqldoc = "SELECT COUNT(`Document_achat`)FROM $base WHERE year(`date_livr_contractual`)=$an and month(`date_livr_contractual`)=$mnth  ORDER BY month(`date_livr_contractual`);";
            $docs = $con->query($sqldoc);
            $nb=0;
                    
            while($docc = $docs->fetch()){
                $arrdocs[$nb]=$docc[0];
                $nb+=1;
                    
            }
            ?>
          
          
          
          <?php  if($month[0]===(int)date("m")){ echo "{y: ".$arrdocs[0].", color: '#45B35E'}";}else if($month[0]===(int)date("m")-1){ echo "{y: ".$arrdocs[0].", color: 'orange'}";}else{echo "{y: ".$arrdocs[0].", color: 'red'}";} ?>,
       <?php }} ?>        
        
        ],
       
    }
    ],
    xAxis: {
      
      categories: [
        <?php 
        $sqlane = "SELECT DISTINCT year(`date_livr_contractual`) FROM $base ORDER BY `year(``date_livr_contractual``)` ASC;";
        $stm = $con->query($sqlane);
        while($ans = $stm->fetch()){
          $ann = $ans[0];
  $sqlmont = "SELECT DISTINCT month(`date_livr_contractual`) FROM $base WHERE year(`date_livr_contractual`)=$ann ORDER BY `month(``date_livr_contractual``)` ASC";
  $mthes = $con->query($sqlmont);
  while($mth = $mthes->fetch()){
    
     ?>
          '<?php echo $mth[0].'-'.$ann;  ?>',
          
          <?php }} ?>
        ],
      crosshair: true
  }
});
    $('#export-pdf').click(function() {
    Highcharts.exportCharts([stock_charts, donat], {
      type: 'application/pdf'
    });
  });
    
    // bar stock s s1 s2 s3
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
// donat 3d 
// Build the chart
Highcharts.chart('donat', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
    
  },
  title: {
    text: 'Browser market shares in January, 2018'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  credits: {
    enabled: false
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
      name: 'Chrome',
      y: 61.41,
      sliced: true,
      selected: true
    }, {
      name: 'Internet Explorer',
      y: 11.84
    }, {
      name: 'Firefox',
      y: 19.85
    }, {
      name: 'Edge',
      y: 4.67
    }, {
      name: 'Safari',
      y: 4.18
    }, {
      name: 'Other',
      y: 7.05
    }]
  }]
});





  </script>


<?php 
        $sqlnbSemain = "SELECT (`nb_zmm`) FROM `nb_semain` WHERE 1;";
        $semains = $con->query($sqlnbSemain);
        $semain = $semains->fetch();

          if($semain[0]===1){
            // $sqldatas = 'SELECT `Document_achat` FROM `zmm` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
            $sql_passe_avec = "SELECT DISTINCT passe.Document_achat FROM passe JOIN avec ON passe.Document_achat = avec.Document_achat;";
            $sql_passe_sans ="SELECT DISTINCT passe.Document_achat FROM passe JOIN sans ON passe.Document_achat = sans.Document_achat;"; 
            $sql_passe_avec_s4 = "SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN avec_s4 ON passe_s4.Document_achat = avec_s4.Document_achat;";
            $sql_passe_sans_s4 ="SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN sans_s4 ON passe_s4.Document_achat = sans_s4.Document_achat;"; 
            $sql_passe_avec_s3 = "SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN avec_s3 ON passe_s3.Document_achat = avec_s3.Document_achat;";
            $sql_passe_sans_s3 ="SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN sans_s3 ON passe_s3.Document_achat = sans_s3.Document_achat;"; 
            $sql_passe_avec_s2 = "SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN avec_s2 ON passe_s2.Document_achat = avec_s2.Document_achat;";
            $sql_passe_sans_s2 ="SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN sans_s2 ON passe_s2.Document_achat = sans_s2.Document_achat;"; 


          }elseif($semain[0]===2){
            $sql_passe_avec_s2 = "SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN avec_s2 ON passe_s2.Document_achat = avec_s2.Document_achat;";
            $sql_passe_sans_s2 ="SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN sans_s2 ON passe_s2.Document_achat = sans_s2.Document_achat;"; 
            $sql_passe_avec = "SELECT DISTINCT passe.Document_achat FROM passe JOIN avec ON passe.Document_achat = avec.Document_achat;";
            $sql_passe_sans ="SELECT DISTINCT passe.Document_achat FROM passe JOIN sans ON passe.Document_achat = sans.Document_achat;"; 
            $sql_passe_avec_s4 = "SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN avec_s4 ON passe_s4.Document_achat = avec_s4.Document_achat;";
            $sql_passe_sans_s4 ="SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN sans_s4 ON passe_s4.Document_achat = sans_s4.Document_achat;"; 
            $sql_passe_avec_s3 = "SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN avec_s3 ON passe_s3.Document_achat = avec_s3.Document_achat;";
            $sql_passe_sans_s3 ="SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN sans_s3 ON passe_s3.Document_achat = sans_s3.Document_achat;"; 

            // $sqldatas = 'SELECT `Document_achat` FROM `zmm_s2` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          
          }elseif($semain[0]===3){
            $sql_passe_avec_s3 = "SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN avec_s3 ON passe_s3.Document_achat = avec_s3.Document_achat;";
            $sql_passe_sans_s3 ="SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN sans_s3 ON passe_s3.Document_achat = sans_s3.Document_achat;"; 
            $sql_passe_avec_s2 = "SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN avec_s2 ON passe_s2.Document_achat = avec_s2.Document_achat;";
            $sql_passe_sans_s2 ="SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN sans_s2 ON passe_s2.Document_achat = sans_s2.Document_achat;"; 
            $sql_passe_avec = "SELECT DISTINCT passe.Document_achat FROM passe JOIN avec ON passe.Document_achat = avec.Document_achat;";
            $sql_passe_sans ="SELECT DISTINCT passe.Document_achat FROM passe JOIN sans ON passe.Document_achat = sans.Document_achat;"; 
            $sql_passe_avec_s4 = "SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN avec_s4 ON passe_s4.Document_achat = avec_s4.Document_achat;";
            $sql_passe_sans_s4 ="SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN sans_s4 ON passe_s4.Document_achat = sans_s4.Document_achat;"; 

            
            
            
            // $sqldatas = 'SELECT `Document_achat` FROM `zmm_s3` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          
          }elseif($semain[0]===4){
            $sql_passe_avec_s4 = "SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN avec_s4 ON passe_s4.Document_achat = avec_s4.Document_achat;";
            $sql_passe_sans_s4 ="SELECT DISTINCT passe_s4.Document_achat FROM passe_s4 JOIN sans_s4 ON passe_s4.Document_achat = sans_s4.Document_achat;"; 
            $sql_passe_avec_s3 = "SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN avec_s3 ON passe_s3.Document_achat = avec_s3.Document_achat;";
            $sql_passe_sans_s3 ="SELECT DISTINCT passe_s3.Document_achat FROM passe_s3 JOIN sans_s3 ON passe_s3.Document_achat = sans_s3.Document_achat;"; 
            $sql_passe_avec_s2 = "SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN avec_s2 ON passe_s2.Document_achat = avec_s2.Document_achat;";
            $sql_passe_sans_s2 ="SELECT DISTINCT passe_s2.Document_achat FROM passe_s2 JOIN sans_s2 ON passe_s2.Document_achat = sans_s2.Document_achat;"; 
            $sql_passe_avec = "SELECT DISTINCT passe.Document_achat FROM passe JOIN avec ON passe.Document_achat = avec.Document_achat;";
            $sql_passe_sans ="SELECT DISTINCT passe.Document_achat FROM passe JOIN sans ON passe.Document_achat = sans.Document_achat;"; 

            // $sqldatas = 'SELECT `Document_achat` FROM `zmm_s4` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          
          }
          // $stadespass = $con->query($sqldatas);
          
               
          // $sqlavecmvt = "SELECT DISTINCT `Document_achat` FROM `me80fn` WHERE `quantite_livree`>0 or `quantite_sortie`>0 or `quantite_livre`>0;";
          // $sqlsansmvt = "SELECT DISTINCT `Document_achat` FROM `me80fn` WHERE `quantite_livree`=0 AND `quantite_sortie`=0 AND `quantite_livre`=0;";
          // $mvts = $con->query($sqlavecmvt);
         // $mvtsan = $con->query($sqlsansmvt);
          
        //  $avcnb=0;
        //  while($stadep = $stadespass->fetch()){
            
        //     if($stadep[0]===4501190112){
        //       echo $stadep[0];
        //       $avcnb++;
            // }
            
            // avec mvt
           // $sansmvt = $mvtsan->fetch(); // sans mvt
            
           
            
            
            // if($stadep[0]===$avecmvt[0]){
            //   $avcnb+=1;
            // }elseif($stadep[0]===$sansmvt){

            // }
          // }
                        
          
          
          if($semain[0]===1){
            echo 'afficher data dyal semain 4/3/2'.$sql_passe_avec;
          }elseif($semain[0]===2){
              echo 'afficher data dyal 1/4/3'.$sql_passe_avec;
          }elseif($semain[0]===3){
            echo 'afficher data dyal 2/1/4'.$sql_passe_avec;
          }elseif($semain[0]===4){
            echo 'afficher data dyal 3/2/1'.$sql_passe_avec;
          }


          $mvtpasse = $con->query($sql_passe_avec);
          $mvtpasse_s2 = $con->query($sql_passe_avec_s2);
          $mvtpasse_s3 = $con->query($sql_passe_avec_s3);
          $mvtpasse_s4 = $con->query($sql_passe_avec_s4);
          $mvtpass = $mvtpasse->rowCount();
          $mvtpass_s2 = $mvtpasse_s2->rowCount();
          $mvtpass_s3 = $mvtpasse_s3->rowCount();
          $mvtpass_s4 = $mvtpasse_s4->rowCount();


          $mvtpasses = $con->query($sql_passe_sans);
          $mvtpasses_s2 = $con->query($sql_passe_sans_s2);
          $mvtpasses_s3 = $con->query($sql_passe_sans_s3);
          $mvtpasses_s4 = $con->query($sql_passe_sans_s4);
          $mvtpassa = $mvtpasses->rowCount();
          $mvtpassa_s2 = $mvtpasses_s2->rowCount();
          $mvtpassa_s3 = $mvtpasses_s3->rowCount();
          $mvtpassa_s4 = $mvtpasses_s4->rowCount();

  
    
     ?>
<script>
//// CMD Action Chart bar

    Highcharts.chart('actioncmd', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Action CMD interco'
    },
    xAxis: {
        categories: ['Semain 1', 'Semain 2', 'Semaine Précédent ', 'Semain Actuel']
    },
    yAxis: {
        min: 0,
        max:100,
        title: {
            text: ''
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    // 1 {4-3-2 } 2 { 1-4-3 } 3 { 2-1-4 } 4 { 3-2-1 }
    series: [{
      
        name: 'A voir la log Logistique central pour servitude au cas de besoin',
        data: [<?php  if($semain[0]===1){ 
            echo $mvtpassa_s2 ?>,<?php echo $mvtpassa_s3 ?>,<?php echo $mvtpassa_s4 ?>,<?php echo $mvtpassa ?>
         <?php  }elseif($semain[0]===2){
            echo $mvtpassa_s3 ?>,<?php echo $mvtpassa_s4 ?>,<?php echo $mvtpassa ?>,<?php echo $mvtpassa_s2 ?>
         <?php }elseif($semain[0]===3){
            echo $mvtpassa_s4 ?>,<?php echo $mvtpassa ?>,<?php echo $mvtpassa_s2 ?>,<?php echo $mvtpassa_s3 ?>
         <?php  }elseif($semain[0]===4){
            echo $mvtpassa ?>,<?php echo $mvtpassa_s2 ?>,<?php echo $mvtpassa_s3 ?>,<?php echo $mvtpassa_s4 ?>
            <?php } ?>
        ]
    }, {
        name: 'A verifier la reception',
        data: [<?php  if($semain[0]===1){ 
            echo $mvtpass_s2 ?>,<?php echo $mvtpass_s3 ?>,<?php echo $mvtpass_s4 ?>,<?php echo $mvtpass ?>
         <?php  }elseif($semain[0]===2){
            echo $mvtpass_s3 ?>,<?php echo $mvtpass_s4 ?>,<?php echo $mvtpass ?>,<?php echo $mvtpass_s2 ?>
         <?php }elseif($semain[0]===3){
            echo $mvtpass_s4 ?>,<?php echo $mvtpass ?>,<?php echo $mvtpass_s2 ?>,<?php echo $mvtpass_s3 ?>
         <?php  }elseif($semain[0]===4){
            echo $mvtpass ?>,<?php echo $mvtpass_s2 ?>,<?php echo $mvtpass_s3 ?>,<?php echo $mvtpass_s4 ?>
            <?php } ?>]
    }, {
        name: 'accepter a riflier this text wa be change by me',
        data: [3, 4, 4, 2]
    }]
});
</script>


<?php 
$pagename='cmdinterco';
include 'dashbord.php' ?>


<div class="content-wrapper p-4">



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




<br>

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
      <div id="cmdinterco2"></div>
</figure>

                        <?php
                         
                         // ... 2

                        ?>
                      </div>
                      </div>
                </div>
              </div><!-- /.card-body -->
            </div>






<br>
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
                        <div style="width: 100%;height: 400px;">
                        <figure class="highcharts-figure">
      <div id="cmdinterco3" style="height: 100%;"></div>
</figure>

                        <?php
                         
                         // ... 2

                        ?>
                      </div>
                      </div>
                </div>
              </div><!-- /.card-body -->
            </div>


</div>





<?php 
    $sqlannee = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
    $annees = $con->query($sqlannee);
?>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
 
    credits: {
     enabled: false
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
        $sqlmonth = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$an ORDER BY `month(``date_livr_contractual``)` ASC";
        $monthes = $con->query($sqlmonth);
            
        while($month = $monthes->fetch()){
            $mnth=$month[0];
            $sqldoc = "SELECT COUNT(`Document_achat`)FROM `zmm` WHERE year(`date_livr_contractual`)=$an and month(`date_livr_contractual`)=$mnth  ORDER BY month(`date_livr_contractual`);";
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
        $sqlane = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
        $stm = $con->query($sqlane);
        while($ans = $stm->fetch()){
          $ann = $ans[0];
  $sqlmont = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$ann ORDER BY `month(``date_livr_contractual``)` ASC";
  $mthes = $con->query($sqlmont);
  while($mth = $mthes->fetch()){
    
     ?>
          '<?php echo $mth[0].'-'.$ann;  ?>',
          
          <?php }} ?>
        ],
      crosshair: true
  }
});

<?php 
    $sqlannee = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
    $annees = $con->query($sqlannee);
?>


Highcharts.chart('cmdinterco2', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'CMD interco'
    },
    subtitle: {
    },
    credits: {
     enabled: false
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
        $sqlmonth = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$an ORDER BY `month(``date_livr_contractual``)` ASC";
        $monthes = $con->query($sqlmonth);
            
        while($month = $monthes->fetch()){
            $mnth=$month[0];
            $sqldoc = "SELECT COUNT(`Document_achat`)FROM `zmm` WHERE year(`date_livr_contractual`)=$an and month(`date_livr_contractual`)=$mnth  ORDER BY month(`date_livr_contractual`);";
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
        $sqlane = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
        $stm = $con->query($sqlane);
        while($ans = $stm->fetch()){
          $ann = $ans[0];
  $sqlmont = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$ann ORDER BY `month(``date_livr_contractual``)` ASC";
  $mthes = $con->query($sqlmont);
  while($mth = $mthes->fetch()){
    
     ?>
          '<?php echo $mth[0].'-'.$ann;  ?>',
          
          <?php }} ?>
        ],
      crosshair: true
  }
});



<?php 
    $sqlannee = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
    $annees = $con->query($sqlannee);
?>


Highcharts.chart('cmdinterco3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'CMD interco'
    },
    subtitle: {
    },
    credits: {
     enabled: false
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
        $sqlmonth = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$an ORDER BY `month(``date_livr_contractual``)` ASC";
        $monthes = $con->query($sqlmonth);
            
        while($month = $monthes->fetch()){
            $mnth=$month[0];
            $sqldoc = "SELECT COUNT(`Document_achat`)FROM `zmm` WHERE year(`date_livr_contractual`)=$an and month(`date_livr_contractual`)=$mnth  ORDER BY month(`date_livr_contractual`);";
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
        $sqlane = "SELECT DISTINCT year(`date_livr_contractual`) FROM `zmm` ORDER BY `year(``date_livr_contractual``)` ASC;";
        $stm = $con->query($sqlane);
        while($ans = $stm->fetch()){
          $ann = $ans[0];
  $sqlmont = "SELECT DISTINCT month(`date_livr_contractual`) FROM `zmm` WHERE year(`date_livr_contractual`)=$ann ORDER BY `month(``date_livr_contractual``)` ASC";
  $mthes = $con->query($sqlmont);
  while($mth = $mthes->fetch()){
    
     ?>
          '<?php echo $mth[0].'-'.$ann;  ?>',
          
          <?php }} ?>
        ],
      crosshair: true
  }
});
</script>
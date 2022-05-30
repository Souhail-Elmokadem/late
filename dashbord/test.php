<?php 
    $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');

        $sqlnbSemain = "SELECT (`nb_zmm`) FROM `nb_semain` WHERE 1;";
        $semains = $con->query($sqlnbSemain);
        $semain = $semains->fetch();

          if($semain[0]===1){
            $sqldatas = 'SELECT DISTINCT `Document_achat` FROM `zmm` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          }elseif($semain[0]===2){
            $sqldatas = 'SELECT DISTINCT `Document_achat` FROM `zmm_s2` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          }elseif($semain[0]===3){
            $sqldatas = 'SELECT DISTINCT `Document_achat` FROM `zmm_s3` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          }elseif($semain[0]===4){
            $sqldatas = 'SELECT DISTINCT `Document_achat` FROM `zmm_s4` WHERE date(`date_livr_contractual`) < (CURRENT_DATE() - INTERVAL 2 MONTH);';
          }
          $stadespass = $con->query($sqldatas);
          
               
          $sqlavecmvt = "SELECT DISTINCT `Document_achat` FROM `me80fn` WHERE `quantite_livree`>0 or `quantite_sortie`>0 or `quantite_livre`>0;";
          $sqlsansmvt = "SELECT DISTINCT `Document_achat` FROM `me80fn` WHERE `quantite_livree`=0 AND `quantite_sortie`=0 AND `quantite_livre`=0;";
          $mvts = $con->query($sqlavecmvt);
          

          // $mvtsan = $con->query($sqlsansmvt);
          
         $avcnb=0;
         $stadep = $stadespass->fetch();

          


         foreach($mvts as $mvt=>$avec){
        
            
            if(in_array(4501133340,$avec)){
              echo 'yes';
              
            }
              

                
        }
         // echo $avcnb;
          
          
         

          // if($avec===$passe){
          //               $avcnb=$avcnb+1;
          //             }

  
    
     ?>
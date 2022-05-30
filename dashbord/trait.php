<?php 
    $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
    
        $insert = "SELECT DISTINCT `stock_s` FROM `zmm` WHERE `stock_s`>1000 LIMIT 4; ";
      $stm = $con->query($insert);
      while($lign = $stm->fetch()){
         echo $lign[0].'/'.$lign[1];
      }
     
      
  ?>
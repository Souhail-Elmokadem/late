<?php
        if(isset($_POST['num'])){
          $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
          $num = $_POST['num'];
            $insert = "DELETE FROM `users` WHERE Email='$num'";
            $stm = $con->prepare($insert);
            $stm->execute();

    };
      
?>

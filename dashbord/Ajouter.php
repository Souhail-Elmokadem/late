<?php
        if(isset($_POST['num'])){
            $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
           
            try{
            $num = $_POST['num'];
            $grp = $_POST['grp'];
            $appro = $_POST['appro'];
            $insert = "INSERT INTO `marc`(`Numero_article`, `Grp_acheteur`, `Appro_spec`) VALUES ('$num','$grp','$appro')";
            $stm = $con->prepare($insert);
            $stm->execute();
            

        }catch(PDOException $e){
            die($e);
        }
    }

?>




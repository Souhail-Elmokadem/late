<?php
        if(isset($_POST['num'])){
            $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
           
            try{
            $num = $_POST['num'];
            $grp = $_POST['grp'];
            $appro = $_POST['appro'];
            $insert = "UPDATE `marc` SET `Grp_acheteur`='$grp',`Appro_spec`='$appro' WHERE `Numero_article`='$num'";
            $stm = $con->prepare($insert);
            $stm->execute();
            

        }catch(PDOException $e){
            die($e);
        }
    }

?>




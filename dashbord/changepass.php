<?php
        if(isset($_POST['passnew'])){
            $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
           
            try{    
            session_start();

            $id=$_SESSION['id'];
            $passnew = $_POST['passnew'];
            $passanc = $_POST['pass-anc'];
            $insert = "UPDATE `users` SET `password`='$passnew' WHERE `id`=$id;";
            $stm = $con->prepare($insert);
            $stm->execute();
            
            
        }catch(PDOException $e){
            die($e);
        }
    }

?>




<?php
        if(isset($_POST['emailadd'])){
            $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
           
            try{
                $sql = "select max(id) from users";
                $stm = $con->query($sql);
                $row = $stm->fetch();
                $row[0]+=1;
            $id = $row[0];    
            $prenomadd = $_POST['prenomadd'];    
            $nomadd = $_POST['nomadd'];    
            $emailadd = $_POST['emailadd'];
            $roleadd = $_POST['roleadd'];
            $passadd = $_POST['passadd'];
            $insert = "INSERT INTO `users`(`id`, `prenom`, `nom`, `Email`, `password`, `role`) 
            VALUES ($id,'$prenomadd','$nomadd','$emailadd','$passadd','$roleadd')";
            $stm = $con->prepare($insert);
            $stm->execute();
            

        }catch(PDOException $e){
            die($e);
        }
    }

?>




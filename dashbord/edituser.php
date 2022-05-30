<?php
        if(isset($_POST['num'])){
            $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
           
            try{
            $nom = $_POST['num'];
            $prenom = $_POST['grp'];
            $email = $_POST['appro'];
            $role = $_POST['role'];
            $pass = $_POST['pass'];
            $id = $_POST['iduser'];
            $insert = "UPDATE `users` SET `prenom`='$prenom',`nom`='$nom',`Email`='$email',`password`='$pass',`role`='$role' WHERE `id`=$id;";
            $stm = $con->prepare($insert);
            $stm->execute();
            

        }catch(PDOException $e){
            die($e);
        }
    }

?>




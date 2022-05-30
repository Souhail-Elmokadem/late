<?php
    session_start();
        $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
       
        try{
        $email = $_POST['inputEmail'];
        $insert = "SELECT * FROM `users` WHERE `Email`LIKE '$email%';";
        $stm = $con->query($insert);
        while($row = $stm->fetch()){
            if($row['Email']===$_SESSION['user']){
                    return false;
            }
        }
        if($rows = $stm->rowCount()===1){
            echo '<small id="emailHelp" class="form-text text-muted">Cette adresse e-mail est déjà utilisée !</small>';
        }
        
        
    }catch(PDOException $e){
        die($e);
    }


?>
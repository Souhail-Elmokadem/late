<?php
    session_start();
        $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
       
        try{
        $id = $_SESSION['id'];
        $nomcate = $_POST['nomcate'];
        $cate = $_POST['cate'];
        $descr = $_POST['descr'];
        $insert = "UPDATE `users` SET `nomcategorie`='$nomcate',`categorie`='$cate',`description`='$descr' WHERE `id`=$id";
        $stm = $con->prepare($insert);
        $stm->execute();
        

    }catch(PDOException $e){
        die($e);
    }


?>
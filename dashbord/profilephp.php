<?php
    session_start();
        $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
        
        try{
        $email = $_POST['inputEmail'];
        $insert = "SELECT * FROM `users` WHERE `Email`LIKE '$email%';";
        $stm = $con->query($insert);
        if($rows = $stm->rowCount()<0){
            echo "<script>
            $(function() {
                var Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                });
                  Toast.fire({
                    icon: 'warning',
                    title: 'Les information de profile ne sera pas enregistrer.'
                  })
                });
            </scrip>";
        }else{
            $id = $_SESSION['id'];
            $prenom = $_POST['inputPrenom'];
            $nom = $_POST['inputNom'];
            $email = $_POST['inputEmail'];
            $job = $_POST['inputProfession'];
            $insert = "UPDATE `users` SET `prenom`='$prenom',`nom`='$nom',`Email`='$email',`job`='$job' WHERE `id`=$id;";
            $stm = $con->prepare($insert);
            $stm->execute();
        }

    }catch(PDOException $e){
        die($e);
    }


?>
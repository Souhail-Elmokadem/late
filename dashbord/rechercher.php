<?php
        if(isset($_POST['num'])){
          $con = new PDO("mysql:host=localhost;dbname=latecoere;port=3306;charset=utf8",'root','');
          $num = $_POST['num'];
            $insert = "SELECT * FROM `marc` WHERE `Numero_article` LIKE '$num%' Limit 6;";
            $stm = $con->query($insert);
            if($rows = $stm->rowCount()>0){

            

        
            
            ?>
            <table class="table table-hover" id="table">
<thead class='thead-light'>
<tr><th>Numero de l'article</th><th>Groupe d'acheteurs</th><th>Approvisionn spécial</th><th> Action</th></tr>
</thead>
<?php 
            while($lin = $stm->fetch()){
                ?>
                <tr id="<?php echo $lin[0]; ?>">
                <td data-target="0"><?php echo $lin[0] ?></td>
                <td data-target="1"><?php echo $lin[1] ?></td>
                <td data-target="2"><?php echo $lin[2] ?></td>
                <td >
                  <a href="#" data-role="edit" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEdit">
                  <!-- <img src="img/edit.png" width="20" alt="" style="cursor: pointer;"> --> Modifier
                  </button></a>
              
                  <a href="#" data-role="del" data-id="<?php echo $lin[0]; ?>"><button type="button" class="btn" data-toggle="modal" data-target="#Modaldel">
                  <img src="img/del.png" width="20" alt="" style="cursor: pointer;">
                  </button></a>
              
              </td>
              </tr>
            </table>
            
        <?php    }
        
    }else{
        
            ?>
            <table>
            <thead class='thead-light'>
<tr><th>Numero de l'article</th><th>Groupe d'acheteurs</th><th>Approvisionn spécial</th><th> Action</th></tr>
</thead>
       <tr">

                <td>Aucun Article trouve ..</td>

              </tr>
            </table>
            <?php
        }
    }
        ?>
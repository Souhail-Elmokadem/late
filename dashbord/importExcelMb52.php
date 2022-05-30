<?php

//import.php

use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=latecoere;charset=utf8mb4", "root", "");
// $sql="select * from";
// $connect->query($sql);
// $e = intval($d);
// if($e===12){
//     echo 'ye';
// }else{
//     echo 'no';
// }
if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx','XLSX');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);
  $mb = $spreadsheet->getActiveSheet()->toArray();

  unlink($file_name);

  $sqlnbrS="select nb_mb52 from nb_semain";
  $st =$connect->query($sqlnbrS);
  $nbs = $st->fetch();

  
  if($nbs[0]===1){
  //  mb52
  $n=0;
  foreach($mb as $row)
  {
      if($n===0){

        $sql="delete from mb52";
        $connect->query($sql);

      }else{
   
    $insert_data = array(
    ':num_article'  => $row[0],
    ':Division'  => $row[1],
    ':Magazin'  => $row[2],
    ':A_utilisation_libre'  => $row[8]

   );
   $sql = "
   INSERT INTO `mb52` VALUES (:num_article,:Division,
   :Magazin,:A_utilisation_libre)
   ";
   $statement = $connect->prepare($sql);
   $statement->execute($insert_data);
}
$n++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_mb52`=2 WHERE 1";
  $st = $connect->query($sqlnbrS);


  }elseif($nbs[0]===2){
    //  mb52 s2
  $n=0;
  foreach($mb as $row)
  {
      if($n===0){

        $sql="delete from mb52_s2";
        $connect->query($sql);

      }else{
   
    $insert_data = array(
    ':num_article'  => $row[0],
    ':Division'  => $row[1],
    ':Magazin'  => $row[2],
    ':A_utilisation_libre'  => $row[8]

   );
   $sql = "
   INSERT INTO `mb52_s2` VALUES (:num_article,:Division,
   :Magazin,:A_utilisation_libre)
   ";
   $statement = $connect->prepare($sql);
   $statement->execute($insert_data);
}
$n++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_mb52`=3 WHERE 1";
  $st = $connect->query($sqlnbrS);

  }elseif($nbs[0]===3){


 //  mb52 s3
 $n=0;
 foreach($mb as $row)
 {
     if($n===0){

       $sql="delete from mb52_s3";
       $connect->query($sql);

     }else{
  
   $insert_data = array(
   ':num_article'  => $row[0],
   ':Division'  => $row[1],
   ':Magazin'  => $row[2],
   ':A_utilisation_libre'  => $row[8]

  );
  $sql = "
  INSERT INTO `mb52_s3` VALUES (:num_article,:Division,
  :Magazin,:A_utilisation_libre)
  ";
  $statement = $connect->prepare($sql);
  $statement->execute($insert_data);
}
$n++;
 }
 $sqlnbrS="UPDATE `nb_semain` SET `nb_mb52`=4 WHERE 1";
 $st = $connect->query($sqlnbrS);


}elseif($nbs[0]===4){


  //  mb52 s3
  $n=0;
  foreach($mb as $row)
  {
      if($n===0){
 
        $sql="delete from mb52_s4";
        $connect->query($sql);
 
      }else{
   
    $insert_data = array(
    ':num_article'  => $row[0],
    ':Division'  => $row[1],
    ':Magazin'  => $row[2],
    ':A_utilisation_libre'  => $row[8]
 
   );
   $sql = "
   INSERT INTO `mb52_s4` VALUES (:num_article,:Division,
   :Magazin,:A_utilisation_libre)
   ";
   $statement = $connect->prepare($sql);
   $statement->execute($insert_data);
 }
 $n++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_mb52`=1 WHERE 1";
  $st = $connect->query($sqlnbrS);
 }






  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
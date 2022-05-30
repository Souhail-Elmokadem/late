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
  $data = $spreadsheet->getActiveSheet()->toArray();

  unlink($file_name);


  $sqlnbrS="select nb_me80fn from nb_semain";
  $st =$connect->query($sqlnbrS);
  $nbs = $st->fetch();
  
  
  
  if($nbs[0]===1){

// me80fn
  $nbr=0;
  
  foreach($data as $row)
  {
      if($nbr===0){
        $sql="delete from me80fn";
        $connect->query($sql);
      }else{
        
    
   $insert_data1 = array(
    ':document_achat'  => $row[0],
    ':Post'  => $row[1],
    ':Quantite_livree'  => $row[6],
    ':Quantite_sortie'  => $row[7],
    ':Quantite_livre'  => $row[8],
   );
   
   

   $sql = "
   INSERT INTO `me80fn` VALUES (:document_achat,:Post,
   :Quantite_livree,:Quantite_sortie,:Quantite_livre)
   ";

   $statement = $connect->prepare($sql);
   $statement->execute($insert_data1);
}
$nbr++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_me80fn`=2 WHERE 1";
  $st = $connect->query($sqlnbrS);


}elseif($nbs[0]===2){


// me80fn_s2
$nbr=0;
  
foreach($data as $row)
{

    if($nbr===0){
      $sql="delete from me80fn_s2";
      $connect->query($sql);
    }else{
      
  
 $insert_data1 = array(
  ':document_achat'  => $row[0],
  ':Post'  => $row[1],
  ':Quantite_livree'  => $row[6],
  ':Quantite_sortie'  => $row[7],
  ':Quantite_livre'  => $row[8],
 );
 
 

 $sql = "
 INSERT INTO `me80fn_s2` VALUES (:document_achat,:Post,
 :Quantite_livree,:Quantite_sortie,:Quantite_livre)
 ";

 $statement = $connect->prepare($sql);
 $statement->execute($insert_data1);
}
$nbr++;
}
$sqlnbrS="UPDATE `nb_semain` SET `nb_me80fn`=3 WHERE 1";
$st = $connect->query($sqlnbrS);

}elseif($nbs[0]===3){


// me80fn_s3
$nbr=0;
  
foreach($data as $row)
{

    if($nbr===0){
      $sql="delete from me80fn_s3";
      $connect->query($sql);
    }else{
      
  
 $insert_data1 = array(
  ':document_achat'  => $row[0],
  ':Post'  => $row[1],
  ':Quantite_livree'  => $row[6],
  ':Quantite_sortie'  => $row[7],
  ':Quantite_livre'  => $row[8],
 );
 
 

 $sql = "
 INSERT INTO `me80fn_s3` VALUES (:document_achat,:Post,
 :Quantite_livree,:Quantite_sortie,:Quantite_livre)
 ";

 $statement = $connect->prepare($sql);
 $statement->execute($insert_data1);
}
$nbr++;
}
$sqlnbrS="UPDATE `nb_semain` SET `nb_me80fn`=4 WHERE 1";
$st = $connect->query($sqlnbrS);





}elseif($nbs[0]===4){

  
// me80fn_s4
$nbr=0;
  
foreach($data as $row)
{

    if($nbr===0){
      $sql="delete from me80fn_s4";
      $connect->query($sql);
    }else{
      
  
 $insert_data1 = array(
  ':document_achat'  => $row[0],
  ':Post'  => $row[1],
  ':Quantite_livree'  => $row[6],
  ':Quantite_sortie'  => $row[7],
  ':Quantite_livre'  => $row[8],
 );
 
 

 $sql = "
 INSERT INTO `me80fn_s4` VALUES (:document_achat,:Post,
 :Quantite_livree,:Quantite_sortie,:Quantite_livre)
 ";

 $statement = $connect->prepare($sql);
 $statement->execute($insert_data1);
}
$nbr++;
}
$sqlnbrS="UPDATE `nb_semain` SET `nb_me80fn`=1 WHERE 1";
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
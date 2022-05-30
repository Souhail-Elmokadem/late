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
  $marc = $spreadsheet->getActiveSheet()->toArray();

  unlink($file_name);

  $sqlnbrS="select nb_marc from nb_semain";
  $st =$connect->query($sqlnbrS);
  $nbs = $st->fetch();



if($nbs[0]===1){
// marc ///
  $nb=0;
  foreach($marc as $row)
  {
      if($nb===0){
        
        
        $sql="delete from marc";
        $connect->query($sql);
      }else{

       
   $insert_data = array(
    ':article'  => $row[0],
    ':Grp_acheteur'  => $row[10],
    ':Appro_spec'  => $row[22],
   );
   
   

   $query = "
    INSERT INTO `marc` VALUES (:article,:Grp_acheteur,:Appro_spec)
    ";
   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
   

}
$nb++;

  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_marc`=2 WHERE 1";
  $st = $connect->query($sqlnbrS);

  /// fin marc
}elseif($nbs[0]===2){
// marc s2 ///
$nb=0;
foreach($marc as $row)
{
    if($nb===0){
      
      
      $sql="delete from marc_s2";
      $connect->query($sql);
    }else{

     
 $insert_data = array(
  ':article'  => $row[0],
  ':Grp_acheteur'  => $row[10],
  ':Appro_spec'  => $row[22],
 );
 
 

 $query = "
  INSERT INTO `marc_s2` VALUES (:article,:Grp_acheteur,:Appro_spec)
  ";
 $statement = $connect->prepare($query);
 $statement->execute($insert_data);
 

}
$nb++;

}
$sqlnbrS="UPDATE `nb_semain` SET `nb_marc`=3 WHERE 1";
$st = $connect->query($sqlnbrS);

/// fin marc
  }elseif($nbs[0]===3){

    // marc s3 ///
$nb=0;
foreach($marc as $row)
{
    if($nb===0){
      
      
      $sql="delete from marc_s3";
      $connect->query($sql);
    }else{

     
 $insert_data = array(
  ':article'  => $row[0],
  ':Grp_acheteur'  => $row[10],
  ':Appro_spec'  => $row[22],
 );
 
 

 $query = "
  INSERT INTO `marc_s3` VALUES (:article,:Grp_acheteur,:Appro_spec)
  ";
 $statement = $connect->prepare($query);
 $statement->execute($insert_data);
 

}
$nb++;

}
$sqlnbrS="UPDATE `nb_semain` SET `nb_marc`=4 WHERE 1";
$st = $connect->query($sqlnbrS);

}elseif($nbs[0]===4){

  
    // marc s3 ///
$nb=0;
foreach($marc as $row)
{
    if($nb===0){
      
      
      $sql="delete from marc_s4";
      $connect->query($sql);
    }else{

     
 $insert_data = array(
  ':article'  => $row[0],
  ':Grp_acheteur'  => $row[10],
  ':Appro_spec'  => $row[22],
 );
 
 

 $query = "
  INSERT INTO `marc_s4` VALUES (:article,:Grp_acheteur,:Appro_spec)
  ";
 $statement = $connect->prepare($query);
 $statement->execute($insert_data);
 

}
$nb++;

}
$sqlnbrS="UPDATE `nb_semain` SET `nb_marc`=1 WHERE 1";
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
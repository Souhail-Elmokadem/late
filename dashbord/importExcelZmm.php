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


  $sqlnbrS="select nb_zmm from nb_semain";
  $st =$connect->query($sqlnbrS);
  $nbs = $st->fetch();

  $nbr=0;
  if($nbs[0]===1){

  foreach($data as $row)
  {
    $change = date("Y-m-d",strtotime($row[19]));
    $row[19]= $change;

      if($nbr===0){
         $sql="delete from zmm";
        $connect->query($sql);
      }else{
      
    
    
   $insert_data1 = array(
    ':Magazin'  => $row[2],
    ':document_achat'  => $row[3],
    ':poste'  => $row[4],
    ':article'  => $row[8],
    ':designiation_add'  => $row[9],
    ':Quantite_reception'  => str_replace(',','',$row[15]),
    ':date_livr_contrac'  => $row[19],
    ':stock_s'  =>  str_replace(',','',$row[23]),
    ':stock_s1'  => str_replace(',','',$row[24]),
    ':stock_s2'  => str_replace(',','',$row[25]),
    ':stock_s3'  => str_replace(',','',$row[26])
   );
   
   

   $sql = "
   INSERT INTO `zmm` VALUES (:Magazin,:document_achat,:poste,
   :article,:designiation_add,:Quantite_reception,:date_livr_contrac,:stock_s,:stock_s1,:stock_s2,:stock_s3)
   ";

   $statement = $connect->prepare($sql);
   $statement->execute($insert_data1);
}
$nbr++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_zmm`=2 WHERE 1";
  $st = $connect->query($sqlnbrS);

}elseif($nbs[0]===2){

    
  foreach($data as $row)
  {
    $change = date("Y-m-d",strtotime($row[19]));
    $row[19]= $change;

      if($nbr===0){
         $sql="delete from zmm_s2";
        $connect->query($sql);
      }else{
      
    
    
   $insert_data1 = array(
    ':Magazin'  => $row[2],
    ':document_achat'  => $row[3],
    ':poste'  => $row[4],
    ':article'  => $row[8],
    ':designiation_add'  => $row[9],
    ':Quantite_reception'  => str_replace(',','',$row[15]),
    ':date_livr_contrac'  => $row[19],
    ':stock_s'  =>  str_replace(',','',$row[23]),
    ':stock_s1'  => str_replace(',','',$row[24]),
    ':stock_s2'  => str_replace(',','',$row[25]),
    ':stock_s3'  => str_replace(',','',$row[26])
   );
   
   

   $sql = "
   INSERT INTO `zmm_s2` VALUES (:Magazin,:document_achat,:poste,
   :article,:designiation_add,:Quantite_reception,:date_livr_contrac,:stock_s,:stock_s1,:stock_s2,:stock_s3)
   ";

   $statement = $connect->prepare($sql);
   $statement->execute($insert_data1);
}
$nbr++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_zmm`=3 WHERE 1";
  $st = $connect->query($sqlnbrS);


}elseif($nbs[0]===3){

  
  foreach($data as $row)
  {
    $change = date("Y-m-d",strtotime($row[19]));
    $row[19]= $change;

      if($nbr===0){
         $sql="delete from zmm_s3";
        $connect->query($sql);
      }else{
      
    
    
   $insert_data1 = array(
    ':Magazin'  => $row[2],
    ':document_achat'  => $row[3],
    ':poste'  => $row[4],
    ':article'  => $row[8],
    ':designiation_add'  => $row[9],
    ':Quantite_reception'  => str_replace(',','',$row[15]),
    ':date_livr_contrac'  => $row[19],
    ':stock_s'  =>  str_replace(',','',$row[23]),
    ':stock_s1'  => str_replace(',','',$row[24]),
    ':stock_s2'  => str_replace(',','',$row[25]),
    ':stock_s3'  => str_replace(',','',$row[26])
   );
   
   

   $sql = "
   INSERT INTO `zmm_s3` VALUES (:Magazin,:document_achat,:poste,
   :article,:designiation_add,:Quantite_reception,:date_livr_contrac,:stock_s,:stock_s1,:stock_s2,:stock_s3)
   ";

   $statement = $connect->prepare($sql);
   $statement->execute($insert_data1);
}
$nbr++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_zmm`=4 WHERE 1";
  $st = $connect->query($sqlnbrS);


}elseif($nbs[0]===4){

  
  foreach($data as $row)
  {
    $change = date("Y-m-d",strtotime($row[19]));
    $row[19]= $change;

      if($nbr===0){
         $sql="delete from zmm_s4";
        $connect->query($sql);
      }else{
      
    
    
   $insert_data1 = array(
    ':Magazin'  => $row[2],
    ':document_achat'  => $row[3],
    ':poste'  => $row[4],
    ':article'  => $row[8],
    ':designiation_add'  => $row[9],
    ':Quantite_reception'  => str_replace(',','',$row[15]),
    ':date_livr_contrac'  => $row[19],
    ':stock_s'  =>  str_replace(',','',$row[23]),
    ':stock_s1'  => str_replace(',','',$row[24]),
    ':stock_s2'  => str_replace(',','',$row[25]),
    ':stock_s3'  => str_replace(',','',$row[26])
   );
   
   

   $sql = "
   INSERT INTO `zmm_s4` VALUES (:Magazin,:document_achat,:poste,
   :article,:designiation_add,:Quantite_reception,:date_livr_contrac,:stock_s,:stock_s1,:stock_s2,:stock_s3)
   ";

   $statement = $connect->prepare($sql);
   $statement->execute($insert_data1);
}
$nbr++;
  }
  $sqlnbrS="UPDATE `nb_semain` SET `nb_zmm`=1 WHERE 1";
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
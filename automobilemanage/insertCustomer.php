<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='customer';

$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$mobile=$data->mobile;
$email=$data->email;
$pstatus=$data->pstatus;
$ptype=$data->ptype;
$query='insert into '.$table.'(name,mobile,email,payment_status,payment_type) values (:name,:mobile,:email,:pstatus,:ptype)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':mobile',$mobile);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':pstatus',$pstatus);
$stmt->bindParam(':ptype',$ptype);
if($stmt->execute())
{
    $response['message']='Customer data created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
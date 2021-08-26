<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='trainer';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$phone=$data->phone;
$email=$data->email;
$type=$data->type;
$query='insert into '.$table.'(name,phone,email,type) values (:name,:phone,:email,:type)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':type',$type);
if($stmt->execute())
{
    $response['message']='trainer registered';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='members';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$phone=$data->phone;
$email=$data->email;
$query='insert into '.$table.'(name,phone,email) values (:name,:phone,:email)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':email',$email);
if($stmt->execute())
{
    $response['message']='member enrolled';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
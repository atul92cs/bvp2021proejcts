<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='member';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$email=$data->email;
$phone=$data->phone;
$query='insert into '.$table.'(name,email,phone) values (:name,:email,:phone)';
$stmt=$pdo->prepare($stmt);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
if($stmt->execute())
{
    $response['message']='Member created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
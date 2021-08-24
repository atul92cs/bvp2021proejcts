<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='user';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$email=$data->email;
$phone=$data->phone;
$query='insert into '.$table.' (email,phone,name) values (:email,:phone,:name)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':name',$name);
if($stmt->execute())
{
    $response['message']='user created';
    echo json_encode($response);
}
else
{
    $response['message']='error created';
    echo json_encode($response);
}
?>
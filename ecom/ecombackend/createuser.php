<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once'./config/database.php';
$table='user';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$phone=$data->phone;
$address=$data->address;
$query='insert into '.$table.' (name,phone,address) values (:name,:phone,:address)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
if($stmt->execute())
{
    $response['message']='user created';
    echo json_encode($response);

}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
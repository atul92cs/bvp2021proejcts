<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='customer';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$email=$data->email;
$phone=$data->phone;
$location=$data->location;
$id=$data->id;
$query='update '.$table.'set name=:name,email=:email,phone=:phone,location=:location where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Customer details updated';
    echo json_encode($response);

}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
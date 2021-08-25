<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='patient';

$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$gender=$data->gender;
$address=$data->address;
$disease=$data->disease;
$doctor=$data->doctor;
$query='insert into '.$table.' (name,gender,address,disease,doctor) values (:name,:gender,:address,:disease,:doctor)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':gender',$gender);
$stmt->bindParam(':address',$address);
$stmt->bindParam(':disease',$disease);
$stmt->bindParam(':doctor',$doctor);
if($stmt->execute())
{
    $response['message']='Patient created';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
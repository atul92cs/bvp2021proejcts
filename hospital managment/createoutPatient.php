<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='outpatient';
$data=json_decode(file_get_contents('php://input'));
$patient=$data->patient;
$doctor=$data->doctor;
$lab=$data->lab;
$query='insert into '.$table.' (patient,doctor,lab) values (:patient,:doctor,:lab)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':patient',$patient);
$stmt->bindParam(':doctor',$doctor);
$stmt->bindParam(':lab',$lab);
if($stmt->execute())
{
    $response['message']='Out patient created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='lab';
$data=json_decode(file_get_contents('php://input'));
$patient=$data->patient;
$doctor=$data->doctor;
$date=$data->date;
$amount=$data->amount;
$query='insert into '.$table.' (patient,doctor,date,amount) values (:patient,:doctor,:date,:amount)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':patient',$patient);
$stmt->bindParam(':doctor',$doctor);
$stmt->bindParam(':date',$date);
$stmt->bindParam(':amount',$amount);
if($stmt->execute())
{
    $response['message']='Lab entry created';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}

?>
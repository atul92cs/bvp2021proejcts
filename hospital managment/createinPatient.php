<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='inpatient';

$data=json_decode(file_get_contents('php://input'));
$patient=$data->patient;
$doa=$data->doa;
$lab=$data->lab;
$room=$data->room;
$dod=$data->dod;
if(isset($dod))
{
    $query='insert into '.$table.' (patient,doa,dod,lab,room) values (:patient,:doa,:dod,:lab,:room)';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':patient',$patient);
    $stmt->bindParam(':doa',$doa);
    $stmt->bindParam(':dod',$dod);
    $stmt->bindParam(':lab',$lab);
    $stmt->bindParam(':room',$room);
    if($stmt->execute())
    {
        $response['message']='Pateint admitted';
        echo json_encode($response);
    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }

}
else
{

}
?>
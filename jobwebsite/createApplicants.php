<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='applicants';
$data=json_decode(file_get_contents('php://input'));
$job=$data->job;
$userid=$data->userid;
$query='insert into '.$table.' (job,userid) values (:job,:userid)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':job',$job);
$stmt->bindParam(':userid',$userid);
if($stmt->execute())
{
    $response['message']='Application applied';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
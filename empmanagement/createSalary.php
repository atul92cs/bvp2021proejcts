<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='salary';
$data=json_decode(file_get_contents('php://input'));
$emp=$data->emp;
$department=$data->department;
$salary=$data->salary;
$query='insert into '.$table.' (empid,department,salary) values (:emp,:department,:salary)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':emp',$emp);
$stmt->bindParam(':department',$department);
$stmt->bindParam(':salary',$salary);
if($stmt->execute())
{
    $response['message']='Salary created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
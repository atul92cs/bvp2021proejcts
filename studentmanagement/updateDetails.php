<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='student_details';
$data=json_decode(file_get_contents('php://input'));
$student=$data->student;
$department=$data->dept;
$year=$data->year;
$id=$data->id;
$query='update '.$table.' set student=:student,department=:dept,year=:year where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':student',$student);
$stmt->bindParam(':dept',$department);
$stmt->bindParam(':year',$year);
if($stmt->execute())
{
    $response['message']='Details updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
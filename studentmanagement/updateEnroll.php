<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='enroll';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$enroll=$data->enroll;
$dept=$data->dept;
$id=$data->id;
$query='update '.$table.' set enrollno=:enroll,name=:name,department=:department where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':enroll',$enroll);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':department',$dept);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Enrollment updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
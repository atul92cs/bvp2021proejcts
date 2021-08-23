<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='salary';
$data=json_decode(file_get_contents('php://input'));
$emp=$data->emp;
$department=$data->dept;
$salary=$data->salary;
$id=$data->id;
$query='update '.$table.' set empid=:emp,department=:department,salary=:salary where id=:id';
$stmt-$pdo->prepare($query);
$stmt->bindParam(':emp',$emp);
$stmt->bindParam(':department',$department);
$stmt->bindParam(':salary',$salary);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['messsage']='Salary updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
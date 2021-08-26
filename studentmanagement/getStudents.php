<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='student_details';
$data=json_decode(file_get_contents('php://input'));
$dept=$data->dept;
$query='select student_details.roll as rollno,enroll.name as name,student_details.year as year from '.$table.' join enroll on student_details.enroll=enroll.id where student_details.deparment=:dept';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':dept',$dept);
if($stmt->execute())
{
    $students=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['students'=>$students]);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
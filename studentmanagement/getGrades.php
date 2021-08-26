<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='grades';
$query=' select student_details.roll as rollno ,enroll.name as name,grades.marks as marks from grades join student_details on grades.student=student_details.id join enroll on student_details.student=enroll.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['grades'=>$grades]);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
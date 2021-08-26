<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='grades';
$data=json_decode(file_get_contents('php://input'));
$dept=$data->dept;
$sub=$data->sub;
$query='select student_details.roll as rollno ,enroll.name as name,grades.marks as marks from grades join student_details on grades.student=student_details.id join enroll on student_details.student=enroll.id where student_details.department=:dept and grades.subject=:sub';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':dept',$dept);
$stmt->bindParam(':sub',$sub);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['grades'=>$grades]);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
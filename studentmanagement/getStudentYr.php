<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='student_details';
$data=json_decode(file_get_contents('php://input'));
$dept=$data->dept;
$year=$data->year;
$query='select enroll.enrollno as enrollmentno,enroll.name as name,student_details.roll as rollno from student_details join enroll on student_details.student=enroll.id where student_details.year=:year and student_details.department=:dept';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':dept',$dept);
$stmt->bindPara(':year',$year);
if($stmt->execute())
{
    $students=$stmt->fetachAll(PDO::FETCH_OBJ);
    echo json_encode(['students'=>$students]);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
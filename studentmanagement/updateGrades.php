<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='grades';
$data=json_decode(file_get_contents('php://input'));
$student=$data->student;
$subject=$data->subject;
$marks=$data->marks;
$id=$data->id;
$query='update '.$table.' set student=:student,subject=:subject,marks=:marks where id=:id ';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':student',$student);
$stmt->bindParam(':subject',$subject);
$stmt->bindParam(':marks',$marks);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $resposne['message']='grades upgraded';
    echo json_encode($resposne);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
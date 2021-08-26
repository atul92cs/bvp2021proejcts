<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='teacher';
$data=json_decode(file_get_contents('php://input'));
$year=$data->year;
$query='select teacher.name as name ,subject.name as subject from '.$table.' join subject on techer.subject-subject.id whre subject.year=:year';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':year',$year);
if($stmt->execute())
{
    $subject=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($subject);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
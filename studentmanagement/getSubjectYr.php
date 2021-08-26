<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='subject';
$data=json_decode(file_get_contents('php://input'));
$year=$data->year;
$query='select * from '.$table.' where year=:year';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':year',$year);
if($stmt->execute())
{
    $subjects=$stmt->fetch(PDO::FETCH_OBJ);
    echo json_encode(['subjects'=>$subjects]);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
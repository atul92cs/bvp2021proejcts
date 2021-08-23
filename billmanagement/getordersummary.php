<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='summary';

$query='select * from '.$table;
$stmt=$pdo->prepare($query);
if($stmt->fetch())
{
    $summary=$stmt->fetchAll($PDO::FECTH_OBJ);
    echo json_encode(['summary'=>$summary]);
}
else
{   
    $response['message']='error occured';
    echo json_encode($response);

}
?>
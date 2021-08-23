<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='category';
$query='select * from '.$table;
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $categories=$stmt->fetchAll(PDO::FECTH_OBJ);
    echo json_encode(['categories'=>$categories]);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
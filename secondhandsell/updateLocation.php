<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='location';
$data=json_decode(file_get_contents('file://input'));
$name=$data->name;
$id=$data->id;
$query='update '.$table.' set name=:name where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':id',$id);
if($stmt->exeucte())
{
    $response['message']='Location details updated';
    echo json_encode($response);
}
else
{
    $resposne['message']='error occured';
    echo json_encode($response);
}

?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$table='brand';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$category=$data->category;
$id=$data->id;
$query='update '.$table.' name=:name,category=:category where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':cateogry',$category);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='brand updated';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
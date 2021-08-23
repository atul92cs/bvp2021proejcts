<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='product';

$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$category=$data->category;
$price=$data->price;
$query='insert into product (name,category,price) values (:name,:category,:price)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':category',$category);
$stmt->bindParam(':price',$price);
if($stmt->execute())
{
    $response['message']='product created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
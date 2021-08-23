<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='cart';

$data=json_decode(file_get_contents('php://input'));
$product=$data->product;
$quantity=$data->quantity;
$price=$data->price;
$cost=$quantity*$price;
$query='insert into cart(product,quantity,cost,price) values (:product,:quantity,:cost,:price)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':product',$product);
$stmt->bindParam(':quantity',$quantity);
$stmt->bindParam(':cost',$cost);
$stmt->bindParam(':price',$price);
if($stmt->execute())
{
    $response['message']='Item inserted into cart';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}

?>
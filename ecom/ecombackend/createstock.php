<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once'./config/database.php';
$table='stock';
$data=json_decode(file_get_contents('php://input'));
$product=$data->product;
$quantity=$data->qunatity;
$query='insert into '.$table.'(product,quantity) values (:product,:qunatity)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':product',$product);
$stmt->bindParam(':quantity',$quantity);
if($stmt->execute())
{
    $response['message']='stock of'.$product.' created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
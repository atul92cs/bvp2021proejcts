<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$table='item';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$brand=$data->brand;
$type=$data->type;
$quantity=$data->quantity;
$price=$data->price;
$category=$data->category;
$query='update '.$table.' set name=:name,brand=:brand,type=:type,quantity=:quantity,price=:price where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':brand',$brand);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':quantity',$quantity);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Item updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
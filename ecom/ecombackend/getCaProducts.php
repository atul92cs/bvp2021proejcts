<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$data=json_encode(file_get_contents('php://input'));
$id=$data->id;
$table='product';
$query='select product.id as id,product.name as name,product.price as price,category.name as category from product join category on product.category=category.id order by product.id desc where category.id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($products);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
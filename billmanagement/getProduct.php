<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='product';

$query='select product.id as id,product.name as name,category.name as name,product.price as price  from '.$table.' join category on product.category=category.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $products=$stmt->fetchAll(PDO::FECTH_OBJ);
    echo json_encode(['products'=>$products]);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
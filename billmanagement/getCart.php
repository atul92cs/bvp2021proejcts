<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='cart';

$query='select cart.id as id,product.name as name,cart.quantity as quantity,cart.cost as cost,cart.price as price from '.$table.' join product on cart.product=product.id';

$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $carts=$stmt->fetchAll($PDO::FECTH_OBJ);
    echo json_encode(['cart'=>$carts]);

}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
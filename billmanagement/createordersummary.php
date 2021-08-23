<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='summary';

$data=$json_decode(file_get_contents('php://input'));
$ordersummary=$data->summary;
$total=$data->total;
$query='insert into '.$table.'(order_summary,total) values (:ordersummary,:total)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':ordersummary',$ordersummary);
$stmt->bindParam(':total',$total);
if($stmt->execute())
{
    $response['message']='Summary created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
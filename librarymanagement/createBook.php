<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='book';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$type=$data->type;
$isbn=$data->isbn;
$publisher=$data->publisher;
$author=$data->author;
$price=$data->price;
$copies=$data->copies;
$query='insert into '.$table.' (name,type,isbn,publisher,author,bookprice,copies) values (:name,:type,:isbn,:publisher,:author,:price,:copies)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':isbn',$isbn);
$stmt->bindParam(':publisher',$publisher);
$stmt->bindParam(':author',$author);
$stmt->bindParam(':bookprice',$price);
$stmt->bindParam(':copies',$copies);
if($stmt->execute())
{
    $response['message']='Book created';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
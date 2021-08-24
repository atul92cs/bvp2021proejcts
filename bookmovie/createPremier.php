<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='premier';
$data=json_decode(file_get_contents('php://input'));
$screen=$data->screen;
$movie=$data->movie;
$query='insert into '.$table.' (screen,movie) values (:screen,:movie)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':screen',$screen);
$stmt->bindParam(':movie',$movie);
if($stmt->execute())
{
    $response['message']='Premier created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
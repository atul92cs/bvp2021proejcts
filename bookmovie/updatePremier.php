<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='premier';
$data=json_decode(file_get_contents('php://input'));
$movie=$data->movie;
$screen=$data->screen;
$id=$data->id;
$query='update '.$table.'set movie=:movie,screen=:screen where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':movie',$movie);
$stmt->bindParam(':screen',$screen);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Premier updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='booking';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$email=$data->email;
$movie=$data->movie;
$screen=$data->screen;
$query='insert into '.$table.'(name,email,movie,screen) values (:name,:email,:movie,:screen)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':movie',$movie);
$stmt->bindParam(':screen',$screen);
if($stmt->execute())
{
    $response['message']='Booking done';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
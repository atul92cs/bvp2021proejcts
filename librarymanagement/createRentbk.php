<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='rentbooks';
$data=json_decode(file_get_contents('php://inpuut'));
$book=$data->book;
$doi=$data->doi;
$user=$data->user;
$status=$data->status;
if($data->dor)
{
    $dor=$data->dor;
    $query='insert into '.$table.' (book,doi,user,status,dor)values (:book,:doi,:user,:status,;dor)';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':book',$book);
    $stmt->bindParam(':doi',$doi);
    $stmt->bindParam(':status',$status);
    $stmt->bindParam(':dor',$dor);
    if($stmt->execute())
    {
        $response['message']='Book rented';
        echo json_encode($response);
    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }
}
else
{
    $query='insert into '.$table.' (book,doi,user,status)values (:book,:doi,:user,:status)';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':book',$book);
    $stmt->bindParam(':doi',$doi);
    $stmt->bindParam(':user',$user);
    $stmt->bindParam(':status',$status);
    if($stmt->execute())
    {
        $response['message']='Book rented';
        echo json_encode($response);
    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }
}
?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
 $table='teacher';
 $data=json_decode(file_get_contents('php://input'));
 $name=$data->name;
 $subject=$data->subject;
 $id=$data->id;
 $query='update '.$table.' set name=:name,subject=:subject where id=:id';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':subject',$subject);
 $stmt->bindParam(':id',$id);
 if($stmt->execute())
 {
    $response['message']='Teacher updated ';
    echo json_encode($response);
 }
 else
 {
    $response['message']='error occured';
    echo json_encode($response);
 }
?>
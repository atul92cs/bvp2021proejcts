<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$table='user';
$name=$_POST['name'];
$email=$_POST['email'];
$phone-$_POST['phone'];
$resume=$_FILES['resume'];
$respath='resumes/'.$resume['name'];
move_uploaded_file($resume['tmp_name'],$respath);
$query='insert into '.$table.' (name,email,phone,resume) values (:name,:email,:phone,:resume)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':resume',$respath);
if($stmt->execute())
{
    $response['message']='User registered';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once'./config/database.php';

$name=$_POST['name'];
$price=$_POST['price'];
$category=$_POST['category'];
$picture=$_FILES['picture'];
$table='product';
$query='insert into '.$table.' (name,price,category,picture) values (:name,:price,:category,:picture)';
$stmt=$pdo->prepare($query);
$imagepath='uploads/'.$picture['name'];
move_uploaded_file($picture['temp_name'],$imagepath);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':category',$category);
$stmt->bindParam(':picture',$imagepath);
if($stmt->execute())
{
    $response['message']='product created';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);

}
?>
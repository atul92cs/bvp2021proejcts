<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';
$name=$_POST['name'];
$genre=$_POST['genre'];
$director=$_POST['director'];
$description=$_POST['description'];
$poster=$_FILES['picture'];
$imgpath='picture/'.$poster['name'];
move_uploaded_file($poster['tmp_name'],$imgpath);
$query='insert into '.$table.' (name,genre,director,description,picture) values (:name,:genre,:director,:description,:picture)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':genre',$genre);
$stmt->bindParam(':director',$director);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':picture',$imgpath);
if($stmt->execute())
{
    $response['message']='Movie created';
    echo json_encode($response);
}
else
{   
    $response['message']='error occured';
    echo json_encode($response);

}
?>
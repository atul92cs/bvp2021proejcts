<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='movie';
$name=$_POST['name'];
$gnere=$_POST['genre'];
$director=$_POST['director'];
$description=$_POST['description'];
if($_FILES['picture'])
{
    $picture=$_FILES['picture'];
    $imgpath='picture/'.$picture['name'];
    move_uploaded_file($picture['tmp_name'],$imgpath);
    $query='update '.$table.' set name=:name,genre=:genre,director=:director,description=:description,poster=:poster where id=:id';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':genre',$gnere);
    $stmt->bindParam(':director',$director);
    $stmt->bindParam(':poster',$imgpath);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
        $response['message']='Movie details updated';
        echo json_encode($response);

    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }
}
else{
   $query='update '.$table.' set name=:name,genre=:genre,director=:director,description=:description where id=:id';
   $stmt=$pdo->prepare($query);
   $stmt->bindParam(':name',$name);
   $stmt->bindParam(':gene',$gnere);
   $stmt->bindParam(':director',$director);
   $stmt->bindParam(':description',$description);
   $stmt->bindParam(':id',$id);
   if($stmt->execute())
   {
        $repsonse['message']='movie updated';
        echo json_encode($response);
   }
   else
   {
        $response['message']='error occured';
        echo json_encode($response);
   }

}

?>
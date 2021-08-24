<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 include_once'./config/database.php';

 $table='postings';

 $title=$_POST['title'];
 $type=$_POST['type'];
 $content=$_POST['content'];
 $picture=$_FILES['picture'];
 $postedby=$_POST['postedby'];
 $imgpath='picture/'.$picture['name'];
move_uploaded_file($picture['tmp_name'],$imgpath);
$query='insert into '.$table.' (name,titel,content,picture,posted_by) values (:title,:content,:picture,:type,:postedby)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':content',$content);
$stmt->bindParam(':picture',$imgpath);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':postedby',$postedby);
if($stmt->execute())
{
    $response['message']='Ad created';
    echo json_encode($response);
}
else
{
    $response['error']='error occured';
    echo json_encode($response);
}
?>
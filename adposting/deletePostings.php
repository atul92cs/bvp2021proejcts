<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE,GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='postings';
$data=json_decode(file_get_contents('php://input'));
$id=$data->id;
$query='select * from '.$table.' where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $data=$stmt->fetch();
    if($data)
    {
        $sid=$data['id'];
        $picture=$data['picture'];
        unlink($picture);
        $query2='delete from '.$table.' where id=:id';
        $stmt2=$pdo->prepare($query2);
        $stmt2->bindParam(':id',$sid);
        if($stmt2->execute())
        {
            $response['message']='Posting deleted';
            echo json_encode($response);
        }
        else
        {
            $response['message']='error occured';
            echo json_encode($response);
        }
    }
}

?>
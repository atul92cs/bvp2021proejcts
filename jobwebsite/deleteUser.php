<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: DELETE,GET');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 include_once'./config/database.php';

 $table='user';
 $data=json_decode(file_get_contents('php://input'));
 $id=$data->id;
 $query='select * from user where id=:id';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':id',$id);
 if($stmt->execute())
 {
     $data=$stmt->fetch();
     if($data!=='NULL')
     {
        $uid=$data['id'];
        unlink($data['resume']);
        $query='delete from user where id=:id';
        $stmt2=$pdo->prepare($query);
        $stmt2->bindParam(':id',$uid);
        if($stmt2->execute())
        {
            $response['message']='User deactivated';
            echo json_encode($response);
        }
        else
        {
            $response['message']='error internal';
            echo json_encode($response);
        }
     }
     else
     {
        $response['message']='user not found';
        echo json_encode($response);
     }
 }
?>
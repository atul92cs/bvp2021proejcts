<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 include_once'./config/database.php';
 $table='cart';
 $data=json_decode(file_get_contents('php://input'));
 $user=$data->user;
 $product=$data->product;
 $quantity=$data->quantity;
 $query='insert into '.$table.' (product,quantity,user) values (:product,:quantity,:user)';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':product',$product);
 $stmt->bindParam(':quantity',$quantity);
 $stmt->bindParam(':user',$user);
 if($stmt->execute)
 {
    $response['message']='Product added to the cart';
    echo json_encode($response);
 }
 else
 {
    $respon['message']='error occured';
    echo json_encode($response);
 }

?>
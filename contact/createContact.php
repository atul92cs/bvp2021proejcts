<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='contact';
$name=$_POST['name'];
$phone=$_POST['phone'];
$picture=$_FILES['picture'];
$cgroup=$_POST['group'];
if($_POST['email'])
{
    $email=$_POST['email'];
    $query='insert into '.$table.' (name,phone,email) values (:name,:phone,:email)';
    $stmt->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    if($stmt->execute())
    {
        $resposne['message']='Contact created';
        echo json_encode($resposne);
    }
    else{
        $response['message']='error occured';
        echo json_encode($response);
    }

}
elseif($_POST['email'] && $_POST['group'])
{
    $email=$_POST['email'];
    $cgroup=$_POST['group'];
    $query='insert into '.$table.' (name,phone,email,cgroup) values (:name,:phone,:email,:group)';
    $stmt->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    $stmt->binParam(':group',$cgroup);
    if($stmt->execute())
    {
        $resposne['message']='Contact created';
        echo json_encode($resposne);
    }
    else{
        $response['message']='error occured';
        echo json_encode($response);
    }  
}
elseif($_POST['email'] && $_POST['group'] && $_FILES['picture'])
{
    $email=$_POST['email'];
    $cgroup=$_POST['group'];
    $picture=$_FILES['picture'];
    $imgpath='profile/'.$picture['name'];
    move_uploaded_file($picture['temp_name'],$imgpath);
    $query='insert into '.$table.' (name,phone,email,cgroup,picture) values (:name,:phone,:email,:group,:picture)';
    $stmt->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':group',$cgroup);
    $stmt->bindParam(':picture',$imgpath);
    if($stmt->execute())
    {
        $resposne['message']='Contact created';
        echo json_encode($resposne);
    }
    else{
        $response['message']='error occured';
        echo json_encode($response);
    }
}
?>
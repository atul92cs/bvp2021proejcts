<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='contact';
$name=$_POST['name'];
$phone=$_POST['phone'];
$id=$_POST['id'];
if($_POST['email'])
{
    $email=$_POST['email'];
    $query='update '.$table.' set name=:name, phone=:phone,email=:email where id=:id';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
        $response['message']='contact created';
        echo json_encode($response);
    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }
}
else if($_POST['email'] && $_POST['group'])
{
    $email=$_POST['email'];
    $group=$_POST['group'];
    $query='update '.$table.' set name=:name,phone=:phone,email=:email,cgroup=:group where id=:id';
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':group',$group);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
        $response['message']='contact created';
        echo json_encode($response);
    }
    else
    {
        $response['message']='error occured';
        echo json_encode($response);
    }
    
}elseif($_POST['email'] && $_FILES['picture'])
{
  $email=$_POST['email'];
  $picture=$_FILES['picture'];
  $imgpath='profile/'.$picture['name'];
  move_uploaded_file($picture['temp_name'],$imgpath);
  $query='update '.$table.' set name=:name,phone=:phone,email=:email,picture=:picture where id=:id';
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':picture',$imgpath);
  $stmt->bindParam(':id',$id);
  if($stmt->execute())
  {
    $response['message']='Contact updated';
    echo json_encode($response);
  } 
  else
  {
    $response['message']='error occured';
    echo json_encode($response);
  }
  
}
elseif($_FILES['picture'] && $_POST['group'])
{
  $group=$_POST['group'];
  $picture=$_FILES['picture'];
  $imgpath='profile/'.$picture['name'];
  move_uploaded_file($picture['temp_name'],$imgpath);
  $query='update '.$table.' set name=:name,phone=:phone,cgroup=:group,picture=:picture where id=:id';
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':phone',$phone);
  $stmt->bindParam(':group',$group);
  $stmt->bindParam(':picture',$imgpath);
  $stmt->bindParam(':id',$id);
  if($stmt->execute())
  {
    $response['message']='Contact updated';
    echo json_encode($response);
  } 
  else
  {
    $response['message']='error occured';
    echo json_encode($response);
  }
}
else if($_POST['picture'])
{
    
    $picture=$_FILES['picture'];
    $imgpath='profile/'.$picture['name'];
    move_uploaded_file($picture['temp_name'],$imgpath);
    $query='update '.$table.' set name=:name,phone=:phone,picture=:picture where id=:id';
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':picture',$imgpath);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
      $response['message']='Contact updated';
      echo json_encode($response);
    } 
    else
    {
      $response['message']='error occured';
      echo json_encode($response);
    }  
}
elseif($_POST['group'])
{
    $group=$_POST['group'];
    $query='update '.$table.' set name=:name,phone=:phone,cgroup=:group where id=:id';
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':group',$group);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
      $response['message']='Contact updated';
      echo json_encode($response);
    } 
    else
    {
      $response['message']='error occured';
      echo json_encode($response);
    }
}
elseif($_POST['email'] && $_POST['group'] && $_POST['picture'])
{
    $email=$_POST['email'];
    $group=$_POST['group'];
    $picture=$_FILES['picture'];
    $imgpath='profile/'.$picture['name'];
    move_uploaded_file($picture['temp_name'],$imgpath);
    $query='update '.$table.' set name=:name,phone=:phone,email=:zen,cgroup=:group,picture=:picture where id=:id';
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':zen',$email);
    $stmt->bindParam(':group',$group);
    $stmt->bindParam(':picture',$imgpath);
    $stmt->bindParam(':id',$id);
    if($stmt->execute())
    {
      $response['message']='Contact updated';
      echo json_encode($response);
    } 
    else
    {
      $response['message']='error occured';
      echo json_encode($response);
    }
}
else
{
   $query='update '.$table.' set name=:name , phone=:phone where id=:id';
   $stmt=$pdo->prepare($query);
   $stmt->bindParam(':name',$name);
   $stmt->bindParam(':phone',$phone);
   $stmt->bindParam(':id',$id);
   if($stmt->execute())
    {
      $response['message']='Contact updated';
      echo json_encode($response);
    } 
    else
    {
      $response['message']='error occured';
      echo json_encode($response);
    }
}
?>
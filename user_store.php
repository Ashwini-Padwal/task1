<?php
include("connection.php");

 $name=$_POST['name'];
 $email=$_POST['email'];
$task= $_POST['tasktype'];

if($task=='add')
{
  
    $sql="INSERT INTO `users`( `name`, `email`) VALUES ('$name','$email')";
mysqli_query($connection,$sql);


}
if($task=='update')
{
    $sql="update users set name='".$_POST['name']."',email='".$_POST['email']."' where  id='".$_POST['id']."'";
    mysqli_query($connection,$sql);
}



if($_REQUEST['taskType']=='Delete')
{
    $sql="delete from users where id='$_REQUEST[id]'";
    mysqli_query($connection,$sql);
    
    
}

echo "<script>window.top.location='users.php?task=&id='</script>";

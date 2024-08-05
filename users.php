<?php
  include("connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
    .heading{
      text-align: center;
    }
    .form-wrapper{
      padding-top:50px;
    }
  </style>
  <style>
      .up-block{display:none;}
      .shw-table{display:block;}
  </style>
 <?php 
  if($_REQUEST['id']!=''){
$sql_b1=mysqli_query($connection,"select * from users where id='".$_REQUEST['id']."'");
$res_b1=mysqli_fetch_assoc($sql_b1);
}

  if($_REQUEST['task']=='update')
{?>
  <style>
      .up-block{display:block !important;}
      .shw-table{display:none;}
  </style>  
<?php }

if($_REQUEST['task']=='add')
{?>
  <style>
      .up-block{display:block !important;}
      .shw-table{display:none;}
  </style>  
<?php }
?>
<script>
    function confirm_delete(id)
    {
        if (confirm('Are you sure want to delete?')) {
        window.top.location="user_store.php?taskType=Delete&id="+id
        } else {
        exit();
            }
    }
</script>
   
</head>
<body>
  <div class="container form-wrapper shw-table">
    <a href="users.php?task=add&id="><input type="button" class="btn btn-primary"   name="btnNew" id="btnNew" value="New/Add" /></a>
          
<?php
  $query="select * from users";
  $sql=mysqli_query($connection,$query);
  $count=mysqli_num_rows($sql);
  if($count>0){
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php

    $i=1;
    while($res=mysqli_fetch_assoc($sql)){
    ?>
    
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $res['name'];?></td>
        <td><?php echo $res['email'];?></td>
        <td> 
          <a href="users.php?task=update&id=<?php echo $res['id']?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a onClick="confirm_delete('<?php echo $res['id']?>')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a></td>
      </tr>
    
        
    <?php
$i++;
  }?>
  </tbody>
  </table>
  <?php
  }
  
?>
</div>
<div class="container form-wrapper up-block">
  <h2 class="heading">Users form</h2>
  <form action="user_store.php" method="post">
    <input type="hidden" name="tasktype" value="<?php echo $_REQUEST['task'];?>">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
        
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" value="<?php if($_REQUEST['task']=='update'){ echo $res_b1['name'];}?>" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php if($_REQUEST['task']=='update'){ echo $res_b1['email'];}?>" placeholder="Enter email" name="email">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
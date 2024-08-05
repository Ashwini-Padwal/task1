<?php
$servername ="localhost";
$username="root";
$password="";
$database_name="job_task";
$connection=mysqli_connect($servername,$username,$password,$database_name) or die('Could not connect');
// Check connection
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
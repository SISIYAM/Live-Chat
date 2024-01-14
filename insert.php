<?php
// including database connection
include 'dbcon.php';

// check is user click on send button
if(isset($_POST['sendBtn'])){
  
  $post_message = $_POST['message'];
  $message = str_replace("'","\'", $post_message);

  // let initial value of output = null
  $output = "";

  $sql = "INSERT INTO test (message) VALUE ('$message')";
  $sql_run = mysqli_query($con,$sql);

  if($sql_run){
    echo 0;
  }else{
    echo "Failed";
  }
}
?>
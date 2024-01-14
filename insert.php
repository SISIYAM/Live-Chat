<!--
* Title: Live Chat-box
* Description: Simple Live Chat-Box Using Ajax
* Author: MD Saymum Islam Siyam (CodeSQL)
* Email: si31siyam@gmail.com
* Portfolio: https://siyam70.netlify.app/
* Date: 14/01/24 
-->
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
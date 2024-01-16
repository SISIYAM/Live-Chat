<?php
// including database connection
include 'dbcon.php';

// if message successfully inserted into database then show messages in chat-box.
$find_message = "SELECT * FROM test";
$query = mysqli_query($con, $find_message);
$num = mysqli_num_rows($query);

// check is there have any message or not
if($num > 0){
  
  // applying while loop for print all messages
  while($row = mysqli_fetch_array($query)){
    $output = '<div class="chat-box">
    <p>'.$row['message'].'</p>
    </div> ';

    // now print output
    echo $output;
  }
}else{
  $output = "No Message Found.";

  // now print output
  echo $output;
}
?>

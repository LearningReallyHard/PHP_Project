<?php
$conn = mysqli_connect('localhost','root','qkqhsksk98','login');

for($i=100;$i<200;$i++){
  $query = "INSERT INTO books(title, description, date, user_id)
            VALUES( 'test{$i}', 'test', NOW(), 1)";
  mysqli_query($conn, $query);
}
?>

<?php
function getData($query){
  $conn = mysqli_connect('localhost','root','qkqhsksk98','login');
  $result = mysqli_query($conn, $query);
  return $result;
}
?>

<?php
session_start();
$conn = mysqli_connect('localhost', 'root','qkqhsksk98','login');
$filtered = array(
  'user_id' => mysqli_real_escape_string($conn, $_POST['id']),
  'pass' => mysqli_real_escape_string($conn, $_POST['pass'])
);
$query = "SELECT * FROM users WHERE user_id = '{$filtered['user_id']}' AND pass = '{$filtered['pass']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if(!isset($row)){
  echo "<script>alert('Wrong Id or Pass'); window.history.back();</script>";
  exit;
}

$_SESSION['user_id'] = $row['user_id'];
header('Location:../index.php');
?>

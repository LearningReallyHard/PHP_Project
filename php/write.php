<?php
session_start();
$conn = mysqli_connect('localhost','root','qkqhsksk98','login');
$query = "SELECT id from users WHERE user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$description = mysqli_real_escape_string($conn, nl2br($_POST['description']));
$title = mysqli_real_escape_string($conn, $_POST['title']);
$query = "INSERT INTO books( title, description, date, user_id)
         VALUES ( '{$title}', '{$description}', NOW(), {$row['id']})";
mysqli_query($conn, $query);
echo "<script>alert('글이 등록되었습니다.'); history.back();</script>";
?>

<?php
$conn = mysqli_connect('localhost','root','qkqhsksk98','login');

$title = mysqli_real_escape_string($conn, nl2br($_POST['title']));
$description = mysqli_real_escape_string($conn, nl2br($_POST['description']));
$query = "UPDATE books SET
          title = '{$title}', description = '{$description}', date = NOW()
          WHERE id = {$_POST['id']}";
mysqli_query($conn, $query);
echo "<script>alert('수정이 완료되었습니다.'); history.back(); </script>";
?>

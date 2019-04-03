<?php
$conn = mysqli_connect('localhost','root','qkqhsksk98','login');
$filtered = array(
  'user_id' => mysqli_real_escape_string($conn,$_POST['user_id']),
  'pass' => mysqli_real_escape_string($conn, $_POST['pass'])
);
$query = "SELECT COUNT(*) FROM users where user_id = '{$filtered['user_id']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if($row[0]){
  echo "<script>alert('ID가 존재합니다.'); window.history.back();</script>";
  exit;
}
$query = "INSERT INTO users ( user_id, pass )
          VALUES( '{$filtered['user_id']}', '{$filtered['pass']}')";
mysqli_query($conn, $query);
echo "<script>alert('ID가 생성되었습니다.'); window.location.href = '../index.php';</script>";
?>

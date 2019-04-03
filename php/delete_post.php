<?php
require_once('../lib/get_data.php');
getData("DELETE FROM books WHERE id = {$_POST['id']}");
echo "<script> alert('삭제 되었습니다.'); location.href='../index.php'; </script>";
?>

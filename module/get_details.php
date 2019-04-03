<?php
require_once('./lib/get_data.php');
$query = "SELECT *, users.user_id AS users_user_id, books.id AS books_id FROM books
          LEFT JOIN users ON books.user_id = users.id
          WHERE books.id = {$_GET['id']}";
$result = getData($query);
$row = mysqli_fetch_array($result);
$title = $row['title'];
$user_id = $row['users_user_id'];
$date = $row['date'];
$description = $row['description'];
$delete = "";
$update = "";
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_id'] == $user_id){
      $delete = "<form id='delete_post_form' action='./php/delete_post.php' method='post'>
        <input type='hidden' name='id' value='{$row['books_id']}'>
        <span id='delete_post' style='cursor:pointer;'>[삭제]</span>
      </form>";
      $update = "<span style='cursor:pointer;'>[수정]</span>";
  }
}
?>

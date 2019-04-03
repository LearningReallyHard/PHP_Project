<?php
if(isset($_SESSION['user_id'])){
  $hidden = "";
  if(isset($_GET['id'])){
    $hidden = "<input type='hidden' name='id' value='{$_GET['id']}'>";
  }
  ?>
  <section class="make_book">
    <form action="./php/write.php" method="post">
      <?=$hidden?>
      <ul class="write">
        <li><p>글쓰기</p></li>
        <li><p>제목</p><p><input name="title" autocomplete="off" required></p></li>
        <li><p>내용</p><p><textarea name="description" rows="25" required></textarea></p>
        <li><p><button>글쓰기</button></p></li>
      </ul>
    </form>
  </section>
  <?php
}else{
  ?>
  <section class="make_book" style="text-align:center;margin-top:15px;">
    글을 쓰시려면 로그인 해주세요.
  </section>
  <?php
}
?>

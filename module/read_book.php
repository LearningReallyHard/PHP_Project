<?php require_once('./module/get_details.php') ?>
<section class="read_book">
  <div class="container">
    <div class="title"><?=$title?></div>
    <ul class="about"><li><p>글쓴이</p><p><?=$user_id?></p><p>날짜</p><p><?=$date?></p></li></ul>
    <div class="description">
      <?=$description?>
    </div>
    <div class="menus">
      <p><a href="./index.php?start=<?=$_GET['start']?>&end=<?=$_GET['end']?>&current=<?=$_GET['current']?>&classification=<?=$_GET['classification']?>&value=<?=$_GET['value']?>">[목록보기]</a></p>
      <p id="update_post"><?=$update?></p>
      <p><?=$delete?></p>
    </div>
  </div>
</section>

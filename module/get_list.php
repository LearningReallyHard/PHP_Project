<?php
require_once('./lib/get_data.php');
require_once('./lib/getMonthDay.php');
$i = 0; // No.
$per = 10; // 한 페이지에 보여줄 글 수
$current = (isset($_GET['current'])) ? $_GET['current'] : 1; // 현재 페이지
$indexOfLastPage = $current * $per; // 가져올 글의 첫 인덱스
$indexOfFirstPage = $indexOfLastPage - $per; // 가져올 글의 마지막 인덱스

$query_where = "";
$classification = "";
$value = "";
$start = (isset($_GET['start'])) ? $_GET['start'] : 0;
$end = (isset($_GET['end'])) ? $_GET['end'] : 10;
$current = (isset($_GET['current'])) ? $_GET['current'] : 1;
if(isset($_GET['classification'])){
  $value = $_GET['value'];
  $classification = $_GET['classification'];
  if($_GET['classification'] == 'user_id'){
      $query_where = "WHERE users.user_id = '{$_GET['value']}'";
  }else if($_GET['classification'] == 'title'){
      $query_where = "WHERE title LIKE '%{$_GET['value']}%'";
  }else if($_GET['classification'] == 'description'){
    $query_where = "WHERE description LIKE '%{$_GET['value']}%'";
  }
}
$result = getData("SELECT *,books.id as books_id FROM books
                  LEFT JOIN users ON books.user_id = users.id
                  {$query_where}
                  ORDER BY books.id DESC LIMIT {$indexOfFirstPage}, {$per}");
while($row = mysqli_fetch_array($result)){
  $i+=1;
  $date = getMonthDay($row['date']);
  $date_str = "{$date[0]}월 {$date[1]}일";
  ?>
  <li><p><?=$indexOfFirstPage+$i?></p><p><a href="./read.php?&start=<?=$start?>&end=<?=$end?>&current=<?=$current?>&classification=<?=$classification?>&value=<?=$value?>&id=<?=$row['books_id']?>" style="color:black;text-decoration:none;"><?=$row['title']?></a></p><p><?=$date_str?></p><p><?=$row['user_id']?></p></li>
  <?php

}
?>

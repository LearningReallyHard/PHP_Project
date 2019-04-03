<?php
require_once('./lib/get_data.php');
$classification = "";
$classification_value_url = "";
if(isset($_GET['classification'])){
  if($_GET['classification'] == 'user_id'){
      $classification = "WHERE users.user_id = '{$_GET['value']}'";
  }else if($_GET['classification'] == 'title'){
      $classification = "WHERE title LIKE '%{$_GET['value']}%'";
  }else if($_GET['classification'] == 'description'){
    $classification = "WHERE description LIKE '%{$_GET['value']}%'";
  }
  $classification_value_url = "&classification={$_GET['classification']}&value={$_GET['value']}";
}

$result = getData("SELECT COUNT(*) FROM books
                  LEFT JOIN users ON books.user_id = users.id
                  {$classification}");
$row = mysqli_fetch_array($result);
$per = 10;
$total_pages = ceil($row[0] / $per);
$start = (isset($_GET['start'])) ? $_GET['start'] : 0;
$end = (isset($_GET['end'])) ? $_GET['end'] : 10;
$current = (isset($_GET['current'])) ? $_GET['current'] : 1;
$last_page = ($total_pages < $end) ? $total_pages : $end;

echo "<span id='prev'>Prev</span>";
for($i=$start;$i<$last_page;$i++){
  $number = $i+1;
  if($number == $current){
    echo "<a href='./index.php?start={$start}&end={$end}&current={$number}{$classification_value_url}' class='selected'>{$number}</a>";
  }else{
      echo "<a href='./index.php?start={$start}&end={$end}&current={$number}{$classification_value_url}'>{$number}</a>";
  }
}
echo "<span id='next' lastPage={$total_pages}>Next</span>";
?>

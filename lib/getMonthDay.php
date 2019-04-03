<?php
function getMonthDay($date){
  $month = substr($date, 5,2);
  $day = substr($date, 8, 2);
  return [$month, $day];
}
?>

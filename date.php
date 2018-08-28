<?php

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$my = strtotime("2017-12-28 11:22:00");
if (strtotime($date) > $my) {
    echo strtotime($date); echo '<br>';
    echo $my;echo '<br>';
    echo "yo";
}
// echo $date;

?>
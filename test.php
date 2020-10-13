<?php

$datetime = "2020-10-13 09:47:19";
$date = explode(" ", $datetime)[0];

list($year, $month, $day) = explode("-", $date);
echo "Month: $month; Day: $day; Year: $year<br />\n";

?>
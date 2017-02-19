<?php

$to_time = strtotime("2017-2-24 00:00:00");
$from_time = time();
$minutes = round(abs($to_time - $from_time) / 60,2);

$dni = $minutes / 60 / 24;
$dniInt = (int)$dni;

$sati = ($dni - $dniInt) * 24;
$satiInt = (int)$sati;

$minute = ($sati - $satiInt) * 60;
$minuteInt = (int)$minute;

?>
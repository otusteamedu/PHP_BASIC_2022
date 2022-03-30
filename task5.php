<?php

function makeDateRussianFormat():string {
    $currentDate = date("H i");
    $hourForString = $currentDate[1];
    $minuteForString = $currentDate[4];
    $fullRussianDate = '';
    if ($hourForString == 1) {
        $fullRussianDate = $currentDate[0] . $currentDate[1] . " час ";
    } elseif ($hourForString > 1 && $hourForString < 5) {
        $fullRussianDate = $currentDate[0] . $currentDate[1] . " часа ";
    } else {
        $fullRussianDate = $currentDate[0] . $currentDate[1] . " часов ";
    }
    if ($minuteForString == 1) {
        $fullRussianDate = $fullRussianDate . $currentDate[3] . $currentDate[4] . " минута";
    } elseif ($minuteForString > 1 && $minuteForString < 5) {
        $fullRussianDate = $fullRussianDate . $currentDate[3] . $currentDate[4] . " минуты";
    } else {
        $fullRussianDate = $fullRussianDate . $currentDate[3] . $currentDate[4] . " минут";
    }
    return $fullRussianDate;
}

echo makeDateRussianFormat();
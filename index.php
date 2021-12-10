<?php

include "dateDayFormat.php";

echo dateDayFormat("today", "tr") ."<br><br>";
echo dateDayFormat("2021-12-10", "tr") ."<br><br>";
echo dateDayFormat("2021-12-30", "tr") ."<br><br>";
echo dateDayFormat("2021-12-31", "tr") ."<br><br>";

echo dateDayFormat("2021-11-30") ."<br><br>";
echo dateDayFormat("2021-12-10") ."<br><br>";
echo dateDayFormat("2021-12-30") ."<br><br>";
echo dateDayFormat("2021-12-31") ."<br><br>";
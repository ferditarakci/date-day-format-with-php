<?php

function dateDayFormat($today = 'today', $lang = 'en') {

    $today = date("Y-m-d", strtotime($today));

    $days = array(
        $today,
        date("Y-m-d", strtotime("+1 days", strtotime($today))),
        date("Y-m-d", strtotime("+2 days", strtotime($today)))
    );

    $date = array();
    $count = 0;
    $totalCount = sizeof($days) - 1;

    $title = "";

	$and = " and ";
    if ($lang == 'tr') $and = " ve ";

    foreach ($days As $day) {
        $day = strtotime($day);
        $d = date('j', $day);
        $m = date('m', $day);
        $F = turkishDate('F', $day, $lang);
        $Y = date('Y', $day);

        if ($count > 0 AND (@$date[0] == $m))  $title .= ", ";

        if (($count >= 1 OR $count < $totalCount) AND @$date[0] != $m) {
            $title .= " " . @$date[2] . " ";
            if (!($totalCount >= $count AND @$date[1] != $Y)) $title .= $and;
        }

        if (($count == 1 OR $count <= $totalCount) AND @$date[1] != $Y) {
            $title .= " " . @$date[1] . " ";
            if (!(($count == 0) AND @$date[1] != $Y)) $title .= $and;
        }

        $title .= $d;

        if ($count == $totalCount AND @$date[0] == $m) {
            $title .= " " . $F;
            $title .= " " . $Y . " ";
        }

        elseif ($count == $totalCount AND @$date[0] != $m) {
            $title .= " " . $F;
            $title .= " " . $Y . " ";
        }

        $date[0] = $m;
        $date[1] = $Y;
        $date[2] = $F;
        $count++;
    }

    return trim($title);
}

function turkishDate($format, $datetime = 'now', $lang = 'en') {
	$date = date($format, $datetime);
	if ($lang == 'en') return $date;

	$days = array(
		'Monday'    => 'Pazartesi',
		'Tuesday'   => 'Salı',
		'Wednesday' => 'Çarşamba',
		'Thursday'  => 'Perşembe',
		'Friday'    => 'Cuma',
		'Saturday'  => 'Cumartesi',
		'Sunday'    => 'Pazar',
		'January'   => 'Ocak',
		'February'  => 'Şubat',
		'March'     => 'Mart',
		'April'     => 'Nisan',
		'May'       => 'Mayıs',
		'June'      => 'Haziran',
		'July'      => 'Temmuz',
		'August'    => 'Ağustos',
		'September' => 'Eylül',
		'October'   => 'Ekim',
		'November'  => 'Kasım',
		'December'  => 'Aralık',
		'Mon'       => 'Pts',
		'Tue'       => 'Sal',
		'Wed'       => 'Çar',
		'Thu'       => 'Per',
		'Fri'       => 'Cum',
		'Sat'       => 'Cts',
		'Sun'       => 'Paz',
		'Jan'       => 'Oca',
		'Feb'       => 'Şub',
		'Mar'       => 'Mar',
		'Apr'       => 'Nis',
		'Jun'       => 'Haz',
		'Jul'       => 'Tem',
		'Aug'       => 'Ağu',
		'Sep'       => 'Eyl',
		'Oct'       => 'Eki',
		'Nov'       => 'Kas',
		'Dec'       => 'Ara',
	);

	foreach($days as $en => $tr)
		$date = str_replace($en, $tr, $date);

	if (strpos($date, 'Mayıs') !== false && strpos($format, 'F') === false)
		$date = str_replace('Mayıs', 'May', $date);

	return $date;
}
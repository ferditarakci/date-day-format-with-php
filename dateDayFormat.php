<?php

function dateDayFormat($today = 'today', $lang = 'en') {

    $today = date("Y-m-d", strtotime($today));

    $days = array(
        $today,
        date("Y-m-d", strtotime("+1 days", strtotime($today))),
        date("Y-m-d", strtotime("+2 days", strtotime($today)))
    );

    $dates = array();
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

        if ($count > 0 AND (@$dates[0] == $m))  $title .= ", ";

        if (($count >= 1 OR $count < $totalCount) AND @$dates[0] != $m) {
            $title .= " " . @$dates[2] . " ";
            if (!($totalCount >= $count AND @$dates[1] != $Y)) $title .= $and;
        }

        if (($count == 1 OR $count <= $totalCount) AND @$dates[1] != $Y) {
            $title .= " " . @$dates[1] . " ";
            if (!(($count == 0) AND @$dates[1] != $Y)) $title .= $and;
        }

        $title .= $d;

        if ($count == $totalCount AND @$dates[0] == $m) {
            $title .= " " . $F;
            $title .= " " . $Y . " ";
        }

        elseif ($count == $totalCount AND @$dates[0] != $m) {
            $title .= " " . $F;
            $title .= " " . $Y . " ";
        }

        $dates[0] = $m;
        $dates[1] = $Y;
        $dates[2] = $F;
        $count++;
    }

    return trim($title);
}

function turkishDate($format, $datetime = 'now', $lang = 'en') {
	$z = date($format, $datetime);
	if ($lang == 'en') return $z;

	$gun_dizi = array(
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

	foreach($gun_dizi as $en => $tr)
		$z = str_replace($en, $tr, $z);

	if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false)
		$z = str_replace('Mayıs', 'May', $z);

	return $z;
}
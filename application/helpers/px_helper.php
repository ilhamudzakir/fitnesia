<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('date_indo'))
{
	function date_indo($format, $date)
	{
		$timestamp = strtotime($date);
		$l = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
		$F = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$return = '';
		if(is_null($timestamp))
		{ 
			$timestamp = mktime(); 
		}
		for($i = 0, $len = strlen($format); $i < $len; $i++) 
		{
			switch($format[$i])
			{
				case '\\' :
					$i++;
					$return .= isset($format[$i]) ? $format[$i] : '';
					break;
				case 'l' :
					$return .= $l[date('N', $timestamp)];
					break;
				case 'F' :
					$return .= $F[date('n', $timestamp)];
					break;
				default :
					$return .= date($format[$i], $timestamp);
					break;
			}
		}
		return $return;
	}
}
if ( ! function_exists('limit_words'))
{
	function limit_words($paragraph,$limit){
		$data = implode(' ', array_slice(explode(' ', strip_tags($paragraph)), 0, $limit));
		return $data;
	}
}
if ( ! function_exists('indonesian_currency'))
{
	function indonesian_currency($number){
		$result = 'Rp. ' . number_format($number, 0, '', '.');
                return $result;
	}
}
if(!function_exists('time_elapsed_string'))
{
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
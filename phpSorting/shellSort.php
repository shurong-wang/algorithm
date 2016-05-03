<?php

/**
 * 希尔排序
 **/
function shellSort(&$a) {
	$n = count($a);
	$d = floor($n / 2);
	while ($d > 0) {
		for ($i = 0; $i < ($n - $d); $i++) {
			$j = $i;
			while ($j >= 0 && $a[$j] > $a[$j + $d]) {
				list($a[$j], $a[$j + $d]) = array($a[$j + $d], $a[$j]);
				$j--;
			}
		}
		$d = floor($d / 2);
	}
}


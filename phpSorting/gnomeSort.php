<?php

/**
 * 侏儒排序（地精排序）
 **/
function gnomeSort(&$a) {
	$n = count($a);
	$i = 1;
	$j = 2;
	while ($i < $n) {
		if ($a[$i - 1] < $a[$i]) {
			$i = $j;
			$j++;
		} else {
			list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
			$i--;
			if ($i == 0) {
				$i = $j;
				$j++;
			}
		}
	}
}

<?php

/**
 * 快速排序
 **/
function quickSort(&$a, $l = 0, $r = 0) {
	if($r == 0) $r = count($a)-1;
	$i = $l;
	$j = $r;
	$x = $a[($l + $r) / 2];
	do {
		while ($a[$i] < $x) $i++;
		while ($a[$j] > $x) $j--;
		if ($i <= $j) {
			if ($a[$i] > $a[$j])
				list($a[$i], $a[$j]) = array($a[$j], $a[$i]);
			$i++;
			$j--;
		}
	} while ($i <= $j);
	$function = __FUNCTION__;
	if ($i < $r) $function($a, $i, $r);
	if ($j > $l) $function($a, $l, $j);
}


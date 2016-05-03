<?php

/**
 * 梳排序
 **/
function combSort(&$a) {
	$gap = $n = count($a);
	$swapped = true;
	while ($gap > 1 || $swapped) {
		if ($gap > 1) $gap = floor($gap / 1.24733);
		$i = 0;
		$swapped = false;
		while ($i + $gap < $n) {
			if ($a[$i] > $a[$i + $gap]) {
				list($a[$i], $a[$i + $gap]) = array($a[$i + $gap], $a[$i]);
				if (!$swapped) $swapped = true;
			}
			$i++;
		}
	}
}

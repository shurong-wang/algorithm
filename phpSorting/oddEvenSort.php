<?php

/**
 * 奇偶排序
 **/
function oddEvenSort(&$a) {
	$n = count($a);
	$sorted = false;
	while (!$sorted) {
		$sorted = true;
		for ($i = 1; $i < ($n - 1); $i += 2) {
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
				if ($sorted) $sorted = false;
			}
		}

		for ($i = 0; $i < ($n - 1); $i += 2) {
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
				if ($sorted) $sorted = false;
			}
		}
	}
}
function printArray($a, $keys = null, $color = 'red') {
	if (!is_null($keys)) foreach ($keys as $k) $a[$k] = "<span style='color: ".$color."'>".$a[$k]."</span>";
	echo '[';
	echo implode(', ', $a);
	echo ']'.EOL;
}

<?php

/**
 * 递归排序
 **/
function stupidSort(&$a) {
	$n = count($a);
	for ($i = 1; $i < $n; $i ++) {
	//echo "Iteration #".$i.EOL;
		if ($a[$i] < $a[$i - 1]) {
			//echo "Swap :";
			list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
			//printArray($a, array($i, $i - 1));
			$i = 0;
			continue;
		}
	}
}
function printArray($a, $keys = null, $color = 'red') {
	if (!is_null($keys)) foreach ($keys as $k) $a[$k] = "<span style='color: ".$color."'>".$a[$k]."</span>";
	echo '[';
	echo implode(', ', $a);
	echo ']'.EOL;
}
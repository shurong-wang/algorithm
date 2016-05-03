<?php

/**
 * 冒泡排序
 **/
function bubbleSort(&$a) {
	$n = count($a);
	// bubble sorting
	for ($j = 0; $j < ($n - 1); $j++) {
		//echo "Iteration #".$j.EOL;
		for ($i = 0; $i < ($n - $j - 1); $i++) {
			//echo T.'#'.$i.T.'v'.$a[$i].EOL;
			//echo "Comparation: ";
			//printArray($a, array($i, $i + 1));
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap: ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
			}
		}
	}
}

/**
 * 使用标志的冒泡排序
 **/
function bubbleSortWithFlag(&$a) {
	$n = count($a);
	// bubble sorting
	for ($j = 0; $j < ($n - 1); $j++) {
		//echo "Iteration #".$j.EOL;
		$flag = false;
		for ($i = 0; $i < ($n - $j - 1); $i++) {
			//echo T.'#'.$i.T.'v'.$a[$i].EOL;
			//echo "Comparation: ";
			//printArray($a, array($i, $i + 1));
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap: ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
				if (!$flag) $flag = true;
			}
		}
		if (!$flag) break;
	}
}

/**
 * 联合冒泡排序
 **/
function combinedBubbleSort(&$a) {
	$n = count($a);
	// bubble sorting
	for ($j = 0; $j < ($n - 1); $j++) {
		//echo "Iteration #".$j.EOL;
		$flag = false;
		$min = $j;
		for ($i = $j; $i < ($n - $j - 1); $i++) {
			//echo T.'#'.$i.T.'v'.$a[$i].EOL;
			//echo "Comparation: ";
			//printArray($a, array($i, $i + 1));
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap: ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
				if (!$flag) $flag = true;
			}
			if ($a[$i] < $a[$min]) $min = $i;
		}
		if (!$flag) break;
		if ($min != $j) {
			//echo "Swap: ";
			list($a[$min], $a[$j]) = array($a[$j], $a[$min]);
			//printArray($a, array($min, $j), 'yellow');
		}
	}
}


function printArray($a, $keys = null, $color = 'red') {
	if (!is_null($keys)) foreach ($keys as $k) $a[$k] = "<span style='color: ".$color."'>".$a[$k]."</span>";
	echo '[';
	echo implode(', ', $a);
	echo ']'.EOL;
}
<?php

/**
 * 鸡尾酒排序
 **/
function cocktailSort(&$a) {
	$n = count($a);
	$left = 0;
	$right = $n - 1;
	do {
		//echo "# Left: ".$left." Right: ".$right.EOL;
		for ($i = $left; $i < $right; $i++) {
			//echo "Comparation: ";
			//printArray($a, array($i, $i + 1));
			if ($a[$i] > $a[$i + 1]) {
				//echo "Swap ";
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
				//printArray($a, array($i, $i + 1), 'blue');
			}
		}
		$right -= 1;
		for ($i = $right; $i > $left; $i--) {
			//echo "Comparation: ";
			//printArray($a, array($i, $i - 1));
			if ($a[$i] < $a[$i - 1]) {
				//echo "Swap ";
				list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
				//printArray($a, array($i, $i - 1), 'blue');
			}
		}
		$left += 1;
	} while ($left <= $right);
}

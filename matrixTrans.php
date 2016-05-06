<?php
header("content-type:text/html;charset=utf-8");
/**
 * 矩阵转置
 *
 * @param array $matrix 待转置的矩阵
 * @param array return 转置后的矩阵
 * */

$matrix = array(
	array( 1, 2, 3 ),
	array( 4, 5, 6 ),
	array( 7, 8, 9 )
);

echo "<br/>转置前的矩阵：";
foreach($matrix as $line){
	echo "<br/>";
	foreach($line as $value){
		echo $value."&nbsp;&nbsp;";
	}
}
$mtx = transposition($matrix);

echo "<br/>转置后的矩阵：";
foreach($mtx as $line){
	echo "<br/>";
	foreach($line as $element){
		echo $element."&nbsp;&nbsp;";
	}
}

function transposition($matrix){
	foreach( $matrix as $key => $val ){
		foreach( $val as $k => $v ){
			//echo "<br/>\$matrix[$key][$k] = \$matrix[$k][$key]<br/>";
			//echo "<br/>{$matrix[$key][$k]} = {$matrix[$k][$key]}<br/>";
			$mtx[$key][$k] = $matrix[$k][$key];
		}
	}
	return $mtx;
}
?>
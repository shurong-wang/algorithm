<?php
/**
 * 螺旋矩阵 -- 由大到小，由外向内，顺时针旋转
 * array(
 * 	 array(3,  4,  5),
 * 	 array(10, 11, 6),
 * 	 array(9,  8,  7),
 * )
 * 
 * 假设矩阵开始数字为 $num
 * -----------------------------------------------------
 * 解题步骤：
 * 1. 确定矩阵最小数字和最大数字
 *  最小数字：$num
 *	最大数字：$max = $num * $num + $num - 1;

 * 2. 初始化矩阵二维数组
 *	数组 $x 行，$y 列，0 <= $x < $num，0 <= $y < $num，
 *	数组 元素初始值全部为 0 
 *
 * 3. 初始化矩阵移动方向变量
 *  $direct = 'right'	右移 ->  $y++
 *  $direct = 'down'	下移 ->  $x++
 *  $direct = 'left'	左移 ->  $y--
 *  $direct = 'up'		上移 ->  $x--
 *
 * 4. 确定什么情况下改变方向：
 *  下一坐标位置超出矩阵边长
 * 	下一坐标位置已被非 0 数字填充
 */

function spiralMatrix($num){
	// 初始化矩阵二维数组，初始值为零
	$arr = array();
	// 行
	for($i=0; $i<$num; $i++){
		// 列
		for ($j=0; $j<$num; $j++){
			$arr[$i][$j] = 0;
		}
	}
	
	// 矩阵开始数字	$num
	// 矩阵结束数字 $max 
	$max = $num * $num + $num - 1;
	
	// 初始化矩阵方格坐标
	$x = $y = 0;

    // 初始化矩阵移动方向
	$direct = 'right';

	// 循环向矩阵数组添加元素
	for($i=$num; $i<=$max; $i++){
		if($arr[$x][$y] == 0) {
			$arr[$x][$y] = $i;
		} else {
			// -- 向右（列坐标增加）-- // 
			if($direct == 'right'){
				if(($y+1) < $num && $arr[$x][$y+1] == 0){
					$arr[$x][++$y] = $i;
				} else {
					$direct = 'down';
				}
			}
			// -- 向下（行坐标增加） -- //
			if($direct == 'down') {
				if(($x+1) < $num && $arr[$x+1][$y] == 0){
					$arr[++$x][$y] = $i;
				} else {
					$direct = 'left';
				}
			}
			// -- 向左（列坐标递减） -- //
			if($direct == 'left') {
				if(($y-1) >= 0 && $arr[$x][$y-1] == 0) {
					$arr[$x][--$y] = $i;
				} else {
					$direct = 'up';
				} 
			}
			// -- 向上（行坐标递减） -- //
			if($direct == 'up') {
				if(($x-1) >= 0 && $arr[$x-1][$y] == 0) {
					$arr[--$x][$y] = $i;
				} else  {
					$direct = 'right';

					/*重复向右移动的代码*/
					if(($y+1)<$num && $arr[$x][$y+1] == 0) {
						$arr[$x][++$y] = $i;
					} else {
						$direct = 'down';
					}
				}
			}
		}
	}

	// 根据二维数组输出矩阵
	$html = "<table border='1'>";
	// 循环行
	for($i=0; $i<$num; $i++) {
		$html .= "<tr>";
		// 循环列
		for($j=0; $j<$num; $j++) {
			$html .= "<td>";
			$html .= $arr[$i][$j];
			$html .= "</td>";
		}
		$html .= "</tr>";
	}
	$html .= "</table>";
	echo $html;
}

spiralMatrix(5);
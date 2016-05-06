<?php
header('Content-Type:text/html;charset=utf-8');

$arr = Array( 24, 59, 11, 30, 68, 22, 7, 36, 99, 5 );
print_r($arr);

/*选择排序*/
/*
  原理：
	第一次从R[0]~R[n-1]中选取最小值，与R[0]交换
	第二次从R[1]~R[n-1]中选取最小值，与R[1]交换
	第三次从R[2]~R[n-1]中选取最小值，与R[2]交换
	第n-1次从R[n-2]~R[n-1]中选取最小值，与R[n-2]交换
	总共通过n-1次，得到一个按排序码从小到大排列的有序序列
*/

function selectSort(&$arr){
	$len = count($arr);
	for($i=0;$i<$len-1;++$i){
		$minVal = $arr[$i];	//假设本次循环最小值
		$minKey = $i;		//假设本次循环最小索引
		
		echo '<p style="color:red">第'.($i+1).'次循环--假设'.$arr[$i].'为最小值<p>';

		for($k=$i+1;$k<$len;++$k){

			echo $arr[$k] . '&nbsp;&nbsp;';

			if($arr[$k]<$minVal){
				$minVal = $arr[$k];	//取得本次循环实际最小值
				$minKey = $k;		//取得本次循环实际最小索引
			}
		}
		
		echo '&nbsp;&nbsp;<span style="color:blue">实际最小值为'.$arr[$minKey].'，</span>';
		echo '&nbsp;&nbsp;与 '. $arr[$i]. ' 交换位置<hr/>';

		//将本次循环实际最小值与假设最小值交换位置
		if( $minKey != $i ){
			$temp = $arr[$minKey];
			$arr[$minKey] = $arr[$i];
			$arr[$i] = $temp;
		}
	}
}

selectSort($arr);

print_r($arr);
?>


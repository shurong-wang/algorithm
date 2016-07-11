<?php
header('Content-Type:text/html;charset=utf-8');
/*冒泡排序*/
/*
原理：
	1.总是相邻两个元素比较
	2.如果前一个元素大于后一个元素，则二者互换位置
	3.每次遍历结束都会把较大的元素后移
	4.所有遍历结束，元素便完成了从小到大排序
*/
function bubbleSort(&$arr){
	$len = count($arr);
    $tmp = null;
	$flag = true;
	for( $i=0,$len; $i<$len-1; $i++ ){
		echo '<p style="color:red">第'.($i+1).'次循环 ：$i = '.$i.'<p>';
		for( $j=0; $j<$len-1-$i; $j++ ){
			echo '$j = '. $j . '&nbsp;&nbsp;';
			if( $arr[$j] > $arr[$j+1] ){
				$flag = false;
				$tmp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
		if($flag){
			return;	
		}
	}
}

$arr = Array( 24, 59, 11, 30, 68, 22, 7, 36, 99, 5 );
bubbleSort($arr);

echo '<pre>';
print_r($arr);
echo '</pre>'
?>


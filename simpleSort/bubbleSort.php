<?php
header('Content-Type:text/html;charset=utf-8');
/*冒泡排序*/
/*
原理：
（1）总是相邻两个元素比较
（2）如果前一个元素大于后一个元素，则二者位置互换，这样就保证每次遍历都把较大的元素后移
（3）第一次循环，整个数组最大的元素值最终被赋给$arr[n]；
（4）第二次循环，$arr[n]不参与比较，$arr[n-1]成为最大元素
（5）第三次循环，$arr[n]，$arr[n-1]不参与比较，$arr[n-2]成为最大元素
（6）最终：$arr[0]...<$arr[n-2]<$arr[n-1]<$arr[n] 实现数组排序
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


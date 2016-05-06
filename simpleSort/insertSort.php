<?php
header('Content-Type:text/html;charset=utf-8');

$arr = Array( 24, 59, 11, 30, 68, 22, 7, 36, 99, 5 );
print_r($arr);
echo '<br/>';

/*插入排序*/
/*
  原理：
	（1）把n个待排序的元素看成为一个有序表和一个无序表
	（2）开始时有序表中只包含一个元素，无序表中包含有n-1个元素
	（3）排序过程中每次从无序表中取出第一个元素，把它的排序码依次与有序表元素的排序码进行比较
	（4）将它插入到有序表中的适当位置，使之成为新的有序表
*/

function insertSort(&$arr){
	$len = count($arr);
	
	//默认$arr[0]为有序表的第一个元素，其他元素为无序列表元素
	//此时有序表只有一个元素，等待元素插入

	//遍历无序列表，索引从1开始
	for( $i=1; $i<$len; $i++ ){

		//准备插入的元素为无序表中的 $arr[$i]
		$insertVal = $arr[$i];

		//准备插入的位置为有序表中的 $i-1
		$insertKey = $i-1;

		//如果准备插入的位置未到有序表的头部
		//并且准备插入位置上的元素大于准备插入的元素
		//则认为未找到合适的插入位置
		while( $insertKey>=0 && $arr[$insertKey]>$insertVal ){

			//此时将该位置上的元素后移
			$arr[$insertKey+1] = $arr[$insertKey];
			//同时，将准备插入的位置前移
			$insertKey--;
		}

		//直到准备插入位置上的元素小于等于准备插入的元素
		//或准备插入的位置已经移动到有序表的头部
		//则认为找到了合适的插入位置

		//此时向有序表插入该元素
		$arr[$insertKey+1] = $insertVal;
	}
}

insertSort($arr);
print_r($arr);
?>


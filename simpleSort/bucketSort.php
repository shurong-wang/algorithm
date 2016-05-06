<?php
header('Content-Type:text/html;charset=utf-8');
/*木桶排序*/
/*
原理：
（1）排序元素必须在固定范围内，比如0到100
（2）为范围内的可能出现的每个元素准备一个木桶
（3）木桶数量固定，有序排放--用索引数组表示
（4）木桶外面标记对应元素的值--数组索引
（5）木桶里面存放对应元素出现次数--索引出现次数，初始为0
（6）枚举排序元素，出现一次在木桶中记录一次--类似唱票话正字
（7）枚举结束，将空桶忽略，剩余木桶摆在一块就得到了有序元素
*/

$arr = Array( 83, 24, 59, 30, 68, 68, 41, 17, 36);
print_r($arr);
echo '<br/>';

function bucketSort($arr,$start,$end){

	//确定木桶数量（数组长度）
	$bucket_num = $end+1;

    //为每个排序元素准备一个木桶
	//将全部木桶装的元素初始化为0
	$bucket = array_fill(0, $bucket_num, 0);

	//遍历排序元素
	for( $i=0,$len=count($arr); $i<$len; $i++ ){
		//将排序元素的出现次数放进自己的木桶中
		++$bucket[$arr[$i]];
	}

//	var_dump($bucket);

	//开始从木桶中拿出元素
	$sortArr = Array();
	for( $bucket_index=$start; $bucket_index<$bucket_num; $bucket_index++ ){
		//$count=1表示只要装了元素出现次数的木桶的标识，不管空桶
		for( $count=1; $count<=$bucket[$bucket_index]; $count++ ){
			$sortArr[] = $bucket_index;
		}
	}
	return $sortArr;
}

$sortArr = bucketSort($arr,0,100);
print_r($sortArr);

?>

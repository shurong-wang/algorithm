<?php
header('Content-Type:text/html;charset = utf-8');
$arr  =  Array( 24, 59, 11, 30, 68, 22, 7, 36, 99, 5 );
print_r($arr);
echo '<hr/>';

/*快速排序*/
/*
  原理：
	选定数组的一个元素作为分叉点，以分叉点为界进行一轮排序
	将小于分叉点元素放到左边，将大于等于分叉点元素放到右边
	经过一轮排序，将要排序的元素分割成左右两个独立的部分
	同理，再将左右两边的元素分别进行快速排序
	如此递归，直到整个数组排列有序
	
  注意：
	（1）快速排序使用 二叉树+递归 实现
	（2）快速排序要消耗大量内存，以时间交换空间
	（3）如果偏重速度，同时设备配置足够，建议使用快速排序
*/

function quickSort($arr) {

  var_dump($arr);

  if (count($arr) > 1) {
    $middle = $arr[0];
    $left = array();
    $right = array();
    $len = count($arr);

    for ($i=1; $i<$len; $i++) {
      if ($arr[$i] <= $middle) {
        $left[] = $arr[$i];
      } else {
        $right[] = $arr[$i];
      }
    }
    $left = quickSort($left);	//递归向左分割，直到向左分割的子数组长度只剩一个元素
    $right = quickSort($right); //递归向右分割，直到向右分割的子数组长度只剩一个元素
	
	//每当分割到子数组只剩一个元素时，做一次合并
	//全部递归结束后，最终得到排列有序的数组
    return array_merge($left, array($middle), $right);

  } else {
	
	//结束层次递归
    return $arr;
  }
}

$newArr = quickSort($arr);
echo '<hr/>';
//print_r($newArr);























//$list = array(85, 24, 63, 45,55, 17, 31, 96, 50);
//print_r(qsort($list));
//function quickSort( &$arr, $start, $end ){
//	$left = $start;
//	$right = $end;
//	$middle = $arr[($start+$end)>>1]; //右移1位相当于除以2取整
//	
//	while( $left < $right ){
//		
//		while( $arr[$left] < $middle ) 
//			$left++;
//
//		while( $arr[$right] > $middle ) 
//			$right--;
//		
//		if( $left >= $right ) 
//			break;
//		
//		//左右交换位置
//		$arr[$left] = $arr[$left] ^ $arr[$right];
//		$arr[$right] = $arr[$left] ^ $arr[$right];
//		$arr[$left] = $arr[$left] ^ $arr[$right];
//		
//		if( $arr[$left] == $middle )
//			--$right;
//
//		if( $arr[$right] == $middle) 
//			++$left;
//					
//	}
//
//	if( $left == $right ){
//		 $left++;
//		 $right--;
//	}
//	
//	if( $start < $right )  
//		quickSort($arr,$start,$right);
//
//	if( $end > $left ) 
//		quickSort($arr,$left,$end);
//				
//}
//	
//quickSort( $arr, 0, count($arr)-1 );
//print_r($arr);

?> 
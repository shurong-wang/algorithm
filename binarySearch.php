<?php
header("Content-Type: text/html;charset=utf-8"); 

//--二分查找（又称折半查找）
// 注：只适用有序数组：索引连续不断，元素从低到高

/*在数组特定长度内里查找某个元素的位置*/
$arr = Array('A','B','C','D','E','F');

//二分查找（递归）
function binarySearch($arr, $elem, $start, $end ){ 
	if ($start <= $end){ 

		//确定中间元素的索引作为分叉节点的索引
		$mid = floor(($start+$end)/2); //取整

		if ($arr[$mid] == $elem){ 
			//如果要查找的元素等于叉节点的索引
			//则返回该索引，并结束查找
			return $mid; 

		}elseif ($elem < $arr[$mid]){	
			//如果要查找的元素小于叉节点的索引，则要查找元素在左侧
			//更新查询范围，递归调用二分查找
			return binarySearch($arr, $elem, $start, $mid-1); 

		}else{ 
			//如果要查找的元素等于叉节点的索引，则要查找元素在右侧
			//更新查询范围，递归调用二分查找
			return binarySearch($arr, $elem, $mid+1, $end); 
		}	
	}

    //如果开始索引大于了结束索引，说明在指定范围内未找到指定元素，返回-1
	return -1; 
} 

echo binarySearch($arr,'E',3,5).'<br/>';
echo '<hr/>';

//折半查找（迭代）
function halfSearch( $arr, $elem, $start, $end ){

   //如果开始索引小于等于结束索引，则继续循环查找
   while( $start <= $end  ){
	    //右移1位等价于除以2并取整
		$middle = ($start + $end) >> 1 ; //中间索引

		if( $arr[$middle] == $elem ){
			//如果中间索引元素正好是要查找的元素
			//则中间索引即查找元素的索引，返回索引并结束循环
			return $middle;

		}else if( $arr[$middle] < $elem ){
			//如果中间索引元素小于要查找的元素，则要查找元素在右侧
			//缩小查找范围，更新开始索引
			$start = $middle + 1;

		}else if( $arr[$middle] > $elem ){
			//如果中间索引元素大于要查找的元素，则要查找元素在做侧
			//缩小查找范围，更新结束索引
			$end = $middle - 1;
		}

		//下次循环时，更新中间索引
   }
	
   //如果开始索引大于了结束索引，则结束循环查找
   //循环结束没有找到元素的索引，返回-1
   return -1;
}

echo halfSearch($arr,'E',3,5).'<br/>';
echo '<hr/>';
	
?>
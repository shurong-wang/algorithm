<?php
header("Content-Type:text/html; charset=utf-8");

/*   
   一群猴子排成一圈，按1,2,...,n依次编号。  
   然后从第1只开始数，数到第m只,把它踢出圈，
   从它后面再开始数，再数到第m只，在把它踢出去...
   如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。  
   要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。
*/

//解法一：移动指针（性能低）
/** 
 * 将所有猴子编号放入数组 
 * 开始指针移动循环数组 
 * 判断是否只剩一个猴子：
 *	如果只剩一只猴子，则猴王诞生，结束循环；
 *	如果剩余多只猴子，则猴王未诞生，循环继续执行 
 * 判断是否数到第m只猴子：
 *	如果数到第m只，则踢出猴子，同时计数器归零
 *  如果没数到第m只，则循环继续往下执行
 * 每次数组循环结束（内部指针指向超出了数组末端），应该重置数组，继续下一轮的循环
 * 注意: 
 *	1. unset销毁数组元素，不更原数组键名（本方法需要保留数组键名）
 *	2. 多次调用count计算数组中的单元数目影响性能
 */   
function kickMonkey1( $n, $m ) {  
    $monkey = range( 1, $n );					//给猴子编号，生成数组  
      
    $counter = 0;								//计数器
    while( list($key, $val) = each($monkey) ) { //each - 返回数组中当前的键／值对，并将数组指针向前移动一步   
        if( count($monkey) == 1 ){				//剩最后一个猴子，即为猴王！
             return $val . '成为猴王!<br/>';  
        }  
          
        if( ++$counter == $m ){					//当前循环计数到了第m只猴子
            echo $monkey[$key] . '出局<br/>';  
            unset($monkey[$key]);				//将猴子踢出圈
            $counter = 0;						//计数器归零（指针不重置）
        }  
          
        if( !current($monkey) ){				//循环到头，指针指向超出了数组末端  
            reset($monkey);						//指针指向数组第一个元素（计数器不归零）
        }  
    }

}  
echo kickMonkey1(9,5);

echo '<p>----------------</p>';

//解法二：循环数组（性能低）
/**
 * array_shift()	//弹出数组首元素，返回该元素，重新排列数字索引
 */
function kickMonkey3($n, $m){
	$monkey = range( 1, $n );
    $counter = 0;
    while( count($monkey) > 0 ){
        $counter++;							//开始数数
        $remaining = array_shift($monkey);	//数到的猴子先出圈
        if( $counter < $m ){					
           $monkey[] = $remaining;			//不是第m只猴子，则回到圈中
        }else if( $counter == $m ){
			echo $remaining . '出局<br/>';
            $counter = 0;					//第m只猴子排除在圈外，重新开始数数
        }
    }
	echo $remaining . '成为猴王!<br/>';
    return $remaining;
}
kickMonkey3(9,5);

echo '<p>----------------</p>';

//解法三：数学模拟
function getMonkeyKing($n, $m){  
    $index = 0;  
    for( $i=2; $i<=$n; ++$i ){  
        $index = ( $index + $m ) % $i; 
    }
    return ( $index + 1 ) . '成为猴王！';  
}

echo getMonkeyKing(9,5);  

?>

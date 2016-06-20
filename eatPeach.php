<?php
header("Content-Type:text/html;charset=utf-8");
//--猴子吃桃
//	猴子摘了若干个桃子
//	第一天吃了一半，还不过瘾，又多吃了一个。
//	第二天早上又将剩下的桃子吃掉一半又多吃了一个。
//	以后每天早上都吃了前一天剩下的一半零一个。
//	到第十天早上再想吃时，就剩下1个桃子了。
//	试编程解决：第一天共摘了多少个桃子？

//思路：通过第二天的桃子数逆推出第一天的桃子数
//	P2 = P1/2 - 1; 
//	--> P2 + 1 = P1/2 
//	--> (P2 + 1) * 2 = P1; 
//	--> P1 = (P2 + 1) * 2;


//递归算法
//	递归的本质就是要找到相邻两个数据之间的关系代数式
function peaches($day,$peach){
	if($day==1){
		return $peach;
	}else{
		return peaches($day-1,($peach+1)*2);
	}
}
echo '递归--第一天摘了',peaches(10,1),'颗桃子<br/>';
echo '<hr/>';


//递归解法二： 
// 递推公式：f(n-1) = (f(n)+1)*2
function peaches2($n){
	if( $n == 10 ){
		return 1;
	}else{
		return ( peaches2($n+1) + 1 ) * 2 ;
	}
}

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

//递推算法
function eatPeach(){
	for( $day = 10; $day > 0; $day-- ){
		$peach = ($day==10) ? 1 : ($peach+1)*2;
	}
	return $peach;
}
echo '递推--第一天摘了',eatPeach(),'颗桃子<br/>';
echo '<hr/>';

//流程演示
function showPeach(){
	for( $day = 10; $day > 0; $day-- ){
		if( $day == 10 ){
			$peach = 1;
			echo '第',$day,'天剩',$peach,'颗桃子<br/>';
			continue;
		}
		$peach = ($peach + 1) * 2;
		echo '第',$day,'天剩',$peach,'颗桃子<br/>';
	}
	return $peach;
}
echo '<p>流程演示：</p>';
$p = showPeach();
?>
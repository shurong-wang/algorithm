<pre>
<?php
//斐波那契数列
/*
斐波那契数列，又称黄金分割数列，指的是这样一个数列：1、1、2、3、5、8、13、21、……在数学上，斐波纳契数列以如下被以递归的方法定义：F0=0，F1=1，Fn=F(n-1)+F(n-2)（n>=2，n∈N*）
*/

//使用迭代（递推）一：
function Fibonacci1($n){
	$arr[0] = 1;
	$arr[1] = 1;
	for( $k=2; $k<$n; $k++ ){
		$arr[$k] = $arr[$k-1] + $arr[$k-2];
	}
	return implode(' ',$arr);
}
echo Fibonacci1(13);

echo '<p>-------------------------------------</p>';

//使用迭代（递推）二：
function Fibonacci2($len){
	$n1 = 1;		//数列第一项
	$n2 = 1;		//数列第二项
	for($i=3;$i<=$len;$i++){
		//递推出数列的第n项
		$n = $n1 + $n2;

		//将数列后移，根据第n项更新第n项之前的两项
		$n1 = $n2;	//数列第n-1项
		$n2 = $n;	//数列第n-2项
	}
	return $n;
}
echo Fibonacci2(13);

echo '<p>-------------------------------------</p>';

//使用递归
function Fibonacci3($n){
	if( $n==1 || $n==2 ){
		return 1;
	} else{  
		return Fibonacci2($n-1) + Fibonacci2($n-2);  
	}  
}
echo Fibonacci3(13);

?>
</pre>
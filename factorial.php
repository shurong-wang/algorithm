<?php
header("Content-Type:text/html; charset=utf-8");

/*
 * 递归案例：求5的阶乘
 * 
 * 	5! = 5*4*3*2*1		5！= 5 * 4！
 * 	4! = 4*3*2*1		4！= 4 * 3！
 * 	3! = 3*2*1			3！ = 3 * 2！
 *  2! = 2*1			2！ = 2 * 1！ 
 *  1! = 1				1！ = 1
 *  
 *  分析：
 *  	递归的结束条件： 
 *  		1！ = 1
 *  	递归的规律：
 *  		n! = n * (n-1)! 
 */
 
//递归解法
function factorial($n){
	if($n<1){
		return 0;
	}
	if($n==1){
		return 1;
	}
	if($n>0){
		return $n*factorial($n-1);
	}
}

//递推解法
function factorial2($n){
	$f = 1;
	if($n<=1){
		return 0;
	}
	for($i=2;$i<=$n;$i++){
		$f *= $i;
	}
	return $f;
}


echo factorial(5);
//echo factorial2(5);


?>
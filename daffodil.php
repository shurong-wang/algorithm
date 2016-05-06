<?php
header("Content-Type:text/html; charset=utf-8");

/*
水仙花数是指一个n位(n>=3)数，它的每个位上的数字的n次幂之和等于它本身（例如：153=1³+5³+3³ ）。
*/
//打印1000以内的水仙花数
function daffodil(){
	for( $n=100; $n<1000; $n++ ){
		$x = substr($n,0,1);
		$y = substr($n,1,1);
		$z = substr($n,2,1);

		$x3 = pow($x,3);
		$y3 = pow($y,3);
		$z3 = pow($z,3);
		
		$sum = $x3 + $y3 + $z3;

		if( $sum == $n ){
			echo $sum . " ";
		}
	}
}
daffodil();

echo '<p>--------------------------------</p>';

//简化代码
// str_split(string,length) 把字符串分割到数组中,length规定每个数组元素的长度
// list(var1,var2...)  用数组中的元素为一组变量赋值
function daffodil2(){
	for( $n=100; $n<1000; $n++ ){ 
		list( $n3, $n2, $n1 ) = str_split( $n, 1 );
		$daffodil = pow( $n3, 3 ) + pow( $n2, 3 ) + pow( $n1, 3 );
		if( $n == $daffodil ) {
				echo $n . " ";
		}
	}
}
daffodil2();

echo '<p>--------------------------------</p>';

//打印$num以内的水仙花数
function daffodil3( $num ){
	if( strlen($num) < 3 ){		//水仙花数至少有3位数
		exit('没有找到水仙花数!');
	}
	for( $n=100; $n<=$num; $n++ ){
		$arr = str_split( $n, 1 );
		for( $k=0, $daffodil=0; $k<strlen($n); $k++ ){
			$daffodil += pow( $arr[$k], strlen($n) );
		}
		if( $n == $daffodil ) {
			echo $n . " ";
		}
	}
}
daffodil3( 10000 );

?>

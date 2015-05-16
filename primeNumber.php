<?php
/*
素数（prime number）又称质数：一个大于1的自然数，除了1和它本身外，不能被其他自然数整除（除0以外）称之为素数（质数）；否则称为合数
*/
//求素数
function getPrimeNumber( $n ) {
	$prime = array();
	for( $num=2; $num<=$n; $num++ ){
		$counter = 0 ; 
		for( $j=1; $j<=$num/2; $j++ ){
			if( $num%$j == 0 ){
				$counter ++ ;	//统计$num被整除次数
			}
		}
		if( $counter <= 2 ){    //$num最多被整除2次(1和自身)
			$prime[] = $num ;	//构建质数数组
		}
	}
	return $prime ; 
}

echo '<pre>';
print_r( getPrimeNumber(100) ) ;
echo '</pre>';
?>
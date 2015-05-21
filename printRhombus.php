<pre>
<meta charset="utf-8" />
<!-- 打印 金字塔/菱形 -->
<h5>1. 打印实心三角形：</h5>
<?php
/*
思路分析:
1. 需两层循环，外层循环控层数，内部两个循环，分别控制空格和星号
2. 内部第一个循环控制空格数（空格数=总层数-当前层数），空格打印数量递减
3. 内部第二个循环控制星号数（金字塔：星号数=(当前层数*2-1)；正三角：星号数=当前层数
*/
function pyramid($len=5){
	for( $y=1; $y<=$len; $y++ ){ //循环递增遍历
		//打印空格
		for( $x=$len-$y; $x>0; $x-- ){ //空格递减打印
		   echo "&nbsp;";
		}
		//打印*号
		for( $x=1; $x<=2*$y-1; $x++ ){
			echo "*";
		}
		echo "<br/>";
	}
}
pyramid(5);
?>

<h5>2. 把三角形刨空</h5>
<?php
/*
思路分析: 
1. 顶层和底层打印全部星号
2. 其他的层只打印首星号和尾星号
*/
function kongSanjiao($len=5){
	for( $y=1; $y<=$len; $y++ ){
		for( $x=$len-$y; $x>0; $x-- ){
			echo "&nbsp;";
		}
		for( $x=1; $x<=2*$y-1; $x++ ){
			if( $y==1 || $y==$len){			//打印第一行和最后一行的所有*号
				echo "*";
			}else{
				if( $x==1 || $x==2*$y-1){	//只打印当前行首星号和尾星号  
					echo "*";
				}else{
					echo "&nbsp;";
				}
			}
		}
		echo "<br/>";
	}
}
kongSanjiao(5);
?>

<h5>3. 把三角形倒转</h5>
<?php
/*
思路分析:
1. 倒三角空格打印数量递增
2. 将循环改为递减遍历即可
*/
function daoSanjiao($len=5){
	for( $y=$len; $y>0; $y-- ){	//循环递减遍历
		for( $x=1; $x<=$len-$y; $x++ ){ //空格递增打印
			echo "&nbsp;";
		}
		for( $x=1; $x<=2*$y-1; $x++ ){
			echo "*";
		}
		echo "<br/>";
	}
}
daoSanjiao(5);
?>

<h5>4. 把倒三角形刨空</h5>
<?php
function daokongSanjiao($len=5){
	for( $y=$len; $y>0; $y--	){
		for( $x=1; $x<=$len-$y; $x++ ){
			echo '&nbsp;';
		}
		for( $x=1; $x<=2*$y-1; $x++){
			if( $y==$len || $y==1 ){
				echo '*';
			}else{
				if( $x==2*$y-1 || $x==1 ){
					echo '*';
				}else{
					echo '&nbsp;';
				}
			}
		}
		echo '<br/>';
	}
}
daokongSanjiao($len=5);
?>

<h5>5. 打印实心菱形</h5>
<?php
/*
思路分析:
1. 外层需要两个循环，第一个循环打印正三角，第二个循环打印倒三角
2. 打印倒三角的循环减去第一层，公用正三角的最后一层
*/
function lingxing($len=5){
	//第一个循环打印正三角
	for( $y=0; $y<=$len; $y++ ){	
		for( $x=$len-$y; $x>0; $x-- ){
			echo '&nbsp;';
		}
		for( $x=0; $x<2*$y-1; $x++ ){
			echo '*';
		}
		echo '<br/>';
	}
	//第二个循环打印倒三角
	for( $y=$len-1; $y>0; $y-- ){ //循环减去第一层，公用正三角的最后一层
		for( $x=1; $x<=$len-$y; $x++ ){
			echo '&nbsp;';
		}
		for( $x=2*$y-1; $x>0; $x-- ){
			echo '*';
		}
		echo '<br/>';
	}
}
lingxing(5);
?>

<h5>6. 打印空心菱形</h5>
<?php
/*
思路分析:
1. 正三角与倒三角公用的一层不再打印星号
*/
function kongLingxing($len=5){
	for( $y=1; $y<=$len; $y++ ){
		for( $x=$len-$y; $x>0; $x-- ){
			echo '&nbsp;';
		}
		for( $x=1; $x<=2*$y-1; $x++ ){
			if( $y==1 ){
				echo '*';
			}else{
				if( $x==1 || $x==2*$y-1 ){
					echo '*';
				}else{
					echo '&nbsp;';
				}
			}
		}
		echo '<br/>';
	}
	for( $y=$len-1; $y>0; $y-- ){
		for( $x=1; $x<=$len-$y; $x++ ){
			echo '&nbsp;';
		}
		for( $x=2*$y-1; $x>0; $x-- ){
			if( $y==$len ){ //正三角与倒三角公用的一层不再打印星号
				echo '*';
			}else{
				if( $x==1 || $x==2*$y-1 ){
					echo '*';
				}else{
					echo '&nbsp;';
				}
			}
		}
		echo '<br/>';
	}
}
kongLingxing(5);
?>

<h5>7. 打印等边倒三角形</h5>
<?php
/*
打印等边倒三角形
*/
function daoSanjiao2($len=5){
	for( $y=1; $y<=$len; $y++ ){
		for( $x=1; $x<$y; $x++){
			echo("&nbsp;");
		}
		
		for( $x=$y; $x<=$len; $x++ ){
			/*
				$x=$y的解释：
				1.随着外层循环的执行,$y递增
				2.将$y赋值给$x,$x也随着外层循环的递增
				3.因为$x最大值为$len不变，从而实现打印星号递减

			*/
			echo("* ");
		}
		echo ("<br/>");
	}
}
daoSanjiao2(5);
?>
</pre>
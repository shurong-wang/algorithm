<?php
/*
* 人民币大写及小写转化类
* author zj  
* add:2018-04-03
*/

class RmbTurn { 
    public $cnNumber = array(
        '一'=>1,
        '二'=>2,
        '三'=>3,
        '四'=>4,
        '五'=>5,
        '六'=>6,
        '七'=>7,
        '八'=>8,
        '九'=>9,
        '十'=>10,
        '壹'=>1,
        '贰'=>2,
        '叁'=>3,
        '肆'=>4,
        '伍'=>5,
        '陆'=>6,
        '柒'=>7,
        '捌'=>8,
        '玖'=>9,
        '拾'=>10,
        '亿'=>100000000,
        '万'=>10000,
        '千'=>1000,
        '仟'=>1000,
        '百'=>100,
        '佰'=>100,
        '角'=>0.1,
        '分'=>0.01,
        '○'=>0,
        'Ｏ'=>0,
        '零'=>0,
    );

    /**
     * 中文大写数字转阿拉伯数字
     * @param 要转换的中文大写名称
     * @return double or int
     */
    public function cnNumerToArabic($cnn,$flag=true){
        $cnn = trim($cnn);
        if(mb_strlen($cnn)==1){
            return $this->isCNNumeric($cnn);
        }

        if ($flag) {
            $cnn = str_replace('佰', '百', $cnn);
            $cnn = str_replace('仟', '千', $cnn);
            $cnn = str_replace('拾', '十', $cnn);
            $cnn = str_replace('零', ' ', $cnn);
            $cnn = str_replace('整', ' ', $cnn);
            $cnn = str_replace("圆零","元", $cnn);
            $cnn = str_replace("元零","元", $cnn);
            $cnn = str_replace('圆', '元', $cnn);
        }
        
        $yi = $wan = $qian = $bai = $shi = $yuan = $jiao = $fen = -1;
        $val = 0;
        $yi = mb_strpos($cnn,'亿');
        if($yi > -1){
            $val += $this->cnNumerToArabic(mb_substr($cnn,0,$yi),false) * 100000000;
            if($yi < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$yi+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
            
            if(mb_strlen($cnn) == 1){
                $arbic = $this->isCNNumeric(mb_substr($cnn,0,1));
                if($arbic <= 10){
                    $val += $arbic * 10000000;
                    $cnn = "";
                }
            }
        }

        $wan = mb_strpos($cnn,'万');
        if($wan > -1){
            $val += $this->cnNumerToArabic(mb_substr($cnn,0,$wan),false) * 10000;
            if($wan < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$wan+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
            
            if(mb_strlen($cnn) == 1){
                $arbic = $this->isCNNumeric(mb_substr($cnn,0,1));
                if($arbic <= 10){
                    $val += $arbic * 1000;
                    $cnn = "";
                }
            }
        }

        $qian = mb_strpos($cnn,'千');
        if($qian > -1){
            $val += $this->cnNumerToArabic(mb_substr($cnn,0,$qian),false) * 1000;
            if($qian < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$qian+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
            
            if(mb_strlen($cnn) == 1){
                $arbic = $this->isCNNumeric(mb_substr($cnn,0,1));
                if($arbic <= 10){
                    $val += $arbic * 100;
                    $cnn = "";
                }
            }
        }

        $bai = mb_strpos($cnn,'百');
        if($bai > -1){
            $val += $this->cnNumerToArabic(mb_substr($cnn,0,$bai),false) * 100;
            if($bai < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$bai+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
            
            if(mb_strlen($cnn) == 1){
                $arbic = $this->isCNNumeric(mb_substr($cnn,0,1));
                if($arbic <= 10){
                    $val += $arbic * 10;
                    $cnn = "";
                }
            }
        }

        $shi = mb_strpos($cnn,'十');
        if($shi > -1){
            if($shi == 0){
                $val += 1*10;
            }else{
                $val += $this->cnNumerToArabic(mb_substr($cnn,0,$shi),false) * 10;
            }
            
            if($shi < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$shi+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
        }

        $yuan = mb_strpos($cnn,'元');
        if ($yuan > -1) {
            if ($yuan == 0){
                $val += 0;
            }else{
                $val += $this->cnNumerToArabic(mb_substr($cnn,0,$yuan),false);
            }

            if($yuan < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$yuan+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
        }

        $jiao = mb_strpos($cnn,'角');
        if($jiao > -1){
            if($jiao == 0){
                $val += 1*0.1;
            }else{
                $val += $this->cnNumerToArabic(mb_substr($cnn,0,$jiao),false) * 0.1;
            }
            
            if($jiao < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$jiao+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
        }

        $fen = mb_strpos($cnn,'分');
        if($fen > -1){
            if($fen == 0){
                $val += 1*0.01;
            }else{
                $val += $this->cnNumerToArabic(mb_substr($cnn,0,$fen),false) * 0.01;
            }
            
            if($fen < mb_strlen($cnn)-1){
                $cnn = mb_substr($cnn,$fen+1,mb_strlen($cnn));
            }else{
                $cnn = "";
            }
        }

        $cnn = trim($cnn);
        for($j = 0; $j < mb_strlen($cnn); $j++){
            $val += $this->isCNNumeric(mb_substr($cnn,$j,1)) * pow(10,mb_strlen($cnn)-$j-1);
        }

        return $val;
    }

     /**
     * 检查是不是中文大写数字
     * @param $str
     * @return boolean true yes and false for not.
     */
    public function isCNNumeric($str) {
        if(!$str) return -1;
        $cnNumber = $this->cnNumber;
        return $cnNumber[$str];
    }

 }

 $rmbTurn = new RmbTurn();

 $str = '壹仟陆佰捌拾捌元玖角玖分';
 $num = $rmbTurn->cnNumerToArabic($str);
 var_dump($num);

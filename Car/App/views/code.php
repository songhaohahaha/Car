<?php
 class code{
    public $width =100;
    public $height = 30;
    public $lette = '1234567890qwertyuiopasdfghjklzxcvbnm';
    public $lineNum = 4;
    public $pxNum =20;
    public $img;
    public $fontFile = 'msyh.ttf';
    public $result;
    /*
     * 创建一张图片
     * 画线
     * 画点
     * 产生严重码
     * 画文字
     * 输出
     * */
    /*创建图片*/
    function create(){
        /*创建真彩色图片*/
        $this->img = imagecreatetruecolor($this->width,$this->height);
        $arr = $this->bgColor();
        $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
        imagefill($this->img,0,0,$color);
    }
    /*创建干扰元素*/
    function drawLine(){
        for($i=0;$i<$this->lineNum;$i++){
            $arr=$this->bgColor();
            $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            $x1 = mt_rand(0,$this->width/2);
            $y1 = mt_rand(0,$this->height/2);
            $x2 = mt_rand($this->width/2,$this->width);
            $y2 = mt_rand($this->height/2,$this->height);
            if($i>=$this->lineNum/2){
                imageline($this->img,$x2,$y1,$x1,$y2,$color);
            }else{
                imageline($this->img,$x1,$y1,$x2,$y2,$color);
            }
            for($i=0;$i<$this->pxNum;$i++){
                $arr=$this->bgColor();
                $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
                $x = mt_rand(0,$this->width);
                $y = mt_rand(0,$this->height);
                imagesetpixel($this->img,$x,$y,$color);
            }

        }

    }
    function drawText(){
        $x = $this->width/4;
        $y = $this->height/2;
        $result = $this->getChars();
        for($i=0;$i<4;$i++){
           $arr = $this->textColor();
           $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            imagettftext($this->img,mt_rand(14,20),mt_rand(-15,15),$x*$i+5,mt_rand($y+5,$y+10),$color,$this->fontFile,substr($result,$i,1));
        }

    }
    function getChars(){
        $len = strlen($this->lette)-1;
        $str = '';
        for($i=0;$i<4;$i++){
            $str .= substr($this->lette,mt_rand(0,$len),1);
        }
        $this->result = strtolower($str);
            return $str;
    }
    function bgColor(){
        $arr = [];
        $arr[0] = mt_rand(0,107);
        $arr[1] = mt_rand(0,107);
        $arr[2] = mt_rand(0,107);
        return $arr;
    }
    function textColor(){
        $arr = [];
        $arr[0] = mt_rand(108,255);
        $arr[1] = mt_rand(108,255);
        $arr[2] = mt_rand(108,255);
        return $arr;
    }
    function output(){
        header('Content-type:image/png');
        $this->create();
        $this->drawLine();
        $this->drawText();
        imagepng($this->img);
        imagedestroy($this->img);
    }
 }
 $code =new code();
 $code->output();
 session_start();
 $_SESSION['code'] = $code->result;
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EasyCode
 *
 * @author Rajib
 */
class EasyCode {

    public function init() {
        
    }

    public function loadStatusDropdownOptions() {
        return array('1' => 'Enable', '0' => 'Disable');
    }

    public function getLastSortingNumber($model, $col) {
        $model = new $model;
        $getLastSort = $model->findBySql('select max(' . $col . ') as ' . $col . ' from `' . $model->tableName() . '`');
        return $getLastSort[$col] + 1;
    }

    public function getStatusOptions($all = '') {
        if ($all == '')
            return array('1' => 'Enable', '0' => 'Disable');
        else
            return array('' => $all, '1' => 'Enable', '0' => 'Disable');
    }

    public function getStatus($status) {
        if ($status == '1')
            $val = '<span class="btn btn-success btn-sm">Enabled</span>';
        else
            $val = '<span class="btn btn-danger btn-sm">Disabled</span>';
        return $val;
    }

    public function genPass($pass) {
        return md5($pass);
    }

    public function genFileName($ext) {
        $file = time() . rand(1, 999) . '.' . $ext;
        $path = UPLOAD . '/' . $file;
        if (!file_exists($path))
            return $file;
        else
            $this->genFileName($ext);
    }

	 public function showReturnOriginalImage($file, $type = 'path') {
        if ($file != '') {
            if (strpos($file, '/') !== false) {
                $path = HOME . '' . $file;
                $img = $file;
            } else {
                $path = UPLOAD . '/' . $file;
                $img = '/upload/' . $file;
            }

            if (file_exists($path)) {
                if ($type == 'path')
                    return Yii::app()->params->SITE_URL . $img;
            }else{
                return '';
            }
        }
    }
    public function showOriginalImage($file, $type = 'path') {
        if ($file != '') {
            if (file_exists(UPLOAD . '/' . $file)) {
                if ($type == 'path')
                    echo Yii::app()->request->baseurl . '/upload/' . $file;
            }else{
                echo $file;
            }
        }
    }
    
    public function showOriginalImageReturn($file, $type = 'path') {
        if ($file != '') {
            if (file_exists(UPLOAD . '/' . $file)) {
                if ($type == 'path')
                    return Yii::app()->request->baseurl . '/upload/' . $file;
            }else{
                return $file;
            }
        }
    }

    public function showImage($file, $width, $height, $retunImg = true, $crop = true, $longside = true) {
        if ($longside) {
            $option = array(
                'width' => $width,
                'height' => $height,
                //'link' => '#',
                'hint' => 'false',
                'crop' => $crop,
                //'sharpen' => 'true',
                //'longside' => $width,
                // Any $htmlOptions that can be used in CHtml::image()
                'imgOptions' => array('class' => 'thumb_image opt1 img-responsive'),
                'imgAlt' => $file,
            );
        } else {
            $option = array(
                'width' => $width,
                'height' => $height,
                //'link' => '#',
                'hint' => 'false',
                'crop' => $crop,
                //'sharpen' => 'true',
                //'longside' => $height,
                // Any $htmlOptions that can be used in CHtml::image()
                'imgOptions' => array('class' => 'thumb_image opt2 img-responsive'),
                'imgAlt' => $file,
            );
        }

        if (strpos($file, '/') !== false)
            $path = $file;
        else
            $path = UPLOAD . '/' . $file;
        
        if ($file != '' && file_exists($path)) {
            return Yii::app()->thumb->render($path, $option, $retunImg);
        } else {
            return Yii::app()->thumb->render(UPLOAD . '/noimage.jpg', $option, $retunImg);
        }
        

        /*if ($file != '') {
            if (file_exists($path)) {
                try {
                    return @Yii::app()->thumb->render($path, $option, $retunImg);
                } Catch (Exception $e) {
                    return '';
                }
            }else{
                if($retunImg)
                    return '<img src="'.$path.'" class="img-responsive"/>';
                else
                    return $path;
            }
        }*/
    }

    public function deleteFile($file) {
        if ($file != '' && file_exists(UPLOAD . '/' . $file)) {
            if($file!='noimage.jpg')
                unlink(UPLOAD . '/' . $file);
        }
    }

    public function showNotification() {
        $var = '';
        if (Yii::app()->user->hasFlash('success')) {
            $var .= '<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' . Yii::app()->user->getFlash('success') . '</div>';
        }
        if (Yii::app()->user->hasFlash('error')) {
            $var .= '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> ' . Yii::app()->user->getFlash('error') . '</div>';
        }
        if (Yii::app()->user->hasFlash('warning')) {
            $var .= '<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> ' . Yii::app()->user->getFlash('warning') . '</div>';
        }
        return $var;
    }

    public function isActive($routes = array(), $module, $id, $controller) {
        $routeCurrent = '';
        if ($module !== null) {
            $routeCurrent .= sprintf('%s/', $module->id);
        }
        $routeCurrent .= sprintf('%s/%s', $id, $controller);
        foreach ($routes as $route) {
            $pattern = sprintf('~%s~', preg_quote($route));
            if (preg_match($pattern, $routeCurrent)) {
                return true;
            }
        }
        return false;
    }

    public function ShowBanglaDate($str) {
        
        /*$time = strtotime(date("Y-m-d H:i:s", strtotime($str)));
        if($time>=strtotime(date("Y-m-d 09:00:00", strtotime($time))) && $time<=strtotime(date("Y-m-d 02:59:59", strtotime($time))))
            $ext='রাত';
        else if($time>='03:00:00' && $time<='05:59:59')
            $ext='ভোর';
        else if($time>='06:00:00' && $time<='08:59:59')
            $ext='সকাল';
        else if($time>='09:00:00' && $time<='11:59:59')
            $ext='বেলা';
        else if($time>='12:00:00' && $time<='14:59:59')
            $ext='দুপুর';
        else if($time>='15:00:00' && $time<='17:59:59')
            $ext='বিকাল';
        else
            $ext='সন্ধ্যা';*/
        
        $eng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
            'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
            'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
            'am', 'pm');
        $bng = array('জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
            'জানু', 'ফেব্রু', 'মার্চ', 'এপ্রি', 'মে', 'জুন', 'জুলা', 'আগ', 'সেপ্টে', 'অক্টো', 'নভে', 'ডিসে',
            'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার',
            'শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ', 'শুক্র',
            '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০',
            'am', 'pm');
        return $goTime = str_ireplace($eng, $bng, $str);
        //return str_replace('am',$ext,$goTime);
    }
    
    function seoUrl($string) {
        $sstring=$string;
        //Lower case everything
        
        //Make alphanumeric (removes all other characters)
        if(ctype_alnum($string)){
            $string = strtolower($string);
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            //Clean up multiple dashes or whitespaces
            $string = preg_replace("/[\s-]+/", " ", $string);
            //Convert whitespaces and underscore to dash
            $string = preg_replace("/[\s_]/", "-", $string);
        }else{
            $string = str_replace('  ','-',$string);
            $string = str_replace(' ','-',$string);
            $string = str_replace('_','-',$string);
            $string = str_replace('.','-',$string);
        }
        $string = stripslashes($string);
        $string = preg_replace("|/|", "", $string);
        if(strpos($string,'-')==false)
            $string = $string.'-asianmailbd';
        return urlencode($string);
    }

}

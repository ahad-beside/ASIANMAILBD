<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        //Cusutm Variable
        public $pageDescription='';
        public $pageKeyword = '';
        public $ogUrl='';
        public $ogTitle='';
        public $ogDescription='';
        public $ogImage='';
        
        public function init() {
        //Yii::app()->easycode->chkMobileDevice();
        $detect = Yii::app()->mobileDetect;

        if(isset($_GET['device'])){
            Yii::app()->session['device']=CHtml::encode($_GET['device']);
        }
        
        if ($detect->isMobile() || $detect->isTablet()) {
            $geturl = $_SERVER['REQUEST_URI'];
            
            $pos = strpos($geturl, '/mobile', 0);
            $admin = strpos($geturl, '/admin', 0);
            $site = strpos($geturl, '/site', 0);
            if (trim($pos) === '') {
                if (trim($admin) == '0') {
                    return true;
                }
                else if (trim($site) == '0') {
                    return true;
                }
                else if(isset(Yii::app()->session['device']) && Yii::app()->session['device']=='desktop'){
                    return true;
                }else{
                    Yii::app()->session['device'] = 'mobile';
                    $location = Yii::app()->createAbsoluteUrl('//mobile' . $geturl);

                    echo "<script>parent.location='" . $location . "'</script>";
                }
            } else {

            }
        }
    }

}
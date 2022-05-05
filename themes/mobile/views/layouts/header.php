<html lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <meta name="revisit-after" content="1 day">
<meta content="Online News Paper" http-equiv="Classification">
<meta content="Bangladesh" http-equiv="Location">
<meta content="<?php echo CHtml::encode($this->pageDescription); ?> asianmailbd is a fast growing online newspaper dedicated to disseminate the voice of root level oppressed people, Bengali culture and up-to-date news from Bangladesh" name="description">
<meta content="<?php echo CHtml::encode($this->pageKeyword); ?> name="keywords">

<meta property="og:url" content="<?= ($this->ogUrl != '') ? CHtml::encode($this->ogUrl) : 'http://www.asianmailbd.com' ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= ($this->ogTitle != '') ? CHtml::encode($this->ogTitle) : CHtml::encode($this->pageTitle) ?>" />
<meta property="og:description" content="<?= ($this->ogDescription != '') ? CHtml::encode($this->ogDescription) : CHtml::encode($this->pageDescription) ?>" />
<meta property="og:image" content="<?= ($this->ogImage != '') ? CHtml::encode($this->ogImage) : Yii::app()->request->baseUrl . '/images/logo.png' ?>" />
        
        <script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <meta charset utf="8">

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/font-awesome.min.css"> 
        <!--bootstrap-->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--coustom css-->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <!--component-css-->

        <!--accordian menu css-->
        <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/accordian-menu.css" rel="stylesheet" type="text/css"/>
        <!--accordian menu-css-->

        <!--default-js-->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery-2.1.4.min.js"></script>
        <!--bootstrap-js-->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bootstrap.min.js"></script>
        <!--script-->
        <!--bootstrap-js-->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/accordian-menu.js"></script>
        
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/jquery.simpleWeather.min.js"></script>
        
        
        <!--script-->
        <script>
            $(document).ready(function () {
                var monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];
                var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

                var newDate = new Date();
                newDate.setDate(newDate.getDate() + 1);
                $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
            });
        </script>

        <!--script for navigation-->
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/bigSlide.js"></script>
        <script>
        $(document).ready(function () {
            $('.menu-link').bigSlide();
        });
        </script>
        
        <script type="text/javascript">
			$(document).ready(function() {
  $.simpleWeather({
    location: 'Dhaka, BD',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      html = '<p>'+weather.temp+'&deg;'+' সে</p>';
  
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
});
		</script>
        
	<!--slider start-->	    
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/slider-assets/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/slider-assets/owl.theme.css" rel="stylesheet">
    
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider-assets/owl.carousel.js"></script>
    <style>
	.slidertitle {
    margin-top: -37px;
    position: absolute;
    width: 100%;
}
.slidertitle h2{
    background:rgba(102,102,102,0.7)!important;
    color: #fff;
    font-size: 21px;
    line-height: 30px;
    padding: 6px;
}
    #owl-demo .item{
        padding: 0px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }
    .customNavigation {
     position: relative;
    text-align: center;
    z-index: 2147483647;
	}
	
    .customNavigation a{
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    </style>

    <script>
    $(document).ready(function() {

      var owl = $("#owl-demo");

      owl.owlCarousel({

      items : 1, //10 items above 1000px browser width
      itemsDesktop : [1000,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
       autoPlay: 12000,  
        stopOnHover : true,

      });
	  
	  var owl2 = $("#owl-demo2");

      owl2.owlCarousel({

      items : 1, //10 items above 1000px browser width
      itemsDesktop : [1000,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	  
	  
	//  slideSpeed : 800,
        autoPlay: 12000,
        
        stopOnHover : true,

      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      
    });
    </script>
        
    </head>
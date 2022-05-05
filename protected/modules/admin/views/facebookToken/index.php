<br><br><br><br><br>
<?php
if (Yii::app()->user->hasFlash('success')) {
    echo iYii::app()->user->getFlash('warning');
}

if(isset($data['accessToken']) && !$data['accessToken']->isExpired())
    echo 'Facebook Auto Post Enabled';
else
    echo "<a href='".$data["fbloginurl"]."'>Log in with Facebook!</a>";

echo "<br><a href='".$data["fbloginurl"]."'>Log in with Facebook!</a>";
?>


<div class="row open_page">
    <div class="col-md-12 custom-page-header">
        <div class="col-md-6"><h2>Change Password</h2></div>
    </div>

    <div class="col-md-12"><?php echo Yii::app()->easycode->showNotification(); ?></div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Password
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo $this->createUrl('changePassword')?>" class="inner-form">
                <div class="col-md-4 col-md-offset-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="Password[current]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="Password[new]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Re-Type New Password</label>
                            <input type="password" name="Password[re]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

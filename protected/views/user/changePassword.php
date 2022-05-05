<h2 class="page-title">Change Password</h2>
<form method="post" action="<?php echo $this->createUrl('changePassword')?>" class="inner-form">
    <table class="form-table gu12">
        <tr>
            <td class="label">Current Password</td>
            <td class="input"><input type="password" name="Password[current]"></td>
        </tr>
        <tr>
            <td class="label">New Password</td>
            <td class="input"><input type="password" name="Password[new]"></td>
        </tr>
        <tr>
            <td class="label">Re-Type New Password</td>
            <td class="input"><input type="password" name="Password[re]"></td>
        </tr>
        <tr>
            <td class="label">&nbsp;</td>
            <td class="input buttons"><input type="submit" name="submit" value="Change Password" class="btn-success"></td>
        </tr>
    </table>
</form>
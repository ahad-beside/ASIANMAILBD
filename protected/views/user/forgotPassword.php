<h2 class="page-title">Change Password</h2>
<form method="post" action="<?php echo $this->createUrl('forgotPassword')?>">
    <input type="hidden" name="Password[forgot_pass_code]" value="<?php echo $_GET['link']?>">
    <table class="form-table gu12">
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
            <td class="input"><input type="submit" name="submit" value="Set Password"></td>
        </tr>
    </table>
</form>
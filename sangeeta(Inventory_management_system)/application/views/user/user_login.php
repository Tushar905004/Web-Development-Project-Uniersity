<div class="login_panel" style="background:url(<?php echo base_url();?>images/login_user.jpg) no-repeat;">
<form action="<?php echo base_url(); ?>user/login" method="post">
    <center>
        <table style="margin-top: 190px; margin-bottom:50px" >
        <tr>
            
            <td><input type="text" class="login_input" name="user_name" required="1"></td>
        </tr>
        <tr>
            
            <td><input type="password" class="login_input1" name="password"  required="1"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="image" src="<?php echo base_url(); ?>images/go.gif" class="login_submit"">
            </td>
        </tr>
    </table>
        </center>
</form>

    <div style="margin-left:103px;">
    <?php if(isset($_SESSION['successMessage'])) {
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        } ?>
    <?php if(isset($_SESSION['errMessage'])) {
            echo $_SESSION['errMessage'];
            unset($_SESSION['errMessage']);
        } ?>
    </div>
</div>
<h3>Login Panel</h3><hr style="background-color: red; color:purple;"><br>
<form action="<?php echo base_url();?>admin/loginCheek" method="post">
    <table>
        <tr>
            <td>User Name:</td><td><input type="text" name="user_name" required></td>
        </tr>
        <tr>
            <td>Password:</td><td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Login"></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php

                if(isset($_SESSION['exception'])) {
                    echo $_SESSION['exception'];
                    unset($_SESSION['exception']);
                }
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </td>
        </tr>
    </table>
</form>

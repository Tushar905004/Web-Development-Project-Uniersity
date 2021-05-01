<?php
include "design.php";
echo $top;
?>
<style type="text/css">
    #err_span
    {
        float: left;
        border: 1px solid #DF775C;
        width:96%;
        padding: 3px;
        border-radius:3px;
    }
    .war_icon{
        float: left;
        background-image: url('../images/Error.png');
        width: 26px;
        height: 26px;
        margin-right: 3px;
    }
    .text_err
    {
        font-weight: bold;
        color: #cd0a0a;
        padding: 4px 0 0 0;
    }
    #succ_span
    {
        float: left;
        border: 1px solid #00748f;
        width:96%;
        padding: 3px;
        border-radius:5px;
    }
    .succ_icon{
        float: left;
        background-image: url('../images_institute/yes.png');
        width: 16px;
        height: 16px;
        margin-right: 7px;
    }
    .text_succ
    {
        font-weight: bold;
        color: #078416;
        padding: 4px 0 0 0;
        font-size: 12px;
    }
</style>
<div id="midel">
    <form action="login_action.php" id="login" method="post">
        <h1>Log In</h1>
        <fieldset id="inputs">
            <input id="username" type="text" name="user_name" placeholder="User Name" autofocus required="1" /> 
            <input id="password" type="password" name="password" placeholder="password" required="1" />
           
        </fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" value="Log in" /> 
            <a href="">Forgot your password?</a>
            <a href="">Register</a>
        </fieldset>
         <?php
                    if (isset($_SESSION['exception'])) {
                        echo "<div id='err_span'><div class='war_icon'></div><span class='war_span'><p class='text_err'> User Name or Password Invalid !</p></span></div><br><br>";
                        unset($_SESSION['exception']);
                    }
                    ?>
    </form>  
</div>
<?php
echo $bottom;
?>
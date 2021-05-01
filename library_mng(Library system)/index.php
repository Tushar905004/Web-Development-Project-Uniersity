<html>
    <head>
        <title>fci book store</title>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body>

        <div id="wrap">

            <div class="header">
                <div id="menu">
                    <ul>
                        <li class="selected"><a href="index.php">Home</a></li>
                        <li><a href="books.php">books</a></li>
                        <li ><a href="#">Specials books</a></li>
                        <li><a href="login.php">Login</a>
                        <li><a href="#">My accout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>

                    <input id="input" type="text" name="search" placeholder="Search.....">
                    <input type="submit"  value="go">

                </div>
            </div>



        <div id="center">
            <div id="left">



                <div class="left_box">

                    <div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div>

                    <ul class="list">
                        <li><a href="#">Islamic</a></li>
                        <li><a href="#">Mathematics</a></li>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Networking</a></li>
                        <li><a href="#">Genarl knolage</a></li>
                        <li><a href="#">Accounting</a></li>
                        <li><a href="#">communication</a></li>
                        <li><a href="#">Related subject</a></li>

                        <li><a href="#">Language</a></li>
                        <li><a href="#">Story book</a></li>
                        <li><a href="#">specials</a></li>
                    </ul>


                </div>
                <img src="images/border.gif" width="150px">

            </div>


            <div id="midel">


                <div id="books">
                    <div class="head">Product name</div>                    
                    <a href="#"><img id="naz" src="images/java.jpg" width="110" height="130" /></a>

                </div>

                <div id="books">
                    <div class="head">Product name</div>  
                    <a href="#"><img id="naz" src="images/images1.jpg" width="110" height="130"/></a>

                </div>

                <div id="books">
                    <div class="head">Product name</div>  
                    <a href="#"><img id="naz" src="images/images2.jpg" width="110" height="130"/></a>

                </div>


                <div id="books">
                    <div class="head">Product name</div>  
                    <a href="#"><img id="naz" src="images/images.jpg" width="110" height="130"/></a>

                </div>

                <div id="books">
                    <div class="head">Product name</div>  
                    <a href="#"><img id="naz" src="images/csbook.jpg" width="110" height="130"/></a>

                </div>

                <div id="books">
                    <div class="head">Product name</div>  
                    <a href="#"><img id="naz" src="images/big_pic.jpg" width="110" height="130"/></a>
                </div>

            </div>






            <div id="right">
                <div id="right_user_login">
                    <center><font size="+2">Login Panel</font></center>

                </div>

                <div id="user_login">
                    <form action="login.php" method="post">
                        <strong>
                            <center>
                                <font color="#CC0000" size="+1" class="name">User Name:</font>

                        </strong>
                        <br>
                        <input type="text" name="name" placeholder='Name......'>
                        <br>
                        <strong>
                            <font size="+1" color="#CC0000">Password:</font>
                        </strong>
                        <br>
                        <input type="password" name="password" placeholder='pass....'>
                        <br>
                        <input type="submit" name="send" value="login">
                        <input type="reset">
                        <br>

                    </form>
                </div>
            </div>




            <div id="footer">
                <ul>
                    <li><a href="#">Home</a></li>|
                    <li><a href="#">About Us</a></li>|
                    <li><a href="#">Books</a></li>|
                    <li><a href="#">Special Books</a></li>|
                    <li><a href="#">Contact</a></li>|
                    <li><a href="#">Prices</a></li>|
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>

        </div>
        </div>



    </body>
</html>
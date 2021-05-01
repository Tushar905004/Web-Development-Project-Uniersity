<!DOCTYPE HTML>
<html>
    <head>
        <title>Inventory Management System</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
        <!-- modernizr enables HTML5 elements and feature detects -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr-1.5.min.js"></script>
        <!-- multi insert-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/multi_insert.js"></script>
        <!--------date picker css and js---->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/jsDatePick.min.1.3.js"></script>
    </head>


    <body>
        <div id="main">
            <header>
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><span class="logo_colour">সংগীতা ইলেকট্রনিক্স</span></h1>
                        <h2>Sangeeta Electronics, Parshuram, Feni</h2>
                        <font style="font-size: 8px; float: left; color: white;">
                        <?php
                        if($this->session->userdata('shop_name')){
                            echo $this->session->userdata('shop_name');
                        }
                                ?>

                        </font>
                    </div>
                </div>
                <nav>
                    <ul class="sf-menu" id="nav">
                        <?php if ($this->session->userdata('user_id')) {
                            ?>
                        <li class="selected"><a href="<?php echo base_url(); ?>user/user_home"><span>Home</span></a></li>
                        <li><a href="#"><span>Product</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>user/sendGodown"><span>Send Godown</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/sendStock"><span>Send Stock</span></a></li>
                            </ul>

                        </li>


                        <li><a href="#"><span>Product Sell</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>user/product_sell"><span>Sell</span></a></li>

                            </ul>

                        </li>

                        <li><a href="#"><span>Instalment</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>#"><span>Memo</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#"><span>View Memo</span></a></li>

                            </ul>

                        </li>

                        <li><a href="#"><span>Servicing</span></a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>#"><span>Order Receive</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#"><span>Order Delivery</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#"><span>Product View</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#"><span>Search</span></a></li>

                            </ul>
                        </li>


                        <li><a href="#"><span>Balance-sheet</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>#"><span>Income</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#"><span>Expend</span></a></li>
                            </ul>

                        </li>

                        <li><a href="#"><span>Total</span></a></li>
                        <li><a href="<?php echo base_url() ?>user/logout"><span>Logout</span></a></li>
                    </ul>


                        <?php } else if
                    ($this->session->userdata('admin_id')) {
                        ?>
                    <li class="selected">
                        <a href="<?php echo base_url(); ?>admin/admin_home">Home</a></li>
                    <li><a href="#">Employee</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/Registration"><span>Employee Registation</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/password_recovery"><span>Password Recavery</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/ViewEmployee"><span>View Employee</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/sallery"><span>Sallery</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#">My Account</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/add_account"><span>Add Account</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/view_account"><span>View Account</span></a></li>
                        </ul>

                    </li>
                    <li><a href="#">Add Shop</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/addshop"><span>Add Shop</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/viewshop"><span>View Shop</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#">Vendor</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/add_vendor"><span>Add vendor</span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/view_vendor"><span>View Vendor</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#">Product Buying</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/product_buying"><span>Add </span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/view_product"><span>View</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#">Product Category</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>admin/product_category"><span>Add </span></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/viewProductCategory"><span>View</span></a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url() ?>"><span> Transection</span></a>
                        <ul>
                            <li><a href="<?php echo base_url() ?>"><span> Daily</span></a>
                            <li><a href="<?php echo base_url() ?>"><span> Monthly</span></a>
                            <li><a href="<?php echo base_url() ?>"><span> Yearly</span></a>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url() ?>"><span> Exchange</span></a></li>

                    <li><a href="<?php echo base_url() ?>admin/bonus"><span> Bonus</span></a></li>


                        <?php } else {?>
                    <li><a href="<?php echo base_url() ?>welcome"><span>Home</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/index"><span>Admin Panel</span></a></li>
                    <li><a href="<?php echo base_url(); ?>user/index"><span>User Panel</span></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </header>
            <div id="site_content">
                <?php
                if(!($this->session->userdata('user_id')|| $this->session->userdata('admin_id'))) { ?>

                <div class="gallery">
                    <ul class="images">
                        <li class="show"><img width="950" height="200" src="<?php echo base_url(); ?>images/1.jpg" alt="photo_one" /></li>
                        <li><img width="950" height="200" src="<?php echo base_url(); ?>images/2.jpg" alt="photo_two" /></li>
                        <li><img width="950" height="200" src="<?php echo base_url(); ?>images/3.jpg" alt="photo_three" /></li>
                    </ul>
                </div>
                    <?php } ?>

                <div class="content">
                    <?php echo $maincontent; ?>
                </div>


            </div>
            <footer>
                <p>Copyright &copy;2012&nbsp;
                    <a href="<?php echo base_url() ?>admin/logout"><span>Logout</span></a>
	  Design &amp; Developed By:Softworld Ltd. <sup></sup> .<br>
	  Email Address: softworld2011@yahoo.com &nbsp;&nbsp; |&nbsp;&nbsp;
                    Web Address: www.softworldbd.co.cc
                </p>

            </footer>
</div>
            <p>&nbsp;</p>
            <!-- javascript at the bottom for fast page loading -->
            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing-sooper.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.sooperfish.js"></script>
            <script type="text/javascript" src="js/image_fade.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('ul.sf-menu').sooperfish();
                });
            </script>
    </body>
</html>

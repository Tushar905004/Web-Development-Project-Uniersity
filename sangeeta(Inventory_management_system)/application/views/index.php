<!DOCTYPE HTML>
<html>
    <head>
        <title>Inventory Management System</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>sangeeta.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
        <!-- modernizr enables HTML5 elements and feature detects -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr-1.5.min.js"></script>
        <!-- multi insert-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/multi_insert.js"></script>
        <!--------date picker css and js---->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/jsDatePick.min.1.3.js"></script>
		<script type="text/javascript">
		function successMsg(){
		alert("Backup Successfull");
		}
		</script>
    </head>


    <body>
        <div id="main">
            <header>
                <div id="logo">
<?php          if($this->session->userdata('shop_name')) { ?>
                    <div style="float: right;width: 160px; height: 73px;
                         background: -moz-linear-gradient(#FFF7BF, #BDD291);
    background: -o-linear-gradient(#003366, #006699);
    background: -webkit-linear-gradient(#003366, #006699); border-radius:7px;">
                        <span style="font-weight:bold; float: left; color:white; margin: 8px 5px 8px 13px;"><b style="color: #ccccff; text-decoration: underline; margin: 3px; float: left;">Shop Name:</b><br>
<?php echo $this->session->userdata('shop_name');  ?>
                        </span>
                    </div> <?php } ?>
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <img src="<?php echo base_url(); ?>images/logo.jpg" alt="photo_two" height="" width="" style="border-radius:19px;"/>
                        <h4 style="color:#FFF7BF;  font-weight: bold; font-size: 14px; font-family: Times;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feni, Hoqe Tower, Feni</h4>
                    </div>
                </div>
                <nav>
                    <ul class="sf-menu" id="nav">
                        <?php if ($this->session->userdata('user_id')) {
                            ?>
                        <li class="selected"><a href="<?php echo base_url(); ?>user/user_home"><span>Home</span></a></li>
                        <li><a href="#"><span>Godown</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>user/sendGodown"><span>Add Godown</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_godown"><span>View / Edit / Delete</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_godown_all"><span>View all Godown</span></a></li>
                            </ul>

                        </li>
                        <li><a href="#"><span>Stock</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>user/sendStock"><span>Send Stock</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_stock"><span>View / Edit / Delete</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_stock_all"><span>View all Stock</span></a></li>
                            </ul>

                        </li>


                        <li><a href="#"><span>Product Sell</span></a>

                            <ul>

                                <li><a href="<?php echo base_url(); ?>user/product_sell"><span>Sell Order</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/product_sell_memo"><span>Sell &amp; Memo</span></a></li>

                            </ul>

                        </li>

                        <li><a href="#"><span>Other Income/Expend</span></a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>user/add_income"><span>Entry Income</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_income"><span>View Income</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/add_expend"><span>Entry Expend</span></a></li>
                                <li><a href="<?php echo base_url(); ?>user/view_expend"><span>View Expend</span></a></li>

                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>user/view_memo"><span>Instalment</span></a></li>
                        <li><a href="<?php echo base_url(); ?>user/quick_sell"><span>Quick Sell</span></a></li>
                        <li><a href="<?php echo base_url(); ?>user/src_memo"><span>Memo Search</span></a></li>
                        <li><a href="<?php echo base_url(); ?>user/fixed_customer"><span>Fixed Cust</span></a></li>
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
                            <li><a href="<?php echo base_url(); ?>admin/password_recovery"><span>Password Recovery</span></a></li>
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
                    <li><a href="#">Product Buy</a>
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
                        <li><a href="#"><span>Report</span></a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>admin/daily_report"><span>Daily</span></a></li>
                                <li><a href="<?php echo base_url(); ?>admin/monthly_report"><span>Monthly</span></a></li>
                                <li><a href="<?php echo base_url(); ?>admin/yearly_report"><span>Yearly</span></a></li>
                            </ul>
                        </li>
                    <li><a href="<?php echo base_url() ?>admin/create_customer"><span>fixed customer</span></a>
                        <ul>
                            <li><a href="<?php echo base_url() ?>admin/create_customer"><span> Create </span></a>
                            <li><a href="<?php echo base_url() ?>admin/view_customer"><span> View / edit / delete</span></a>
                        </ul>
                    </li>

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
                        <li class="show"><img width="950"src="<?php echo base_url(); ?>images/1.jpg" alt="photo_one" /></li>
                        <li><img width="950"  src="<?php echo base_url(); ?>images/2.jpg" alt="photo_two" /></li>
                        <li><img width="950"  src="<?php echo base_url(); ?>images/3.jpg" alt="photo_three" /></li>
                        <li><img width="950"  src="<?php echo base_url(); ?>images/4.jpg" alt="photo_three" /></li>
                    </ul>
                </div>
                    <?php } ?>

                <div class="content">
                    <?php echo $maincontent; ?>
                </div>


            </div>
            <footer>
                <p>Copyright &copy;Sangeeta Electronic &nbsp;
<?php          if($this->session->userdata('user_id')) {?>
                    <a href="<?php echo base_url() ?>user/logout"><span>Logout</span></a>
                    <?php } else if($this->session->userdata('admin_id')){?>
                    <a href="<?php echo base_url() ?>admin/logout"><span>Logout</span></a> | 
                    <a href="<?php echo base_url() ?>admin/backup" onClick="successMsg();"><span>BackUp</span></a>
                    <?php } ?>
	  Design &amp; Developed By:TUSHAR DEB NATH.<br>
	  Email Address: tushardebnath1992@gmail.com&nbsp;|Mob No: 01673120191/01938279480.
                </p>

            </footer>
        </div>
        <p>&nbsp;</p> 
        <!-- javascript at the bottom for fast page loading  -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing-sooper.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.sooperfish.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/image_fade.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('ul.sf-menu').sooperfish();
            });
        </script>
    </body>
</html>
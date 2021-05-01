<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- CSS -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-print.css" type="text/css" media="print" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
<title>Feni Computer Institute | MCQ System</title>
</head>
<body>
	<div id="wrapper">

		<!-- Header -->
		<div id="header">

			<!-- Your website name  -->
			<h1><a href="#">Feni Computer Institute</a></h1>
			<!-- Your website name end -->

			<!-- Slogan for your blog -->
			<h2>Feni,Bangladesh</h2>
			<!-- Slogan for your blog end -->

			<!-- Search form -->
			<form class="searching" action="">
			<fieldset>
				<label></label>
					<div id="picture-input">
						<input type="text" class="search" onfocus="if(this.value==this.defaultValue)this.value=''"
						onblur="if(this.value=='')this.value=this.defaultValue" value="Search&hellip;" />
					</div>
						<input class="hledat" type="image" src="<?php echo base_url(); ?>image/search-button.gif" name="" value="Search" alt="Search" />
			</fieldset>
			</form>
			<!-- Search form end -->


			<!-- Menu -->
  <nav>
        <ul class="sf-menu" id="nav">
                <li id="active"><a href="<?php echo base_url(); ?>welcome/index">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/Exam">Exam Test<span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/admin_login">Admin Panel<span class="tab-l"></span><span class="tab-r"></span></a></li>
        </ul>
      </nav>
			<!-- Menu end -->

		</div>
		<!-- Header end -->


<hr class="noscreen" />

<div id="skip-menu"></div>

	<!-- Content  -->
	<div id="content">

		<!-- Content box -->
		<div id="content-box">

			<!-- Content box left -->
			<div id="content-box-left">

				<div id="content-box-left-in">

					<!-- Content box with light blue background -->
					<div class="box">
					<div class="box-top">
					<div class="box-bottom">
						<div id="box-in">
							<div class="article">

<?php echo $maincontent; ?>
							</div>
						</div>
					</div>
					</div>




					</div>
					<!-- Content box with light blue background end -->

					<div class="paging" title="">
					</div>

				</div>
			</div>
			<!-- Content box left end -->

			<!-- Content box right -->

				<!-- Content box right end -->
				<div class="cleaner">&nbsp;</div>

			</div>
			<!-- Content box end -->

		</div>
		<!-- Content end -->

<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer">
		<div id="footer-in">
                    <p>Developed By : Fci 4th batch</p>
               
		</div>
	</div>
	<!-- Footer end -->

</div>

  <!-- javascript at the bottom for fast page loading -->
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
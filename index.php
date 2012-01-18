<?php
// No direct access.
defined('_JEXEC') or die;
?>
<!DOCTYPE html>
<html>
	<head>
			<jdoc:include type="head" />
			<!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" /> -->
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/960_24_col.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/stylesheet.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery.treeview.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery-ui-1.8.6.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/style.css" type="text/css" media="screen,projection" />
			
			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/prodinfo.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery.treeview.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery-ui-1.8.6.min.js"></script>
	</head>

	<body>
	
		<div id="bodyWrapper" class="container_24">
			<div id="header" class="grid_24">
				<div id="storeLogo">
					<a href="/">
						<img src="/templates/fpp/images/logo.png" alt="Ifsta" />
					</a>
				</div>
				<div id="HeaderRight">
					<jdoc:include type="modules" name="navbar" style="navbar" />
					<div style="clear: both; float: right; margin-top: 35px;">
						<jdoc:include type="modules" name="topright" style="nothing" />
					</div>
				</div>
			</div>
			<div class="grid_24 ui-widget infoBoxContainer">
					<jdoc:include type="modules" name="content-top" style="normal" />
			</div>
			
			<div id="bodyContent" class="grid_16 push_4">
				<jdoc:include type="message" />
                <jdoc:include type="component" />
			</div>
			
			<div id="columnLeft" class="grid_4 pull_16">
				<jdoc:include type="modules" name="left" style="normal" />
			</div>
			
			<div id="columnRight" class="grid_4">
				<jdoc:include type="modules" name="right" style="normal" />
			</div>
			
			<div class="grid_24 footer">
				<p align="center">Copyright &copy; 2012 <a href="http://ifsta.org/">Ifsta</a>
				<br />Powered by <a href="http://www.beardon.com" target="_blank">Beardon Services, Inc.</a>
				</p>
			</div>
		
		
		</div>
		<script language="javascript" type="text/javascript">
			$(function(){
				$(".navbar ul").buttonset({icons: {primary: "ui-icon-home"}});
				$('.navbar ul li a:contains("Home")').button( "option", "icons", {primary:'ui-icon-home'});
				$('.navbar ul li a:contains("Products")').button( "option", "icons", {primary:'ui-icon-tag'});
				$('.navbar ul li a:contains("Resource")').button( "option", "icons", {primary:'ui-icon-lightbulb'});
				$('.navbar ul li a:contains("News")').button( "option", "icons", {primary:'ui-icon-script'});
				$('.navbar ul li a:contains("Research")').button( "option", "icons", {primary:'ui-icon-help'});
				$('.navbar ul li a:contains("E-Learning")').button( "option", "icons", {primary:'ui-icon-star'});
				$('.navbar ul li a:contains("About Us")').button( "option", "icons", {primary:'ui-icon-person'});
			});
		</script>
	</body>
</html>
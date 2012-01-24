<?php
// No direct access.
defined('_JEXEC') or die;
?>
<!DOCTYPE html>
<html>
	<head>
			<!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" /> -->
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/960_24_col.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/stylesheet.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery.treeview.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery-ui-1.8.6.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/style.css" type="text/css" media="screen,projection" />
			
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
					<div style="clear: both; float: right; margin-top: 35px;">
					</div>
				</div>
			</div>
			
			<div id="bodyContent" class="grid_16 push_4">
				
				<div class="error">
					<h2><?php echo "Error ".$this->error->getCode()." : ".$this->error->getMessage() ?></h2>
					<p>An error has occured. The page you're looking for may have been moved or deleted, or the site could be experiencing technical issues.</p>
					<p><a href="/">Return to Index</a></p>
				</div>

			</div>

			
			<div class="grid_24 footer">
				<p align="center">Copyright &copy; 2012 <a href="http://ifsta.org/">Ifsta</a>
				<br />Powered by <a href="http://www.beardon.com" target="_blank">Beardon Services, Inc.</a>
				</p>
			</div>
		
		
		</div>

	</body>
</html>

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
			<script type="text/javascript" src="/templates/fpp/js/chapterlists.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery.treeview.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery-ui-1.8.6.min.js"></script>
			
			<script type="text/javascript" src="/templates/fpp/jss/jquery.timers.js"></script>
			<script type="text/javascript" src="/templates/fpp/jss/jquery.slideshow.js"></script>
			<link rel="stylesheet" type="text/css" href="/templates/fpp/jss/jss.css" />
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
					<jdoc:include type="modules" name="content-top" style="breadcrumbs" />
			</div>
			
			<div id="bodyContent" class="grid_16 push_4">
				<jdoc:include type="message" />
                <jdoc:include type="component" />
			</div>
			
			<div id="columnLeft" class="grid_4 pull_16">
				<jdoc:include type="modules" name="left" style="normal" />
				<jdoc:include type="modules" name="leftmenu" style="nothing" />
			</div>
			
			<div id="columnRight" class="grid_4">
				<jdoc:include type="modules" name="right" style="normal" />
			</div>

            
            <div class="grid_24" id="footer">

                <div class="grid_5">
                    <p align="center">
                        <a href="http://www.okstate.edu/" target="_blank">
                            <img src="/images/icons/tb_okst.png" alt="Oklahoma State University Main Website">
                        </a>
                        <a href="http://mars.ifsta.org/" target="_blank">
                            <img src="/images/icons/tb_fpplog.png" alt="OSU Fire Protection Publications Main Website">
                        </a>
                    </p>
                </div>

                <div class="grid_4 push_15">
                    <p align="center">
                        <a href="http://www.facebook.com/ifsta" target="_blank">
                            <img src="/images/icons/tb_bfook.png" alt="IFSTA Facebook Page">
                        </a>
                        <a href="https://twitter.com/#!/IFSTA" target="_blank">
                            <img src="/images/icons/tb_twif.png" alt="IFSTA Twitter Account">
                        </a>
                    </p>
                </div>

                <div class="grid_24 footer">
                    <p align="center">© COPYRIGHT 2012, THE BOARD OF REGENTS, OKLAHOMA STATE UNIVERSITY. ALL RIGHTS RESERVED</p>
                </div>

            </div>
		
		
		</div>
		<script language="javascript" type="text/javascript">
			$(function(){
				$(".navbar a.hidden:parent").remove();
                $(".button").button();
				if($("ul#slideshow")) {
					$("ul#slideshow").slideshow();
				}
			});
		</script>
	</body>
</html>
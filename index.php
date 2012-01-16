<?php
/**
 * @version                $Id: index.php 21518 2011-06-10 21:38:12Z chdemko $
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

?>
<!DOCTYPE html>
<html>
        <head>
                <jdoc:include type="head" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/style.css" type="text/css" media="screen,projection" />
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
				<script type="text/javascript" src="/templates/fpp/js/prodinfo.js"></script>
        </head>

        <body>

<div id="all">

	<div id="head">
		<div id="banner">
			<img src="/templates/fpp/images/header.jpg" alt="IFSTA" />
		</div>
		
		<div id="navbar">
			<jdoc:include type="modules" name="navbar" />
		</div>
	</div>
	
	
	<div id="left">
		<jdoc:include type="modules" name="left" />
	</div>
	
	
	<div id="content">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<div style="clear: both;"></div>
	</div>
	
	
	<div id="footer">
		<jdoc:include type="modules" name="foot" />
	</div>
</div>


        </body>
</html>

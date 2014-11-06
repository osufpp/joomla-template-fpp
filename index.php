<?php
// No direct access.
defined('_JEXEC') or die;
?>
<!DOCTYPE html>
<html>
	<head>
<?php
if ($_SERVER['REQUEST_URI'] === '/fdic-ipad-giveaway') {
echo '<meta name="robots" content="noindex">' . "\n";
}
$config =& JFactory::getConfig();
?>
			<jdoc:include type="head" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/960_24_col.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/stylesheet.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery.treeview.css" type="text/css" media="screen,projection" />
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/jquery-ui-1.8.6.css" type="text/css" media="screen,projection" />

			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery.treeview.js"></script>
			<script type="text/javascript" src="/templates/fpp/js/jquery-ui-1.8.6.min.js"></script>

			<script type="text/javascript" src="/templates/fpp/jss/jquery.timers.js"></script>
			<script type="text/javascript" src="/templates/fpp/jss/jquery.slideshow.js"></script>
            <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/fpp/css/style.css" type="text/css" media="screen,projection" />
            <script type="text/javascript" src="/templates/fpp/js/scripts.js"></script>
            <link rel="stylesheet" type="text/css" href="/templates/fpp/jss/jss.css" />
            <script type="text/javascript" src="/templates/fpp/js/GA_download_outbound_links.js"></script>
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $config->getValue('ga_account_id'); ?>']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
        })();
      </script>

	</head>

	<body>

		<div id="bodyWrapper" class="container_24">
			<div id="header" class="grid_24">
				<div id="storeLogo">
					<a href="https://shop.ifsta.org/">
						<img src="/templates/fpp/images/logo.png" alt="Ifsta" />
					</a>
				</div>
				<div id="HeaderRight">
						<jdoc:include type="modules" name="topright" style="nothing" />
				</div>
			</div>
			<div class="grid_24 ui-widget infoBoxContainer navbar">
                <div class="my_icon">
                    <a href="http://my.ifsta.org/">
                        <img src="/templates/fpp/images/My_IFSTA_small.png" alt="myIfsta" />
                    </a>
                </div>
                <jdoc:include type="modules" name="navbar" style="navbar" />
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


            <div class="grid_24" id="footer">

                <div class="grid_5">
                    <p align="center" style="float: left;">
                        <a href="http://www.okstate.edu/" target="_blank">
                            <img src="/images/icons/tb_okst.png" alt="Oklahoma State University Main Website">
                        </a>
                        <a href="http://info.ifsta.org/" target="_blank">
                            <img src="/images/icons/tb_fpplog.png" alt="OSU Fire Protection Publications Main Website">
                        </a>
                    </p>
                </div>

                <div class="grid_5 push_14">
                    <p align="center" style="float: right;">
                        <a href="http://www.facebook.com/ifsta" target="_blank">
                            <img src="/images/icons/tb_bfook.png" alt="IFSTA Facebook">
                        </a>
                        <a href="https://twitter.com/#!/IFSTA" target="_blank">
                            <img src="/images/icons/tb_twif.png" alt="IFSTA Twitter">
                        </a>
                        <a href="http://www.linkedin.com/company/ifsta" target="_blank">
                            <img src="/images/icons/tb_dinklin.png" alt="IFSTA LinkedIn">
                        </a>
                    </p>
                </div>

                <div class="grid_24 footer">
                    <p align="center">© COPYRIGHT 2013, THE BOARD OF REGENTS, OKLAHOMA STATE UNIVERSITY. ALL RIGHTS RESERVED.</p>
                </div>

            </div>

		</div>
        <div id="hidden" style="display: none;">
            <jdoc:include type="modules" name="hidden" style="normal" />
        </div>

	</body>
</html>

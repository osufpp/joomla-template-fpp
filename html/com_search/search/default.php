<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	com_search
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<div class="search<?php echo $this->pageclass_sfx; ?>">
<h1>Search Results</h1>
	<div class="ui-widget infoBoxContainer">
	
<?php //if ($this->params->get('show_page_heading', 1)) : ?>
<div class="ui-widget-header ui-corner-top infoBoxHeading">
<h1>

</h1>
</div>
<?php //endif; ?>
		<div class="ui-widget-content ui-corner-bottom infoBoxContents">
<?php 
	
//echo $this->loadTemplate('form'); ?>
<?php if ($this->error==null && count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; 
?>
		</div>
	</div>
</div>

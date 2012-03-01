<?php
/**
 * @version		$Id: default.php 22355 2011-11-07 05:11:58Z github_bot $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>


<div class="ui-widget infoBoxContainer">
	<div class="ui-widget-header ui-corner-top infoBoxHeading">
		<?php
		$item = &$list[0];
			// Render the top menu item as the header.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;
		?>
	</div>
	<div class="ui-widget-content ui-corner-bottom infoBoxContents">
<ul class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>


<?php
foreach ($list as $i => &$item) :
	if($list[$i] != $list[0])
	{
		$class = 'item-'.$item->id;
		if ($item->id == $active_id) {
			$class .= ' current';
		}

		if (	$item->type == 'alias' &&
				in_array($item->params->get('aliasoptions'),$path)
			||	in_array($item->id, $path)) {
			$class .= ' active';
		}

		if ($item->deeper) {
			$class .= ' deeper';
		}
		
		if ($item->shallower || $i == end(array_keys($list))) {
			$class .= ' last';
		}
		
		if ($item->parent) {
			$class .= ' parent';
		}

		if (!empty($class)) {
			$class = ' class="'.trim($class) .'"';
		}

		if($list[$i] != $list[0])
		echo '<li'.$class.'>';

		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;

		// The next item is deeper.
		if ($item->deeper) {
			echo '<ul>';
		}
		// The next item is shallower.
		elseif ($item->shallower) {
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else {
			echo '</li>';
		}
	}
endforeach;
?>

</ul>
</div>
</div>

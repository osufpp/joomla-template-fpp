<?php
/**
 * @version		$Id: default_items.php 22338 2011-11-04 17:24:53Z github_bot $
 * @package		Joomla.Site
 * @subpackage	mod_articles_categories
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
foreach ($list as $item) :
$class = 'class="';
if ($_SERVER['PHP_SELF'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) $class .= 'active';
if($item == $list[end(array_keys($list))]) $class .= ' last"';
$class .= '"';
?>
	<li <?php if($class != 'class=""') { echo $class; } ?>> <?php $levelup=$item->level-$startLevel -1; ?>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
			<span>
				<?php echo $item->title;?>
			</span>
		</a>
	

		<?php
		if($params->get('show_description', 0))
		{
			echo JHtml::_('content.prepare',$item->description, $item->getParams());
		}
		if($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && count($item->getChildren()))
		{

			echo '<ul>';
			$temp = $list;
			$list = $item->getChildren();
			require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default').'_items');
			$list = $temp;
			echo '</ul>';
		}
		?>
 </li>
<?php endforeach; ?>
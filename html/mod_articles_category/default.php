<?php
/**
 * @version		$Id: default.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	mod_articles_category
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="category-module<?php echo $moduleclass_sfx; ?> treeview">
<?php if ($grouped) : ?>
	<?php foreach ($list as $group_name => $group) : ?>
	<li <?php>
		<h<?php echo $item_heading; ?>><?php echo $group_name; ?></h<?php echo $item_heading; ?>>
		<ul>
			<?php foreach ($group as $item) : ?>
				<li>
					<h<?php echo $item_heading+1; ?>>
					   	<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php echo $item->title; ?>
				        <?php if ($item->displayHits) :?>
							<ul class="mod-articles-category-hits">
								<li>
				            (<?php echo $item->displayHits; ?>)  
								</li>
							</ul>
				        <?php endif; ?></a>
				        <?php else :?>
				        <?php echo $item->title; ?>
				        	<?php if ($item->displayHits) :?>
							<ul class="mod-articles-category-hits">
								<li>
				            (<?php echo $item->displayHits; ?>)  
								</li>
							</ul>
				        <?php endif; ?></a>
				            <?php endif; ?>
			        </h<?php echo $item_heading+1; ?>>


				<?php if ($params->get('show_author')) :?>
					<ul class="mod-articles-category-writtenby">
						<li>
					<?php echo $item->displayAuthorName; ?>
						</li>
					</ul>
				<?php endif;?>

				<?php if ($item->displayCategoryTitle) :?>
					<ul class="mod-articles-category-category">
						<li>
					(<?php echo $item->displayCategoryTitle; ?>)
						</li>
					</ul>
				<?php endif; ?>
				<?php if ($item->displayDate) : ?>
					<ul class="mod-articles-category-date">
						<li>
					<?php echo $item->displayDate; ?>
						</li>
					</ul>
				<?php endif; ?>
				<?php if ($params->get('show_introtext')) :?>
			<p class="mod-articles-category-introtext">
			<?php echo $item->displayIntrotext; ?>
			</p>
		<?php endif; ?>

		<?php if ($params->get('show_readmore')) :?>
			<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
				<?php if ($item->params->get('access-view')== FALSE) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
						if ($params->get('show_readmore_title', 0) != 0) :
							echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
						endif;
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :

						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
					endif; ?>
	        </a>
			</p>
			<?php endif; ?>
		</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
<?php else : ?>
	<?php foreach ($list as $item) : ?>
	    <li <?php if($item == $list[end(array_keys($list))]) echo ' class="last"'; ?>>
	   	<h<?php echo $item_heading; ?>>
	   	<?php if ($params->get('link_titles') == 1) : ?>
		<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
		<?php echo $item->title; ?>
        <?php if ($item->displayHits) :?>
			<ul class="mod-articles-category-hits">
				<li>
            (<?php echo $item->displayHits; ?>)  
				/li>
			</ul>
        <?php endif; ?></a>
        <?php else :?>
        <?php echo $item->title; ?>
        	<?php if ($item->displayHits) :?>
			<ul class="mod-articles-category-hits">
				<li>
            (<?php echo $item->displayHits; ?>)  
				</li>
			</ul>
        <?php endif; ?></a>
            <?php endif; ?>
        </h<?php echo $item_heading; ?>>

       	<?php if ($params->get('show_author')) :?>
       		<ul class="mod-articles-category-writtenby">
				<li>
			<?php echo $item->displayAuthorName; ?>
				</li>
			</ul>
		<?php endif;?>
		<?php if ($item->displayCategoryTitle) :?>
			<ul class="mod-articles-category-category">
				<li>
			(<?php echo $item->displayCategoryTitle; ?>)
				</li>
			</ul>
		<?php endif; ?>
        <?php if ($item->displayDate) : ?>
			<ul class="mod-articles-category-date">
				<li>
				<?php echo $item->displayDate; ?>
				</li>
			</ul>
		<?php endif; ?>
		<?php if ($params->get('show_introtext')) :?>
			<p class="mod-articles-category-introtext">
			<?php echo $item->displayIntrotext; ?>
			</p>
		<?php endif; ?>

		<?php if ($params->get('show_readmore')) :?>
			<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
		        <?php if ($item->params->get('access-view')== FALSE) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :
						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					endif; ?>
	        </a>
			</p>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
<?php endif; ?>
</ul>

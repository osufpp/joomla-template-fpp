<?php
// no direct access
defined('_JEXEC') or die;


function modChrome_normal($module, &$params, &$attribs)
{
    if($params->get('layout') == "fpp:menu")
    {
        if (!empty ($module->content))
        {
            echo "<div>".$module->content."</div>";
        }
    }
    else
    {
        if (!empty ($module->content)) : ?>
        <div class="ui-widget infoBoxContainer <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
            <?php if($module->showtitle) { ?>
            <div class="ui-widget-header ui-corner-top infoBoxHeading"><?php echo $module->title; ?></div>
            <div class="ui-widget-content ui-corner-bottom infoBoxContents">
                <?php echo $module->content; ?>
            </div>
            <?php } else { ?>
            <div class="ui-widget-content ui-corner-all infoBoxHeading"><?php echo $module->content; ?></div>
            <?php } ?>
        </div>
        <?php endif;
    }
}





function modChrome_nothing($module, &$params, &$attribs)
{
	echo "<div>".$module->content."</div>";
}

function modChrome_navbar($module, &$params, &$attribs)
{
	echo '<div class="ui-widget-header ui-corner-all infoBoxHeading">'.$module->content."</div>";
}


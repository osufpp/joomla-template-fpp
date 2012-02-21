<?php
/**
 * @version        $Id: index.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package        Joomla.Site
 * @copyright    Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// Set flag that this is a parent file.
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);
define('JPATH_BASE', dirname(__FILE__) . "/../..");
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';


$db =& JFactory::getDBO();

$term = JRequest::getVar('term');
$limit = JRequest::getInt('maxRows');

$q = "SELECT title, prodid AS url FROM #__products WHERE match(prodid, title, `desc`) AGAINST ( '*" . $term . "*' IN BOOLEAN MODE )";
if ($limit) $q .= " LIMIT " . $limit;
$db->setQuery($q);
$suggestions = $db->loadAssocList();

foreach ($suggestions as $row => $stuff)
{
    $suggestions[$row]['url'] = '/products/' . $suggestions[$row]['url'];
}

echo '{"suggestions":' . str_replace('\\/', '/', json_encode($suggestions)) . '}';

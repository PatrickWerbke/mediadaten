<?php
/*
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

// Load FOF

include_once JPATH_LIBRARIES.'/fof/include.php';

if(!defined('FOF_INCLUDED')) {
	JError::raiseError ('500', 'FOF is not installed');

	return;
}

// Dispatch
FOFDispatcher::getAnInstance('com_mediadaten')->dispatch();
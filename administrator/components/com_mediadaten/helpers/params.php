<?php
/*
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

class ConferenceHelperParams
{
	public static function getParam($key, $default = null)
	{
		static $params = null;
		
		if(!is_object($params)) {
			jimport('joomla.application.component.helper');
			$params = JComponentHelper::getParams('com_mediadaten');
		}
		return $params->get($key, $default);
	}
}
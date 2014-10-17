<?php
/*
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

class MediadatenDispatcher extends FOFDispatcher
{
	public $defaultView = 'customers';
	/*
	public function onBeforeDispatch() {
		$result = parent::onBeforeDispatch();
		
		if($result) {
			if (!JFactory::getUser()->authorise('core.manage', 'com_mediadaten'))
			{
				JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
				return false;
			}
			

			JHTML::_('formbehavior.chosen', 'select');
		}
		
		return $result;
	} */
}
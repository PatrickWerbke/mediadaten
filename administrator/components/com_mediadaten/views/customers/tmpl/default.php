<?php
/**
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

// Load the helpers
/*
$this->loadHelper('params');
$this->loadHelper('select');
$this->loadHelper('format');  
*/
// Sorting filters

$sortFields = array(
	'active' 				=> JText::_('JPUBLISHED'),
	'name'					=> JText::_('COM_MEDIADATEN_FIELD_NAME'),
	//'modified'				=> JText::_('JGLOBAL_FIELD_MODIFIED_LABEL'),
);

//JHtml::_('bootstrap.tooltip');
//JHtml::_('bootstrap.popover');
?>

<!--
<?php if (version_compare(JVERSION, '3.0', 'ge')): ?>
	<script type="text/javascript">
		Joomla.orderTable = function() {
			table = document.getElementById("sortTable");
			direction = document.getElementById("directionTable");
			order = table.options[table.selectedIndex].value;
			if (!order)
			{
				dirn = 'asc';
			}
			else {
				dirn = direction.options[direction.selectedIndex].value;
			}
			Joomla.tableOrdering(order, dirn);
		}
	</script>
<?php endif; ?> -->


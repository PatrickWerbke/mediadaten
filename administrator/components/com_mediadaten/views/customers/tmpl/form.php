<?php
/**
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

//No direct access.

defined('_JEXEC') or die;

JHTML::_('behavior.tooltip');
if(version_compare(JVERSION, '3.0', 'ge')) {
	JHTML::_('behavior.framework');
} else {
	JHTML::_('behavior.mootools');
}
JHTML::_('behavior.modal');


// Build the script.
$script = array();
$script[] = '	function jInsertFieldValue(value, id) {';
$script[] = '		var old_value = document.id(id).value;';
$script[] = '		if (old_value != value) {';
$script[] = '			var elem = document.id(id);';
$script[] = '			elem.value = value;';
$script[] = '			elem.fireEvent("change");';
$script[] = '			if (typeof(elem.onchange) === "function") {';
$script[] = '				elem.onchange();';
$script[] = '			}';
$script[] = '			jMediaRefreshPreview(id);';
$script[] = '		}';
$script[] = '	}';

$script[] = '	function jMediaRefreshPreview(id) {';
$script[] = '		var value = document.id(id).value;';
$script[] = '		var img = document.id(id + "_preview");';
$script[] = '		if (img) {';
$script[] = '			if (value) {';
$script[] = '				img.src = "' . JURI::root() . '" + value;';
$script[] = '				document.id(id + "_preview_empty").setStyle("display", "none");';
$script[] = '				document.id(id + "_preview_img").setStyle("display", "");';
$script[] = '			} else { ';
$script[] = '				img.src = ""';
$script[] = '				document.id(id + "_preview_empty").setStyle("display", "");';
$script[] = '				document.id(id + "_preview_img").setStyle("display", "none");';
$script[] = '			} ';
$script[] = '		} ';
$script[] = '	}';

$script[] = '	function jMediaRefreshPreviewTip(tip)';
$script[] = '	{';
$script[] = '		tip.setStyle("display", "block");';
$script[] = '		var img = tip.getElement("img.media-preview");';
$script[] = '		var id = img.getProperty("id");';
$script[] = '		id = id.substring(0, id.length - "_preview".length);';
$script[] = '		jMediaRefreshPreview(id);';
$script[] = '	}';

// Add the script to the document head.
JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

$this->loadHelper('params');
$this->loadHelper('select');
$this->loadHelper('format');

// Joomla! editor object

//$editor = JFactory::getEditor();


?>

<div class="mediadaten">
	<form action="index.php" method="post" name="adminForm" id="adminForm" class="form form-horizontal">
	<input type="hidden" name="option" value="com_mediadaten" />
	<input type="hidden" name="view" value="customers" />
	<input type="hidden" name="task" value="" />

	<!-- Start row -->
	<div class="row-fluid">
		<!-- Start left -->
		<div class="span7">

			<div class="control-group">
				<label for="number" class="control-label">
					<?php echo JText::_('COM_MEDIADATEN_FIELD_NUMBER') ?>
				</label>
				<div class="controls">
					<input type="text" name="number" id="number" class="span" />
				</div>	
			</div>
			
			<div class="control-group">
				<label for="name" class="control-label">
					<?php echo JText::_('COM_MEDIADATEN_FIELD_NAME') ?>
				</label>
				<div class="controls">
					<input type="text" name="name" id="name" />
				</div>	
			</div>

			<div class="control-group">
				<label for="firstname" class="control-label">
					<?php echo JText::_('COM_MEDIADATEN_FIELD_NUMBER') ?>
				</label>
				<div class="controls">
					<input type="text" name="firstname" id="firstname" />
				</div>	
			</div>

			<div class="control-group">
				<label for="active" class="control-label">
					<?php echo JText::_('COM_MEDIADATEN_FIELD_ACTIVE') ?>
				</label>
				<div class="controls">
					<input type="checkbox" checked="checked" name="active" id="active"  />
				</div>	
			</div>
		</div>

	</div>
	</form>
</div>


<?php
/*
 * @package		MediadatenManager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

class MediadatenHelperFormat
{
	
	public static function search($title)
	{
		$html[] = '<div class="input-append search">';
		$html[] = '<input type="text" name="title" class="span searchinput" value="'.$title.'" class="text_area" onchange="document.adminForm.submit();" />';
		$html[] = '<button class="btn add-on" type="button" onclick="this.form.submit();"><i class="icon-search"></i></button>';
		$html[] = '<button class="btn add-on" type="button" onclick="document.adminForm.title.value=\'\';this.form.submit();"><i class="icon-remove"></i></button>';
		$html[] = '</div>';

		return implode(' ',$html);
	}


	public static function enabled($enabled)
	{
		$html[] = '<input type="hidden" name="enabled" value="'.$enabled.'"/>';
		$html[] = '<div class="btn-group status">';
		if($enabled == true) {
			$html[] = '<button class="btn btn-micro btn-success" type="button" onclick="document.adminForm.enabled.value=\'\';this.form.submit();"><i class="icon-publish icon-white"></i></button>';
			$html[] = '<button class="btn btn-micro" type="button" onclick="document.adminForm.enabled.value=\'0\';this.form.submit();"><i class="icon-unpublish"></i></button>';
		} elseif($enabled == null) {
			$html[] = '<button class="btn btn-micro" type="button" onclick="document.adminForm.enabled.value=\'1\';this.form.submit();"><i class="icon-publish"></i></button>';
			$html[] = '<button class="btn btn-micro" type="button" onclick="document.adminForm.enabled.value=\'0\';this.form.submit();"><i class="icon-unpublish"></i></button>';
		} elseif($enabled == false) {
			$html[] = '<button class="btn btn-micro" type="button" onclick="document.adminForm.enabled.value=\'1\';this.form.submit();"><i class="icon-publish"></i></button>';
			$html[] = '<button class="btn btn-micro btn-danger" type="button" onclick="document.adminForm.enabled.value=\'\';this.form.submit();"><i class="icon-unpublish icon-white"></i></button>';
		}
		$html[] = '</div>';

		return implode(' ',$html);
	}
}


<?php
/*
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

class MediadatenHelperSelect
{
	protected static function genericlist($list, $name, $attribs, $selected, $idTag)
	{
		if(empty($attribs))
		{
			$attribs = null;
		}
		else
		{
			$temp = '';
			foreach($attribs as $key=>$value)
			{
				$temp .= $key.' = "'.$value.'"';
			}
			$attribs = $temp;
		}

		return JHTML::_('select.genericlist', $list, $name, $attribs, 'value', 'text', $selected, $idTag);
	}


	public static function published($selected = null, $id = 'enabled', $attribs = array('class' => 'chosen'))
	{
		$options = array();
		$options[] = JHTML::_('select.option',null,JText::_('COM_MEDIADATEN_SELECT_STATE'));
		$options[] = JHTML::_('select.option',0,JText::_((version_compare(JVERSION, '1.6.0', 'ge')?'J':'').'UNPUBLISHED'));
		$options[] = JHTML::_('select.option',1,JText::_((version_compare(JVERSION, '1.6.0', 'ge')?'J':'').'PUBLISHED'));

		return self::genericlist($options, $id, $attribs, $selected, $id);
	}

		public static function customers($selected = null, $id = 'mediadaten_customer_id', $attribs = array('class' => 'chosen'))
	{
		$model = FOFModel::getTmpInstance('customers','MediadatenModel');
		$items = $model->savestate(0)->limit(0)->limitstart(0)->getItemList();
		
		$options = array();
		
		$options[] = JHTML::_('select.option','',JText::_('COM_MEDIADATEN_SELECT_CUSTONER'));

		if(count($items)) foreach($items as $item)
		{
			$options[] = JHTML::_('select.option',$item->mediadaten_customer_id, $item->title);
		}

		return self::genericlist($options, $id, $attribs, $selected, $id);
	}


	public static function multi_events($selected = null, $name = 'mediadaten_customer_id[]', $attribs = array('multiple' => 'multiple', 'class' => 'chosen'))
	{
		$list = FOFModel::getTmpInstance('customers','MediadatenModel')
			->savestate(0)
			->filter_order('ordering')
			->filter_order_Dir('ASC')
			->limit(0)
			->offset(0)
			->getList();
		
		$options   = array();
		
		$options[] = JHTML::_('select.option','',JText::_('COM_MEDIADATEN_SELECT_CUSTONER'));
	
		foreach($list as $item) {
			$options[] = JHTML::_('select.option',$item->mediadaten_customer_id,$item->title);
		}
		
		return self::genericlist($options, $name, $attribs, $selected, $name);
	}
	
}
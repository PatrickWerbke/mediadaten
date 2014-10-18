<?php
/**
 * @package		Mediadaten Manager
 * @license		GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

// Load the helpers

$this->loadHelper('params');
$this->loadHelper('select');
$this->loadHelper('format');  

// Sorting filters

sortFields = array(
	'active' 				=> JText::_('JPUBLISHED'),
	'name'					=> JText::_('COM_MEDIADATEN_FIELD_NAME'),
	'number'				=> JText::_('JGLOBAL_FIELD_MODIFIED_LABEL'),
);

//JHtml::_('bootstrap.tooltip');
JHtml::_('bootstrap.popover');
?>


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
<?php endif; ?> 

<div class="mediadaten">
	<form name="adminForm" id="adminForm" action="index.php" method="post">
		<input type="hidden" name="option" id="option" value="com_mediadaten" />
		<input type="hidden" name="view" id="view" value="customer" />
		<input type="hidden" name="task" id="task" value="browse" />

		<table class="adminlist table table-striped">
			<thead>
			<?php if($count = count($this->items)): ?>
			<?php $i = -1; $m = 1; ?>
				<?php foreach ($this->items as $item) : ?>
				<?php
					$i++; $m = 1-$m;
					$checkedOut = ($item->locked_by != 0);
					$ordering = $this->lists->order == 'ordering';
					$item->published = $item->enabled;
				?>

			<tr class="<?php echo 'row'.$m; ?>">
					<td>
						<?php echo JHTML::_('grid.id', $i, $item->mediadaten_customer_id, $checkedOut); ?>
					</td>
					<td class="center">
						<?php echo JHTML::_('jgrid.published', $item->active, $i); ?>
					</td>

				<?php endforeach; ?>

			<?php else: ?>
				<tr>
					<td colspan="20">
						<?php echo  JText::_('COM_MEDIADATEN_NORECORDS') ?>
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</form>
</div> 

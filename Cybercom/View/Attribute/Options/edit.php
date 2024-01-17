<?php $options = $this->getOptions()->getData(); ?>

 <div>
 	<form method="POST" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?> ?>">
 		<button class="btn btn-success">Update</button>
	 	<button class="btn btn-primary" type="button" onclick="base.add()">Add option</button>
	 	<table id="oldTable">
	 		<tbody>
	 			<?php foreach ($options as $key => $value) { ?>
	 			<tr>
	 				<td>
	 					<input type="text" name="exist[<?php echo $value->optionId?>][name]" value="<?php echo $value->name?>">
	 				</td>
	 				<td>
	 					<input type="number" name="exist[<?php echo $value->optionId?>][sortOrder]" value="<?php echo $value->sortOrder ?>">
	 				</td>
	 				<td>
	 					<button class="btn btn-danger" onclick="base.remove(this)">Remove</button>
	 				</td>
	 			</tr>
	 			<?php } ?>
	 		</tbody>
	 	</table>
	 </form>
	 <div>
	 	<table style="display: none" id="newTable">
	 		<tr>
	 			<td><input type="text" name="new[name][]"></td>
	 			<td><input type="number" name="new[sortOrder][]"></td>
	 			<td><button class="btn btn-danger" onclick="base.remove(this)">Remove</button></td>
	 		</tr>
	 	</table>
	 </div>
 </div>
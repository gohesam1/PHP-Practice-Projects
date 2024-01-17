<?php $groupPrice = $this->getPrice()->getData(); ?>
<form method="POST" action="<?php echo $this->getUrl()->getUrl('save','Product_GroupPrice')?>" id="priceForm">
	<button class="btn btn-primary" type="button" onclick="base.setForm()">Update</button>
	<table class="table table-striped">
		<thead>
			<tr class="success">
				<th>Group Id</th>
				<th>Group Name</th>
				<th>Product Price</th>
				<th>Group Price</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
				<?php
				if (!$groupPrice) { ?>
				<tr><td colspan="4"><?php echo "No data Avilable"; ?></td></tr>
				<?php	}
				else{
					foreach ($groupPrice as $key => $value) {

						$rowStatus = ($value->entityId)? 'exist' : 'new';
						?>
						<tr>
							<td><input type="" name="groupId" value="<?php echo $value->groupId ?>" hidden=""><?php echo $value->groupId ?></td>
							<td><?php echo $value->groupName ?></td>
							<td><?php echo $value->Price ?></td>
							<td><input type="number" name="Price[<?php echo $rowStatus?>][<?php echo $value->entityId ?>]" value="<?php echo $value->price ?>"></td>
							<td><input type="" name="productId" value="<?php echo $value->productId?>" hidden=""></td>
						</tr>
					<?php } } ?>
		</tbody>
	</table>
</form>
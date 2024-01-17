<?php $customergroup = $this->getCustomerGroup();  ?>
<div>
	
	<form method="POST" id="customerForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Customergroup[groupName]" value="<?php echo $customergroup->Name;?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Customergroup[default]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Customergroup[default]" id="status" value="Disable">Disable
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm()" value="submit" name="submit">Insert</button>
				</td>
			</tr>
		</table>
	</form>
	
</div>
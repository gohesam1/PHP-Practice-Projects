<?php $customer = $this->getCustomer();
	$model = Mage::getModel('Model_Customer_CustomerGroup_Group');
	$group = $model->fetchGroup();
 ?>
	<form method="POST" id="customerForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Customer Group:</label>
				</td>
				<td>
					<select name="Customer[customerGroup]">
						<?php foreach ($group as $key => $value) { ?>
							<option value="<?php echo $value['Name']; ?>"><?php echo $value['Name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>First Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Customer[firstName]" id="firstname" value="<?php echo $customer->firstName?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Customer[lastName]" id="lastname" value="<?php echo $customer->lastName?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>E-mail:</label>
				</td>
				<td>
					<input type="email" class="input" name="Customer[email]" id="email" value="<?php echo $customer->email?>" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Mobile no.:</label>
				</td>
				<td>
					<input type="number" class="input" name="Customer[mobile]" id="mobile" value="<?php echo $customer->mobile?>" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Password:</label>
				</td>
				<td>
					<input type="password" class="input" name="Customer[password]" id="password" value="<?php echo $customer->password?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Customer[status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Customer[status]" id="status" value="Disable">Disable
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm()" value="submit" name="submit">Insert</button>
				</td>
			</tr>
		</table>
	</form>
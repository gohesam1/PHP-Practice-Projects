<?php $shipping = $this->getShipping();  ?>
<div>
	<form method="POST" id="shippingForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[Name]" value="<?php echo $shipping->Name?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Code:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[Code]" value="<?php echo $shipping->Code?>" id="code" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Amount:</label>
				</td>
				<td>
					<input type="number" class="input" name="Shipping[Amount]" id="amount" value="<?php echo $shipping->Amount?>" required=""> in Rupees
				</td>
			</tr>
			<tr>
				<td>
					<label>Description:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[Description]" id="description" value="<?php echo $shipping->Description?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Shipping[Status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Shipping[Status]" id="status" value="Disable">Disable
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm()"  name="submit">Insert</button>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php $payment = $this->getPayment();  ?>
<div>
	
	<form method="POST" id="paymentForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Payment[Name]" value="<?php echo $payment->Name;?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Code:</label>
				</td>
				<td>
					<input type="text" class="input" name="Payment[Code]" value="<?php echo $payment->Code;?>" id="code" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Description:</label>
				</td>
				<td>
					<input type="text" class="input" name="Payment[Description]" id="description" value="<?php echo $payment->Description;?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Payment[Status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Payment[Status]" id="status" value="Disable">Disable
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
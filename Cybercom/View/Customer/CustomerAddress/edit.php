	<form method="POST" id="customerAddressForm" action="<?php echo $this->getUrl()->getUrl('save','Customer_Address',[]) ?>">
		<table class="t">
			<tr>
				<td colspan="2">
					<label><h3>Billing Address</h3></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Address:</label>
				</td>
				<td>
					<input type="text" class="input" name="Billing[address]" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>City:</label>
				</td>
				<td>
					<input type="text" class="input" name="Billing[city]" id="city"  required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>State:</label>
				</td>
				<td>
					<input type="text" class="input" name="Billing[state]" id="state"  required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Zip code:</label>
				</td>
				<td>
					<input type="number" class="input" name="Billing[zipcode]" id="zipcode" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Country:</label>
				</td>
				<td>
					<input type="text" class="input" name="Billing[country]" id="country" required="">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label><h3>Shipping Address</h3></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Address:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[address]" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>City:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[city]" id="city"  required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>State:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[state]" id="state"  required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Zip code:</label>
				</td>
				<td>
					<input type="number" class="input" name="Shipping[zipcode]" id="zipcode" required=""> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Country:</label>
				</td>
				<td>
					<input type="text" class="input" name="Shipping[country]" id="country" required="">
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm()" value="submit" name="submit">Insert</button>
				</td>
			</tr>
		</table>
	</form>
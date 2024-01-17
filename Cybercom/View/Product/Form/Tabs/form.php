<?php $product = $this->getProduct(); ?>
<div>
	<form method="POST" id="productForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Product[Name]" value="<?php echo $product->Name?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Price:</label>
				</td>
				<td>
					<input type="number" class="input" name="Product[Price]" value="<?php echo $product->Price?>" id="price" required=""> in Rupees
				</td>
			</tr>
			<tr>
				<td>
					<label>Discount:</label>
				</td>
				<td>
					<input type="number" class="input" name="Product[Discount]" value="<?php echo $product->Discount?>" id="discount" required=""> %
				</td>
			</tr>
			<tr>
				<td>
					<label>Quantity:</label>
				</td>
				<td>
					<input type="number" class="input" name="Product[Quantity]" value="<?php echo $product->Quantity?>" id="quantity" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Description:</label>
				</td>
				<td>
					<input type="text" class="input" name="Product[Description]" value="<?php echo $product->Description?>" id="description" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Product[Status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Product[Status]" id="status" value="Disable">Disable
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
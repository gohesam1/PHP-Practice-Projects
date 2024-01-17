<?php $category = $this->getCategory();
	$categoryOptions = $this->getCategoryOptions();
	
 ?>
<form method="POST" id="productForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		
		<table class="t">
			<tr>
				<td>
					<label>Parent:</label>
				</td>
				<td>
					<select name="Category[parentId]" value="$category->parentId">
						<?php if ($categoryOptions) {
							foreach ($categoryOptions as $key => $value) { ?>
								<option value="<?php echo $key ?>"<?php if($key = $category->parentId):?>selected<?php endif; ?>><?php echo $value ?></option>
						<?php	}
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Category[Name]" value="<?php echo $category->Name ?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Description:</label>
				</td>
				<td>
					<input type="text" class="input" name="Category[Description]" value="<?php echo $category->Description ?>" id="description" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Category[Status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Category[Status]" id="status" value="Disable">Disable
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm()" value="submit" name="submit">Insert</button>
				</td>
			</tr>
		</table>
	</form>





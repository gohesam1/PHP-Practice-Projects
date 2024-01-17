<div>	
	<form method="POST" id="attributeForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			
			<tr>
				<td>
					<label>Type Id:</label>
				</td>
				<td>
					<select name="Attribute[entityTypeId]">
						<?php foreach ($this->getEntitytype() as $key => $value) { ?>
							<option value="<?php echo $value ?>"><?php echo $value; ?></option>	
					<?php	} ?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Name:</label>
				</td>
				<td>
					<input type="text" name="Attribute[name]" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Code:</label>
				</td>
				<td>
					<input type="text" name="Attribute[code]" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Input type:</label>
				</td>
				<td>
					<select name="Attribute[inputType]">
						<?php foreach ($this->getInputType() as $key => $value) { ?>
							<option value="<?php echo $value ?>"><?php echo $value; ?></option>	
					<?php	} ?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Backend type:</label>
				</td>
				<td>
					<select name="Attribute[backendType]">
						<?php foreach ($this->getBackendType() as $key => $value) { ?>
							<option value="<?php echo $value ?>"><?php echo $value; ?></option>	
					<?php	} ?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Sort order:</label>
				</td>
				<td>
					<input type="number" name="Attribute[sortOrder]" required="">
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
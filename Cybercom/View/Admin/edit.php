<?php $admin = $this->getAdmin(); ?>

<div>	
	<form method="POST" id="adminForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>User Name:</label>
				</td>
				<td>
					<input type="text" class="input" name="Admin[userName]" value="<?php echo $admin->userName?>" id="name" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Password:</label>
				</td>
				<td>
					<input type="password" class="input" name="Admin[password]" value="<?php echo $admin->password?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Status:</label>
				</td>
				<td>
					<input type="radio" name="Admin[status]" id="status" value="Enable">Enable&nbsp;&nbsp;
					<input type="radio" name="Admin[status]" id="status" value="Disable">Disable
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
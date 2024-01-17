<?php 
	$customers = $this->getCustomers();
 ?>
<div>			
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>
			<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Customer Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>E-mail</th>
						<th>Mobile no.</th>
						<th>Status</th>
						<th>Group</th>
						<th>Created Date</th>
						<th>Updated Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							if (!$customers) {
								echo "<tr><td colspan='10'><center>No data available</center></td></tr>";
							}
							else{
							foreach ($customers->getData() as $key => $value) 
							{
						?>
							<tr>
								<td><?php echo $value->CustomerId;?></td>
								<td><?php echo $value->firstName;?></td>
								<td><?php echo $value->lastName;?></td>
								<td><?php echo $value->email;?></td>
								<td><?php echo $value->mobile;?></td>
								<td>
									<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus','customer',['id'=>$value->CustomerId,'Status'=>$value->status]); ?>').resetParams().load()"><?php echo $value->status;?></button>
								</td>
								<td><?php echo $value->customerGroup;?></td>
								<td><?php echo $value->createdDate;?></td>
								<td><?php echo $value->updatedDate;?></td>
								<td>
									<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->CustomerId]); ?>').resetParams().load()">Update</button>

									<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->CustomerId]); ?>').resetParams().load()">Delete</button>
								</td>
							</tr>
						<?php } } ?>
				</tbody>
			</table>
</div>


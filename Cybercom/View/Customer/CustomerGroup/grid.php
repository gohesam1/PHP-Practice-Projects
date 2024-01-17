<?php $customergroup = $this->getCustomerGroup();  ?>
<div>			
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>
			<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Group Id</th>
						<th>Name</th>
						<th>Status</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							foreach ($customergroup->getData() as $key => $value) {
								?>
							<tr>
							<td><?php echo $value->groupId ;?></td>
							<td><?php echo $value->groupName;?></td>
							<td>
								<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus',NULL,['id'=>$value->groupId,'Status'=>$value->default]); ?>').resetParams().load()"><?php echo $value->default;?></button>
							</td>
							<td><?php echo $value->createdDate;?></td>
							<td>
								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->groupId]); ?>').resetParams().load()">Update</button>

									<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->groupId]); ?>').resetParams().load()">Delete</button>						
								</td>
							</tr>
						<?php	} ?>
							
				</tbody>
			</table>
</div>
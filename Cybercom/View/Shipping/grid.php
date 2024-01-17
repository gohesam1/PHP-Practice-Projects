<?php $shippings = $this->getShippings();  ?>
<div>
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>
			<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Method Id</th>
						<th>Name</th>
						<th>Code</th>
						<th>Amount</th>
						<th>Description</th>
						<th>Status</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							foreach ($shippings->getData() as $key => $value) {
								?>
							<tr>
							<td><?php echo $value->MethodId ;?></td>
							<td><?php echo $value->Name;?></td>
							<td><?php echo $value->Code;?></td>
							<td><?php echo $value->Amount;?></td>
							<td><?php echo $value->Description;?></td>
							<td>
								<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus',NULL,['id'=>$value->MethodId,'Status'=>$value->Status]); ?>').resetParams().load()"><?php echo $value->Status;?></button>
							</td>
							<td><?php echo $value->createdDate;?></td>
							<td>
								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->MethodId]); ?>').resetParams().load()">Update</button>

								<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->MethodId]); ?>').resetParams().load()">Delete</button>						
								</td>
							</tr>
						<?php	} ?>
							
				</tbody>
			</table>
</div>

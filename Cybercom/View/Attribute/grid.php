<?php 
	$attributes = $this->getAttributes();
 ?>
<div>	
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>			
	<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Attribute Id</th>
						<th>Entity Type Id</th>
						<th>Name</th>
						<th>Code</th>
						<th>Input type</th>
						<th>Backend Type</th>
						<th>Sort Order</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php if (!$attributes) { ?>
							<tr><td colspan="8"><center>No Data avilable</center></td></tr>
						<?php	}
						else{
							foreach ($attributes->getData() as $key => $value) {	
								?>
							<tr>
							<td><?php echo $value->attributeId ;?></td>
							<td><?php echo $value->entityTypeId?></td>
							<td><?php echo $value->name?></td>
							<td><?php echo $value->code;?></td>
							<td><?php echo $value->inputType?></td>
							<td><?php echo $value->backendType?></td>
							<td><?php echo $value->sortOrder?></td>
							<td>
								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('grid','Attribute_Option',['id'=>$value->attributeId]); ?>').resetParams().load()">Add option</button>

								<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->attributeId]); ?>').resetParams().load()">Delete</button>						
							</td>
							</tr>
						<?php }	} ?>
							
				</tbody>
			</table>
</div>
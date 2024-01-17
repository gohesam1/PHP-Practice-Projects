<?php $categories = $this->getCategories(); ?>

<div>		
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>
			<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Category Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Status</th>
						<th>Parent Id</th>
						<th>Path</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							if (!$categories) {
								echo "<tr><td colspan='7'><center>No data available</center></td></tr>";
							}
							else{
								foreach ($categories->getData() as $key => $value) {
							
						?>		
							<tr>
								<td><?php echo $value->CategoryId;?></td>
								<td><?php echo $this->getName($value);?></td>
								<td><?php echo $value->Description;?></td>
								<td>
									<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus','category',['id'=>$value->categoryId,'Status'=>$value->Status]); ?>').resetParams().load()"><?php echo $value->Status;?></button>
								</td>
								<td><?php echo $value->parentId;?></td>
								<td><?php echo $value->path;?></td>
								<td>
									<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->CategoryId]); ?>').resetParams().load()">Update</button>

									<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->CategoryId]); ?>').resetParams().load()">Delete</button>
								</td>
							</tr>
						<?php } } ?>
						
				</tbody>
			</table>
</div>


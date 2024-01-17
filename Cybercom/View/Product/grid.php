<?php 
	$products = $this->getProducts();
 ?>
<div>
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>
	
			<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Product Id</th>
						<th>Name</th>
						<th>Price(in Rs.)</th>
						<th>Discount(in %)</th>
						<th>Quantity</th>
						<th>Description</th>
						<th>Status</th>
						<th>Created Date</th>
						<th>Updated Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if (!$products) { ?>
						<tr><td colspan="10"><?php echo "No data Avilable"; ?></td></tr>
						<?php	}
						else{
							foreach ($products->getData() as $key => $value) {
								?>
							<tr>
							<td><?php echo $value->ProductId ;?></td>
							<td><?php echo $value->Name?></td>
							<td><?php echo $value->Price;?></td>
							<td><?php echo $value->Discount;?></td>
							<td><?php echo $value->Quantity;?></td>
							<td><?php echo $value->Description;?></td>
							<td>
								<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus','product',['id'=>$value->ProductId,'Status'=>$value->Status]); ?>').resetParams().load()"><?php echo $value->Status;?></button>
							</td>
							<td><?php echo $value->createdDate;?></td>
							<td><?php echo $value->updatedDate;?></td>
							<td>

								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->ProductId]); ?>').resetParams().load()">Update</button>

								<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->ProductId]); ?>').resetParams().load()">Delete</button>					
								</td>
							</tr>
						<?php }	} ?>
							
				</tbody>
			</table>
</div>
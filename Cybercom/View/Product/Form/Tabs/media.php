<?php $media = $this->getMedia();?>
<div>
	
	<form method="POST" action="<?php echo $this->getUrl()->getUrl('update','Product_Media',[]);?>">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Image</th>
					<th>Label</th>
					<th>Small</th>
					<th>Thumb</th>
					<th>Base</th>
					<th>Gallery</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody>
					<?php
					if ($media) {
						foreach ($media->getData() as $key => $value) { ?>
								<tr>
								<td><img src="<?php echo 'Images//'.$value->img ;?>" width="50px" height="50px"></td>
								<td><?php echo $value->img; ?></td>
								<td><input type="radio" name="image[small]" value="<?php echo $value->imgId?>"></td>
								<td><input type="radio" name="image[thumb]" value="<?php echo $value->imgId?>"></td>
								<td><input type="radio" name="image[base]" value="<?php echo $value->imgId?>"></td>
								<td><input type="checkbox" name="image[data][<?php echo $value->imgId?>][gallery]" value="<?php echo $value->imgId?>"></td>
								<td><input type="checkbox" name="remove[]" value="<?php echo $value->img?>"></td>
								</tr>
							<?php } 
						} ?>
			</tbody>
		</table>

		<a href=""><button class="btn btn-warning" type="submit">Update</button></a>&nbsp;&nbsp;&nbsp;

		<a href=""><button class="btn btn-danger" type="submit">Remove</button><br><br></a>
	</form>

	<form method="POST" enctype="multipart/form-data" action="<?php echo $this->getUrl()->getUrl('save','Product_Media',[]);?>">
		<input type="file" name="file" accept="jpg">&nbsp;&nbsp;
		<input class="btn btn-success" type="submit" name="Submit">
	</form>
</div>
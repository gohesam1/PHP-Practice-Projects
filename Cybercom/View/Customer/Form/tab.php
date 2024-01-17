<?php 
foreach ($this->tabs as $key => $value) { ?>
<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl(NULL,NULL,['tab'=>$key]);?>').resetParams().load()"><?php echo $value['label']; ?></button><br><br>	
<?php } ?>
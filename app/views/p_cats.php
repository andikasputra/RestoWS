<?php if(!empty($success)):?>
 	<div class="alert alert-success">
 		<?php echo $success?> 
 	</div>                 
<?php elseif(!empty($error)):?>
 	<div class="alert alert-danger">
 		<?php echo $error?> 
 	</div>                 
<?php endif?> 

<a href="<?php echo site_url().'/app/cats/add'?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Kategori Menu</a><br /><br />
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>#</th>
		<th>Kategori</th>
		<th>Jml Content</th>
		<th></th>
	</tr>	
	<?php $no = 1?>
	<?php foreach($cats as $c):?>
	<tr>		
		<td><?php echo ($no<4)?$no:''?></td>
		<td>
			
			<?php echo (($no>3)?' - ':'').$c->category_name?><br />
			<small class="text-muted"><?php echo $c->category_desc?></small>
		</td>
		<td class="text-right"><?php echo ($no<>3)?(($c->jml==NULL)?0:$c->jml):''?></td>
		<td>
			<a href="<?php echo site_url().'/app/cats/edit/'.$c->categories_id?>" class="btn btn-success btn-circle" alt="edit"><i class="fa fa-pencil"></i></a> 
			<?php if($no>3):?>			
			<a href="<?php echo site_url().'/app/cats/del/'.$c->categories_id?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
			<?php endif?>
		</td>		
	</tr>
	<?php $no++?>
	<?php endforeach;?>	
</table>	


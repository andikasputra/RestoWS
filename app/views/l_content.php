<a href="<?php echo site_url()?>/app/write" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Content</a><br /><br />
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>#</th>
		<th>Image</th>	
		<th>Judul dan Deskripsi</th>
		<th>Harga/Expired</th>
		<th></th>
	</tr>	
	<?php $no = 1?>
	<?php foreach($content as $c):?>
	<tr>		
		<td><?php echo $no?></td>
		<td><img class="thumbnail" style="width:75px" src="<?php echo base_url().$c->content_thumb?>" class="img-square"></td>
		<td>
			<?php echo $c->content_title?><br />
			<small class="text-muted"><?php echo $c->content_desc?></small><br />
			<small class="text-success">
				<i class="fa fa-calendar"></i> 
				<em>Tgl Kirim <?php echo mdate('%d %M %Y jam %H:%i',mysql_to_unix($c->content_post))?></em>
			</small>
		</td>
		<td>
			<?php if($c->category_type==4):?>			
			<div class="text-right"><?php echo 'IDR '.number_format($c->content_var1)?></div>
			<?php elseif($c->category_type==3):?>
			<?php echo mdate('%d %M %Y',mysql_to_unix($c->content_var1))?>
			<?php endif?>
		</td>
		<td>			
			<a href="<?php echo site_url().'/app/content/edit/'.$c->content_id?>" class="btn btn-success btn-circle" alt="edit"><i class="fa fa-pencil"></i></a>&nbsp;
			<a href="<?php echo site_url().'/app/content/del/'.$c->content_id?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>						
		</td>				
	</tr>
	<?php $no++?>
	<?php endforeach;?>	
</table>	

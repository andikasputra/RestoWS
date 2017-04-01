<p>Berikut daftar feedback atau pesan dan saran yang dikirim dari pengguna aplikasi android</p>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>#</th>
		<th>Identitas</th>
		<th>Komentar</th>
		<th>Tgl Kirim</th>
	</tr>	
	<?php $no = 1?>
	<?php foreach($feedback as $f):?>
	<tr>		
		<td><?php echo $no?></td>
		<td>
			<?php echo $f->fullname?><br />
			<span class="text-muted"><i class="fa fa-envelope"></i> 
				<a href="mailto:<?php echo $f->email?>"><?php echo $f->email?></a></span><br />
			<span class="text-muted"><i class="fa fa-phone"></i> 
				<?php echo $f->phone?></span>	
		</td>
		<td><?php echo $f->comment?></td>		
		<td><?php echo mdate('%d %M %Y<br />jam %H:%i',mysql_to_unix($f->postdate))?></td>		
	</tr>
	<?php $no++?>
	<?php endforeach;?>	
</table>	
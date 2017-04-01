<p>
	Apakah anda yakin akan menghapus content dengan judul <strong><?php echo $content->content_title?></strong>, 
	yang anda kirim <strong><?php echo timeago($content->content_post)?></strong>??<br />
	Data pada aplikasi android akan otomatis terhapus juga jika anda setuju menghapus content tersebut.
</p>
<p>
	<a href="<?php echo site_url().'/app/content/delf/'.$id?>" class="btn btn-info">Hapus</a>
	<a href="javascript:history.back()" class="btn btn-warning">Batal</a>
</p>	
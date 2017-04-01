<div class="row">
	<div class="col-lg-6">

		<?php if(!empty($error)):?>
		<div class="alert alert-danger">
			<?php echo $error?>
		</div>    
		<?php endif?>

		<form action="" method="post">
			<div class="form-group">
				<label>Nama Kategori</label>
				<input type="text" name="category_name" class="form-control" value="<?php echo $post['category_name']?>" />
			</div>
			<div class="form-group">
				<label>Deskripsi Kategori</label>
				<textarea class="form-control" name="category_desc" rows="5"><?php echo $post['category_desc']?></textarea>
			</div>
			<br />
			<input value="Simpan" name="go" class="btn btn-primary" type="submit"/>
		</form>

	</div>
</div>				
<script>
	jQuery(document).ready(function($) {
		$('#p1').hide();
		$('#p2').hide();

    	$('#type').change(function(){
    		
    		var value = ($('#type option:selected').html());

    		if(value.substring(0,2) == '2.'){
    			$('#p1').hide();
				$('#p2').hide();
				$('#x1').val('');
				$('#x2').val('');
    		}else if(value.substring(0,2) == '3.'){
    			$('#p2').show();
    			$('#p1').hide();
    			$('#x1').val('');
    		}else{    			
				$('#p1').show();
    			$('#p2').hide();
    			$('#x2').val('');
    		}    	
    		
    	});
	});
</script>

<div class="row">
	<div class="col-lg-6">

		<?php if(!empty($error)):?>
		<div class="alert alert-danger">
			<?php echo $error?>
		</div>    
		<?php endif?>

		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Judul Content</label>
				<input type="text" name="content_title" class="form-control" value="<?php echo $post['content_title']?>" />
			</div>

			<div class="form-group">
				<label>Deskripsi Content</label>
				<textarea class="form-control" name="content_desc" rows="5"><?php echo $post['content_desc']?></textarea>
			</div>

			<div class="form-group">
				<label>Kategori Content</label>
				<select class="form-control" id="type" name="categories_id">
					<option value="0">-- Pilih Kategori --</option>
					<?php foreach($cats as $c):?>				
					<?php $s = ($post['categories_id']==$c->categories_id)?'selected':''?>	
					<option value="<?php echo $c->categories_id?>" <?php echo $s?>><?php echo $c->category_type.'. '.$c->category_name?></option>
					<?php endforeach?>
				</select>	
			</div>		

			<div class="form-group" id="p1">
				<label>Harga</label>
				<input type="text" id="x1" name="var1" class="form-control" />
			</div>

			<div class="form-group" id="p2">
				<label>Berlaku s/d Tanggal</label>
				<input type="date" id="x2" name="var2" class="form-control" />	
			</div>

			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
					<img src="http://placehold.it/500x500" alt="...">
				</div>
				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 120px; max-height: 120px;"></div>
				<div>
					<span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Gambar</span><span class="fileinput-exists">Ganti Gambar</span><input type="file" name="content_img"></span>
					<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Batalkan</a>
				</div>
			</div>
			<br />
			<input value="Simpan" name="go" class="btn btn-primary" type="submit"/>
		</form>
	</div>	
</div>
<br /><br />
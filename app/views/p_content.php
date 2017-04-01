<?php if(!empty($success)):?>
 	<div class="alert alert-success">
 		<?php echo $success?> 
 	</div>                 
<?php endif?>  

<p>Berikut daftar content berdasarkan kategori</p>


<script>
	
	$(document).ready(function(){		
		
		$( "#filter" ).change(function() {
			if($(this).val()>0){
				$("#rst").empty();
				$("#loadingImage").show();
				$.post("<?php echo site_url()?>/app/load_content",{ id: $(this).val() }, function(data){ $("#rst").html(data); $("#loadingImage").hide(); });
			}else{				
				$("#rst").empty();
				$("#loadingImage").hide();
			}	
		});
	});

</script>


<div class="row">
	<div class="col-lg-6">
		<form>				
			<select class="form-control" id="filter" name="categories_id">
				<option value="0">-- Pilih Kategori --</option>
				<?php foreach($cats as $c):?>					
				<option value="<?php echo $c->categories_id?>"><?php echo $c->category_name?></option>
				<?php endforeach?>
			</select>								
		</form>	
	</div>	
</div>

<center>
<img src="<?php echo base_url()?>/loading.gif" id="loadingImage" style="display: none;" />
</center>

<br /><br />
<div id="rst"></div>
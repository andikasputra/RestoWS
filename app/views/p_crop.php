<p>
	Silahkan crop gambar dari content yang anda upload pada tampilan di bawah ini.<br />
	diperlukan gambar dengan ukuran proporsional untuk dapat tampil di aplikasi android.
</p>

<script language="Javascript">

jQuery(function(){

	jQuery('#cropbox').Jcrop({
		aspectRatio: 1,
		onSelect: updateCoords
	});

});

function updateCoords(c)
{
	jQuery('#x').val(c.x);
	jQuery('#y').val(c.y);
	jQuery('#w').val(c.w);
	jQuery('#h').val(c.h);
};

function checkCoords()
{
	if (parseInt(jQuery('#w').val())>0) return true;
	alert('Silahkan pilih area yang akan di crop dahulu.');
	return false;
};

</script>

<img src="<?php echo base_url($content->content_img)?>" id="cropbox" />

<br />
<div>
<form action="" method="post" onsubmit="return checkCoords();">
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
	<input class="btn btn-warning" type="submit" value="Crop Gambar" />	
</form>
</div>

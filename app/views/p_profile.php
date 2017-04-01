<p>
    Berikut adalah data-data dari profile perusahaan anda, beberapa data tersebut akan di tampilkan di aplikasi android.<br />    
    Anda dapat merubah data-data tersebut dan otomatis akan merubah juga pada aplikasi android yang sudah terinstall.<br />
    Batas waktu untuk merubah data-data tersebut adalah <strong><?php echo timeago($post->valid)?></strong> 
    atau sampai dengan tgl <strong><?php echo mdate('%d %M %Y jam %H:%i',mysql_to_unix($post->valid))?></strong>
</p>

<?php if(isset($msg)):?>
<div class="<?php echo ($sts)?'alert alert-success':'alert alert-danger'?>">
    <?php echo $msg?>
</div>
<?php endif?>

<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <label>ID</label><br />
            <input type="text" class="form-control" name="resto_id" readonly value="<?php echo $post->resto_id?>" /><br />
            
            <label>Nama Aplikasi</label><br />
            <input type="text" class="form-control" name="resto_name" readonly value="<?php echo $post->resto_name?>"  /><br />

            <label>Deskripsi</label><br />
            <textarea class="form-control" rows="5" name="resto_desc"><?php echo $post->resto_desc?></textarea>

            <label>Alamat</label><br />
            <input type="text" class="form-control" name="resto_address" value="<?php echo $post->resto_address?>" /><br />

            <label>Koordinat Lat, Lon</label><br />
            <div class="form-group">
                <div class="form-inline">
                    <input type="text" class="form-control" name="resto_lat" value="<?php echo $post->resto_lat?>" />
                    <input type="text" class="form-control" name="resto_lon" value="<?php echo $post->resto_lon?>" />
                </div>
            </div>

            <label>Email</label><br />
            <input type="text" class="form-control" name="resto_email" value="<?php echo $post->resto_email?>" /><br />

            <label>Telephone</label><br />
            <input type="text" class="form-control" name="resto_phone" value="<?php echo $post->resto_phone?>" /><br />

            <label>Tgl Registrasi</label><br />
            <input type="text" class="form-control" name="reg_date" readonly value="<?php echo $post->reg_date?>" /><br />

            <label>Tgl Expired</label><br />
            <input type="text" class="form-control" name="valid" readonly value="<?php echo $post->valid?>" /><br />
                        
            <button class="btn btn-primary">Ubah Password</button>
            <br /><br />
        </form>
    </div>
</div>
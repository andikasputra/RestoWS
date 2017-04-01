<p>
    Untuk mengupdate password isikan password lama, kemudian isikan password baru anda sebanyak 2 kali<br />
    Untuk keamanan gunakan kombinasi angka dah huruf<br />
    Karakter minimal password adalah 6 karakter<br />
</p>

<?php if(isset($msg)):?>
<div class="<?php echo ($sts)?'alert alert-success':'alert alert-danger'?>">
    <?php echo $msg?>
</div>
<?php endif?>

<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <label>Password Lama</label><br />
            <input type="password" class="form-control" name="old_pass"/><br />
            
            <label>Password Baru</label><br />
            <input type="password" class="form-control" name="new_pass"/><br />
            
            <label>Konfirmasi Password</label><br />
            <input type="password" class="form-control" name="konf_pass"/><br />
            
            <label></label><br />
            <button class="btn btn-primary">Ubah Password</button>
        </form>
    </div>
</div>
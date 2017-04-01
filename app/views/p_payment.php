<p>
    Pilihan paket pembayaran seperti pada tabel dibawah ini.<br />
    Jika anda ingin melakukan pembayaran dengan paket hari selain dibawah ini silahkan menghubungi 
    <a href="<?php echo site_url().'/app/support'?>">Support kami <i class="fa fa-comments-o"></i></a> 
</p>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">30 Hari</div>
                        <div></div>
                    </div>
                </div>
            </div>
            
            <div class="panel-footer">
                <span class="pull-left">
                    Akses ke aplikasi web akan ditambahkan 30 hari setelah melakukan pembayaran dan konfirmasi, 
                    Biaya adalah <strong>IDR 225,000</strong>
                </span>                    
                <div class="clearfix"></div>
            </div>            
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">90 Hari</div>
                        <div></div>
                    </div>
                </div>
            </div>
            
            <div class="panel-footer">
                <span class="pull-left">
                    Akses ke aplikasi web akan ditambahkan 90 hari setelah melakukan pembayaran dan konfirmasi, 
                    Biaya adalah <strong>IDR 625,000</strong>
                </span>                    
                <div class="clearfix"></div>
            </div>            
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">180 Hari</div>
                        <div></div>
                    </div>
                </div>
            </div>
            
            <div class="panel-footer">
                <span class="pull-left">
                    Akses ke aplikasi web akan ditambahkan 180 hari setelah melakukan pembayaran dan konfirmasi, 
                    Biaya adalah <strong>IDR 1,200,000</strong>
                </span>                    
                <div class="clearfix"></div>
            </div>            
        </div>
    </div>
</div>    

<p>
    Pembayaran dapat ditransfer ke Rekening Bank berikut:
</p>    
<ul>
    <li>
        <strong>Bank Mandiri</strong><br />
        No Rek 137-000-421-6780<br />
        a/n Arif Dwi Laksito
    </li>
    <li>
        <strong>Bank Muamalat</strong><br />
        No Rek 913-702-9599<br />
        a/n Arif Dwi Laksito
    </li>    
    <li>
        <strong>Bank BCA</strong><br />
        No Rek 139-160-1807<br />
        a/n Ajeng Pratiwi Mringahwargi
    </li>     
</ul>    

<h1>Konfirmasi</h1>
<p>Setelah anda melakukan pembayaran, mohon mengisi form konfirmasi berikut:</p>
<?php if(isset($msg)):?>
<div class="<?php echo ($sts)?'alert alert-success':'alert alert-danger'?>">
    <?php echo $msg?>
</div>
<?php endif?>

<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <label>ID</label><br />
            <input type="text" class="form-control" name="resto_id" readonly value="<?php echo $c['id']?>" /><br />
            
            <label>Nama Aplikasi</label><br />
            <input type="text" class="form-control" name="resto_name" readonly value="<?php echo $c['name']?>"  /><br />

            <label>Pembayaran dari Bank</label><br />
            <input type="text" class="form-control" name="bank_from" /><br />

            <div class="form-group">
                <label>Bank Tujuan Pembayaran</label>
                <select class="form-control" id="type" name="bank_to">
                    <option value="">-- Pilih Bank --</option>
                    
                    <option value="Bank Mandiri">Bank Mandiri</option>
                    <option value="Bank Muamalat">Bank Muamalat</option>
                    <option value="Bank BCA">Bank BCA</option>
                    
                </select>   
            </div>      

            <input type="hidden" name="resto_address" value="<?php echo $resto->resto_address?>" />
            <input type="hidden" name="resto_email" value="<?php echo $resto->resto_email?>" />
            <input type="hidden" name="resto_phone" value="<?php echo $resto->resto_phone?>" />


            <label>Nominal Bayar</label><br />
            <input type="number" class="form-control" name="nominal" /><br />               

            <label>Catatan</label><br />
            <textarea class="form-control" rows="3" name="desc"></textarea>            
                     
            <br />          
            <button class="btn btn-primary">Kirim Konfirmasi</button>
            <br /><br />
        </form>
    </div>
</div>
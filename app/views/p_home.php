<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info">
            <h3>Selamat datang Admin <?php echo $c['name']?></h3>
            Terakhir kali anda login adalah <strong><?php echo timeago($c['log'])?></strong> atau tgl <strong><?php echo mdate('%d %M %Y jam %H:%i',mysql_to_unix($c['log']))?></strong>.<br />
            Aplikasi ini digunakan untuk mengatur data-data dari perusahaan anda, yang dapat diakses pada aplikasi android oleh pengguna/client anda.<br />
            Untuk menjaga keamanan, gantilah password anda secara berkala melalui menu <a href="<?php echo site_url().'/app/pwd'?>">Ganti password <i class="fa fa-key"></i></a> berikut.
        </div>
        <div class="alert alert-warning">
            Anda dapat mengakses dashboard aplikasi ini dan merubah data-data adalah <strong><?php echo timeago($acc->valid)?></strong>
            atau sampai dengan tgl <strong><?php echo mdate('%d %M %Y jam %H:%i',mysql_to_unix($acc->valid))?></strong><br />
            Untuk menambah/memperpanjang masa aktif silahkan menuju ke menu <a href="<?php echo site_url().'/app/payment'?>">Pembayaran <i class="fa fa-money"></i></a> berikut.
        </div>
    </div>
</div>

<?php

$m = array();
foreach($cats as $x){
    if($x->category_type==1)
        $m[0] = $x->category_name;

    if($x->category_type==2)
        $m[1] = $x->category_name;

    if($x->category_type==3)
        $m[2] = $x->category_name;
}

?>

<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $feedback?></div>
                        <div>Feedback</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url()?>/app/feedback">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $news?></div>
                        <div><?php echo $m[1]?></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url()?>/app/content">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-dollar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $disc?></div>
                        <div><?php //echo $m[2]?></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url()?>/app/content">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cutlery fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $menu?></div>
                        <div><?php //echo $m[0]?></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url()?>/app/content">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

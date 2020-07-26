<?php
$user = Yii::$app->user->identity;
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"> <span style="font-size:15px">POLITEKNIK POS INDONESIA</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?= Yii::getAlias('@web/template/production/') ?>images/logo_poltekpos.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= ucwords($user->username) ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />


        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li><a href="/biodata"><i class="fa fa-list"></i> Data Dosen </a></li>
                    <li><a href="/jabatan"><i class="fa fa-pencil"></i> Data Jabatan </a></li>
                    <li><a href="/jurusan"><i class="fa fa-gear"></i> Data Jurusan </a></li>
                    <li><a href="/prodi"><i class="fa fa-eye"></i> Data Prodi </a></li>
                    <!-- 
                        <li><a href="/delivery/create"><i class="fa fa-pencil"></i> INPUT KIRIMAN </a></li>
                        <li><a href="/delivery/export"><i class="fa fa-print"></i> LAPORAN </a></li>
                        <li><a href="/site/logout"><i class="fa fa-gear"></i> LOGOUT </a></li> -->
                    <li><a><i class="fa fa-edit"></i> ANP <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/kriteria">Data Kriteria</a></li>
                            <li><a href="/biodata">Data Alternatif</a></li>
                            <li><a href="/perbandingan-kriteria/banding-kriteria">Perbandingan Kriteria</a></li>
                            <li><a href="/perbandingan-alternatif/banding-alternatif">Perbandingan Alternatif</a></li>
                            <li><a href="/biodata">Hasil Perhitungan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="/site/logout">
                <span class="fa fa-gear" aria-hidden="true"></span>
            </a>
        </div> -->
        <!-- /menu footer buttons -->
    </div>
</div>

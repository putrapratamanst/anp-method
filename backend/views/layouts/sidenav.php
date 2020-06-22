<?php
// $user = Yii::$app->user->identity;
$user = "";
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"> <span> POS INDONESIA</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?= Yii::getAlias('@web/template/production/') ?>images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= ucwords($user) ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>Menu</h3>
                    <ul class="nav side-menu">
                        <!-- <li><a href="/"><i class="fa fa-list"></i> DATA KIRIMAN </a></li>
                        <li><a href="/delivery/create"><i class="fa fa-pencil"></i> INPUT KIRIMAN </a></li>
                        <li><a href="/delivery/export"><i class="fa fa-print"></i> LAPORAN </a></li>
                        <li><a href="/site/logout"><i class="fa fa-gear"></i> LOGOUT </a></li> -->
                        <!-- <li><a><i class="fa fa-edit"></i> Data <span class="fa fa-chevron-down"></span></a> -->
                        <!-- <ul class="nav child_menu">
                                <li><a href="/delivery/create">Entry Data</a></li>
                                <li><a href="/delivery/index">List Data</a></li>
                            </ul>
                        </li> -->
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

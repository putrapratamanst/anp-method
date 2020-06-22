<?php

use common\widgets\Alert;

$user = Yii::$app->user->identity;
?>
<?= $this->render('/layouts/head'); ?>
<style>
    .fade:not(.show) {
        opacity: 12;
    }

    .alert {
        position: fixed;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
</style>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?= $this->render('/layouts/sidenav'); ?>
            <?= $this->render('/layouts/topnav'); ?>
            <div class="right_col" role="main">
                <?= Alert::widget() ?>

                <?= $content; ?>
            </div>
            <?= $this->render('/layouts/footer'); ?>

        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= Yii::getAlias('@web/template') ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= Yii::getAlias('@web/template') ?>/build/js/custom.js"></script>

</body>

</html>

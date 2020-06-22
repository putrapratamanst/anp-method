<?php

use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= Yii::getAlias('@web/template/production/') ?>images/img.jpg" type="image/ico" />

    <title>PT.POS INDONESIA | <?= Html::encode($this->title) ?> </title>

    <!-- Bootstrap -->
    <link href="<?= Yii::getAlias('@web/template') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= Yii::getAlias('@web/template') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= Yii::getAlias('@web/template') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= Yii::getAlias('@web/template') ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= Yii::getAlias('@web/template') ?>/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?= $content; ?>
                </section>
            </div>

        </div>
    </div>
</body>

</html>

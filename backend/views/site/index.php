<?php

/* @var $this yii\web\View */

use Da\QrCode\Format\BookMarkFormat;
use yii\helpers\Html;
use Da\QrCode\QrCode;

$this->title = 'My Yii Application';
?>
<div class="x_panel">
    <div class="site-index">

        <div class="jumbotron">
            <h1>Selamat Datang!</h1>

            <p class="lead">Silahkan Klik Tombol Generate QR Code.</p>

            <form method="POST">
                <?= Html::csrfMetaTags() ?>
                <table>
                    <tr>
                        <td valign="top"></td>
                        <input type="hidden" name="_csrf" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ==">
                        <td><input type="submit" name="simpan" value="Generate QR Code" class="btn btn-lg btn-success"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <?php

                    if (isset($_POST['simpan'])) {
                            $format = new BookMarkFormat(['title' => 'Aplikasi Jabfung Dosen', 'url' => 'http://localhost:8002/biodata/create']);


                        $qrCode = (new QrCode($format));
                            // ->setSize(250)
                            // ->setMargin(5)
                            // ->useForegroundColor(51, 153, 255);

                        // now we can display the qrcode in many ways
                        // saving the result to a file:

                        // $qrCode->writeFile(__DIR__ . '/code.png'); // writer defaults to PNG when none is specified

                        // display directly to the browser 
                        header('Content-Type: ' . $qrCode->getContentType());
                        // echo $qrCode->writeString();

                    ?>

                        <?php
                        // or even as data:uri url
                        echo '<img src="' . $qrCode->writeDataUri() . '">';
                        ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

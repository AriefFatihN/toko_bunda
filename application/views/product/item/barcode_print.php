<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Produk <?= $row->barcode ?></title>
</head>

<body>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '"style="width:150px">';
    ?>
    <br>
    <?= $row->barcode ?>
</body>

</html>
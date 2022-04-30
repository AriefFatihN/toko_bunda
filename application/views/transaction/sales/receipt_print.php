<html moznomarginboxes mozdisallowselectionprint>

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo-bunda.png">
    <title>Toko Bunda Nota</title>
    <style type="text/css">
        .content {
            width: 80mm;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
        }

        .head {
            margin-top: 7.5px;
            margin-bottom: 10px;
            padding-bottom: 7.5px;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .bb {
            border-bottom: 1px dashed;
        }

        .w-20 {
            width: 20%;
        }

        .w-50 {
            width: 50%;
        }

        .mini-mt {
            margin-top: 1px;
        }

        .pt-1 {
            padding-top: 1px;
        }

        .pt-3 {
            padding-top: 3px;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .pt-20 {
            padding-top: 20px;
        }

        .pt-1 {
            padding-top: 1px;
        }

        .pb-1 {
            padding-bottom: 1px;
        }

        .pb-2 {
            padding-bottom: 2px;
        }

        .pb-3 {
            padding-bottom: 3px;
        }

        .pb-5 {
            padding-bottom: 5px;
        }

        .pb-10 {
            padding-bottom: 15px;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .no-mb {
            margin-bottom: 0px !important;
        }

        .no-mt {
            margin-top: 0px !important;
        }

        .no-pt {
            padding-top: 0px !important;
        }

        .no-pb {
            padding-bottom: 0px !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .suwun {
            margin-top: 0px;
            padding-top: 2px;
            text-align: center;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
    <script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="content">
        <div class="title">
            <b>TOKO BUNDA JAKENAN PATI</b>
            <br>082323951666<br>
            <br>Jl. Jakenan Winong, Glonggong, Jakenan, Kabupaten Pati
        </div>
        <div class="bb mini-mt"></div>
        <div class="head no-mb pb-3">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td class="w-20 pt-3">Kasir</td>
                    <td class="pt-3">:</td>
                    <td class="text-right pt-3"><?= ucfirst($sales->name) ?></td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td>:</td>
                    <td class="text-right"><?= $sales->customer_id == null ? "Umum" : $sales->customer_name ?></td>
                </tr>
            </table>
        </div>
        <div class="bb mini-mt"></div>
        <div class="transaction">
            <table class="transaction-table" id="trans-table" cellspacing="0" cellpadding="0">
                <?php
                $arr_discount = array();
                $sum_qty = 0;
                foreach ($sales_detail as $key => $value) { ?>
                    <tr>
                        <td class="w-50 pt-3"><?= $value->name ?></td>
                        <td class="pt-3"><?= $value->qty ?></td>
                        <td class="text-right pt-3"><?= indo_currency($value->price) ?></td>
                        <td class="text-right pt-3"><?= indo_currency(($value->price * $value->qty)) ?></td>
                    </tr>
                <?php
                    $sum_qty += $value->qty;
                    if ($value->discount_item > 0) {
                        $arr_discount[] = $value->discount_item;
                    }
                } ?>

                <tr>
                    <td colspan="4" class="bb pt-5"></td>
                </tr>
                <tr>
                    <td class="pt-3">Total Item</td>
                    <td class="pt-3"><?= $sum_qty ?></td>
                    <td class="text-right pt-3" colspan="2"><?= indo_currency($sales->total_price) ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="bb pt-3"></td>
                </tr>

                <?php foreach ($arr_discount as $key => $value) { ?>
                    <tr>
                        <td colspan="3" class="pt-5">Diskon <?= ($key + 1) ?></td>
                        <td class="text-right pt-5"><?= indo_currency($value) ?></td>
                    </tr>
                <?php } ?>

                <?php if ($sales->discount_sale != 0) { ?>
                    <tr>
                        <td colspan="4" class="bb pt-5"></td>
                    </tr>
                    <tr>
                        <td class="pt-5">Diskon Sale</td>
                        <td colspan="2"></td>
                        <td class="text-right pt-5"><?= indo_currency($sales->discount_sale) ?></td>
                    </tr>
                <?php } ?>

                <?php if ($sales->discount_all > 0) { ?>
                    <tr>
                        <td colspan="4" class="bb pt-5"></td>
                    </tr>
                    <tr>
                        <td>Total Diskon</td>
                        <td colspan="2"></td>
                        <td class="text-right pt-5 pb-3"><?= indo_currency($sales->discount_all) ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="bb pt-1"></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="no-pb">Grand Total</td>
                    <td class="pb-3" colspan="2"></td>
                    <td class="text-right pb-3 pt-3"><?= indo_currency($sales->final_price) ?></td>
                </tr>
                <tr>
                    <td class="no-pt pb-1">Tunai</td>
                    <td class="pb-3" colspan="2"></td>
                    <td class="text-right pb-3"><?= indo_currency($sales->cash) ?></td>
                </tr>
                <tr>
                    <td class="pb-5">Kembalian</td>
                    <td class="pb-5" colspan="2"></td>
                    <td class="text-right pb-5"><?= indo_currency($sales->remaining) ?></td>
                </tr>
            </table>
        </div>
        <div class="bb no-pt"></div>
        <div class="suwun">
            <table class="no-pt pb-3 bb" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="pb-3"><?= Date("d F Y", strtotime($sales->date)); ?></td>
                    <td colspan="2"></td>
                    <td class="text-right pb-3"><?= Date("H:i", strtotime($sales->sales_created)); ?></td>
                </tr>
            </table>
            <table class="no-pt pb-5 bb" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="pb-3">Kritik & Saran : 082323951666</td>
                    <td colspan="2"></td>
                    <td class="text-right pb-3">SMS & WA : 082323951666</td>
                </tr>
            </table>
            <table class="pb-5 pt-5" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="text-center">PEMBAYARAN SELESAI !</td>
                </tr>
            </table>
            <table class="pb-10 pt-5" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="text-center">~TERIMA KASIH~</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
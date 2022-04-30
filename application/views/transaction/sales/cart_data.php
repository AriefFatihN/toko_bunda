<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td>
                <p class="text-xs text-secondary mb-0 text-center"><?= $no++ ?></p>
            </td>
            <td class="barcode">
                <p class="text-xs text-secondary mb-0 text-center"><?= $data->barcode ?></p>
            </td>
            <td>
                <p class="text-xs text-secondary mb-0"><?= wordwrap($data->name, 40, "<br>") ?></p>
            </td>
            <td id="harga">
                <p class="text-xs text-secondary mb-0 text-right"><?= indo_currency($data->cart_price) ?></p>
            </td>
            <td id="jumlah">
                <p class="text-xs text-secondary mb-0 text-center"><?= $data->qty ?></p>
            </td>
            <td id="potong">
                <p class="text-xs text-secondary mb-0 text-right"><?= $data->qty >= $data->batasan_qty ? indo_currency($data->potongan) : indo_currency(0) ?>
            </td>
            <td id="total">
                <p class="text-xs text-secondary mb-0 text-right"><?= $data->qty >= $data->batasan_qty ? indo_currency($data->total - $data->potongan) : indo_currency($data->total) ?></p>
            </td>
            <td class="text-center" width="160px">
                <button id="update_cart" class="btn badge bg-gradient-success no-mb" data-toggle="tooltip" title="Edit <?= $data->item_name ?> di Cart" data-bs-toggle="modal" data-bs-target="#modal-edit" data-cartid="<?= $data->cart_id ?>" data-barcode="<?= $data->barcode ?>" data-product="<?= $data->item_name ?>" data-stock="<?= $data->stock ?>" data-price="<?= $data->cart_price ?>" data-qty="<?= $data->qty ?>" data-total="<?= $data->total ?>" data-batasan_qty="<?= $data->batasan_qty ?>" data-potongan="<?= $data->potongan ?>">
                    <i class="fa fa-pencil-alt"></i>
                </button>
                <button id="del_cart" class="btn badge bg-gradient-danger no-mb" data-toggle="tooltip" title="Hapus <?= $data->item_name ?>" data-cartid="<?= $data->cart_id ?>" data-product="<?= $data->item_name ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    <?php } ?>
<?php } else {
    echo '<tr>
        <td colspan="8" class="text-center">Tidak Ada Barang di Cart</td>
    </tr>';
} ?>
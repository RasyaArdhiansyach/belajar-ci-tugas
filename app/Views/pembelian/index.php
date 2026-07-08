<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<hr>
<div class="table-responsive">
    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Pembelian</th>
                <th scope="col">Pembeli</th>
                <th scope="col">Waktu Pembelian</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th colspan="2"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($transactions)) :
                foreach ($transactions as $index => $item) :
            ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['username'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
                        <td><?= $item['alamat'] ?></td>
                        <td>
                            <?= ($item['status'] == "1")
                                ? '<span class="badge bg-success">Sudah Selesai</span>'
                                : '<span class="badge bg-warning">Belum Selesai</span>' ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal-<?= $item['id'] ?>">
                                Detail
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#statusModal<?= $item['id'] ?>">
                                Ubah Status
                            </button>
                        </td>
                    </tr> 
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>

<?php if (!empty($transactions)) : ?>
    <?php foreach ($transactions as $item) : ?>
        <!-- Detail Modal Begin -->
        <div class="modal fade" id="detailModal-<?= $item['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Transaksi #<?= $item['id'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <?php if (!empty($products[$item['id']])) : ?>
                            <?php foreach ($products[$item['id']] as $index2 => $item2) : ?>
                                <?= $index2 + 1 . ")" ?>
                                
                                <?php
                                $imagePath = FCPATH . 'img/' . $item2['foto'];

                                if (!empty($item2['foto']) && file_exists($imagePath)) :
                                ?>
                                    <div class="my-2">
                                        <img src="<?= base_url('img/' . $item2['foto']) ?>" width="100" class="img-thumbnail">
                                    </div>
                                <?php endif; ?>

                                <?php
                                    $hargaDiskon = $item2['subtotal_harga'] / $item2['jumlah'];
                                ?>
                                <strong><?= $item2['nama'] ?></strong>
                                <?= number_to_currency($hargaDiskon, 'IDR') ?>
                                <br>
                                <?= "(" . $item2['jumlah'] . " pcs)" ?><br>
                                <?= number_to_currency($item2['subtotal_harga'], 'IDR') ?>
                                <hr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        Ongkir <?= number_to_currency($item['ongkir'], 'IDR') ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Modal End -->
        <!-- Status Modal Begin -->
        <div class="modal fade" id="statusModal<?= $item['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?= form_open(base_url('pembelian/status/'.$item['id'])) ?>
                        <div class="modal-header">
                            <h5>Ubah Status</h5>
                        </div>
                        <div class="modal-body">
                            <select
                                name="status"
                                class="form-select">
                                <option value="0"
                                    <?= $item['status']==0?'selected':'' ?>>
                                    Belum Selesai
                                </option>
                                <option value="1"
                                    <?= $item['status']==1?'selected':'' ?>>
                                    Sudah Selesai
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                            <button
                                class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <!-- Status Modal End -->
    <?php endforeach; ?>
<?php endif; ?>
<?= $this->endSection() ?>
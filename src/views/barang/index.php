<?php

use MyApp\Core\Messages;

Messages::flash();
?>

<div class="container">
    <div class="header">
        <h2>Daftar Barang</h2>
    </div>
    <div class="row">
        <div>
            <button onclick="location.href=' <?= BASEURL . '/barang/insert'; ?>'" class="btn primary" type="button"><i class="fa-solid fa-plus"></i> Tambah</button>
        </div>
        <table id="example" class="stripe">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Kadaluarsa</th>
                    <th>&nbsp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                foreach ($AllBarang as $barang):
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $barang['nama_barang']; ?></td>
                        <td><?= $barang['jumlah']; ?></td>
                        <td><?= $barang['harga_satuan']; ?></td>
                        <td><?= $barang['expire_date']; ?></td>
                        <td><a href="<?= BASEURL ?>/barang/edit/<?= $barang['barang_id'] ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
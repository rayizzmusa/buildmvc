<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
    <div class="row-home">
        <div class="left">
            <h2>System Gudang</h2>
            <div>
                <input type="text" name="" id="mysearch" placeholder="Search...">
            </div>
            <ul id="mymenu">
                <li>
                    <a href="<?= BASEURL; ?>"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/barang"><i class="fa-solid fa-list"></i> Barang</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/kategori"><i class="fa-solid fa-layer-group"></i> Kategori</a>
                </li>
            </ul>
        </div>
        <div class="right">
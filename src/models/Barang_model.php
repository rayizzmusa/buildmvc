<?php

class Barang_model extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "select * from barang";
        return $this->query($query)->fetchAll();
    }

    public function insert($data)
    {
        $query = "insert into barang (nama_barang, jumlah, harga_satuan, expire_date) values (?,?,?,?)";
        return $this->query($query, [
            $data['nama_barang'],
            $data['jumlah'],
            $data['harga_satuan'],
            $data['kadaluarsa']
        ]);
    }
}

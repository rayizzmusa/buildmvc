<?php

class Barang_model extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('barang');
        $this->setColumn([
            'barang_id',
            'nama_barang',
            'jumlah',
            'harga_satuan',
            'expire_date'
        ]);
    }

    public function getAll()
    {
        // $query = "select * from barang";
        // return $this->query($query)->fetchAll();
        //with query builder
        return $this->get()->fetchAll();
    }

    public function insert($data)
    {
        // $query = "insert into barang (nama_barang, jumlah, harga_satuan, expire_date) values (?,?,?,?)";
        // return $this->query($query, [
        //     $data['nama_barang'],
        //     $data['jumlah'],
        //     $data['harga_satuan'],
        //     $data['kadaluarsa']
        // ]);

        $table = [
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['jumlah'],
            'harga_satuan' => $data['harga_satuan'],
            'expire_date' => $data['kadaluarsa']
        ];

        return $this->insertData($table);
    }

    public function getById($id)
    {
        // $query = "select * from barang where barang_id = ?";
        // return $this->query($query, [$id])->fetch();
        return $this->get(['barang_id' => $id])->fetch();
    }

    public function update($data)
    {
        // $query = "update barang set nama_barang = ?, jumlah = ?, harga_satuan = ?, expire_date = ? where barang_id = ?";
        // return $this->query($query, [
        //     $data['nama_barang'],
        //     $data['jumlah'],
        //     $data['harga_satuan'],
        //     $data['kadaluarsa'],
        //     $data['id']
        // ]);

        $table = [
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['jumlah'],
            'harga_satuan' => $data['harga_satuan'],
            'expire_date' => $data['kadaluarsa']
        ];

        $key = [
            'barang_id' => $data['id']
        ];

        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        // $query = 'delete from barang where barang_id = ?';
        // return $this->query($query, [$id]);

        return $this->deleteData(['barang_id' => $id]);
    }
}

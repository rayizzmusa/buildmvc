<?php

use MyApp\Core\BaseController;
use MyApp\Core\Messages;

class BarangController extends BaseController
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = $this->model('Barang_model');
    }


    public function index()
    {
        $data = [
            'title' => 'Barang',
            'AllBarang' => $this->barangModel->getAll()
        ];

        $this->view('template/header', $data);
        $this->view('barang/index', $data);
        $this->view('template/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Barang',
        ];

        $this->view('template/header', $data);
        $this->view('barang/insert');
        $this->view('template/footer');
    }

    public function insert_barang()
    {
        $fields = [
            'nama_barang' => 'string | required',
            'jumlah' => 'int | required',
            'harga_satuan' => 'float | required',
            'kadaluarsa' => 'string',
        ];

        $message = [
            'nama_barang' => [
                'required' => 'Nama Barang Harus diisi',
                'alphanumeric' => 'Masukan huruf dan angka',
                'between' => 'Nama Barang harus diantara 3 dan 25 karakter'
            ],

            'jumlah' => [
                'required' => 'Jumlah harus diisi'
            ],

            'harga_satuan' => [
                'required' => 'Harga Satuan harus diisi'
            ]
        ];


        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['kadaluarsa'] == "") {
            $inputs['kadaluarsa'] = "0000-00-00";
        }

        if ($errors) {
            Messages::setFlash('error', 'Gagal', $errors[0], $inputs);
            $this->redirect('barang/insert');
        }

        $proses = $this->barangModel->insert($inputs);
        if ($proses) {
            Messages::setFlash('success', 'Berhasil', 'Barang Berhasil ditambahkan');
            $this->redirect('barang');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Barang',
            'barang' => $this->barangModel->getById($id)
        ];

        $this->view('template/header', $data);
        $this->view('barang/edit', $data);
        $this->view('template/footer');
    }

    public function edit_barang()
    {
        $fields = [
            'nama_barang' => 'string | required',
            'jumlah' => 'int | required',
            'harga_satuan' => 'float | required',
            'kadaluarsa' => 'string',
            'id' => 'int',
            'mode' => 'string'
        ];

        $message = [
            'nama_barang' => [
                'required' => 'Nama Barang Harus diisi',
                'alphanumeric' => 'Masukan huruf dan angka',
                'between' => 'Nama Barang harus diantara 3 dan 25 karakter'
            ],

            'jumlah' => [
                'required' => 'Jumlah harus diisi'
            ],

            'harga_satuan' => [
                'required' => 'Harga Satuan harus diisi'
            ]
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['kadaluarsa'] == "") {
            $inputs['kadaluarsa'] = "0000-00-00";
        }

        if ($errors) {
            Messages::setFlash('error', 'Gagal', $errors[0], $inputs);
            $this->redirect('barang/edit/' . $inputs['id']);
        }

        if ($inputs['mode'] == 'update') {
            $proses = $this->barangModel->update($inputs);
            if ($proses) {
                Messages::setFlash('success', 'Berhasil', 'Barang berhasil diubah');
                $this->redirect('barang');
            }
        } else {
            $proses = $this->barangModel->delete($inputs['id']);
            if ($proses) {
                Messages::setFlash('success', 'Berhasil', 'Barang berhasil dihapus');
                $this->redirect('barang');
            }
        }
    }
}

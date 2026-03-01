<?php

class Barang
{
    public function index()
    {
        echo "index barang";
    }
    public function edit($id1, $id2)
    {
        echo "edit barang " . $id1 . " " . $id2;
    }
}

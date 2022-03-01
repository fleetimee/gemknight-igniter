<?php

namespace App\Controllers;

class Latihan extends BaseController
{
    public function index()
    {
        echo 'Ini halaman index';
    }

    // Berbasis segment
    public function jumlah($a = 0, $b = 0)
    {
        echo 'Hasil penjumlahan ' . $a . ' + ' . $b . ' = ' . ($a + $b);
    }

    // Berbasis query string
    //https://localhost/ci4/index.php/latihan/kali?a=10&b=20
    public function kali()
    {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $hasil = $a * $b;
        echo 'Hasil perkalian ' . $a . ' * ' . $b . ' = ' . $hasil;
    }

    // Disanitasi
    //https://localhost/ci4/index.php/latihan/bagi?a=10&b=20
    public function bagi()
    {
        $a = $this->request->getGet('a');
        $b = $this->request->getGet('b');
        $hasil = $a / $b;
        echo 'Hasil pembagian ' . $a . ' / ' . $b . ' = ' . $hasil;
    }

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->$builder = $db->table('kota');
    }

    public function ambil()
    {
        $hasil = $this->$builder->get();

        foreach ($hasil->getResult() as $row) {
            echo $row->kota_nama . '<br>';
        }
    }

    public function tambah($nama = '')
    {

        $this->$builder->insert([
            'kota_nama' => $nama, // Masukkan data kota
        ]);

        echo 'Data berhasil ditambahkan';
    }

    public function ubah($id = '0', $nama = '')
    {

        $this->$builder->where('kota_id', 2); // Masukkan data kota
        $this->$builder->update([
            'kota_nama' => 'Bogor', // Masukkan data kota
        ]);

        echo 'Data berhasil diubah';
    }

    public function hapus($id)
    {

        $this->$builder->where('kota_id', $id); // Masukkan data kota
        $this->$builder->delete();

        echo 'Data berhasil dihapus';
    }
}

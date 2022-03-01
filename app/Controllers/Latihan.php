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

    public function ambil()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('kota');
        $hasil = $builder->get();

        foreach ($hasil->getResult() as $row) {
            echo $row->kota_nama . '<br>';
        }
    }

    public function tambah()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('kota');

        $builder->insert([
            'kota_nama' => 'Surakarta', // Masukkan data kota
        ]);

        echo 'Data berhasil ditambahkan';
    }

    public function ubah()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('kota');

        $builder->where('kota_id', 2); // Masukkan data kota
        $builder->update([
            'kota_nama' => 'Bogor', // Masukkan data kota
        ]);

        echo 'Data berhasil diubah';
    }

    public function hapus()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('kota');

        $builder->where('kota_id', 3); // Masukkan data kota
        $builder->delete();

        echo 'Data berhasil dihapus';
    }
}

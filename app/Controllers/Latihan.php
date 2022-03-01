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
}

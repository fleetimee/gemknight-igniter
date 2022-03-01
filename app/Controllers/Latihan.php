<?php

namespace App\Controllers;

class Latihan extends BaseController
{
  public function index()
  {
    echo "Ini halaman index";
  }

  // Berbasis segment
  public function jumlah($a = 0, $b = 0)
  {
    echo "Hasil penjumlahan " . $a . " + " . $b . " = " . ($a + $b);
  }

  // Berbasis query string
  //https://localhost/ci4/index.php/latihan/kali?a=10&b=20
  public function kali()
  {
    $a = $_GET["a"];
    $b = $_GET["b"];
    $hasil = $a * $b;
    echo "Hasil perkalian " . $a . " * " . $b . " = " . $hasil;
  }

  // Disanitasi
  //https://localhost/ci4/index.php/latihan/bagi?a=10&b=20
  public function bagi()
  {
    $a = $this->request->getGet("a");
    $b = $this->request->getGet("b");
    $hasil = $a / $b;
    echo "Hasil pembagian " . $a . " / " . $b . " = " . $hasil;
  }

  // CRUD

  public function __construct()
  {
    $db = \Config\Database::connect();
    $this->builder = $db->table("kota");
  }

  public function ambil()
  {
    $hasil = $this->builder->get();
    foreach ($hasil->getResult() as $baris) {
      echo "$baris->kota_id  $baris->kota_nama <br/>";
    }
  }

  public function tambah($nama = "")
  {
    $this->builder->insert(["kota_nama" => $nama]);
    echo "data sudah ditambahkan";
  }

  public function ubah($id = 0, $nama = "")
  {
    $this->builder->set("kota_nama", $nama);
    $this->builder->where("kota_id", $id);
    $this->builder->update();
    echo "data sudah diubah";
  }

  public function hapus($id)
  {
    $this->builder->where("kota_id", $id);
    $this->builder->delete();
    echo "data sudah dihapus";
  }

  public function ambilModel()
  {
    $model = new \App\Models\ModelKota();
    $hasil = $model->findAll();
    foreach ($hasil as $baris) {
      echo "$baris->kota_id  $baris->kota_nama <br/>";
    }
  }

  public function simpanModel($id = 0, $nama = "")
  {
    $model = new \App\Models\ModelKota();
    $model->save(["kota_id" => $id, "kota_nama" => $nama]);
    echo "data sudah disimpan";
  }

  public function hapusModel($id = 0)
  {
    $model = new \App\Models\ModelKota();
    $model->delete($id);
    echo "data sudah dihapus";
  }

  public function latihanview()
  {
    $data = ["judul" => "Latihan View", "isi" => "Ini adalah isi dari view"];
    echo view("latihan_view", $data);
  }

  public function gabungview()
  {
    echo view("latihan_view");
    echo view("latihan_content");
    echo view("latihan_footer");
  }
}

<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function __construct()
  {
    $db = \Config\Database::connect();
    $this->buildkota = $db->table("kota");
    $this->buildpengguna = $db->table("pengguna");
  }

  public function index()
  {
    return view("beranda");
  }

  public function kota()
  {
    $kota = $this->buildkota->get();
    $data["kota"] = $kota->getResult();
    return view("kota", $data);
  }

  public function pengguna()
  {
    //Join dengan kota
    $this->buildpengguna->select("*");
    $this->buildpengguna->join("kota", "pengguna.kota_id = kota.kota_id");

    $pengguna = $this->buildpengguna->get();
    $data["pengguna"] = $pengguna->getResult();
    return view("pengguna", $data);
  }

  public function penggunaform($id = 0)
  {
    // Untuk Select
    $kota = $this->buildkota->get()->getResult();
    $data["kota"] = $kota;

    //Mode tambah
    $obj = new \stdClass();
    $obj->pengguna_id = 0;
    $obj->pengguna_email = "pengguna@domain.com";
    $obj->pengguna_sandi = "rahasia";
    $obj->pengguna_kota = "0";
    $data["pengguna"] = $obj;

    //Mode edit
    if ($id != 0) {
      $this->buildpengguna->where("pengguna_id", $id);
      $pengguna = $this->buildpengguna->get()->getResult()[0];
      $data["pengguna"] = $pengguna;
    }
    return view("pengguna_form", $data);
  }

  public function penggunaproses()
  {
    $data["pengguna_id"] = $this->request->getPost("pengguna_id");
    $data["pengguna_email"] = $this->request->getPost("pengguna_email");
    $data["pengguna_sandi"] = $this->request->getPost("pengguna_sandi");
    $data["kota_id"] = $this->request->getPost("kota_id");

    if ($data["pengguna_id"] == 0) {
      $this->buildpengguna->insert($data);
    } else {
      $this->buildpengguna->where("pengguna_id", $data["pengguna_id"]);
      $this->buildpengguna->update($data);
    }

    return redirect()->to(base_url("/admin/pengguna"));
  }

  public function penggunahapus($id = 0)
  {
    $this->buildpengguna->where("pengguna_id", $id);
    $this->buildpengguna->delete();
    return redirect()->to(base_url("/admin/pengguna"));
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url("/"));
  }
}

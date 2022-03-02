<?php

namespace App\Controllers;

class Publik extends BaseController
{
  public function __construct()
  {
    $db = \Config\Database::connect();
    $this->builder = $db->table("pengguna");
  }

  public function index()
  {
    return view("public");
  }

  public function login()
  {
    return view("login");
  }

  public function loginproses()
  {
    $session = session();
    $email = $this->request->getPost("email");
    $sandi = $this->request->getPost("sandi");
    $this->builder->where("pengguna_email", $email);
    $this->builder->where("pengguna_sandi", $sandi);
    $hasil = $this->builder->get()->getResult();
    if (count($hasil) == 1) {
      //ada 1 pengguna
      $pengguna = $hasil[0];
      //verifikasi
      if (
        $pengguna->pengguna_email == $email &&
        $pengguna->pengguna_sandi == $sandi
      ) {
        //sukses login

        $session->set("email", $email);
        $session->set("id", $pengguna->pengguna_id);
        return redirect()->to("admin");
      }
    }
    $session->setFlashdata("pesan", "email atau sandi salah");
    // return redirect()->to("publik/login");
  }
}

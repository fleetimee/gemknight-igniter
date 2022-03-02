<?php

namespace App\Controllers;

class Publik extends BaseController
{
  public function index()
  {
    return view("public");
  }

  public function login()
  {
    return view("login");
  }
}

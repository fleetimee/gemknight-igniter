<?php

function cekakses($resp)
{
  $session = session();
  $email = $session->get("email");
  if (empty($email)) {
    $session->setFlashdata("pesan", "Anda harus login terlebih dahulu");
    $resp->redirect(site_url("publik/login"));
  }
}

?>

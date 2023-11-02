<?php

class Flasher
{
  public static function setFlash($pesan, $tipe)
  {
    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'tipe' => $tipe
    ];
  }
  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo $_SESSION['flash']['pesan'] . $_SESSION['flash']['tipe'];
      unset($_SESSION['flash']);
    }
  }
}

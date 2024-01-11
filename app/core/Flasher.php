<?php

class Flasher
{
  public static function setFlash($pesan, $aksi, $tipe, $objek)
  {
    $_SESSION['flash'] = [
      'objek' => $objek,
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe
    ];
  }
  public static function setFlashCheckout($pesan, $tipe)
  {
    $_SESSION['flash_checkout'] = [
      'pesan' => $pesan,
      'tipe' => $tipe
    ];
  }
  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
              data ' . $_SESSION['flash']['objek'] . ' <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['flash']);
    }
  }
  public static function flashCheckout()
  {
    if (isset($_SESSION['flash_checkout'])) {
      echo '<div class="alert alert-' . $_SESSION['flash_checkout']['tipe'] . ' alert-dismissible fade show" role="alert">
              checkout <strong>' . $_SESSION['flash_checkout']['pesan'] . '</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['flash_checkout']);
    }
  }
}
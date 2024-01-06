<?php
class Cart extends Controller
{
  public function index()
  {
    $data['title'] = 'cart';
    $data['cart'] = $this->model('Activity_model')->getAllActivity($_SESSION['kode_apoteker']);
    $this->view('templates/header', $data);
    $this->view('cart/index', $data);
    $this->view('templates/footer');
  }

  public function hapus($kode)
  {
    if ($this->model('Activity_model')->hapus($kode, $_SESSION['kode_apoteker']) > 0) {
      Flasher::setFlash('berhasil', 'dihapus dari keranjang', 'success', 'obat');
      header('Location: ' . BASEURL . '/cart');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus dari keranjang', 'danger', 'obat');
      header('Location: ' . BASEURL . '/cart');
      exit;
    }
  }

  public function tambah($kode)
  {
    if ($this->model('Activity_model')->oneObat($kode, $_SESSION['kode_apoteker']) == false) {
      if ($this->model('Activity_model')->tambah($kode, $_SESSION['kode_apoteker']) > 0) {
        Flasher::setFlash('berhasil', 'ditambahkan ke keranjang', 'success', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambahkan ke keranjang', 'danger', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      }
    } else {
      Flasher::setFlash('sudah ada', 'dalam keranjang', 'danger', 'obat');
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }


  public function editJumlah($kode)
  {
    $jumlah = $_POST['jumlah'];
    if ($this->model('Activity_model')->editJumlah($kode, $_SESSION['kode_apoteker'], $jumlah) > 0) {
      Flasher::setFlash('berhasil', 'diubah', 'success', 'jumlah');
      header('Location: ' . BASEURL . '/cart');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger', 'jumlah');
      header('Location: ' . BASEURL . '/cart');
      exit;
    }
  }
}
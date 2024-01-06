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
      Flasher::setFlash('berhasil', 'dihapus', 'success', 'obat');
      header('Location: ' . BASEURL . '/cart');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger', 'obat');
      header('Location: ' . BASEURL . '/cart');
      exit;
    }
  }
}

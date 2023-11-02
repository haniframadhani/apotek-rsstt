<?php
class Home extends Controller
{
  public function index()
  {
    $data['title'] = 'home';
    $baru['obat'] = $this->model('Obat_model')->getAllObat();
    $this->view('templates/header', $data);
    $this->view('home/index', $baru);
    $this->view('templates/footer');
  }
  public function tambahObat()
  {
    $data['title'] = 'tambah obat';
    $this->view('templates/header', $data);
    $this->view('home/tambahObat');
    $this->view('templates/footer');
  }
  public function tambah()
  {
    if ($this->model('Obat_model')->tambahDataObat($_POST) > 0) {
      Flasher::setFlash('test flash', 'berhasil');
      header('Location: ' . BASEURL . '/home');
      exit;
    } else {
      Flasher::setFlash('test flash', 'gagal');
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }
}

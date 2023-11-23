<?php
class Home extends Controller
{
  public function index()
  {
    $data['title'] = 'home';
    $data['obat'] = $this->model('Obat_model')->getAllObat();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
  public function tambahObat()
  {
    $data['title'] = 'tambah obat';
    $this->view('templates/header', $data);
    $this->view('home/tambahObat');
    $this->view('templates/footer');
  }
  public function detail($kode)
  {
    $data['obat'] = $this->model('Obat_model')->getObatByKode($kode);
    $data['title'] = $data['obat']['nama_generik'] . ' / ' . $data['obat']['nama_merek'];
    $this->view('templates/header', $data);
    $this->view('home/detail', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    if ($this->model('Obat_model')->tambahDataObat($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'obat');
      header('Location: ' . BASEURL . '/home');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'obat');
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }
  public function hapus($id)
  {
    if ($this->model('Obat_model')->hapusDataObat($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success', 'obat');
      header('Location: ' . BASEURL . '/home');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger', 'obat');
      header('Location: ' . BASEURL . '/home');
      exit;
    }
  }
}

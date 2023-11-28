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
    $data['errors'] = '';
    $data['obat'] = $this->model('Obat_model')->getEmpty();
    $data['format'] = $this->model('Obat_model')->getFormatDefault();
    $this->view('templates/header', $data);
    $this->view('home/tambahObat', $data);
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
  public function update($kode)
  {
    $data['obat'] = $this->model('Obat_model')->getObatByKode($kode);
    $data['title'] = 'update ' . $data['obat']['nama_generik'] . ' / ' . $data['obat']['nama_merek'];
    $data['errors'] = $this->model('Obat_model')->getEmpty();
    $data['format']=$this->model('Obat_model')->getFormatDefault();
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    $tempData = $_POST;
    $data['obat'] = $tempData;
    if($this->model('Obat_model')->validasi($tempData)){
      if ($this->model('Obat_model')->tambahDataObat($tempData) > 0) {
        Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      }
    } else {
      $data['errors'] = $this->model('Obat_model')->getError($tempData);
    }
    $data['format'] = $this->model('Obat_model')->getFormat($tempData);
    $this->view('templates/header', $data);
    $this->view('home/tambahObat', $data);
    $this->view('templates/footer');
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
  public function ubah()
  {
    $tempData = $_POST;
    $data['title'] = $tempData['nama_generik'] . ' / ' . $tempData['nama_merek'];    
    $data['obat'] = $tempData;
    if($this->model('Obat_model')->validasi($tempData)){
      if ($this->model('Obat_model')->ubahDataObat($tempData) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      }
    } else {
      $data['errors'] = $this->model('Obat_model')->getError($tempData);
    }
    $data['format'] = $this->model('Obat_model')->getFormat($tempData);
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }

}
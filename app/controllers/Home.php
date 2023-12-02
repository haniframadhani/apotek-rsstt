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
    $data['obat'] = $this->getData();
    $data['errors'] = $this->getError();
    $data['format']=$this->getFormatDefault();
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
    $this->setData($data);
    $data['errors'] = $this->getError();
    $data['format']=$this->getFormatDefault();
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    $data['title'] = 'tambah obat';
    $data['obat'] = $_POST;
    $this->setData($data['obat']);
    if($this->validasi()){
      if ($this->model('Obat_model')->tambahDataObat($data['obat']) > 0) {
        Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      }
    } else {
      $data['errors'] = $this->getError();
    }
    $data['format'] = $this->getFormat();
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
    $data['obat'] = $_POST;
    $tempDatabase = $this->model('Obat_model')->getObatByKode($data['obat']['kode']);
    $data['title'] = 'update ' . $tempDatabase['nama_generik'] . ' / ' . $tempDatabase['nama_merek'];
    $this->setData($data['obat']);
    if($this->validasi()){
      if ($this->model('Obat_model')->ubahDataObat($data['obat']) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger', 'obat');
        header('Location: ' . BASEURL . '/home');
        exit;
      }
    } else {
      $data['errors'] = $this->getError();
    }
    $data['format'] = $this->getFormat();
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }

}
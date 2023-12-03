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
    $validator = $this->validate('Validate');
    $data['obat'] = $validator->getData();
    $data['errors'] = $validator->getError();
    $data['format']=$validator->getFormatDefault();
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
    $validator = $this->validate('Validate');
    $validator->setData($data);
    $data['errors'] = $validator->getError();
    $data['format']=$validator->getFormatDefault();
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    $data['title'] = 'tambah obat';
    $data['obat'] = $_POST;
    $validator = $this->validate('Validate');
    $validator->setData($data['obat']);
    if($validator->validasi()){
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
      $data['errors'] = $validator->getError();
    }
    $data['format'] = $validator->getFormat();
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
    $validator = $this->validate('Validate');
    $validator->setData($data['obat']);
    if($validator->validasi()){
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
      $data['errors'] = $validator->getError();
    }
    $data['format'] = $validator->getFormat();
    $this->view('templates/header', $data);
    $this->view('home/update', $data);
    $this->view('templates/footer');
  }
  public function cari(){
    $data['title'] = 'home';
    if(isset($_POST)){
      $key = $_POST;
      $data['obat'] = $this->model('Obat_model')->getObatByKey($key['keyword']);
    }
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}
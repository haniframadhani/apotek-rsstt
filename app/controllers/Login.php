<?php
class Login extends Controller
{
  public function index()
  {
    if (isset($_SESSION['kode_apoteker'])) {
      header('Location: ' . BASEURL . '/home');
    }
    $data['title'] = 'login';
    $this->view('templates/header', $data);
    $this->view('login/index', $data);
    $this->view('templates/footer');
  }
  public function login()
  {
    $data['email'] = $_POST['email'];
    $data['password'] = md5($_POST['password']);
    $data['user'] = $this->model('User_model')->login($data['email']);
    if ($data['user'] == false || $data['password'] != $data['user']['password']) {
      $data['error'] = 'email atau password salah';
      $data['title'] = 'login';
      $this->view('templates/header', $data);
      $this->view('login/index', $data);
      $this->view('templates/footer');
      return;
    }
    $data['detail'] = $this->model('User_model')->getUser($data['user']['kode_apoteker']);
    $_SESSION['kode_apoteker'] = $data['user']['kode_apoteker'];
    $_SESSION['level'] = $data['user']['level'];
    $_SESSION['nama'] = $data['detail']['nama'];
    header('Location: ' . BASEURL . '/home');
  }
  public function logout()
  {
    session_destroy();
    header('Location: ' . BASEURL . '/login');
  }
}

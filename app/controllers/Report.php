<?php
class Report extends Controller
{
  public function index()
  {
    if ($_SESSION['level'] != 'admin') {
      header('Location: ' . BASEURL . '/home');
      exit;
    }
    $data['title'] = 'report';
    $data['logs'] = $this->model('Activity_model')->getAllApotekerActivity();
    $this->view('templates/header', $data);
    $this->view('report/index', $data);
    $this->view('templates/footer');
  }

  public function print()
  {
    if ($_SESSION['level'] != 'admin') {
      header('Location: ' . BASEURL . '/home');
      exit;
    }
    $data['logs'] = $this->model('Activity_model')->getAllApotekerActivity();
    $this->view('report/print', $data);
  }
}

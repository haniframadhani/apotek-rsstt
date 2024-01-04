<?php

class Controller
{
  public function view($view, $data = [])
  {
    if (!isset($_SESSION['kode_apoteker'])) {
      require_once '../app/views/templates/header.php';
      require_once '../app/views/login/index.php';
      require_once '../app/views/templates/footer.php';
    } else {
      require_once '../app/views/' . $view . '.php';
    }
  }
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
  public function validate($validate)
  {
    require_once '../app/controllers/' . $validate . '.php';
    return new $validate;
  }
}

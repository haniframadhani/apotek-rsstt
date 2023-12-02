<?php

class Controller
{
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
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
<?php

class User_model
{
  private $table = 'akun';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function login($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
    $this->db->bind('email', $email);
    return $this->db->single();
  }

  public function getUser($kode)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode=:kode');
    $this->db->bind('kode', $kode);
    return $this->db->single();
  }
}

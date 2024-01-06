<?php

class Activity_model
{
  private $table = 'cart';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllActivity($apoteker)
  {
    $this->db->query("SELECT cart.kode_obat, cart.jumlah, obat.nama_generik, obat.nama_merek, obat.harga, obat.stok FROM " . $this->table . " INNER JOIN obat ON cart.kode_obat = obat.kode WHERE kode_apoteker = :apoteker");
    $this->db->bind('apoteker', $apoteker);
    return $this->db->resultSet();
  }

  public function hapus($obat, $apoteker)
  {
    $this->db->query("DELETE FROM " . $this->table . " WHERE kode_apoteker = :apoteker AND kode_obat = :obat");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function tambah($obat, $apoteker)
  {
    $this->db->query("INSERT INTO $this->table (kode_apoteker, kode_obat, jumlah) VALUES (:apoteker, :obat, 1)");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function oneObat($obat, $apoteker)
  {
    $this->db->query("SELECT * FROM  $this->table WHERE kode_apoteker = :apoteker AND kode_obat = :obat");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    return $this->db->resultSet();
  }
}
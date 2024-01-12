<?php

class Activity_model
{
  private $tableCart = 'cart';
  private $tableLog = 'activity_log';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getOneApotekerActivity($apoteker)
  {
    $this->db->query("SELECT cart.kode_obat, cart.jumlah, obat.nama_generik, obat.nama_merek, obat.harga, obat.stok FROM $this->tableCart INNER JOIN obat ON cart.kode_obat = obat.kode WHERE kode_apoteker = :apoteker");
    $this->db->bind('apoteker', $apoteker);
    return $this->db->resultSet();
  }

  public function getAllApotekerActivity()
  {
    $this->db->query("SELECT activity_log.id,activity_log.time,activity_log.jumlah,obat.kode as 'kode_obat',obat.nama_generik,obat.nama_merek,obat.harga,apoteker.kode as 'kode_apoteker',apoteker.nama as 'nama_apoteker' FROM ((activity_log INNER JOIN obat ON activity_log.kode_obat = obat.kode ) INNER JOIN apoteker ON activity_log.kode_apoteker = apoteker.kode) ORDER BY activity_log.time DESC");
    return $this->db->resultSet();
  }

  public function hapus($obat, $apoteker)
  {
    $this->db->query("DELETE FROM " . $this->tableCart . " WHERE kode_apoteker = :apoteker AND kode_obat = :obat");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function tambah($obat, $apoteker)
  {
    $this->db->query("INSERT INTO $this->tableCart (kode_apoteker, kode_obat, jumlah) VALUES (:apoteker, :obat, 1)");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function oneObat($obat, $apoteker)
  {
    $this->db->query("SELECT * FROM  $this->tableCart WHERE kode_apoteker = :apoteker AND kode_obat = :obat");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    return $this->db->resultSet();
  }

  public function editJumlah($obat, $apoteker, $jumlah)
  {
    $this->db->query("UPDATE $this->tableCart SET jumlah = :jumlah WHERE kode_apoteker = :apoteker AND kode_obat = :obat");
    $this->db->bind('obat', $obat);
    $this->db->bind('apoteker', $apoteker);
    $this->db->bind('jumlah', htmlspecialchars($jumlah));
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function checkout($kode_apoteker, $log_tambah, $data)
  {
    try {
      $this->db->beginTransaction();
      $this->db->query("DELETE FROM $this->tableCart WHERE kode_apoteker = :apoteker");
      $this->db->bind('apoteker', $kode_apoteker);
      $this->db->execute();
      $this->db->query("INSERT INTO $this->tableLog (`time`, `kode_apoteker`, `kode_obat`, `jumlah`) VALUES $log_tambah");
      $this->db->execute();
      // $this->db->bind('log_tambah', $log_tambah);
      foreach ($data as $cart) {
        $this->db->query("UPDATE obat SET stok = :jumlah WHERE kode = :obat");
        $this->db->bind('obat', $cart['kode_obat']);
        $this->db->bind('jumlah', $cart['jumlah']);
        $this->db->execute();
      }
      $this->db->commit();
      return $this->db->rowCount();
    } catch (Exception $e) {
      $this->db->rollback();
      return 0;
    }
  }
}

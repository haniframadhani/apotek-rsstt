<?php

class Obat_model
{
  private $table = 'obat';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllObat()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getObatByKode($kode)
  {
    $this->db->query('SELECT * FROM ' . $this->table . 'WHERE kode=:kode');
    $this->db->bind('kode', $kode);
    return $this->db->single();
  }

  public function tambahDataObat($data)
  {
    $query = "INSERT INTO obat (
      nama_generik,
      nama_merek,
      deskripsi,
      stok,
      unit,
      efek_samping,
      indikasi,
      kontradiksi,
      peringatan,
      interaksi_obat,
      produsen,
      harga
    ) VALUES(
      :namaGenerik,
      :namaMerek,
      :deskripsi,
      :stok,
      :unit,
      :efekSamping,
      :indikasi,
      :kontradiksi,
      :peringatan,
      :interaksiObat,
      :produsen,
      :harga
    )";
    $this->db->query($query);
    $this->db->bind('namaGenerik', htmlspecialchars($data['nama-generik']));
    $this->db->bind('namaMerek', htmlspecialchars($data['nama-merek']));
    $this->db->bind('stok', (int)htmlspecialchars($data['stok']));
    $this->db->bind('unit', htmlspecialchars($data['unit']));
    $this->db->bind('deskripsi', htmlspecialchars($data['deskripsi']));
    $this->db->bind('efekSamping', htmlspecialchars($data['efek-samping']));
    $this->db->bind('indikasi', htmlspecialchars($data['indikasi']));
    $this->db->bind('kontradiksi', htmlspecialchars($data['kontradiksi']));
    $this->db->bind('peringatan', htmlspecialchars($data['peringatan']));
    $this->db->bind('interaksiObat', htmlspecialchars($data['interaksi-obat']));
    $this->db->bind('produsen', htmlspecialchars($data['produsen']));
    $this->db->bind('harga', (int)htmlspecialchars($data['harga']));
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function hapusDataObat($kode)
  {
    $query = "DELETE FROM obat WHERE kode=:kode";
    $this->db->query($query);
    $this->db->bind('kode', $kode);

    $this->db->execute();

    return $this->db->rowCount();
  }
}

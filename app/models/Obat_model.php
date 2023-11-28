<?php

class Obat_model
{
  private $table = 'obat';
  private $db;
  private $val;
  private $error;
  private $index;
  

  public function __construct()
  {
    $this->val = new Validate;
    $this->db = new Database;
    $this->index = [
      'nama_generik',
      'nama_merek',
      'stok',
      'unit',
      'deskripsi',
      'efek_samping',
      'indikasi',
      'kontradiksi',
      'peringatan',
      'interaksi_obat',
      'produsen',
      'harga'
  ];
    $this->error = array_fill_keys($this->index, '');
  }

  public function getAllObat()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getObatByKode($kode)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode=:kode');
    $this->db->bind('kode', $kode);
    return $this->db->single();
  }

  public function tambahDataObat($data)
  {
    $query = "INSERT INTO $this->table (
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
    $query = 'DELETE FROM ' . $this->table . ' WHERE kode=:kode';
    $this->db->query($query);
    $this->db->bind('kode', $kode);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function ubahDataObat($data)
  {
    $query = "UPDATE $this->table SET
      nama_generik=:namaGenerik,
      nama_merek=:namaMerek,
      deskripsi=:deskripsi,
      stok=:stok,
      unit=:unit,
      efek_samping=:efekSamping,
      indikasi=:indikasi,
      kontradiksi=:kontradiksi,
      peringatan=:peringatan,
      interaksi_obat=:interaksiObat,
      produsen=:produsen,
      harga=:harga
      WHERE kode=:kode";
    $this->db->query($query);
    $this->db->bind('namaGenerik', htmlspecialchars($data['nama_generik']));
    $this->db->bind('namaMerek', htmlspecialchars($data['nama_merek']));
    $this->db->bind('stok', (int)htmlspecialchars($data['stok']));
    $this->db->bind('unit', htmlspecialchars($data['unit']));
    $this->db->bind('deskripsi', htmlspecialchars($data['deskripsi']));
    $this->db->bind('efekSamping', htmlspecialchars($data['efek_samping']));
    $this->db->bind('indikasi', htmlspecialchars($data['indikasi']));
    $this->db->bind('kontradiksi', htmlspecialchars($data['kontradiksi']));
    $this->db->bind('peringatan', htmlspecialchars($data['peringatan']));
    $this->db->bind('interaksiObat', htmlspecialchars($data['interaksi_obat']));
    $this->db->bind('produsen', htmlspecialchars($data['produsen']));
    $this->db->bind('harga', (int)htmlspecialchars($data['harga']));
    $this->db->bind('kode', htmlspecialchars($data['kode']));
    $this->db->execute();
    return $this->db->rowCount();
  }
  private function input($data){
    $this->error['stok'] = $this->val->validateNumber($data['stok']);
    $this->error['harga'] = $this->val->validateNumber($data['harga']);
    $this->error['nama_generik'] = $this->val->validateText($data['nama_generik']);
    $this->error['nama_merek'] = $this->val->validateText($data['nama_merek']);
    $this->error['produsen'] = $this->val->validateText($data['produsen']);
    $this->error['deskripsi'] = $this->val->validateTextArea($data['deskripsi']);
    $this->error['efek_samping'] = $this->val->validateTextArea($data['efek_samping']);
    $this->error['indikasi'] = $this->val->validateTextArea($data['indikasi']);
    $this->error['kontradiksi'] = $this->val->validateTextArea($data['kontradiksi']);
    $this->error['peringatan'] = $this->val->validateTextArea($data['peringatan']);
    $this->error['interaksi_obat'] = $this->val->validateTextArea($data['interaksi_obat']);
    $this->error['unit'] = $this->val->validateSelect($data['unit']);
  }
  public function validasi($data){
    $this->input($data);
    return $this->val->check($this->error);
  }

  public function getError($data){
    $this->input($data);
    return $this->error;
  }
  public function getEmpty(){
    return $this->error;
  }
  
  public function getFormat($data){
    $this->input($data);
    $this->error['stok'] = $this->val->format($this->error['stok']);
    $this->error['harga'] = $this->val->format($this->error['harga']);
    $this->error['nama_generik'] = $this->val->format($this->error['nama_generik']);
    $this->error['nama_merek'] = $this->val->format($this->error['nama_merek']);
    $this->error['produsen'] = $this->val->format($this->error['produsen']);
    $this->error['deskripsi'] = $this->val->format($this->error['deskripsi']);
    $this->error['efek_samping'] = $this->val->format($this->error['efek_samping']);
    $this->error['indikasi'] = $this->val->format($this->error['indikasi']);
    $this->error['kontradiksi'] = $this->val->format($this->error['kontradiksi']);
    $this->error['peringatan'] = $this->val->format($this->error['peringatan']);
    $this->error['interaksi_obat'] = $this->val->format($this->error['interaksi_obat']);
    $this->error['unit'] = $this->val->format($this->error['unit']);
    return $this->error;
  }
  public function getFormatDefault(){
    $temp=array_fill_keys($this->index, 'form-control');
    return $temp;
  }
}
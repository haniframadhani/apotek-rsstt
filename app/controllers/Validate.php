<?php

class Validate
{
    private $data;
    private $error;
    private $format;
    private $index;
   
    public function __construct(){
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
        $this->data = array_fill_keys($this->index, '');
    }

    public function setData($data){
        $this->data = $data;

    }    
    public function getData(){
        return $this->data;
    }
    private function validateNumber($data){
        $error = '';
        if(empty($data)){    
            $error = "Wajib disi";
        }
        else{     
            if(is_numeric($data)){
                if ($data < 0) {
                    $error = "lebih kecil dari 0";
                } 
                else if($data > 2147483647) {
                    $error = "lebih besar dari 2.147.483.647";
                }
            }
            else{
                $error = "harus angka";
            }
        }
        return $error;
    } 
    private function validateText($data){
        $error = '';
        if(strlen($data) == 0){    
            $error = "Wajib disi";
        }
        else{     
            if(strlen($data) < 0){ 
                $error = "kurang dari 0 karakter"; 
            }
            else if(strlen($data) > 255){ 
                $error = "lebih dari 255 ";
            }
        }
        return $error;
        
    } 
    private function validateTextArea($data){
        $error = '';
        if(strlen($data) == 0){    
            $error = "Wajib disi";
        }
        else{     
            if(strlen($data) < 0){ 
                $error = "kurang dari 0 karakter"; 
            }
            else if(strlen($data) > 65535){ 
                $error = "lebih dari 65.535";
            }
        }
        return $error;
    } 
    private function validateSelect($data){
        $error = '';
        $unit = ['botol','tablet','kapsul'];
        if(empty($data) || !in_array($data, $unit)) {
            $error = "pilihan tidak valid";
        }
        return $error;
    } 
    private function check(){
        $this->error['stok'] = $this->validateNumber($this->data['stok']);
        $this->error['harga'] = $this->validateNumber($this->data['harga']);
        $this->error['nama_generik'] = $this->validateText($this->data['nama_generik']);
        $this->error['nama_merek'] = $this->validateText($this->data['nama_merek']);
        $this->error['produsen'] = $this->validateText($this->data['produsen']);
        $this->error['deskripsi'] = $this->validateTextArea($this->data['deskripsi']);
        $this->error['efek_samping'] = $this->validateTextArea($this->data['efek_samping']);
        $this->error['indikasi'] = $this->validateTextArea($this->data['indikasi']);
        $this->error['kontradiksi'] = $this->validateTextArea($this->data['kontradiksi']);
        $this->error['peringatan'] = $this->validateTextArea($this->data['peringatan']);
        $this->error['interaksi_obat'] = $this->validateTextArea($this->data['interaksi_obat']);
        $this->error['unit'] = $this->validateSelect($this->data['unit']);
    }
    public function validasi(){
        $this->check();
        foreach ($this->error as $cek) {
            if (!empty($cek)) {
                return false;
            }
        }
        return true;
    }
    public function getError(){
        return $this->error;
    }
    public function format($data){
        if (empty($data)) {
            return "form-control is-valid";
        }else{
            return "form-control is-invalid";
        }
    }
    public function getFormat(){
        $this->format['stok'] = $this->format($this->error['stok']);
        $this->format['harga'] = $this->format($this->error['harga']);
        $this->format['nama_generik'] = $this->format($this->error['nama_generik']);
        $this->format['nama_merek'] = $this->format($this->error['nama_merek']);
        $this->format['produsen'] = $this->format($this->error['produsen']);
        $this->format['deskripsi'] = $this->format($this->error['deskripsi']);
        $this->format['efek_samping'] = $this->format($this->error['efek_samping']);
        $this->format['indikasi'] = $this->format($this->error['indikasi']);
        $this->format['kontradiksi'] = $this->format($this->error['kontradiksi']);
        $this->format['peringatan'] = $this->format($this->error['peringatan']);
        $this->format['interaksi_obat'] = $this->format($this->error['interaksi_obat']);
        $this->format['unit'] = $this->format($this->error['unit']);
        return $this->format;
    }
    public function getFormatDefault(){
        $this->format = array_fill_keys($this->index, 'form-control');
        return $this->format;
    }
}
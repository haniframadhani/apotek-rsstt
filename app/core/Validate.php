<?php

class Validate
{
    public $error = ['angka'=>'','teks'=>'','textarea'=>'','select'=>''];
    
    public function validateNumber($data){
        $this->error['angka']='';
        if(empty($data)){    
            $this->error['angka'] = "Wajib disi";
        }
        else{     
            if(is_numeric($data)){
                if ($data < 0) {
                    $this->error['angka'] = "lebih kecil dari 0";
                } 
                else if($data > 2147483647) {
                    $this->error['angka'] = "lebih besar dari 2.147.483.647";
                }
            }
            else{
                $this->error['angka'] = "harus angka";
            }
        }
        return $this->error['angka'];

    } 
    public function validateText($data){
        $this->error['teks']='';
        if(strlen($data) == 0){    
            $this->error['teks'] = "Wajib disi";
        }
        else{     
            if(strlen($data) < 0){ 
                $this->error['teks'] = "kurang dari 0 karakter"; 
            }
            else if(strlen($data) > 255){ 
                $this->error['teks'] = "lebih dari 255 ";
            }
        }
        return $this->error['teks'];
        
    } 
    
    public function validateTextArea($data){
        $this->error['textarea'] = '';
        if(strlen($data) == 0){    
            $this->error['textarea'] = "Wajib disi";
        }
        else{     
            if(strlen($data) < 0){ 
                $this->error['textarea'] = "kurang dari 0 karakter"; 
            }
            else if(strlen($data) > 65535){ 
                $this->error['textarea'] = "lebih dari 65.535";
            }
        }
        return $this->error['textarea'];
    } 
    public function validateSelect($data){
        $unit = ['botol','tablet','kapsul'];
        if(empty($data) || !in_array($data, $unit)) {
            $this->error['select'] = "pilihan tidak valid";
        }
        return $this->error['select'];
    } 
    
    public function format($data){
        if (empty($data)) {
            return "form-control is-valid";
        }else{
            return "form-control is-invalid";
        }
    }

    public function check($array){
        foreach ($array as $cek) {
            if (!empty($cek)) {
                return false;
            }
        }
        return true;
    }
}
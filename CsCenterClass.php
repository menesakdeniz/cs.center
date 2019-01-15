<?php

class CsCenter{
  public $api_key,$urun_id,$servis,$post;
  public $bilgi = [];

  public function __construct($api_key = null,$servis = null,$urun_id = null,$post = null){
    $this->api_key = $api_key;
    $this->urun_id = $urun_id;
    $this->servis = $servis;
    $this->post = $post;
  }

  private function curl(){
      if($this->kontrol()){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,'https://cs.center/api/'.$this->api_key.'/'.$this->urun_id.'/'.$this->servis);
      if(!empty($this->post)){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$this->post);
      }
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $this->bilgi = curl_exec($ch);
      curl_close ($ch);
      return true;
    }
  }

  private function kontrol(){
    if(empty($this->api_key)){
      $this->bilgi = ['msg' => 'LÜtfen APi anahtarınızı boş bırakmayınız.','success' => false];
      return false;
    }
    if(empty($this->urun_id)){
      $this->bilgi = ['msg' => 'LÜtfen ürün id\'nizi boş bırakmayınız.','success' => false];
      return false;
    }
    if(empty($this->servis)){
      $this->bilgi = ['msg' => 'LÜtfen servis ismini boş bırakmayınız.','success' => false];
      return false;
    }
    return true;
  }

  public function get(){
    $this->curl();
    return !is_array($this->bilgi) ? json_decode($this->bilgi) : $this->bilgi;
  }

}


?>


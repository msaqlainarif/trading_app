<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Dashboard extends CI_Controller {
  
  var $data;
  
  public function index()
  {
    $this->data['title']='Trading Application';
    $this->data['view']='dashboard';
    $this->load->view('layout/layout',$this->data);
  }
  
}

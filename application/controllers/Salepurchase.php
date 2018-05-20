<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class SalePurchase extends CI_Controller {
  
  var $data;

  public function __construct(){

		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
  public function index()
  {
  	redirect("dashboard");
  }
  public function GeneratePurchaseInvoice()
  {
  	    $this->data["products"]=$this->data_model->get_data_all("tbl_products");
		//$this->data["items"]=$this->data_model->get_data_all("tbl_items");
	    $this->data['title']='Trading App | Generate Purchase Invoice';
		$this->data['page_heading']='Generate Purchase Invoice';
		$this->data["view"]="pages/create_purchase";
		$this->load->view('template/layout',$this->data);	
  }
 }

?>
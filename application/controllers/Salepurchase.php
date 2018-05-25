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
  public function ListPurchaseInvoice(){
  	
  }
  public function GeneratePurchaseInvoice()
  {
  	    $this->data["products"]=$this->data_model->get_data_all("tbl_products");
		$this->data["parties"]=$this->data_model->get_data_all("tbl_party_master");
	    $this->data['title']='Trading App | Generate Purchase Invoice';
		$this->data['page_heading']='Generate Purchase Invoice';
		$this->data["view"]="pages/create_purchase";
		$this->load->view('template/layout',$this->data);	
  }
  public function generate_purchase_invoice()
  {
  	 
		$obj = json_decode($_POST['json_data']);
		 
	  $DbFieldsArylog = array('party_id','reference_no', 'purchase_date','remarks');
	  $InfoArylog = array($obj->party_id,$obj->ref_no,date('Y-m-d',strtotime($obj->po_date)),$obj->remarks);
	  $purchase_id=$this->data_model->addData_InsertID($DbFieldsArylog,$InfoArylog,'tbl_purchase_master');
	  
		 foreach($obj->po_items as $values){
		    $val_arr=explode("-",$values);
			$DbFieldsAry = array('purchase_id','product_id', 'quantity','price','discount_percentage','discount_value','value');
		    $InfoAry = array($purchase_id,$val_arr[0],$val_arr[1],$val_arr[2],$val_arr[3],$val_arr[4],$val_arr[5]);
		    $this->data_model->addData($DbFieldsAry,$InfoAry,'tbl_purchase_detail');
	  }
	 
			
	  $result['res']='done';
	  $result['pur_id']=$purchase_id;
	  echo json_encode($result); 
	  
	  
	
  }
  
 
 }

?>
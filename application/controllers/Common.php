<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Common extends CI_Controller {
  
  var $data;

  public function __construct(){

		parent::__construct();
		$this->load->library('grocery_CRUD');
		//if($this->session->userdata('user_id')==""){
		  //	redirect('dashboard');
		//}	
	}
	  
  public function index()
  {
  	redirect("dashboard");
  }
  
  public function companies(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_companies');
		
		$crud->unset_read();
		$crud->columns(array('company_name','contact_no'));
		
		$crud->set_rules('company_name','Company Name','required|is_unique[tbl_companies.company_name]');
		
		$data['title']='Admin | Companies';
		$data['page_heading']='Manage Companies';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
   public function product_groups(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_product_groups');
		
		$crud->unset_read();
		$crud->columns(array('product_group_name'));
		
		$crud->set_rules('product_group_name','Prodcut Group Name','required|is_unique[tbl_product_groups.product_group_name]');
		
		$data['title']='Admin | Product Groups';
		$data['page_heading']='Manage Product Groups';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  public function products(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_products');
		
		$crud->unset_read();
		$crud->columns(array('product_name','product_group_id', 'company_id', 'purchase_rate','trade_rate','sale_rate','fed_percentage','sed_percentage','pur_discount_value','sale_discount_value','pur_discount_ratio','sale_discount_ratio'));
		
		$crud->set_rules('product_name','Prodcut Name','required|is_unique[tbl_products.product_name]');
		
		 
		$crud->set_relation('product_group_id','tbl_product_groups','product_group_name');
		$crud->set_relation('company_id','tbl_companies','company_name');
		
		$crud->display_as('product_group_id','Product Group')->display_as('company_id','Company');
 
		$data['title']='Admin | Products';
		$data['page_heading']='Manage Products';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  public function _output_data($output = null)
	{
		$this->load->view('template/layout_grocery',$output);
	}
}

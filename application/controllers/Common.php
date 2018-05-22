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
  
  //Location Types Form Coding
  public function location_types(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_location_types');
		
		$crud->unset_read();
		$crud->columns(array('location_type'));
		
		//Display Settings
		$crud->display_as('location_type','Location Type');
		
		// Validation Rules
		$crud->set_rules('location_type','Location Type','required|is_unique[tbl_location_types.location_type]');
		$crud->required_fields('location_type');
		
		//Editing Code
		$state = $crud->getState();
		
		if($state == 'add')
		{
		//Do your cool stuff here . You don't need any State info you are in add
		}
		elseif($state == 'edit')
		{
		$primary_key = $state_info->primary_key;
		//Do your awesome coding here. 
		}
		
		$data['title']='Admin | Location Types';
		$data['page_heading']='Manage Location Types';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Locations Form Coding
  public function locations(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_locations');
		
		$crud->unset_read();
		$crud->columns(array('location_type_id','location_name','location_short_name'));
		
		//Display Settings
		$crud->display_as('location_type_id','Location Type')->display_as('location_name','Location Name')->display_as('location_short_name',		'Location Short Name');
		
		// Validation Rules
		$crud->set_rules('location_name','Location Name','required|is_unique[tbl_locations.location_name]');
		$crud->set_rules('location_short_name','Location Short Name','is_unique[tbl_locations.location_short_name]');
		$crud->required_fields('location_type_id','location_name');
		
		//Foreign Key Settings
		$crud->set_relation('location_type_id','tbl_location_types','location_type');
		
		$data['title']='Admin | Locations';
		$data['page_heading']='Manage Locations';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Companies Form Coding
  public function companies(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_companies');
		
		$crud->unset_read();
		$crud->columns(array('company_name','contact_no'));
		
		//Display Settings
		$crud->display_as('company_name','Company Name')->display_as('contact_no','Contact Number');
		
		// Validation Rules
		$crud->set_rules('company_name','Company Name','required|is_unique[tbl_companies.company_name]');
		$crud->required_fields('company_name');
		
		$data['title']='Admin | Companies';
		$data['page_heading']='Manage Companies';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Warehouse Types Form Coding
  public function warehouse_types(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_warehouse_types');
		
		$crud->unset_read();
		$crud->columns(array('warehouse_type'));
		
		//Display Settings
		$crud->display_as('warehouse_type','Warehouse Type');
		
		// Validation Rules
		$crud->set_rules('warehouse_type','Warehouse Type','required|is_unique[tbl_warehouse_types.warehouse_type]');
		$crud->required_fields('warehouse_type');
		
		$data['title']='Admin | Warehouse Types';
		$data['page_heading']='Manage Warehouse Types';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Warehouses Form Coding
  public function warehouses(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_warehouses');
		
		$crud->unset_read();
		$crud->columns(array('warehouse_type_id','warehouse_name','warehouse_location_id','warehouse_account_id','warehouse_address','narration'));
		
		//Display Settings
		$crud->display_as('warehouse_type_id','Warehouse Type')->display_as('warehouse_name','Name')->display_as('warehouse_location_id','Warehouse Location')->display_as('warehouse_account_id','Warehouse Account')->display_as('warehouse_address','Warehouse Address')->display_as('narration','Narration');
		
		// Validation Rules
		$crud->set_rules('warehouse_name','Warehouse Name','required|is_unique[tbl_warehouses.warehouse_name]');
		$crud->required_fields('warehouse_type_id','warehouse_name','warehouse_location_id','warehouse_account_id','warehouse_address');
		
		//Foreign Key Settings
		$crud->set_relation('warehouse_type_id','tbl_warehouse_types','warehouse_type');
		$crud->set_relation('warehouse_location_id','tbl_locations','location_name');
		
		$data['title']='Admin | Warehouses';
		$data['page_heading']='Manage Warehouses';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Party Types Form Coding
  public function party_types(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_party_types');
		
		$crud->unset_read();
		$crud->columns(array('party_type'));
		
		//Display Settings
		$crud->display_as('party_type','Party Type');
		
		// Validation Rules
		$crud->set_rules('party_type','Party Type','required|is_unique[tbl_party_types.party_type]');
		$crud->required_fields('party_type');
		
		$data['title']='Admin | Party Types';
		$data['page_heading']='Manage Party Types';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
    //Product Groups Form Coding
   public function product_groups(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_product_groups');
		
		$crud->unset_read();
		$crud->columns(array('product_group_name'));
		
		//Display Settings
		$crud->display_as('product_group_name','Product Group Name');
		
		//Validation Rules
		$crud->set_rules('product_group_name','Prodcut Group Name','required|is_unique[tbl_product_groups.product_group_name]');
		$crud->required_fields('product_group_name');
				
		$data['title']='Admin | Product Groups';
		$data['page_heading']='Manage Product Groups';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Products Form Coding
  public function products(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_products');
		
		$crud->unset_read();
		$crud->columns(array('product_name','product_group_id', 'company_id', 'purchase_rate','trade_rate','sale_rate','fed_percentage','sed_percentage','pur_discount_value','sale_discount_value','pur_discount_ratio','sale_discount_ratio'));
		
		//Display Settings
		$crud->display_as('product_name','Product Name')->display_as('product_group_id','Product Group')->display_as('company_id','Company')->display_as('purchase_rate','Pruchase Rate')->display_as('trade_rate','Trade Rate')->display_as('sale_rate','Sale Rate')->display_as('fed_percentage','FED %Age')->display_as('sed_percentage','SED %Age')->display_as('pur_discount_value','Purchase Discount Value')->display_as('sale_discount_value','Sale Discount Value')->display_as('pur_discount_ratio','Purchase Discount Ratio')->display_as('sale_discount_ratio','Sale Discount Value');
		
		//Validation Rules
		$crud->set_rules('product_name','Prodcut Name','required|is_unique[tbl_products.product_name]');
		$crud->required_fields('product_name','product_group_id','company_id','purchase_rate','sale_rate');

		
		//Foreign Key Settings
		$crud->set_relation('product_group_id','tbl_product_groups','product_group_name');
		$crud->set_relation('company_id','tbl_companies','company_name');
		
		$data['title']='Admin | Products';
		$data['page_heading']='Manage Products';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  														/* 		Accounts  
														  Coding Starts Here*/
														  
  //Account Types Form Coding
  public function account_types(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_account_types');
		
		$crud->unset_read();
		$crud->columns(array('account_type_title'));
		
		//Display Settings
		$crud->display_as('account_type_title','Account Type Title');
		
		// Validation Rules
		$crud->set_rules('account_type_title','Account Type Title','required|is_unique[tbl_account_types.account_type_title]');
		$crud->required_fields('account_type_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Account Types';
		$data['page_heading']='Manage Account Types';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }

  //Account Groups Form Coding
  public function account_groups(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_account_groups');
		
		$crud->unset_read();
		$crud->columns(array('account_group_title'));
		
		//Display Settings
		$crud->display_as('account_group_title','Account Group Title');
		
		// Validation Rules
		$crud->set_rules('account_group_title','Account Group Title','required|is_unique[tbl_account_groups.account_group_title]');
		$crud->required_fields('account_group_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Account Groups';
		$data['page_heading']='Manage Account Groups';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Account Main Head Form Coding
  public function account_heads(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_account_heads');
		
		$crud->unset_read();
		$crud->columns(array('account_head_id','account_head_title'));
		
		//Display Settings
		$crud->display_as('account_group_id','Account Groups')->display_as('account_head_id','Account Head ID')->display_as('account_head_title','Account Head Title');
		
		// Validation Rules
		$crud->set_rules('account_head_title','Account Head Title','required|is_unique[tbl_account_heads.account_head_title]');
		$crud->required_fields('account_group_id');
		$crud->required_fields('account_head_title');
		
		//Foreign Key Settings
		$crud->set_relation('account_group_id','tbl_account_groups','account_group_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Account Heads';
		$data['page_heading']='Manage Account Heads';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Account Sub Head Form Coding
  public function account_subheads(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_account_subheads');
		
		$crud->unset_read();
		$crud->columns(array('account_subhead_id','account_subhead_title'));
		
		//Display Settings
		$crud->display_as('account_head_id','Account Heads')->display_as('account_subhead_id','Account Sub-Head ID')->display_as('account_subhead_title','Account Sub-Head Title');
		
		// Validation Rules
		$crud->set_rules('account_subhead_title','Account Sub-Head Title','required|is_unique[tbl_account_subheads.account_subhead_title]');
		$crud->required_fields('account_head_id');
		$crud->required_fields('account_subhead_title');
		
		//Foreign Key Settings
		$crud->set_relation('account_head_id','tbl_account_heads','account_head_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Account Sub-Heads';
		$data['page_heading']='Manage Account Sub Heads';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Transaction Accounts Form Coding
  public function transaction_accounts(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_account_transactions');
		
		$crud->unset_read();
		$crud->columns(array('transaction_account_id','transaction_account_title','description'));
		
		//Display Settings
		$crud->display_as('account_type_id','Account Types')->display_as('account_subhead_id','Account Sub Heads')->display_as('transaction_account_id','Transaction Account ID')->display_as('transaction_account_title','Transaction Account Title')->display_as('description','Description');
		
		// Validation Rules
		$crud->set_rules('transaction_account_title','Transaction Account Title','required|is_unique[tbl_account_transactions.transaction_account_title]');
		$crud->required_fields('transaction_account_title');
		
		//Foreign Key Settings
		$crud->set_relation('account_type_id','tbl_account_types','account_type_title');
		$crud->set_relation('account_subhead_id','tbl_account_subheads','account_subhead_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Transaction Account';
		$data['page_heading']='Manage Transaction Accounts';
		$data['view']='grocery_main';
		$output = $crud->render();
		$output = array_merge($data,(array)$output);
		
		$this->_output_data($output);	
  }
  
  //Party Form Coding
  public function parties(){
	  
	  
	    $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('tbl_parties');
		
		$crud->unset_read();
		$crud->columns(array('party_type_id','party_id','party_title','party_description','party_address','transaction_account_id'));
		
		//Display Settings
		$crud->display_as('party_type_id','Party Types')->display_as('party_id','Party Type ID')->display_as('party_title','Party Title')->display_as('party_description','Description')->display_as('party_address','Address')->display_as('transaction_account_id','Transaction Account');
		
		// Validation Rules
		$crud->set_rules('party_id','Party Title','required|is_unique[tbl_parties.party_title]');
		$crud->required_fields('party_title');
		
		//Foreign Key Settings
		$crud->set_relation('party_type_id','tbl_party_types','party_type');
		$crud->set_relation('transaction_account_id','tbl_account_transactions','transaction_account_title');
		
		//Editing Code
		$state = $crud->getState();
		
		$data['title']='Admin | Parties';
		$data['page_heading']='Manage Parties';
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

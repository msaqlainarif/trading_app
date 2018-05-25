<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Accounts extends CI_Controller {
  
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
		
		$crud->set_table('tbl_party_master');
		
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
 ?>
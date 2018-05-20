<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_model extends CI_Model{
   
    var $user_id;

	public function __construct(){
		parent::__construct();
		//$this->user_id=$this->session->userdata('user_id');
		
	}

	public function user_authentication(){

		$this->db->where('email_address',$this->input->post('email_address'));
		$this->db->where('password',md5($this->input->post('password')));
		$this->db->where('status',1);

		$query=$this->db->get('tbl_users');

		if($query->num_rows()==1){
			$row = $query->row();
	               $data = array(
                    'user_id'        => $row->id,
					'name'      => $row->name,
					'userType'   => $row->user_type,
					'department_id'=>$row->department_id,
                    );
                 $this->session->set_userdata($data);
				 return true;
			}else{
              return false;	
	      }
	}
	public function get_data_by_id($id,$table){
		$this->db->where("id", $id);
		$query = $this->db->get($table);
		return $row = $query->row();
	}
	public function get_value_by_id($table,$id,$value){
		$this->db->where("id", $id);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
		$row = $query->row();
		return $row->$value;
		}else{
			return "N/A";
		}
	}

	
	public function get_val_by_id($table,$id_attr,$id,$value){
		$this->db->where($id_attr, $id);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
		$row = $query->row();
		return $row->$value;
		}else{
			return "N/A";
		}
	}
	public function get_data_all_using_where($where_attr,$where_val,$table){
	    $this->db->where($where_attr, $where_val);
		$query = $this->db->get($table);
		$result=$query->result_array();
		return $result;
	}
	public function addData($insertDbFieldsAry, $insertInfoAry, $table){
		$data = array();
		
		for($i=0; $i<sizeof($insertDbFieldsAry); $i++){
			$data[$insertDbFieldsAry[$i]] = $insertInfoAry[$i];	
		}
				
		if($this->db->insert($table, $data)){
			return true;	
		}
		return false;
	}
	
	public function addData_InsertID($insertDbFieldsAry, $insertInfoAry, $table){
		$data = array();
		
		for($i=0; $i<sizeof($insertDbFieldsAry); $i++){
			$data[$insertDbFieldsAry[$i]] = $insertInfoAry[$i];	
		}
				
		$this->db->insert($table, $data);
		return $this->db->insert_id();
		
	}
	public function updateData($whereClouse, $updateDbFieldsAry, $updateInfoAry, $table){
		
		$data = array();		
		for($i=0; $i<sizeof($updateDbFieldsAry); $i++){			
			$data[$updateDbFieldsAry[$i]] = $updateInfoAry[$i];	
		}
								
		$this->db->where($whereClouse);		
		if($this->db->update($table, $data)){
			return true;
		}		
		return false;
	}
	public function updateData_New($compareFieldName, $dbFieldName, $updateDbFieldsAry, $updateInfoAry, $table){
		
		$data = array();		
		for($i=0; $i<sizeof($updateDbFieldsAry); $i++){			
			$data[$updateDbFieldsAry[$i]] = $updateInfoAry[$i];	
		}
				
		
		$this->db->where($dbFieldName, $compareFieldName);
		
		if($this->db->update($table, $data)){
			return true;
		}
		
		return false;
	}
	public function fetchDataSingleRow($whereClouse, $table) {
       	$this->db->select('*');
        $this->db->from($table);
		$this->db->where($whereClouse);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $returnValue = $resultSet->row();			
        } else {
            $returnValue = 0;
        }
        $resultSet->free_result();
        return $returnValue;
    }
	
	public function get_data_all($table){
		$query = $this->db->get($table);
		$result=$query->result_array();
		return $result;
	}
	
	public function get_data_all_using_query($sql){
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	
	public function isModuleEnable($ID, $moduleName){
		
		$this->db->select('ID');
        $this->db->from('tbl_permissions');
		$this->db->where('userId', $ID);
		$this->db->where('module', $moduleName);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $returnValue = 'checked';
        } else {
            $returnValue = '';
        }
		
        $resultSet->free_result();
		//echo $returnValue; exit;
        return $returnValue;
	}
	public function displayInneSections($ID, $moduleName){
		
		$this->db->select('ID');
        $this->db->from('tbl_permissions');
		$this->db->where('userId', $ID);
		$this->db->where('module', $moduleName);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $returnValue = 'block';
        } else {
            $returnValue = 'none';
        }
		//echo  $returnValue; exit;
        $resultSet->free_result();
        return $returnValue;
	}
	public function isModuleEnableInner($ID, $moduleName, $innerSection){
		
		$this->db->select('ID');
        $this->db->from('tbl_permissions');
		$this->db->where('userId', $ID);
		$this->db->where('module', $moduleName);
		$this->db->where($innerSection, 'YES');
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $returnValue = 'checked';
        } else {
            $returnValue = '';
        }
        $resultSet->free_result();
        return $returnValue;
	}
	
	public function fetchDataSingleValue($whereClouse, $requiredFieldName, $table, $orderBy = '', $orderType = '') {
		
		$this->db->select($requiredFieldName);
        $this->db->from($table);
		$this->db->where($whereClouse);
		
		if($orderBy != '' && $orderType != ''){
			$this->db->order_by($orderBy, $orderType);	
		}
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $returnValue = $resultSet->row();
			$returnValue = $returnValue->$requiredFieldName;
        } else {
            $returnValue = '';
        }
        $resultSet->free_result();
        return $returnValue;
    }
	
	public function addInfo_Simple($insertDbFieldsAry, $insertInfoAry, $table){
		$data = array();
		
		for($i=0; $i<sizeof($insertDbFieldsAry); $i++){
			$data[$insertDbFieldsAry[$i]] = $insertInfoAry[$i];	
		}
				
		if($this->db->insert($table, $data)){
			return true;	
		}
		return false;
	}
	
	public function deleteDataGeneral($whereClause, $table){
		$this->db->where($whereClause);
		if($this->db->delete($table)){
			return true;
		}
		return false;		        
    }
	public function isModuleEnabled($module_name){
		
		if(isSuperAdmin()){
			return true;	
		}
		
		$ID = $this->user_id;
		$this->db->select('ID');
        $this->db->from('tbl_permissions');
		$this->db->where('userId', $ID);
		$this->db->where('module', $module_name);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            return true;
        }				
		return false;        
	}	
	
	public function isModuleEnabledInner($module_name, $type){
		
		if(isSuperAdmin()){
			return true;
		}
		$ID = $this->user_id;
		$this->db->select('ID');
        $this->db->from('tbl_permissions');
		$this->db->where('userId', $ID);
		$this->db->where('module', $module_name);
		$this->db->where($type, 'YES');
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
           return true;
        }
		
		return false;
	}
	
	
  }
?>
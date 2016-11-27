<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**created: 27 nov 2016 	1395/09/07 23:30
 * modified:
 * @class 
 * Usage //
 * Named-based Connection DB
 
 * 
 * @author hamed_hossani
 * Hamed Hossani
 *
 *
 *how to use
 *	$ci=get_instance();
	$ci->load->library('connection_db');
	$where=array('product_id'=>19);
	print_r($ci->connection_db->select('tbl_products_spectial', $where));
 *
 *
 *
 *
 */



class connection_db //implements 
{
	public function select($table,$where){
		$ci=get_instance(); 
	
		$array_columns=array_keys($where );
		
		foreach ($array_columns as $column){			
			$ci->db->where($column,$where[$column]);			
		}		
		$data=$ci->db->get($table);
		
		if(count($data->result())>1){
			return $data->result();
		}
		else if(count($data->result())==1){
			return $data->row();
		}
		return array();
	}
	public function insert($table,$data){
		$ci=get_instance();
		$ci->db->insert($table,$data);
		return $ci->db->insert_id();
	}
	public function update($table,$where,$data){
		$ci=get_instance();
		
		$array_columns=array_keys($where );
		
		foreach ($array_columns as $column){
			$ci->db->where($column,$where[$column]);
		}
		$ci->db->update($table,$data);
	}
	public function delete($table,$where){
		$ci=get_instance();
		
		$array_columns=array_keys($where );
		
		foreach ($array_columns as $column){
			$ci->db->where($column,$where[$column]);
		}
		$ci->db->delete($table);
	}
}

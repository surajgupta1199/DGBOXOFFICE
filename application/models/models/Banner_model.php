<?php 
class Banner_model extends CI_Model{

	public function fetch_type($type,$table){
		$movie_type = $type == 1 ? 'movie_master':'series_master';
		return $this->db->select('*')
					->from($table)
					->join($movie_type,''.$movie_type.'.common_id = '.$table.'.common_id')
					->join('category','category.cat_id = '.$table.'.cat_id')
					->get()
					->result_array();
	}

	public function get_distinct($select,$where,$table){
		return $this->db->select($select)->from($table)->where($where)->get()->result_array();
	}
}
?>
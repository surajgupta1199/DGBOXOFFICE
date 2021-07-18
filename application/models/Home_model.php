<?php
class Home_model extends CI_Model{
	
	public function get_data_with_condition($modal_data,$join_data)
	{
		if($join_data['join_table2'] != '' && $join_data['join_condition2'] != null)
		{

			$this->db->join($join_data['join_table2'],$join_data['join_condition2']);
		}
		return $this->db->where($modal_data['where_condition'])
						->select($modal_data['select_coloumns'])
						->from($modal_data['table'])
						->join($join_data['join_table1'], $join_data['join_condition1'])
						->order_by($modal_data['order_by_coloumn'],"desc")
						->get()
						->result_array();
	}

	public function get_data_by_multiple_id($where_in_array,$coloumn_name,$table)
	{
		$this->db->select('*');
		$this->db->where_in($coloumn_name,$where_in_array);
		return $this->db->from($table)->get()->result_array();
	}

	public function otp_create($otp){
		$data = array(
			'otp' => $otp,
			'is_expired' => 0
		);
		return $this->db->insert('otp_master',$data);
	}

	public function otp_verification($otp){
		$otp_check = $this->db->select('otp')
						->from('otp_master')
						->order_by('otp_id','DESC')
						->limit(1)
						->get()->row_array();

		$where = array(
			$otp_check['otp'] => $otp);
		return $this->db->select('*')->from('otp_master')->where($where)->get()->row_array();
	}

	public function otp_is_expired($otp){
		$data = array(
			'is_expired' => 1
		);
		$where = array(
			'otp' => $otp);
		return $this->db->set($data)->where($where)->update('otp_master');
	}

}
?>

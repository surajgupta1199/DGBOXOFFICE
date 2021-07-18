<?php 
class User_model extends CI_Model{

	public $column_order = array(null, 'customer_name','customer_mobile_no'); //set column field database for datatable orderable
	public $column_search = array('customer_name','customer_mobile_no'); //set column field database for datatable searchable 

	public function _get_datatables_query($select,$table,$join_data)
	{
		$this->db->select($select)
				->from($table);
		if($join_data != ""){

				$this->db->join($join_data['join_table1'],$join_data['join_condition1'])
						 ->join($join_data['join_table2'],$join_data['join_condition2']);
		}
		
			$i = 0;	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else
		{
			$order = array('cat_id' => 'asc');
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_cat_datatables($select,$table,$join_data)
	{
		$this->_get_datatables_query($select,$table,$join_data);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all()
	{
		$this->db->from('category');
		return $this->db->count_all_results();
	}

	public function count_filtered($select,$table,$join_data)
	{
		$this->_get_datatables_query($select,$table,$join_data);
		$query = $this->db->get();
		return $query->num_rows();
	}
}
?>
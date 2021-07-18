<?php 
class Series_model extends CI_Model{
	public $column_order = array(null, 'series_master.movie_name','category.cat_name','common_master.release_year','common_master.language'); //set column field database for datatable orderable
	public $column_search = array('series_master.movie_name','category.cat_name','common_master.release_year','common_master.language'); //set column field database for datatable searchable 

	public function _get_datatables_query()
	{
		$this->db->select('series_master.*,common_master.*,category.*')
				->from('series_master')
				->join('common_master','common_master.common_id = series_master.common_id')
				->join('category',' category.cat_id = common_master.cat_id');
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

	public function get_cat_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all()
	{
		$this->db->from('series_master');
		return $this->db->count_all_results();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_single_data($where,$table){
		$result = $this->db->select('*')->from($table)->join('common_master','common_master.common_id = series_master.common_id')
						->where('series_com_id' , $where['common_id'])->order_by('season_number','DESC')
						->limit(1)->get()->row_array();

		if($result == ""){
			return $this->db->select('*')->from($table)->join('common_master','common_master.common_id = series_master.common_id')
							->where('common_master.common_id',$where['common_id'])->get()->row_array();
		}else{
			return $result;
		}
	}

	public function fetch_all($where,$table,$common_table){
		return $this->db->Select('common_master.*,'.$table.'.*')
						->from($table)
						->join($common_table,''.$common_table.'.common_id = '.$table.'.common_id')
						->where($where)
						->get()->result_array();
	}

	public function exist_or_not($where,$where_in,$table){
			   	if($where_in != ""){																//edit part data exist or not
					foreach($where_in as $key=>$value){
						$this->db->where(''.$key.' != '.$where_in[$key].'');
					}
				}
					return  	  $this->db->select('*')->from($table)
									   ->join('common_master','common_master.common_id = '.$table.'.common_id')
									   ->where($where)
				 					   ->get()->row_array();
	}
}
?>
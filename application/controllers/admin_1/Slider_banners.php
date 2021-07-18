<?php
class Slider_banners extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->common = 'common_master';
	 	$this->load->model('Banner_model','banner');
	 	$this->table = 'front_banner_master';
		
	}

	public function index(){
		$where = array('status' => 0);
		$result['type'] = $this->banner->get_distinct('distinct(type)',$where,'front_banner_master');
		$result['data'] = $this->basic->get_all_data($where,'front_banner_master');
		$data['active'] = "";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/add-banners',$result);
		$this->load->view('admin_pannel/footer');
	}

	public function fetch_content(){
		$data = $this->input->post('cat_value');
		$type = explode(',',$data);
		$result['movie'] = array();
		$result['series'] = array();
		for($i=0;$i<count($type);$i++){
			$final = $this->banner->fetch_type($type[$i],$this->common);
			if($type[$i] == 1){
				array_push($result['movie'],$final);
			}else{
				array_push($result['series'],$final);
			}
		}
		echo $this->load->view('admin_pannel/show_movie_series',$result,true);
	}

	public function add_banner(){
		$data = $this->input->post();

		$where = array('status' => 0);
		$check_null = $this->basic->exist_or_not($where,"",$this->table);
		if(!empty($check_null)){
			$this->basic->delete($where,$this->table);
		}

		$movie_comm_id_array = explode(',',$data['movie_common_id']);
		$series_comm_id_array = explode(',',$data['series_common_id']);

		for($i=0;$i<count($movie_comm_id_array);$i++){
			if($movie_comm_id_array[$i] != ""){
				$insert['common_id'] = $movie_comm_id_array[$i];
				$insert['type'] = 1;
				$this->basic->insert($insert,$this->table);
			}
		}

		for($i=0;$i<count($series_comm_id_array);$i++){
			if($series_comm_id_array[$i] != ""){
				$insert['common_id'] = $series_comm_id_array[$i];
				$insert['type'] = 2;
				$this->basic->insert($insert,$this->table);
			}
		}
		echo 1;
	}
}
?>
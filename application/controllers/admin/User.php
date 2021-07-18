<?php
class User extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->common = 'common_master';
	 	$this->table = 'order_master';
	 	$this->customer = 'customer_master';
	 	$this->load->model('User_model','user');
		
	}

	public function index(){
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/user_detail');
		$this->load->view('admin_pannel/footer');
	}

	public function user_purchased(){
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/user_purchase_detail');
		$this->load->view('admin_pannel/footer');
	}

	public function all_user_purchased(){

		$select = ('order_master.*,customer_master.*,common_master.title,common_master.type');
		$join_data=array(
							'join_table1'		=>	'customer_master',
							'join_condition1'	=>	'customer_master.customer_id = order_master.customer_id',
							'join_table2'		=>	'common_master',
							'join_condition2'	=>	'common_master.common_id=order_master.common_id'

						);
    	$list = $this->user->get_cat_datatables($select,$this->table,$join_data);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();	
			$row[] = $no;		
			$row[] = $item->customer_name;
			$row[] = $item->customer_mobile_no;
			$row[] = $item->title;
			$type = $item->type == 1?"movie":"series";
			$row[] = $type;
			$row[] = $item->price;
			$row[] = $item->ordered_on;
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->user->count_all(),
			"recordsFiltered" => $this->user->count_filtered($select,$this->table,$join_data),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }

    public function user_detail(){
		
    	$list = $this->user->get_cat_datatables('*',$this->customer,"");
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();	
			$row[] = $no;		
			$row[] = $item->customer_name;
			$row[] = $item->customer_mobile_no;
			$gender = $item->customer_gender == 1?"mlae":"female";
			$row[] = $gender;
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->user->count_all(),
			"recordsFiltered" => $this->user->count_filtered('*',$this->customer,""),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }
}
?>
<?php
class Admin_dashboard extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	// $this->table = 'category';
	 	// $this->load->model('Category_model','category');
		
	}

	public function index(){
		// $data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/index');
		$this->load->view('admin_pannel/footer');
	}
}

?>

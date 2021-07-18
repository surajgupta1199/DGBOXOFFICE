<?php
class Admin_login extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	

	 	$this->admin="admin_master";
		
	}

	public function index(){
		$this->load->view('admin_pannel/sign-in');
	}

	public function sign_up(){
		$data=$this->input->post();
		if(!empty($data))
		{
			$data['admin_password'] = md5($this->input->post('admin_password'));
	        unset($data['cnf_admin_password']);
	        $where = array(
	            'admin_email_id' => $data['admin_email_id']
	        );
	        $dup_email = $this->basic->exist_or_not($where,'',$this->admin);
	        if($dup_email){
	            $msg_data['msg'] = 'email exist';
	        }else{
	            $result = $this->basic->insert($data,$this->admin);
	            $msg_data['msg'] = 'error';
	            if($result){
	                $msg_data['msg'] = 'success';
	            }
	        }
	        echo json_encode($msg_data);
		}
		else
		{
			$this->load->view("admin_pannel/sign-up");
		}
		
	}

	public function login(){
		$data=$this->input->post();
		if(!empty($data))
		{
			$data['admin_email_id'] = $this->input->post('admin_email_id');
	        $data['admin_password'] = md5($this->input->post('admin_password'));
	        $where = array(
	            'admin_email_id' => $data['admin_email_id'],
	            'admin_password' => $data['admin_password']
	        );
	        $customer_data =(array)$this->basic->exist_or_not($where,'',$this->admin);
	        if($customer_data){
	            if($customer_data['admin_status'] !=0){
	                $msg_data['msg'] = 'deactive';
	            }else{
	               
	                $this->session->set_userdata($customer_data);
	                $msg_data['msg'] = 'success';
	            }
	        }else{
	            $msg_data['msg'] = 'error';
	        }
	        echo json_encode($msg_data);
		}
		else
		{
			$this->load->view("admin_pannel/sign-in");
		}
	}


	public function recovery_password(){
		$this->load->view('admin_pannel/pages-recoverpw');
	}
}

?>
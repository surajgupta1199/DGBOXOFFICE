<?php 
class Home extends CI_Controller{

	function __construct(){	 	
	 	parent::__construct();
	 	$this->load->model('Home_model','home_mod');	
	 	$this->load->model('Order_model','order_modl');	
	 	$this->customer='customer_master';
	 	$this->order='order_master';
	 	$this->content ='content_master';
	 	$this->common  ='common_master';
	 	date_default_timezone_set('Asia/Kolkata'); 
	 	$this->date = date('d-m-Y');
	}

	public function index()
	{
		$content = $this->uri->segment(3) != '' ? $this->uri->segment(3) : 'home' ;
		$where=array('content_status'	=> 0 );
		$content_list=$this->basic->get_all_data($where,$this->content);


		//MOVIES
		if($content == "" || $content == "movies" || $content == "home"){
			$where=array('status'	=>	0,
						 'com.type' =>	1,
						);
			$fetch_data='*';
			$order_by_coloumn='movie.movie_id';
			$modal_data=array(
								'where_condition'	=>	$where,
								'select_coloumns'	=> 	$fetch_data,
								'order_by_coloumn'	=>	$order_by_coloumn,
								'table'				=>  'movie_master as movie'
							);
			$join_data=array(

								'join_table1'		=>	'common_master as com',
								'join_condition1'	=>	'movie.common_id=com.common_id',
								'join_table2'		=>	'',
								'join_condition2'	=>	''

							);

			$movie_data=$this->home_mod->get_data_with_condition($modal_data,$join_data);
			$data['movie_list']=$movie_data;
		}


		//SERIES
		if($content == "" || $content == "series" || $content == "home"){
			$where=array('status'=>0,'series.series_com_id'=>"");
			$fetch_data='*';
			$order_by_coloumn='series.id';
			$modal_data=array(
								'where_condition'	=>	$where,
								'select_coloumns'	=> 	$fetch_data,
								'order_by_coloumn'	=>	$order_by_coloumn,
								'table'				=>  'series_master as series'
							);
			$join_data=array(

								'join_table1'		=>	'common_master as com',
								'join_condition1'	=>	'series.common_id=com.common_id',
								'join_table2'		=>	'',
								'join_condition2'	=>	''

							);

			$series_data=$this->home_mod->get_data_with_condition($modal_data,$join_data);
			$data['series_list']=$series_data;
		}





		//DRAMA
		if($content == "" || $content == "drama" || $content == "home"){
			$where=array('status'	=>	0,
						 'com.type' =>	5,
						);
			$fetch_data='*';
			$order_by_coloumn='movie.movie_id';
			$modal_data=array(
								'where_condition'	=>	$where,
								'select_coloumns'	=> 	$fetch_data,
								'order_by_coloumn'	=>	$order_by_coloumn,
								'table'				=>  'movie_master as movie'
							);
			$join_data=array(

								'join_table1'		=>	'common_master as com',
								'join_condition1'	=>	'movie.common_id=com.common_id',
								'join_table2'		=>	'',
								'join_condition2'	=>	''

							);

			$drama_data=$this->home_mod->get_data_with_condition($modal_data,$join_data);
			$data['drama_list']=$drama_data;
		}





		if($content == "" || $content == "home"){
			$result = $this->basic->get_all_data(array("status" => 0),'front_banner_master');
		}else if($content == "movies"){
			$result = $this->basic->get_all_data(array("status" => 0,"type" => 1),'front_banner_master');
		}else if($content == "series"){
			$result = $this->basic->get_all_data(array("status" => 0,"type" => 2),'front_banner_master');
		}else if($content == "drama"){
			$result = $this->basic->get_all_data(array("status" => 0),'front_banner_master');
		}

		$data['banner_array'] = array();

		foreach($result as $row){

			$table = $row['type'] == 1? "movie_master" : "series_master";

			$where=array('status'=>0,''.$table.'.common_id'=>$row['common_id']);
			$fetch_data='*';
			$order_by_coloumn='';
			$modal_banner=array(
								'where_condition'	=>	$where,
								'select_coloumns'	=> 	$fetch_data,
								'order_by_coloumn'	=>	$order_by_coloumn,
								'table'				=>  $table,
							);
			$join_banner=array(

								'join_table1'		=>	'common_master as com',
								'join_condition1'	=>	''.$table.'.common_id=com.common_id',
								'join_table2'		=>	'',
								'join_condition2'	=>	''

							);

			$final_result = $this->home_mod->get_data_with_condition($modal_banner,$join_banner);

			$data['final_result'][] = $final_result;
		}
		
		
		$this->load->view("user/header");
		$this->load->view("user/index",$data);
		$this->load->view("user/footer");
	}

	public function signup()
	{
		if($this->session->userdata() != '')
		{ redirect('/home/login', 'refresh'); return false;}

		$data=$this->input->post();
		if(!empty($data))
		{
			
	        unset($data['customer_confirm_password']);
	        $where = array(
	            'customer_mobile_no' => $data['customer_mobile_no']
	        );
	        $dup_email = $this->basic->exist_or_not($where,'',$this->customer);
	        if($dup_email){
	            $msg_data['msg'] = 'email exist';
	        }else{
	        	$otp = rand(100000,999999);
	        	$msg = "Welcome to OTT!:Your Verification Number To Complete Your Registration is:".$otp;
	        	$otp_status = $this->sendMessage($data['customer_mobile_no'],$msg);
	        	if($otp_status= 'otp_send'){
		           $otp_check = $this->home_mod->otp_create($otp);
		        }

	            $msg_data['msg'] = 'error';
	            if($otp_check){
	                $msg_data['msg'] = 'success';
	            }
	        }
	        echo json_encode($msg_data);
		}
		else
		{
			$this->load->view("user/sign-up");
		}
	}

	public function sendMessage($phoneno,$msg)
   	{
       
		$endPoint = 'https://api.mnotify.com/api/sms/quick';
		$apiKey = 'oKZM5wi7rj4j19eKdrZPewn47ukesJ9Qu9DzGVH7fLrhV';
		$url = $endPoint . '?key=' . $apiKey;
		$data1 = [
		   'recipient' => [$phoneno],
		   'sender' => 'Dodiworld',
		   'message' => $msg,
		   'is_schedule' => 'false',
		   'schedule_date' => ''
		];

		    $ch = curl_init();
		    $headers = array();
		    $headers[] = "Content-Type: application/json";
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data1));
		    $result = curl_exec($ch);
		    $result = json_decode($result, TRUE);
		    curl_close($ch);
		$data['msg']="otp_send";
        return $data;
	}

	public function otp_verify()
	{
        $data = $this->input->post();
        $verified_result= $this->home_mod->otp_verification($data['otp']);
        $data['type'] = 'warning';
        if($verified_result!= NULL){
            $otp_verified= $this->home_mod->otp_is_expired($data['otp']);
	        $data['customer_password'] = md5($this->input->post('customer_password'));
	        unset($data['otp']);
	        unset($data['type']);
	        $result = $this->basic->insert($data,$this->customer);
	        $data['type'] = 'error';
	        $data['msg'] = 'Unable to upload customer data';
	        if($result){
	            $data['type'] = 'success';
	            $data['msg'] = 'Customer details uploaded successfully';
	        }
        }
        echo json_encode($data);
    }

	public function login()
	{
		if($this->session->userdata('customer_mobile_no') != '')
		{ redirect('/home', 'refresh'); return false;}

		$data=$this->input->post();
		if(!empty($data))
		{
			$data['customer_email'] = $this->input->post('customer_mobile_no');
	        $data['customer_password'] = md5($this->input->post('customer_password'));
	        $where = array(
	            'customer_mobile_no' => $data['customer_mobile_no'],
	            'customer_password' => $data['customer_password']
	        );
	        $customer_data =(array)$this->basic->exist_or_not($where,'',$this->customer);
	        if($customer_data){
	            if($customer_data['customer_status'] !=0){
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
			$this->load->view("user/login");
		}
	}

	public function manage_profile()
	{
		$customer_id=$this->session->userdata('customer_id');
		$insertdata=$this->input->post();

		if(!empty($insertdata))
		{
			
			$where=array('customer_id'	=> $customer_id);
			$insertdata['customer_lang_pref']=implode(",",$insertdata['customer_lang_pref']);
			$result=$this->basic->update_table($where,$insertdata,$this->customer);
			$data['msg']='error';
			if($result)
			{
				$data['msg'] = "success";
			}
			echo json_encode($data);
		}
		else
		{

			$data=array();
			$where=array('customer_id'	=> $customer_id);
			$customer_data=$this->basic->get_single_data($where,$this->customer);
			$customer_data['customer_lang_pref']=explode(",",$customer_data['customer_lang_pref']);
			$data['customer_details']=$customer_data;
			$this->load->view('user/header');
			$this->load->view('user/manage-profile',$data);
			$this->load->view('user/footer');
		}
	}

    public function show_detail()
	{
		$common_id=$this->uri->segment(4);
		$type=$this->uri->segment(3);
		// $season = $this->uri->segment(5);

		$type_master = $type == "movie"? "movie_master":"series_master";

		$where=array('com.common_id' =>	$common_id);

		$fetch_data='*';
		$order_by_coloumn='';
		$modal_data=array(
							'where_condition'	=>	$where,
							'select_coloumns'	=> 	$fetch_data,
							'order_by_coloumn'	=>	$order_by_coloumn,
							'table'				=>  $type_master
						);
		$join_data=array(

							'join_table1'		=>	'common_master as com',
							'join_condition1'	=>	''.$type_master.'.common_id=com.common_id',
							'join_table2'		=>	'',
							'join_condition2'	=>	''

						);
		$movie_data=$this->home_mod->get_data_with_condition($modal_data,$join_data);
		//show error not found
		if(empty($movie_data)){
			show_404();
		}

		$where_in_array=  explode(",",$movie_data[0]['cat_id']);
		$coloumn_name='cat_id';
		$data['category']=$this->home_mod->get_data_by_multiple_id($where_in_array,$coloumn_name,'category');
		
			
		//total number of series 
		$series_detail = array();
		$data['movie_details']=$movie_data[0];

		if($type == "series"){
			
			$where = array('status' => 0,'common_id'=>$common_id,'series_com_id'=>"");
			$where_season = array('status' => 0,'series_com_id'=>$common_id);

			$detail= $this->basic->get_all_data($where,'series_master');			//primary season(parent)
			if(!empty($detail)){
			
				$series_detail[] = $detail[0];

				$list_of_season = $this->basic->get_all_data($where_season,'series_master');		//secondary season(child)
				if($list_of_season != ""){
					foreach($list_of_season as $row){
						$series_detail[] = $row;										//stored in one array(parent + child)
					}
				}
			}else{
				$detail_series = $this->basic->exist_or_not(array('common_id'=>$common_id),"","series_master");
				$comm_id = $detail_series->series_com_id;

				$where = array('status' => 0,'common_id'=>$comm_id,'series_com_id'=>"");
				$where_season = array('status' => 0,'series_com_id'=>$comm_id);

				$detail= $this->basic->get_all_data($where,'series_master');			//primary season(parent)
				$series_detail[] = $detail[0];

				$list_of_season = $this->basic->get_all_data($where_season,'series_master');		//secondary season(child)
				if($list_of_season != ""){
					foreach($list_of_season as $row){
						$series_detail[] = $row;										//stored in one array(parent + child)
					}
				}
			}
		}

		$data['series_detail'] = $series_detail;

		$where=array('status'	=>	2);
		$fetch_data='movie.*,title,total_duration,rating';
		$modal_data=array(
							'where_condition'	=>	$where,
							'select_coloumns'	=> 	$fetch_data,
							'order_by_coloumn'	=>	'',
							'table'				=>  'movie_master as movie'
						);
		$join_data=array(

							'join_table1'		=>	'common_master as com',
							'join_condition1'	=>	'movie.common_id=com.common_id',
							'join_table2'		=>	'',
							'join_condition2'	=>	''

						);
		$data['upcoming_movies']=$this->home_mod->get_data_with_condition($modal_data,$join_data);


		$where = array('customer_id' => $this->session->userdata('customer_id'),
						'common_id' =>$common_id,
						'status' => 0);

		$data['purchased'] = $this->basic->exist_or_not($where,"","order_master");
			
		if($type == "series"){
			$where['each_episode'] = 1;
		}

		if($data['purchased'] != ""){
		    unset($where['status']);
		    $where['order_id'] = $data['purchased']->order_id;
			$data['timer'] = $this->basic->exist_or_not($where,"","end_timer_master");
			if($data['timer'] != ""){
				if($data['timer']->type == 2){
					$part_episode_count = (array)$this->basic->exist_or_not(array('common_id'=>$data['timer']->common_id),"","series_master");
					$end_episode_count = $this->basic->get_all_data(array('common_id'=>$data['timer']->common_id,'order_id'=>$data['purchased']->order_id,'status'=>1),'end_timer_master');
					$data['expired'] = $part_episode_count['total_number_episode'] == count($end_episode_count) ? "expired":"";
					if($data['expired']){
						$this->basic->update_table(array('order_id'=>$data['purchased']->order_id),array('status'=>1),'order_master');
					}
				}else{
					$end_movie = $this->basic->get_all_data(array('common_id'=>$data['timer']->common_id,'order_id'=>$data['purchased']->order_id,'status'=>1),'end_timer_master');
					$data['expired'] = $end_movie != ""?"expired":"";
					if($data['expired']){
						$this->basic->update_table(array('order_id'=>$data['purchased']->order_id),array('status'=>1),'order_master');
					}
				}
			}
		}

		$this->load->view('user/header');
		$this->load->view('user/movie-details',$data);
		$this->load->view('user/footer');
	}

	public function set_order_details()
	{
		$customer_id=$this->session->userdata('customer_id');
		$where=$this->input->post();
		$product_data_result=$this->basic->get_single_data($where,'common_master');
		
		$data=array(
						'customer_id'	=>	$customer_id,
						'common_id'		=>	$product_data_result['common_id'],
						'type'			=>	$product_data_result['type'],
						'price'			=>	$product_data_result['price'],
						'ordered_on'	=>	date("Y-m-d") 
		);
		$order_details=$this->basic->insert($data,$this->order);
		$msgdata['msg']='error';
		if($order_details)
		{
			$msgdata['msg']='success';
		}

		echo json_encode($msgdata);
	}

	public function manage_order()
	{
		$this->load->view('user/header');
		$this->load->view('user/order_details');
		$this->load->view('user/footer');
	}

	public function fetch_orders()
	{
		$customer_id=$this->session->userdata('customer_id');
		$select = ('order_master.*,customer_master.*,common_master.title,common_master.type');
		$where= array('order_master.customer_id'	=>	$customer_id);
    	$list = $this->order_modl->get_cat_datatables($where,$this->order);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();	
			$row[] = $no;		
			/*$row[] = $item->customer_name;
			$row[] = $item->customer_mobile_no;*/
			$row[] = $item->title;
			$type = ($item->type == 1) ? "Movie" : (($item->type == 2) ? "Series" : "Drama");
			$row[] = $type;
			$row[] = $item->price;
			$row[] = $item->ordered_on;
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->order_modl->count_all(),
			"recordsFiltered" => $this->order_modl->count_filtered($where,$this->order),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
	}
	public function show_category()
	{
		$get_cat_id=$this->uri->segment(3);
		$cat_name=$this->uri->segment(4);
		$where=array('com.cat_id'=>$get_cat_id);
		$fetch_data='movie_name,movie_banner,cast,director,cat.cat_name,total_duration,rating';
      	$order_by_coloumn='movie.movie_id';
      	$modal_data=array(
							'where_condition'	=>	$where,
							'select_coloumns'	=> 	$fetch_data,
							'order_by_coloumn'	=>	$order_by_coloumn,
							'table'				=>  'movie_master as movie'
						);
		$join_data=array(

							'join_table1'		=>	'common_master as com',
							'join_condition1'	=>	'movie.common_id=com.com_id',
							'join_table2'		=>	'category as cat',
							'join_condition2'	=>	'cat.cat_id=com.cat_id'

						);
		$movies_data=$this->home_mod->get_data_with_condition($modal_data,$join_data);	
		$data['movies_data']=$movies_data;
		$data['cat_name']=$cat_name;
		$this->load->view("user/header");
		$this->load->view("user/show-category",$data);
		$this->load->view("user/footer");
	}

	public function logout()
	{
        $this->session->sess_destroy();
        redirect('home/');
    }

    public function series(){
    	$common_id = $this->uri->Segment(3);
    	$episode = $this->uri->Segment(4);

		$where=array('series_master.common_id' => $common_id);
		$fetch_data='*';
		$order_by_coloumn='';
		$modal_data=array(
							'where_condition'	=>	$where,
							'select_coloumns'	=> 	$fetch_data,
							'order_by_coloumn'	=>	$order_by_coloumn,
							'table'				=>  'series_master'
						);
		$join_data=array(

							'join_table1'		=>	'common_master as com',
							'join_condition1'	=>	'series_master.common_id=com.common_id',
							'join_table2'		=>	'',
							'join_condition2'	=>	''

						);

		$result['data'] = $this->home_mod->get_data_with_condition($modal_data,$join_data);	
		$result['episode'] = $episode;

		$where = array('status' => 0,'common_id'=>$common_id,'series_com_id'=>"");
		$where_season = array('status' => 0,'series_com_id'=>$common_id);

		$detail= $this->basic->get_all_data($where,'series_master');			//primary season(parent)
		if(!empty($detail)){
		
			$series_detail[] = $detail[0];

			$list_of_season = $this->basic->get_all_data($where_season,'series_master');		//secondary season(child)
			if($list_of_season != ""){
				foreach($list_of_season as $row){
					$series_detail[] = $row;										//stored in one array(parent + child)
				}
			}
		}else{
			$detail_series = $this->basic->exist_or_not(array('common_id'=>$common_id),"","series_master");
			$comm_id = $detail_series->series_com_id;

			$where = array('status' => 0,'common_id'=>$comm_id,'series_com_id'=>"");
			$where_season = array('status' => 0,'series_com_id'=>$comm_id);

			$detail= $this->basic->get_all_data($where,'series_master');			//primary season(parent)
			$series_detail[] = $detail[0];

			$list_of_season = $this->basic->get_all_data($where_season,'series_master');		//secondary season(child)
			if($list_of_season != ""){
				foreach($list_of_season as $row){
					$series_detail[] = $row;										//stored in one array(parent + child)
				}
			}
		}
		$result['series_detail'] = $series_detail;

		$where = array('customer_id' => $this->session->userdata('customer_id'),
						'common_id' =>$common_id,
						'status' => 0);
						
		$result['purchased'] = $this->basic->exist_or_not($where,"","order_master");

		if($result['purchased'] != ""){
			unset($where['status']);
			$where['each_episode'] = $episode;
			$where['order_id'] = $result['purchased']->order_id;
			$result['timer'] = $this->basic->exist_or_not($where,"","end_timer_master");
			if($result['timer'] != ""){
				$part_episode_count = (array)$this->basic->exist_or_not(array('common_id'=>$result['timer']->common_id),"","series_master");
				$end_episode_count = $this->basic->get_all_data(array('common_id'=>$result['timer']->common_id,'order_id'=>$result['purchased']->order_id,'status'=>1),'end_timer_master');
				$result['expired'] = $part_episode_count['total_number_episode'] == count($end_episode_count)? "expired":"";
				if($result['expired'] == "expired"){
					$this->basic->update_table(array('order_id'=>$result['purchased']->order_id),array('status'=>1),'order_master');
				}
			}
		}

		$this->load->view('user/header');
		$this->load->view('user/show-details',$result);
		$this->load->view('user/footer');
    }

    function update_profile(){
    	$customer_id=$this->session->userdata('customer_id');
        $data = $this->input->post();
        $folder_name = 'customer_profile_images';
        $profile_img=$customer_id.'_profile_img.jpg';
        $where = array(
            'customer_id' => $customer_id);
        $final_array= array();
        $array_1 = array($profile_img,'customer_profile_img');
        array_push($final_array,$array_1);
        $result = $this->upload_img($final_array,$folder_name);
        if($result == 'successfully uploaded'){

            $data['customer_profile_img'] = $profile_img;
            $update = $this->basic->update_table($where,$data,$this->customer);
            echo 1;
        }else{
            echo $result;
        }
    }

    public function upload_img($final_array,$folder_name){
        $count_img =  count($final_array);
        $c1 = 0;
        $s1 = 0;
        for($i=0;$i<count($final_array);$i++){
            $config = array(
                    'upload_path' => './images/'.$folder_name.'/',
                    'file_name' => $final_array[$i][0],
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "5048000" // Can be set to particular file size , here it is 5 MB(2048 Kb)
                    
                    );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload($final_array[$i][1])){
                $s1++;
                $message = 'success';
            }else{
                $c1++;
                $message = $this->upload->display_errors();
                continue;
            }
        }
        if($s1 == $count_img){
            return 'successfully uploaded';
        }else if($c1 == $count_img){
            return $message;
        }
    }

    public function update_timing(){
    	$data = $this->input->post();
    	$data['customer_id'] = $this->session->userdata('customer_id');
    	$data['date'] = $this->date;

    	if($data['type'] != 2){
    		unset($data['each_episode']);
    	}

    	$where = array('customer_id' => $this->session->userdata('customer_id'),
						'common_id' =>$data['common_id'],
						'order_id' => $data['order_id']);
						
    	if($data['type'] == 2){
    		$where['each_episode'] = $data['each_episode'];
    	}	
    	$timer= $this->basic->exist_or_not($where,"","end_timer_master");
    	if($timer){
    		if($data['status'] == 1){
    			$result = $this->basic->update_table($where,array('status'=>$data['status']),"end_timer_master");
    			echo "session_expired";
    		}else{
    			$result = $this->basic->update_table($where,$data,"end_timer_master");
    			echo 'session';
    		}
    	}else{
    		$result = $this->basic->insert($data,"end_timer_master");
    		echo 'session';
    	}
    }

    public function demo(){
		$store_value = array();
    	$value = array();
    	$xml = simplexml_load_file('http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil') or die('Failed to create an object');
  		foreach($xml->body->switch->video as $row){
  			$value['src'] = (string)$row->attributes()->src;
  			$value['width'] = (string)$row->attributes()->width;
  			$value['height'] = (string)$row->attributes()->height;
  			$value['systemLanguage'] = (string)$row->attributes()->systemLanguage;
  			$store_value[] = $value;
  		}
  		echo "<pre>";
  		print_r($store_value);die;
    }

    public function send_msg(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.msg91.com/api/v5/flow",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\"flow_id\":\"5f6850462697687e606bed87\",\"sender\":\"SMSIND\",\"recipients\":[{\"mobiles\":\"918454098962\",\"VAR1\":\"VALUE 1\",\"VAR2\":\"VALUE 2\"}]}",
			CURLOPT_HTTPHEADER => array(
				"authkey: 341168AF9WJ7jQSI5f58b5efP1",
				"content-type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
	
	public function order_summary(){
		$this->load->view("user/header");
		$this->load->view("thankyou_page");
		$this->load->view("user/footer");
	}
}
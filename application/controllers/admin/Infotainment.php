<?php
class Infotainment extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->table = 'category';
	 	$this->load->model('Infotainment_model','infotainment');
	 	$this->table = "session_master";
	 	$this->common_table = "common_master";
		
	}

	public function index(){
		// $data['active'] = "edit_cat";
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-infotainment',$category);
		$this->load->view('admin_pannel/footer');
	}

	public function infotainment_list(){
		$data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/infotainment-list');
		$this->load->view('admin_pannel/footer');
	}

	public function add_infotainment(){
		$data = $this->input->post();

		$count = count($data['each_session_name']);

		$data['type'] = 4;

		$session['status'] = $data['status']; 
		$session['conducted_by'] = $data['conducted_by'];  
		$session['each_synopsis'] = json_encode(explode(',',$data['each_synopsis'])); 
		$session['each_session_link'] = json_encode($data['each_episode_link'], JSON_UNESCAPED_SLASHES); 
		$session['each_session_name'] = json_encode($data['each_session_name']); 
		$session['session_trail_link'] = $data['session_trail_link']; 
		$session['session_name'] = $data['session_name']; 
		$session['each_session_duration'] = json_encode($data['session_duration']); 
		$session['total_number_session'] = $data['total_number_session']; 

		unset($data['conducted_by'],$data['each_synopsis'],$data['each_episode_link'],
			$data['each_session_name'],$data['session_name'],$data['session_duration'],
			$data['total_number_session'],$data['status'],$data['session_trail_link']);

		$last_id = $this->basic->get_last_data($this->table,'id','id','DESC');  //$table,$select,$id,$order

		if(empty($last_id)){
			$last_id['id'] = 0;
		}

		$final_array= array();
		$image_store_db = array();

		for($i=1;$i<=$count;$i++){
			$session_episode_banner = ($last_id['id']+1).($i).'_session_episode_banner.jpg';
			
			$array_1 = array($session_episode_banner,'session_banner_'.$i);   //comba banner image name to store in database and html input name 

			array_push($image_store_db,$session_episode_banner);
			array_push($final_array,$array_1);
			
		}

		$session_banner = ($last_id['id']+1).'_session_banner.jpg';
		$array_2 = array($session_banner,'session_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_2);

		$result = $this->upload_img($final_array,'session_banner');   //final array and folder name to stored image 

		unset($final_array[count($final_array)-1]);

		$result_data['message'] = $result;
		$result_data['type'] = 'error';

		if($result == 'successfully uploaded'){

			$result_data['message'] = 'session name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->basic->exist_or_not(array('session_name' => $session['session_name']),"","session_master"))){

				$result_data['message'] = 'error while adding session';
				$result_data['type'] = 'error';	

				$return_id = $this->basic->insert($data,$this->common_table);

				$session['common_id'] = $return_id;
				$session['session_banner'] = $session_banner;
				$session['each_session_banner'] = json_encode($image_store_db);

				$insert_movie = $this->basic->insert($session,$this->table);

				$result_data['message'] = 'added session successfully';
				$result_data['type'] = 'success';	
			}	
		}

		echo json_encode($result_data);
	}

	public function upload_img($final_array,$folder_name){
        $count_img =  count($final_array);
        $c1 = 0;
        $s1 = 0;
        for($i=0;$i < $count_img;$i++){
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
        }else if($c1 == $count_img || $c1 <= $count_img){
            return 'error';
        }
    }

    public function show_list_view(){
    	$list = $this->infotainment->get_cat_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {

			$no++;
			$row = array();
			$row[] = '
						<div class="media align-items-center">
                    	    <div class="iq-movie">
                    	        <a href="javascript:void(0);"><img
                    	              src="'.base_url("images/session_banner/".$item->session_banner."").'"
                    	              class="img-border-radius avatar-40 img-fluid" alt=""></a>
                    	    </div>
                    	    <div class="media-body text-white text-left ml-3">
                    	        <p class="mb-0">'.$item->session_name.'</p>
                    	        <small>'.$item->total_duration.'</small>
                    	    </div>
                	  	</div>';			
			$row[] = $item->cat_name;
			$row[] = $item->session_name;
			$row[] = $item->release_year;
			$row[] = $item->language;
			$row[] = $item->conducted_by;
			$status = $item->status == 0? 'active' : 'deactive';
			$row[] = $status;
			$cat_id ="'".$item->cat_id ."'";		

				$row[] = 	'<div class="flex align-items-center list-user-action">
                              	<a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="View" href="#" onclick= "view_category('.$cat_id.')"><i 
                                 	class="lar la-eye"></i></a>
                              	<a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Edit" href="#" onclick= "edit_category('.$cat_id.')"><i
                                 	class="ri-pencil-line"></i></a>
                              	<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Delete" href="#" onclick= "delete_category('.$cat_id.')"><i
                                    class="ri-delete-bin-line"></i></a>
                           	</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->infotainment->count_all(),
			"recordsFiltered" => $this->infotainment->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }
}

?>

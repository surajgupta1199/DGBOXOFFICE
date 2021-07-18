<?php
class Music extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->table = 'category';
	 	$this->load->model('Music_model','music');
	 	$this->table = "music_master";
	 	$this->common_table = "common_master";
		
	}

	public function index(){
		// $data['active'] = "edit_cat";
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-music',$category);
		$this->load->view('admin_pannel/footer');
	}

	public function edit_music(){
		$id = $this->uri->segment(4);
		$where = array('music_id' => $id);
		$join_cond = ('music_master.common_id = common_master.common_id');
		$result['data'] = $this->music->fetch_part_music($where,$this->table,$this->common_table,$join_cond);
		$result['category'] = $this->basic->get_all_data(array('cat_status' => 0),'category');    //$where ,$table
		// $data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/edit-music',$result);
		$this->load->view('admin_pannel/footer');
	}

	public function music_list(){
		$data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/music-list');
		$this->load->view('admin_pannel/footer');
	}

	public function add_music(){
		$data = $this->input->post();

		$data['type'] = 3;

		$music['music_name'] = $data['music_name']; 
		$music['singer'] = $data['singer']; 
		$music['musician'] = $data['musician']; 
		$music['producer'] = $data['producer']; 
		$music['music_link'] = $data['music_link']; 
		$music['status'] = $data['status']; 

		unset($data['music_name'],$data['singer'],$data['musician'],$data['producer'],$data['music_link'],$data['status']);

		$last_id = $this->basic->get_last_data($this->table,'id','id','DESC');  //$table,$select,$id,$order
		if(empty($last_id)){
			$last_id['id'] = 0;
		}

		$music_banner = ($last_id['id']+1).'_music_banner.jpg';

		$final_array= array();

		$array_1 = array($music_banner,'music_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_1);
		
		$result = $this->upload_img($final_array,'music_banner');   //final array and folder name to stored image 

		$result_data['message'] = $result;
		$result_data['type'] = 'error';

		if($result == 'successfully uploaded'){

			$result_data['message'] = 'music name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->basic->exist_or_not(array('music_name' => $music['music_name']),"","music_master"))){

				$result_data['message'] = 'error while adding movie';
				$result_data['type'] = 'error';	
				
				$return_id = $this->basic->insert($data,$this->common_table);

				$music['common_id'] = $return_id;
				$music['music_banner'] = $music_banner;

				$insert_movie = $this->basic->insert($music,$this->table);

				$result_data['message'] = 'added movie successfully';
				$result_data['type'] = 'success';	
			}	
		}

		echo json_encode($result_data);
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
        }else if($c1 == $count_img || $c1 <= $count_img){
            return $message;
        }
    }

    public function music_list_view(){
    	$list = $this->music->get_cat_datatables();

    	// print_r($list);die;

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = '
						<div class="media align-items-center">
                    	    <div class="iq-movie">
                    	        <a href="javascript:void(0);"><img
                    	              src="'.base_url("images/music_banner/".$item->music_banner."").'"
                    	              class="img-border-radius avatar-40 img-fluid" alt=""></a>
                    	    </div>
                    	    <div class="media-body text-white text-left ml-3">
                    	        <p class="mb-0">'.$item->music_name.'</p>
                    	        <small>'.$item->total_duration.'</small>
                    	    </div>
                	  	</div>';			
			$row[] = $item->cat_name;
			$row[] = $item->release_year;
			$row[] = $item->language;
			$row[] = $item->producer;
			$status = $item->status == 0? 'active' : 'deactive';
			$row[] = $status;
			$cat_id =''.$item->music_id .'';	

				$row[] = 	'<div class="flex align-items-center list-user-action">
                              	<a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="View" href="#" onclick= "view_category('.$cat_id.')"><i 
                                 	class="lar la-eye"></i></a>
                              	<a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Edit" href='.base_url("admin/music/edit_music/".$item->music_id."").'><i
                                 	class="ri-pencil-line"></i></a>
                              	<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Delete" href="#" onclick= "delete_category('.$cat_id.')"><i
                                    class="ri-delete-bin-line"></i></a>
                           	</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->music->count_all(),
			"recordsFiltered" => $this->music->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }
}

?>

<?php
class Series extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->table = 'category';
	 	$this->load->model('Series_model','series');
	 	$this->table = "series_master";
	 	$this->common_table = "common_master";
		
	}

	public function index(){
		// $data['active'] = "edit_cat";
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-show',$category);
		$this->load->view('admin_pannel/footer');
	}

	public function series_list(){
		$data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/show-list');
		$this->load->view('admin_pannel/footer');
	}

	public function add_series(){
		$data = $this->input->post();

		$count = count($data['episode_name']);

		$data['type'] = 2;

		$series['series_cast'] = $data['series_cast']; 
		$series['status'] = $data['status']; 
		$series['series_director'] = $data['series_director']; 
		$series['series_writer'] = $data['series_writer']; 
		$series['series_genres'] = $data['series_genres']; 
		$series['total_number_episode'] = $data['total_number_episode']; 
		$series['each_episode_duration'] = json_encode($data['episode_duration']); 
		$series['each_episode_name'] = json_encode($data['episode_name']); 
		$series['each_synopsis'] = json_encode(explode(',',$data['each_synopsis'])); 
		$series['series_name'] = $data['series_name']; 
		$series['season_number'] = $data['season_number']; 
		$series['series_trail_link'] = $data['series_trail_link']; 
		$series['each_episode_link'] = json_encode($data['each_episode_link'], JSON_UNESCAPED_SLASHES); 

		unset($data['episode_name'],$data['director'],$data['writer'],$data['genres'],$data['each_synopsis'],
			$data['series_name'],$data['total_number_episode'],$data['episode_duration'],$data['cast'],
			$data['series_cast'],$data['series_director'],$data['series_writer'],$data['series_genres'],
			$data['season_number'],$data['each_episode_link'],$data['status'],$data['series_trail_link']);

		$last_id = $this->basic->get_last_data($this->table,'id','id','DESC');  //$table,$select,$id,$order

		if(empty($last_id)){
			$last_id['id'] = 0;
		}

		$final_array= array();
		$image_store_db = array();

		for($i=1;$i<=$count;$i++){
			$series_episode_banner = ($last_id['id']+1).($i).'_series_episode_banner.jpg';
			
			$array_1 = array($series_episode_banner,'episode_banner_'.$i);   //comba banner image name to store in database and html input name 

			array_push($image_store_db,$series_episode_banner);
			array_push($final_array,$array_1);
			
		}

		$series_banner = ($last_id['id']+1).'_series_banner.jpg';
		$array_2 = array($series_banner,'series_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_2);

		$result = $this->upload_img($final_array,'series_banner');   //final array and folder name to stored image 

		unset($final_array[count($final_array)-1]);

		$result_data['message'] = $result;
		$result_data['type'] = 'error';

		$where = array('series_name' => $series['series_name'],'season_number' => $series['season_number']);

		if($result == 'successfully uploaded'){

			$result_data['message'] = 'series name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->basic->exist_or_not($where,"","series_master"))){

				$result_data['message'] = 'error while adding series';
				$result_data['type'] = 'error';	

				$return_id = $this->basic->insert($data,$this->common_table);

				$series['common_id'] = $return_id;
				$series['series_banner'] = $series_banner;
				$series['each_edisode_banner'] = json_encode($image_store_db);

				$insert_movie = $this->basic->insert($series,$this->table);

				$result_data['message'] = 'added series successfully';
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
    	$list = $this->series->get_cat_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {

			$no++;
			$row = array();
			$row[] = '
						<div class="media align-items-center">
                    	    <div class="iq-movie">
                    	        <a href="javascript:void(0);"><img
                    	              src="'.base_url("images/series_banner/".$item->series_banner."").'"
                    	              class="img-border-radius avatar-40 img-fluid" alt=""></a>
                    	    </div>
                    	    <div class="media-body text-white text-left ml-3">
                    	        <p class="mb-0">'.$item->series_name.'</p>
                    	        <small>'.$item->total_duration.'</small>
                    	    </div>
                	  	</div>';			
			$row[] = $item->cat_name;
			$row[] = $item->series_name;
			$row[] = $item->release_year;
			$row[] = $item->language;
			$row[] = $item->series_director;
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
			"recordsTotal" => $this->series->count_all(),
			"recordsFiltered" => $this->series->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }

    public function season(){
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$category['season'] = $this->basic->get_all_data(array('status' => 0),'series_master');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-season',$category);
		$this->load->view('admin_pannel/footer');
    }

    public function fetch_season_num(){
    	$where = $this->input->post();
    	$result = $this->series->get_single_data($where,$this->table);   				//$where,$table,$join condition
    	echo json_encode($result);
    }
}

?>

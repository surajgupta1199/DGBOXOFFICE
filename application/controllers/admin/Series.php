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

	public function edit_show(){
		$id = $this->uri->segment(4);
		$where = array('common_master.common_id' => $id);
		$result['data'] = $this->series->fetch_all($where,$this->table,$this->common_table);
		$result['category'] = $this->basic->get_all_data(array('cat_status' => 0),'category');    //$where ,$table
		// $data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/edit-show',$result);
		$this->load->view('admin_pannel/footer');
	}

	public function add_series(){

		$data = $this->input->post();
		$count = count($data['episode_name']);

		$data['type'] = 2;

		$series['each_episode_link'] = json_encode($data['each_episode_link'], JSON_UNESCAPED_SLASHES); 
		$series['series_com_id'] = $data['mul_season'] == "add_season"? $data['series_id'] : "";
		$series['each_synopsis'] = $data['each_synopsis']; 
		$series['each_episode_duration'] = json_encode($data['episode_duration']); 
		$series['each_episode_name'] = json_encode($data['episode_name']); 
		$series['total_number_episode'] = $data['total_number_episode']; 
		$series['series_trail_link'] = $data['series_trail_link']; 
		$series['series_director'] = $data['series_director']; 
		$series['series_writer'] = $data['series_writer']; 
		$series['season_number'] = $data['season_number']; 
		$series['series_cast'] = $data['series_cast']; 
		$series['status'] = $data['status']; 

		unset($data['episode_name'],$data['director'],$data['writer'],$data['genres'],$data['each_synopsis'],
			$data['series_cast'],$data['series_director'],$data['series_writer'],$data['series_trail_link'],
			$data['series_name'],$data['total_number_episode'],$data['episode_duration'],$data['cast'],
			$data['season_number'],$data['each_episode_link'],$data['status'],$data['series_id'],
			$data['mul_season']);
		
		$where = array('title' => $data['title'],'type' => 2,'series_master.season_number' => $series['season_number']);

		$result_data['message'] = 'series name already exists';
		$result_data['type'] = 'error';			

		if(empty($this->series->exist_or_not($where,"","series_master"))){

			$result_data['message'] = 'error while adding series';
			$result_data['type'] = 'error';	

			$return_id = $this->basic->insert($data,$this->common_table);


			$final_array= array();
			$image_store_db = array();
			$image_poster_db = array();

			for($i=1;$i<=$count;$i++){
				$series_episode_banner = ($return_id).($i).'_series_episode_banner.jpg';
				
				$array_1 = array($series_episode_banner,'episode_banner_'.$i);   //comba banner image name to store in database and html input name 

				array_push($image_store_db,$series_episode_banner);
				array_push($final_array,$array_1);
				
			}

			for($i=1;$i<=$count;$i++){
				$series_episode_poster = ($return_id).($i).'_series_episode_poster.jpg';
				
				$array_2 = array($series_episode_poster,'episode_poster_'.$i);   //comba banner image name to store in database and html input name 

				array_push($image_poster_db,$series_episode_poster);
				array_push($final_array,$array_2);
				
			}

			$series_banner = ($return_id).'_series_banner.jpg';
			$series_poster = ($return_id).'_series_poster.jpg';
			$array_3 = array($series_banner,'series_banner');   //comba banner image name to store in database and html input name 
			array_push($final_array,$array_3);
			$array_4 = array($series_poster,'series_poster');   //comba banner image name to store in database and html input name 
			array_push($final_array,$array_4);

			$result = $this->upload_img($final_array,'series_banner');   //final array and folder name to stored image 

			unset($final_array[count($final_array)-1]);

			if($result == 'successfully uploaded'){


				$series['common_id'] = $return_id;
				$series['series_banner'] = $series_banner;
				$series['series_poster'] = $series_poster;
				$series['each_episode_banner'] = json_encode($image_store_db);
				$series['each_episode_poster'] = json_encode($image_poster_db);

				$insert_movie = $this->basic->insert($series,$this->table);

				$result_data['message'] = 'added series successfully';
				$result_data['type'] = 'success';	
			}else{
				$where_common_id = array('common_id' => $return_id);
				$result = $this->basic->delete($where_common_id,$this->common_table);
				$result_data['message'] = $result;
				$result_data['type'] = 'error';

			}
		}	

		echo json_encode($result_data);
	}

	public function edit_series(){

		$data = $this->input->post();
		$count = count($data['episode_name']);
		$data['type'] = 2;


		$series['each_episode_link'] = json_encode($data['each_episode_link'], JSON_UNESCAPED_SLASHES); 
		$series['series_com_id'] = $data['mul_season'] == "add_season"? $data['series_id'] : "";
		$series['each_synopsis'] = $data['each_synopsis']; 
		$series['each_episode_duration'] = json_encode($data['episode_duration']); 
		$series['each_episode_name'] = json_encode($data['episode_name']); 
		$series['total_number_episode'] = $data['total_number_episode']; 
		$series['series_trail_link'] = $data['series_trail_link']; 
		$series['series_director'] = $data['series_director']; 
		$series['series_writer'] = $data['series_writer']; 
		$series['season_number'] = $data['season_number']; 
		$series['series_cast'] = $data['series_cast']; 
		$series['status'] = $data['status']; 
		$series['id'] = $data['id']; 

		unset($data['episode_name'],$data['director'],$data['writer'],$data['genres'],$data['each_synopsis'],
			$data['series_cast'],$data['series_director'],$data['series_writer'],$data['series_trail_link'],
			$data['series_name'],$data['total_number_episode'],$data['episode_duration'],$data['cast'],
			$data['season_number'],$data['each_episode_link'],$data['status'],$data['series_id'],
			$data['mul_season'],$data['id']);

		// $last_id = $this->basic->get_last_data($this->table,'id','id','DESC');  //$table,$select,$id,$order

		$common_id = $this->uri->segment(4);

		$final_array= array();
		$image_store_db = array();
		$image_poster_db = array();

		for($i=1;$i<=$count;$i++){
			$series_episode_banner = ($common_id).($i).'_series_episode_banner.jpg';
			
			$array_1 = array($series_episode_banner,'episode_banner_'.$i);   //comba banner image name to store in database and html input name 

			array_push($image_store_db,$series_episode_banner);
			array_push($final_array,$array_1);
			
		}

		for($i=1;$i<=$count;$i++){
			$series_episode_poster = ($common_id).($i).'_series_episode_poster.jpg';
			
			$array_2 = array($series_episode_poster,'episode_poster_'.$i);   //comba banner image name to store in database and html input name 

			array_push($image_poster_db,$series_episode_poster);
			array_push($final_array,$array_2);
			
		}

		$series_banner = ($common_id).'_series_banner.jpg';
		$series_poster = ($common_id).'_series_poster.jpg';
		$array_3 = array($series_banner,'series_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_3);
		$array_4 = array($series_poster,'series_poster');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_4);
		$result = $this->upload_img($final_array,'series_banner');   //final array and folder name to stored image 

		unset($final_array[count($final_array)-1]);

		$result_data['message'] = $result;
		$result_data['type'] = 'error';
		$where = array('title' => $data['title'],'type' => 2,'series_master.season_number' => $series['season_number']);
		$where_id_in = array('common_master.common_id'=>$common_id);
		$where_common = array('common_id' => $common_id);

		if($result == 'successfully uploaded'){

			$result_data['message'] = 'series name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->series->exist_or_not($where,$where_id_in,"series_master"))){

				$result_data['message'] = 'error while updating series';
				$result_data['type'] = 'error';	

				$return_id = $this->basic->update_table($where_common,$data,$this->common_table);

				$series['series_banner'] = $series_banner;
				$series['series_poster'] = $series_poster;
				$series['each_episode_banner'] = json_encode($image_store_db);
				$series['each_episode_poster'] = json_encode($image_poster_db);

				$insert_movie = $this->basic->update_table($where_common,$series,$this->table);

				$result_data['message'] = 'updated series successfully';
				$result_data['type'] = 'success';	
			}	
		}else if('You did not select a file to upload'){
			$result_data['message'] = 'series name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->series->exist_or_not($where,$where_id_in,"series_master"))){

				$result_data['message'] = 'error while updating series';
				$result_data['type'] = 'error';	

				$return_id = $this->basic->update_table($where_common,$data,$this->common_table);

				$update_series = $this->basic->update_table($where_common,$series,$this->table);

				$result_data['message'] = 'updated series successfully';
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
        if($s1 == $count_img || $c1 != $count_img){
            return 'successfully uploaded';
        }else if($c1 == $count_img){
            return $message;
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
                    	        <p class="mb-0">'.$item->title.'</p>
                    	        <small>'.$item->total_duration.'</small>
                    	    </div>
                	  	</div>';			
			$row[] = $item->title.' '.$item->season_number;
			$row[] = $item->release_year;
			$row[] = $item->language;
			$row[] = $item->series_director;
			$status = $item->status == 0? 'active' : 'deactive';
			$row[] = $status;
			$common_id ="'".$item->common_id ."'";		
			$series_id ="'".$item->id ."'";		

				$row[] = 	'<div class="flex align-items-center list-user-action">
                              	<a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="View" href="#" onclick= "view_category('.$common_id.')"><i 
                                 	class="lar la-eye"></i></a>
                              	<a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Edit" href='.base_url("admin/series/edit_show/".$item->common_id."").'><i
                                 	class="ri-pencil-line"></i></a>
                              	<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Delete" href="#" onclick= "delete_category('.$series_id.','.$common_id.')"><i
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

    public function delete_series(){
    	$where_movie = array('id' => $this->input->post('id'));
    	$where_common_id = array('common_id' => $this->input->post('common_id'));
    	$this->basic->delete($where_movie,$this->table);
    	$result = $this->basic->delete($where_common_id,$this->common_table);
    	echo $result;
    }

    public function season(){
		$where = array('cat_status' => 0);
		$category['season'] = $this->series->fetch_all(array('status' => 0,'series_com_id'=> ""),'common_master','series_master');
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

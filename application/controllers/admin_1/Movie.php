<?php
class Movie extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->load->model('Movie_model','movie');
	 	$this->table = "movie_master";
	 	$this->common_table = "common_master";
		
	}

	public function index(){
		// $data['active'] = "edit_cat";
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-movie',$category);
		$this->load->view('admin_pannel/footer');
	}

	public function movie_list(){
		$data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/movie-list');
		$this->load->view('admin_pannel/footer');
	}

	public function edit_movie(){
		$id = $this->uri->segment(4);
		$where = array('movie_id' => $id);
		$join_cond = ('movie_master.common_id = common_master.common_id');
		$result['data'] = $this->movie->fetch_part_movie($where,$this->table,$this->common_table,$join_cond);
		$result['category'] = $this->basic->get_all_data(array('cat_status' => 0),'category');    //$where ,$table
		// $data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/edit-movie',$result);
		$this->load->view('admin_pannel/footer');
	}

	public function add_edit_movies(){
		$data = $this->input->post();
		$add_edit = $data['add_edit'];
		
		$movie_id = $add_edit == "add_movie" ? "" : $data['movie_id'];

		// $data['type'] = 1;
		$movie['movie_cast'] = $data['cast']; 
		$movie['movie_director'] = $data['director']; 
		$movie['movie_writer'] = $data['writer']; 
		$movie['movie_genres'] = $data['genres']; 
		$movie['movie_link'] = $data['movie_link']; 
		$movie['movie_trail_link'] = $data['movie_trail_link']; 
		$movie['movie_name'] = $data['movie_name']; 
		$movie['status'] = $data['status']; 

		unset($data['cast'],$data['director'],$data['writer'],$data['genres'],$data['movie_link'],
			$data['movie_name'],$data['status'],$data['movie_trail_link'],$data['add_edit'],$data['movie_id']);

		$last_id = $this->basic->get_last_data($this->table,'movie_id','movie_id','DESC');  //$table,$select,$id,$order
		if(empty($last_id)){
			$last_id['movie_id'] = 0;
		}

		$movie_banner = $add_edit == "add_movie" ? ($last_id['movie_id']+1).'_movie_banner.jpg' : ($movie_id).'_movie_banner.jpg';

		$final_array= array();
		$array_1 = array($movie_banner,'movie_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_1);
		
		$result = $this->upload_img($final_array,'movie_banner');   //final array and folder name to stored image 

		$where = array('movie_name'=>$movie['movie_name']);
		$where_id_in = $add_edit == "add_movie" ? "" : array('movie_id'=>$movie_id);
		$where_movie = $add_edit == "add_movie" ? "" : array('movie_id' => $movie_id);
		$where_common = $add_edit == "add_movie" ? "" : array('common_id' => $data['common_id']);

		$result_data['message'] = $result;
		$result_data['type'] = 'error';

		if($result == 'successfully uploaded'){

			$result_data['message'] = 'movie name already exists';
			$result_data['type'] = 'error';			

			if(empty($this->basic->exist_or_not($where,$where_id_in,"movie_master"))){

				$result_data['message'] = 'error while adding movie';
				$result_data['type'] = 'error';	

				$return_id = $add_edit == "add_movie"? ($this->basic->insert($data,$this->common_table)):
													 ($this->basic->update_table($where_common,$data,$this->common_table));


				$return_id = $add_edit == "add_movie" ?  $return_id : $data['common_id'];

				$movie['movie_banner'] = $movie_banner;
				$movie['common_id'] = $return_id;
				$insert_movie = $add_edit == "add_movie"? ($this->basic->insert($movie,$this->table)):
													 ($this->basic->update_table($where_movie,$movie,$this->table));

				$result_data['message'] = 'added movie successfully';
				$result_data['type'] = 'success';	
			}
		}else if('You did not select a file to upload'){

			$result_data['message'] = "movie name already exists";
			$result_data['type'] = "error";
			// print_r($this->basic->exist_or_not($where,$where_id_in,"movie_master"));die;
			if(empty($this->basic->exist_or_not($where,$where_id_in,"movie_master"))){
				$return_id = $add_edit == "add_movie"? ($this->basic->insert($data,$this->common_table)):
												 ($this->basic->update_table($where_common,$data,$this->common_table));


				$return_id = $add_edit == "add_movie" ?  $return_id : $data['common_id'];
				
				$movie['common_id'] = $return_id;
				$insert_movie = $add_edit == "add_movie"? ($this->basic->insert($movie,$this->table)):
													 ($this->basic->update_table($where_movie,$movie,$this->table));
			 	$result_data['message'] = 'added movie successfully';
				$result_data['type'] = 'success';	
			}

		}else{
			$output['message'] = $result;
			$output['type'] = "warning";
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

    public function movie_list_view(){
    	$list = $this->movie->get_cat_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {

    		// $result = implode(' ', array_slice(explode(' ', $list[0]->director), 0,2));

			$no++;
			$row = array();
			$row[] = '
						<div class="media align-items-center">
                    	    <div class="iq-movie">
                    	        <a href="javascript:void(0);"><img
                    	              src="'.base_url("images/movie_banner/".$item->movie_banner."").'"
                    	              class="img-border-radius avatar-40 img-fluid" alt=""></a>
                    	    </div>
                    	    <div class="media-body text-white text-left ml-3">
                    	        <p class="mb-0">'.$item->movie_name.'</p>
                    	        <small>'.$item->total_duration.'</small>
                    	    </div>
                	  	</div>';			
			$row[] = $item->cat_name;
			$row[] = $item->release_year;
			$row[] = $item->language;
			$row[] = $item->movie_director;
			$status = $item->status == 0? 'active' : 'deactive';
			$row[] = $status;
			$movie_id =''.$item->movie_id .'';		

				$row[] = 	'<div class="flex align-items-center list-user-action">
                              	<a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="View" href="#" onclick= "view_category('.$movie_id.')"><i 
                                 	class="lar la-eye"></i></a>
                              	<a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Edit" href='.base_url("admin/movie/edit_movie/".$item->movie_id."").' ><i
                                 	class="ri-pencil-line"></i></a>
                              	<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                 	data-original-title="Delete" href="#" onclick= "delete_category('.$movie_id.','.$item->common_id.')"><i
                                    class="ri-delete-bin-line"></i></a>
                           	</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->movie->count_all(),
			"recordsFiltered" => $this->movie->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }

    public function delete_movie(){
    	$where_movie = array('movie_id' => $this->input->post('movie_id'));
    	$where_common_id = array('common_id' => $this->input->post('common_id'));
    	$this->basic->delete($where_movie,$this->table);
    	$result = $this->basic->delete($where_common_id,$this->common_table);
    	echo $result;
    }

    public function thetre(){
		// $data['active'] = "edit_cat";
		$where = array('cat_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'category');    //$where ,$table
		$this->load->view('admin_pannel/header');
		$this->load->view('admin_pannel/add-thetre',$category);
		$this->load->view('admin_pannel/footer');
    }
}

?>

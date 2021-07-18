<?php
class Category extends CI_Controller{
	function __construct(){
	 	
	 	parent::__construct();	
	 	$this->table = 'category';
	 	$this->load->model('Category_model','category');
		
	}

	public function index(){
		$where = array('content_status' => 0);
		$category['data'] = $this->basic->get_all_data($where,'content_master');    //$where ,$table
		$data['active'] = "edit_cat";
		$this->load->view('admin_pannel/header',$data);
		$this->load->view('admin_pannel/category-list',$category);
		$this->load->view('admin_pannel/footer');
	}

	public function add_edit_category(){
		$data = $this->input->post();
		$add_edit_cat = $data['add_category'];
		unset($data['add_category']);
		$last_id = $this->basic->get_last_data($this->table,'cat_id','cat_id','DESC');  //$table,$data,$id,$order

		if(empty($last_id)){
			$last_id['cat_id'] = 0;
		}

		$cat_banner = $add_edit_cat == "add_cat" ? ($last_id['cat_id']+1).'_cat_banner.jpg' : ($data['cat_id']).'_cat_banner.jpg';

		$final_array= array();
		$array_1 = array($cat_banner,'cat_banner');   //comba banner image name to store in database and html input name 
		array_push($final_array,$array_1);
		
		$result = $this->upload_img($final_array,'category_banner');   //final array and folder name to stored image 

		$where = array('cat_name'=>$data['cat_name']);
		$where_id_in = $add_edit_cat == "add_cat" ? "" : array('cat_id'=>$data['cat_id']);
		$where_id = $add_edit_cat == "add_cat" ? "" : array('cat_id' => $data['cat_id']);
		
		if($result == 'successfully uploaded'){

			$output['message'] = "category title should not be same";
			$output['type'] = "error";

		 	if(empty($this->basic->exist_or_not($where,$where_id_in,"category"))){

				$data['cat_banner'] = $cat_banner;
				$add_edit_cat == "add_cat" ? $this->basic->insert($data,$this->table) : $this->basic->update_table($where_id,$data,$this->table);
				$output['message'] = "Category inserted successfully";
				$output['type'] = "success";

			}
		}else if('You did not select a file to upload'){

			$output['message'] = "category title should not be same";
			$output['type'] = "error";

			if(empty($this->basic->exist_or_not($where,$where_id_in,"category"))){
				$add_edit_cat == "add_cat" ? $this->basic->insert($data,$this->table) : $this->basic->update_table($where_id,$data,$this->table);
				$output['message'] = "Category updated successfully";
				$output['type'] = "success";
			}
		}else{
			$output['message'] = $result;
			$output['type'] = "warning";
		}
		echo json_encode($output);
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

    public function get_categories(){
    	$list = $this->category->get_cat_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$status=$item->cat_status;
			$row[] = $no;			
			$row[] = $item->cat_name;
			$row[] = $item->cat_description;
			$row[] = '20';
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
			"recordsTotal" => $this->category->count_all(),
			"recordsFiltered" => $this->category->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		exit();
    }

    public function delete_category(){
    	$where = $this->input->post();
    	$result = $this->basic->delete($where,$this->table);
    	echo $result;
    }

    public function view_category(){
    	$where = $this->input->post();
    	$result = $this->basic->exist_or_not($where,'',$this->table);
    	echo json_encode($result);
    }
}

?>

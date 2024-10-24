<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller     
{ 
	function __construct()   
	{
	  	parent::__construct(); 		
	  	/*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
		$this->load->library(array('form_validation', 'email'));*/
		$this->load->model('Others_model','om');
	} 

	public function index()
	{
		$this->db->order_by('id', 'desc');
	    $about_data=$this->db->get('tbl_about')->result();
	    $this->data['about_data']=$about_data;

		$this->load->view('home',$this->data);
	}

	public function product_add()
	{
		$name1=$this->input->post('name');
		$phone_no=$this->input->post('phone_no');

		$images_name="";
		$uploads_dir = "image";
		$tmp_name = $_FILES["image"]["tmp_name"];
		$name =rand().$_FILES["image"]["name"];     
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
		$images_name =$images_name.",".$name;
		// $date=date("Y-m-d");
		$data_array=array(
							"name"=>$name1,
							"phone_no"=>$phone_no,
							"image"=>$images_name
							);
		$this->om->insert('tbl_about',$data_array);
		echo 1;
	} 


}
    
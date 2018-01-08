<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','admin_model'); 
		$this->load->helper('url');
		ob_start();
		
	}
	
	public function index()
	{
		
		
		if($this->session->userdata('loggedin'))
			if($this->session->userdata('admin_id')!='')
				redirect('dashboard');
	
		$this->load->view('login');
	}
	
	public function login()
	{
		if($this->input->post()) {
			
			$res=$this->admin_model->AuthenticateUser($this->input->post());
			
			if($res==0)
			{
				
				
				$this->session->set_flashdata('error44', '<p class="error_msg">Invalid Login id or password..!!</p>');
				redirect(base_url(''));
			}
			else
			{
				
				$this->session->set_userdata($res);
				redirect(base_url('dashboard'));
			}
						
		}
		else
			redirect(base_url());
			
			
	}
			
		
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() );
		exit;
	}
	/*
	public function changepassword()
	{
		$data['errorMsg']=$this->session->userdata("errorMsg");
		$data['error']=$this->session->userdata("error");
		$this->session->set_userdata(array('error'=>0,'errorMsg'=>''));
		if($this->input->post()){
			$this->Admin_model->changepassword();
			redirect(base_url());
		}
		else
			{
				
				$this->session->set_userdata($res);
				redirect(base_url('dashboard'));
			}
	}*/
	public function forgotPassword()
	{
		if($this->input->post())
		{
			echo $this->admin_model->changepassword($this->input->post('femail'));
		}
	}
}
?>
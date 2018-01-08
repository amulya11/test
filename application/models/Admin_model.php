<?php

class Admin_model extends CI_Model {
	
	function __construct(){
		 parent::__construct();
		 $this->userid=$this->session->userdata("id");
			 
	}

	public function AuthenticateUser($data)
	{
		$email=$data['email'];
		$password=$data['password'];
		
		
			$query = $this->db->get_where('test_login', array('email' => $email,"password"=>md5($password),'status'=>1));
			$rows= $query->result();
			#var_dump($rows);die;
			if(count($rows)>0)
			return array("email"=>$email,
						"login_id"=>$rows[0]->login_id,
						"created_date"=>$rows[0]->created_date,
						"logged_in"=>true);		
			else
			return 0;
		
		
	}	
	
	

}
?>
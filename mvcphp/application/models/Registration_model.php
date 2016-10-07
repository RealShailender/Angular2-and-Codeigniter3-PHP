<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model
{   
	public function __construct()
    {
    	$this->load->database();
    }

  
    public function datainsert($data)
    {
    	$this->load->library('encrypt');
        $data_user_field["ycp_name"]=$data["uname"];
        $data_user_field["ycp_email"]=strtolower($data["uemail"]); 
        $data_user_field["ycp_password"]= Password::create_hash($data["upassword"]);
        $this->load->helper('string');
        $rand1 = random_string('alnum',7);
        $rand2 = random_string('alnum',10);
        $result1 = substr($data_user_field["ycp_name"], 0, 1);
        $result2 = substr($data_user_field["ycp_email"], 0, 1);
        $data_user_field["ycp_userkey"] = $result1.$rand1.$result2;
        $data_user_field["ycp_apikey"] = $result2.$rand2.$result1;
        $this->db->insert('ycp_users',$data_user_field);      
    }

    public function loginmodel($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        $this->db->select('*');
		$this->db->from('ycp_users');
		$this->db->where('ycp_email', $username);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1)
		{
			$result = $query->result();
			if (Password::validate_password($password, $result[0]->ycp_password))
			{
				return $result;
			}
			return false;
		}
		return false;
        
    }

     function check_unique_user_name($user_name) 
     {
        $query= $this->db->select('ycp_email')
                ->from('ycp_users')
                ->where('ycp_email',$user_name);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->ycp_email;
        }
     }
}
?>
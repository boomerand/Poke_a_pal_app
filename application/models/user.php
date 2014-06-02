<?php 

class User extends CI_Model {

	// GET USER INFO FOR LOGIN VALIDATION
	public function get_userinfo($email){
		$user_q = "SELECT * FROM users WHERE email = '{$email}'";
		// echo $user_q;
		// die();
		return $this->db->query($user_q)->row_array();
	}

	// ADD REGISTERED USER
	public function add_user($user){
		$add_user_q = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($user['name'], $user['alias'], $user['email'], $user['password']);
		return $this->db->query($add_user_q, $values);
	}

	// GET ALL USERS FOR POKE PAGE
	public function get_all_users() {
		$current_session_id = $this->session->userdata('id');
		$get_all_q = "SELECT * FROM users WHERE id != {$current_session_id}";
		return $this->db->query($get_all_q)->result_array();
	}
}

?>
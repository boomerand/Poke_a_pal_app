<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('login-view');
	}

	public function __construct() {
		parent::__construct();
		// LOAD VALIDATION LIBRARY
		// LOAD MODELS
		$this->load->library('form_validation');
		$this->load->model('user');
		$this->load->model('poke');
	}

	// CREATE LOGIN METHOD
	public function login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user_info = $this->user->get_userinfo($email);
		$this->login_validations();
		if($user_info && $user_info['password'] === $password)
		{
			$user = array(
				'id' => $user_info['id'],
				'alias' => $user_info['alias'],
			);
			$this->session->set_userdata($user);
			redirect('pokes');
		}
		elseif($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('login_error', 'Invalid email or password! Try again.');
			redirect('/');
		}
	}

	// CREATE LOGIN VALIDATION METHOD
	public function login_validations() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	}

	// CREATE REGISTRATION METHOD
	public function register() {
		$this->register_validations();
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			// echo "have we come this far?";
			// die();
			redirect('/');
		}
		else
		{
			$user = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$this->user->add_user($user);
			$this->load->view('login-view', array('registered' => 'Successfully registered. Login to view profile.'));
		}
	}

	// CREATE REGISTRATION VALIDATION METHOD
	public function register_validations() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('alias', 'username', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|matches[confirm_pw]');
		$this->form_validation->set_rules('confirm_pw', 'confirm password', 'trim|required');
	}

	// CREATE LOGOUT METHOD
	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
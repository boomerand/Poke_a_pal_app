<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pokes extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('poke');
		$this->load->model('user');
	}

	public function index(){
		$user_id = $this->session->userdata('id');
		$user_alias = $this->session->userdata('alias');

		if(isset($user_id))
		{
			// GET ALL UNIQUE USER_IDS OF POKERS AND THE NUMBER OF POKES
			$data['pokers_num_pokes'] = $this->poke->get_pokers_num_pokes($user_id);
			$data['all_users'] = $this->user->get_all_users();
			// var_dump($data['all_users']);
			// die();
			if(gettype($data['all_users']) == 'array' && !isset($data['all_users']['id'])){
				foreach($data['all_users'] as $key => $user) {
					// var_dump($user);
					// die();
					$data['all_users'][$key]['poke_history'] = $this->poke->count_pokes($user['id']);
				}				
			}
			else {
				$data['all_users']['poke_history'] = $this->poke->count_pokes($data['all_users']['id']);
			}
			$this->load->view('poke-view', $data);
		}
	}

	public function add_poke($poked_id){
		$poker_id = $this->session->userdata('id');
		$this->poke->add_poke($poker_id, $poked_id);
		redirect('pokes');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
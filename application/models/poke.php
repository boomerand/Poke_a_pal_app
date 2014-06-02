<?php 

class Poke extends CI_Model {

	// ADD POKE 
	public function add_poke($poker_id, $poked_id){
		$previous_poke_q = "SELECT * FROM pokes WHERE poker_id = {$poker_id} AND users_id = {$poked_id}";
		$previous_poke = $this->db->query($previous_poke_q)->row_array();
		// If this person has not been poked by the poker before
		if (empty($existing_poker)) {
			$insert_poke_q = "INSERT INTO pokes (poker_id, num_pokes, created_at, updated_at, users_id) VALUES ({$poker_id},1,NOW(),NOW(),{$poked_id})";
			$insert_poke = $this->db->query($insert_poke_q);
		}
		// Else increment the number of pokes this person has by one. 
		else {
			$update_poke_q = "UPDATE pokes SET num_pokes = num_pokes + 1 WHERE poker_id = {$poker_id} AND users_id = {$poked_id}";
			$this->db->query($update_poke_q);
		}
	}

	// GET POKER'S COUNT OF POKES
	public function get_pokers_num_pokes($poked_id) {
		$pokes_q = "SELECT poker_id, num_pokes FROM pokes WHERE users_id={$poked_id}";
		$pokes = $this->db->query($pokes_q)->result_array();
		$pokers_num_pokes = array();
		// var_dump($pokes);
		foreach ($pokes as $key => $poke) {
			$pokers_q = "SELECT alias FROM users WHERE id = {$poke['poker_id']}";
			$pokers_num_pokes[$key]['poker_name'] = $this->db->query($pokers_q)->row_array();
			$pokers_num_pokes[$key]['num_pokes'] = $poke['num_pokes'];
		}
		return $pokers_num_pokes;			
	}


	// COUNT ALL POKES
	public function count_pokes($poked_id){
		$poke_count = 0;
		$all_pokers_q = "SELECT users_id, poker_id FROM pokes WHERE users_id = {$poked_id}";
		$all_pokers = $this->db->query($all_pokers_q)->result_array();

		foreach ($all_pokers as $poker) {
			$num_pokes_q = "SELECT num_pokes FROM pokes WHERE poker_id = {$poker['poker_id']} AND users_id = {$poked_id}";
			$num_pokes = $this->db->query($num_pokes_q)->row_array();
			$poke_count+= $num_pokes['num_pokes'];
		}
		return $poke_count;
	}
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Skpi_model extends CI_model
	{
		public function getCategory()
		{
			return $this->db->get('skpi_category')->result_array();
		}

		public function getLevel()
		{
			return $this->db->get('skpi_level')->result_array();
		}

		public function getSkpi($id)
		{
			$query = "SELECT `skpi`.*, `skpi_level`.`level` FROM `skpi` JOIN `skpi_level` ON `skpi`.`level_id` = `skpi_level`.`id` WHERE `user_id` = " . $id . "";
			return $this->db->query($query)->result_array();
		}

		public function uploadFile(){
			$upload_file = $_FILES['fileskpi']['name'];

			if($upload_file){
				$config['upload_path'] = './assets/file/skpi/';
				$config['allowed_types'] = 'jpg|pdf';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('fileskpi')){
					$name_file =  $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}
			

			$data = [
				'user_id' => $this->input->post('user_id', true),
				'category_id' => $this->input->post('category_id', true),
				'activity_name' => htmlspecialchars($this->input->post('activity_name', true)),
				'location' => htmlspecialchars($this->input->post('location', true)),
				'date' => $this->input->post('date', true),
				'level' => $this->input->post('level', true),
				'code_number' => htmlspecialchars($this->input->post('code_number', true)),
				'file' => $name_file,
				'point' => 0
			];

			$this->db->insert('skpi', $data);
		}

	}

?>
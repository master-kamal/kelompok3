<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Admin_model extends CI_model
	{
		public function getAmountAdminById()
		{
			$query = $this->db->get_where('user', ['role_id' => 1]);
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
		}

		public function getAmountLecturerById()
		{
			$query = $this->db->get_where('user', ['role_id' => 3]);
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
		}

		public function getAmountMhsById()
		{
			$query = $this->db->get_where('user', ['role_id' => 2]);
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
		}

		public function addUser(){
			$data = [
				'nim' => htmlspecialchars($this->input->post('nim', true)),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id', true),
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
		}

		public function getAdminById($id){
			return $this->db->get_where('user', ['id'=> $id])->row_array();
		}

		public function getAllRole(){
			return $this->db->get('user_role')->result_array();
		}

		public function getMhsById($id){
			return $this->db->get_where('user', ['id'=> $id])->row_array();
		}

		public function getLecturerById($id){
			return $this->db->get_where('user', ['id'=> $id])->row_array();
		}

		public function deleteAdmin($id){
			$this->db->where('id', $id);
			$this->db->delete('user');
		}

		public function changeAdmin(){
			$data = [
				'nim' => $this->input->post('nim', true),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role_id' => $this->input->post('role_id', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);
		}

		public function deleteMhs($id){
			$this->db->where('id', $id);
			$this->db->delete('user');
		}

		public function changeMhs(){
			$data = [
				'nim' => $this->input->post('nim', true),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role_id' => $this->input->post('role_id', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);
		}

		public function deleteLecturer($id){
			$this->db->where('id', $id);
			$this->db->delete('user');
		}

		public function changeLecturer(){
			$data = [
				'nim' => $this->input->post('nim', true),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role_id' => $this->input->post('role_id', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);
		}

		public function deleteRole($id){
			$this->db->where('id', $id);
			$this->db->delete('user_role');
		}

		public function getRoleById($id){
			return $this->db->get_where('user_role', ['id'=> $id])->row_array();
		}

		public function changeRole(){
			$data = [
				"role" => $this->input->post('role', true)
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_role', $data);
		}

	}
?>
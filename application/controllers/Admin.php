<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct(){
			parent::__construct();
			$this->load->model('Admin_model');
			is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

		$data['amountAdmin'] = $this->Admin_model->getAmountAdminById();
		$data['amountLecturer'] = $this->Admin_model->getAmountLecturerById();
		$data['amountMhs'] = $this->Admin_model->getAmountMhsById();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function listaccount()
	{
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['userAdmin'] = $this->db->get_where('user', ['role_id' => 1])->result_array();
		$data['userLecturer'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
		$data['userMhs'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
		$data['userAllRole'] = $this->Admin_model->getAllRole();

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'List Account';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/listaccount', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Admin_model->addUser();
			$this->session->set_flashdata('flashAdmin', 'Added');
			redirect('admin/listaccount');
		}
		
		
	}

	public function deleteAdmin($id){
			$this->Admin_model->deleteAdmin($id);
			$this->session->set_flashdata('flashAdmin', 'Deleted');
			redirect('admin/listaccount');
	}

	public function changeAdmin($id){
			$data['title'] = 'Change Administrator';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['userAdmin'] = $this->Admin_model->getAdminById($id);
			$data['userAllRole'] = $this->Admin_model->getAllRole();
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email has already registered'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/changeadmin', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Admin_model->changeAdmin();
				$this->session->set_flashdata('flashAdmin', 'Changed');
				redirect('admin/listaccount');
			}
	}

	public function deleteMhs($id){
			$this->Admin_model->deleteMhs($id);
			$this->session->set_flashdata('flashMhs', 'Deleted');
			redirect('admin/listaccount');
	}

	public function changeMhs($id){
			$data['title'] = 'Change Student';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['userMhs'] = $this->Admin_model->getMhsById($id);
			$data['userAllRole'] = $this->Admin_model->getAllRole();
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email has already registered'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/changemhs', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Admin_model->changeAdmin();
				$this->session->set_flashdata('flashMhs', 'Changed');
				redirect('admin/listaccount');
			}
	}

	public function deleteLecturer($id){
			$this->Admin_model->deleteLecturer($id);
			$this->session->set_flashdata('flashLecturer', 'Deleted');
			redirect('admin/listaccount');
	}

	public function changeLecturer($id){
			$data['title'] = 'Change Lecturer';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['userLecturer'] = $this->Admin_model->getLecturerById($id);
			$data['userAllRole'] = $this->Admin_model->getAllRole();
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email has already registered'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/changelecturer', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Admin_model->changeLecturer();
				$this->session->set_flashdata('flashLecturer', 'Changed');
				redirect('admin/listaccount');
			}
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('flash', 'Added!');
					redirect('admin/role');
		}
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function deleteRole($id){
			$this->Admin_model->deleteRole($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('admin/role');
	}

	public function changeRole($id){
			$data['title'] = 'Change Role';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['role'] = $this->Admin_model->getRoleById($id);
			
			$this->form_validation->set_rules('role', 'Role', 'required');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/changerole', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Admin_model->changeRole();
				$this->session->set_flashdata('flash', 'Changed');
				redirect('admin/role');
			}
	}
}
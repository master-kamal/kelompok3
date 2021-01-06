<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct(){
			parent::__construct();
			$this->load->model('Menu_model');
			is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');			
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('flash', 'Added!');
					redirect('menu');
		}
	}

	public function delete($id){
			$this->Menu_model->deleteMenu($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('menu');
	}

	public function change($id){
			$data['title'] = 'Change Menu';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['menu'] = $this->Menu_model->getMenuById($id);
			$this->form_validation->set_rules('menu','Menu','required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/change', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Menu_model->changeMenu();
				$this->session->set_flashdata('flash', 'Changed');
				redirect('menu');
			}
	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

		$data['subMenu'] = $this->Menu_model->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('menu_id','Menu','required');
		$this->form_validation->set_rules('url','Url','required');
		$this->form_validation->set_rules('icon','Icon','required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('flash', 'Added!');
			redirect('menu/submenu');
		}
	}

	public function deletesubmenu($id){
			$this->Menu_model->deleteSubmenu($id);
			$this->session->set_flashdata('flash', 'Deleted');
			redirect('menu/submenu');
	}

	public function changesubmenu($id){
			$data['title'] = 'Change Submenu';
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$data['submenu'] = $this->Menu_model->getSubmenuById($id);
			$data['menu'] = $this->db->get('user_menu')->result_array();

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('menu_id','Menu_id','required');
			$this->form_validation->set_rules('url','Url','required');
			$this->form_validation->set_rules('icon','Icon','required');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/changesubmenu', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Menu_model->changeSubmenu();
				$this->session->set_flashdata('flash', 'Changed');
				redirect('menu/submenu');
			}
	}
}
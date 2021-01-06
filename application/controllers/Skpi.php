<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi extends CI_Controller 
{
	public function __construct(){
			parent::__construct();
			$this->load->model('Skpi_model');
			is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Upload SKPI';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['category'] = $this->Skpi_model->getCategory();
		$data['level'] = $this->Skpi_model->getLevel();
			
		$this->form_validation->set_rules('activity_name', 'Name of Activity', 'required|trim');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('code_number', 'Code Number', 'required|trim');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('skpi/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Skpi_model->uploadFile();
			$this->session->set_flashdata('flash', 'Uploaded!');
			redirect('skpi');
		}
	}

	public function skpi()
	{
		$data['title'] = 'SKPI';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$id = $data['user']['id'];
		$data['skpi'] = $this->Skpi_model->getSkpi($id);
		$data['category'] = $this->Skpi_model->getCategory();
		$data['level'] = $this->Skpi_model->getLevel();
			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('skpi/skpi', $data);
		$this->load->view('templates/footer');
		
	}
}
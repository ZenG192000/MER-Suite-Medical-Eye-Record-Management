<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('pasyente_model');
		$this->load->model('mer_model');
		if (!$this->session->userdata('user_info')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['users'] = $this->users_model->userscount();
		$data['oldusers'] = $this->users_model->usersoldcount();
		$data['newusers'] = $this->users_model->usersnewcount();
		$data['pasyentes'] = $this->pasyente_model->pasyentecount();
		$data['oldpasyentes'] = $this->pasyente_model->pasyenteoldcount();
		$data['newpasyentes'] = $this->pasyente_model->pasyentenewcount();
		$data['items'] = $this->mer_model->getApprovalQueue(3);
		$this->load->view('templates/header');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	public function get_user_data($interval)
	{
		$data = $this->users_model->get_user_data($interval);
		echo json_encode($data);
	}

	public function get_user_data_nonadmin($interval)
	{
		$data = $this->pasyente_model->get_user_data_nonadmin($interval);
		echo json_encode($data);
	}

	public function check_first_login()
	{
		$user_info = array(
			'isFirstLogin' => 1
		);

		echo json_encode($user_info);
		exit;
	}
}

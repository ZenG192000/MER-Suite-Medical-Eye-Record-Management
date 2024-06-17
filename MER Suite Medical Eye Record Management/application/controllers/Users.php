<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('ajax_model');
		$this->load->model('upload_model');
		if (!$this->session->userdata('user_info')) {
			redirect('login');
		}
	}

	public function manage()
	{
		$data['users'] = $this->users_model->userscount();
		$data['oldusers'] = $this->users_model->usersoldcount();
		$data['newusers'] = $this->users_model->usersnewcount();
		$this->load->view('templates/header');
		$this->load->view('users/account', $data);
		$this->load->view('templates/footer');
	}

	public function update_theme()
	{
		$username = $this->input->post('username');
		$theme = $this->input->post('theme');
		var_dump($theme);
		// Get the user ID based on the username
		$user_id = $this->users_model->getUserIdByUsername($username);

		// Update the theme in the database
		$this->users_model->update_theme($user_id, $theme);

		// You can return a response if needed
		echo json_encode(array('status' => 'success'));
	}
	public function getTheme()
	{
		// Get the theme information from the model
		$theme = $this->users_model->getThemeByUsername($this->input->post('username'));

		// Return the theme as JSON
		echo json_encode($theme);
	}
	public function myprofile()
	{
		$this->load->view('templates/header');
		$this->load->view('users/profile');
		$this->load->view('templates/footer');
	}

	public function fetchDatafromDatabase()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'UserTBL', array());

		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value) {
			$image = '<img src="' . htmlspecialchars(base_url() . 'image/employees_image/' . $value['Image']) . '" style="width:5em; border-radius: 50%; " />';
			$buttonEd = '<button id="edit' . $value['UserID'] . '" onclick="editFun(' . $value['UserID'] . ')" class="btn btn-info">Edit</button>';
			$buttonRes = '<button id="reset' . $value['UserID'] . '" onclick="confirmReset(' . $value['UserID'] . ')" class="btn btn-warning">Reset User</button>';
			$buttonDel = '<button id="delete' . $value['UserID'] . '" onclick="confirmDelete(' . $value['UserID'] . ')" class="btn btn-danger">Deact</button>';

			// Check if the user is deactivated
			$isDeact = $value['Is_Deleted'] == 1 ? 'Deactivated' : '';

			$result['data'][] = array(
				$i++,
				$image,
				htmlspecialchars($value['Name']),
				htmlspecialchars($value['Username']),
				htmlspecialchars($value['AccessType']),
				htmlspecialchars($value['DateCreated']),
				$buttonEd . " " .
					$buttonRes . " " . $buttonDel . " " .
					$isDeact,
			);
		}
		echo json_encode($result);
	}

	public function getEditData()
	{
		$id = $this->input->post('id');
		// Ensure $id is properly sanitized before using it in a database query.
		$resultData = $this->ajax_model->fetchSingleData('*', 'UserTBL', array('UserID' => $id));
		echo json_encode($resultData);
	}

	public function add_users()
	{

		$data = array(
			'Name'         => $this->input->post('AccessType') . " " . $this->input->post('Name'),
			'Username'         => $this->input->post('Username'),
			'AccessType'     => $this->input->post('AccessType'),
			'Password'         => md5('SecretKey_0101'),
			'Image'         => 'default.jpg',
			'DateCreated'  => date('Y-m-d h:i:s'),
			'Theme'  => "Light",
			'Is_Deleted' => 0
		);

		$results = $this->users_model->add($data);
		if ($results) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
	public function check_current_password()
	{
		$user_id = $this->input->post('useruid'); // Assuming you're sending user_id in the POST request
		$current_password = $this->input->post('current_password');

		$is_valid = $this->users_model->check_current_password($user_id, $current_password);

		if ($is_valid) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
	public function change_password()
	{
		if ($this->session->userdata('user_info')) {
			$user_info = $this->session->userdata('user_info');
		}

		$id = $user_info->UserID;

		$data = array(
			'password'  => md5($this->input->post('new_password')),
			'isFirstLogin'         => 0,
			'DateCpass'         => date('Y-m-d h:i:s')
		);

		$results = $this->users_model->edit($id, $data);

		$response = array();

		if ($results) {
			$response['success'] = true;
			$response['message'] = 'Password Successfully Changed! Relogin again.';
		} else {
			$response['success'] = false;
			$response['message'] = 'Error Changing Password';
		}

		echo json_encode($response);
		exit;
	}

	public function update()
	{

		$data = array(
			'Name'         => $this->input->post('AccessType') . " " . $this->input->post('Name'),
			'Username'         => $this->input->post('Username'),
			'AccessType'     => $this->input->post('AccessType'),
			'DateEdited'  => date('Y-m-d h:i:s'),
			'Is_Deleted' => 0
		);

		$update = $this->ajax_model->updateData('UserTBL', $data, array('UserID' => $this->input->post('UserID')));
		if ($update == true) {
			echo 1;
		} else {
			echo 2;
		}
	}

	public function reset()
	{
		$data = array(
			'Password'         => md5('SecretKey_0101'),
			'Is_Deleted' => 0
		);

		$update = $this->ajax_model->updateData('UserTBL', $data, array('UserID' => $this->input->post('UserID')));
		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Reset Password user has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Reset Password user has failed');
		}

		echo json_encode($response);
	}

	public function delete()
	{

		$data = array(
			'Is_Deleted' => 1
		);

		$update = $this->ajax_model->updateData('UserTBL', $data, array('UserID' => $this->input->post('UserID')));
		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Delete user has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Delete user has failed');
		}
		echo json_encode($response);
	}

	public function profile()
	{
		$uploaded = $this->upload_model->upload_image();

		if ($this->session->userdata('user_info')) {
			$user = $this->session->userdata('user_info');
			$usr = $user->UserID;
			$access = $user->AccessType;
			$defaultimage = $user->Image;
		}


		if (is_array($uploaded)) {
			$filename = $uploaded['file_name'];

			$data = array(
				'Name'         => $this->input->post('Fullname'),
				'Username'     => $this->input->post('Username'),
				'Email'        => $this->input->post('Email'),
				'Image'        => $filename,
				'DateEdited'   => date('Y-m-d h:i:s')
			);
		} else {
			$data = array(
				'Name'         => $this->input->post('Fullname'),
				'Username'     => $this->input->post('Username'),
				'Email'        => $this->input->post('Email'),
				'Image'        => $defaultimage,
				'DateEdited'   => date('Y-m-d h:i:s')
			);
		}

		$results = $this->users_model->editProfile($usr, $data);

		if ($results) {
			$response = array('status' => 1, 'message' => 'Your changes have been saved');
		} else {
			$response = array('status' => 2, 'message' => 'An error occurred while saving your changes or having a duplicated username');
		}
		echo json_encode($response);
	}
}

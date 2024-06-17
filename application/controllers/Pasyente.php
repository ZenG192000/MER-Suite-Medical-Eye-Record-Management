<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pasyente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasyente_model');
		$this->load->model('ajaxpasyente_model');
		$this->load->model('users_model');
		$this->load->helper('directory');
		$this->load->helper('download');
		if (!$this->session->userdata('user_info')) {
			redirect('login');
		}
	}

	public function manage()
	{
		$this->load->view('templates/header');
		$this->load->view('pir/repository');
		$this->load->view('templates/footer');
	}

	public function GenerateRecord()
	{
		$data['files'] = directory_map('./downloads/pir');
		$this->load->view('templates/header');
		$this->load->view('pir/GRecord', $data);
		$this->load->view('templates/footer');
	}

	public function generate_pir_id()
	{
		$PirID = $this->Pasyente_model->generate_pir_id();
		echo json_encode(['PirID' => $PirID]);
	}

	public function fetchDatafromDatabase()
	{
		if ($this->session->userdata('user_info')) {
			$user_info = $this->session->userdata('user_info');
			$useraccess = $user_info->AccessType;
		}
		$resultList = $this->ajaxpasyente_model->fetchAllData('*', 'PirTBL', array());

		$result = array();
		if ($useraccess === 'Optometrist') {
			foreach ($resultList as $key => $value) {
				$buttonEd = '<button id="edit' . $value['PirID'] . '" onclick="editPirFun(' . $value['PirID'] . ')" class="btn btn-info" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-sharp fa-solid fa-pencil fa-beat-fade"></i></button>';
				$buttonDel = '<button id="delete' . $value['PirID'] . '" onclick="confirmDeletePir(' . $value['PirID'] . ')" class="btn btn-danger" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-duotone fa-trash fa-beat-fade"></i></button>';
				$result['data'][] = array(
					htmlspecialchars($value['PirNo']),
					htmlspecialchars($value['LastName']) . ", " . ($value['FirstName']) . " " . ($value['MiddleName']),
					htmlspecialchars($value['DateOfBirth']),
					htmlspecialchars($value['Age']),
					htmlspecialchars($value['Sex']),
					htmlspecialchars($value['Contact']),
					htmlspecialchars($value['Address']),
					$buttonEd . $buttonDel,
				);
			}
		} else {
			foreach ($resultList as $key => $value) {
				$buttonview = '<button id="edit' . $value['PirID'] . '" onclick="ViewPirModal(' . $value['PirID'] . ')" class="btn btn-warning" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-solid fa-eye fa-fade fa-xs"></i></button>';
				$result['data'][] = array(
					htmlspecialchars($value['PirNo']),
					htmlspecialchars($value['LastName']) . ", " . ($value['FirstName']) . " " . ($value['MiddleName']),
					htmlspecialchars($value['DateOfBirth']),
					htmlspecialchars($value['Age']),
					htmlspecialchars($value['Sex']),
					htmlspecialchars($value['Contact']),
					htmlspecialchars($value['Address']),
					$buttonview,
				);
			}
		}
		echo json_encode($result);
	}
	public function manageBackup()
	{
		$this->load->view('templates/header');
		$this->load->view('pir/pirback');
		$this->load->view('templates/footer');
	}

	public function manageArchived()
	{
		$this->load->view('templates/header');
		$this->load->view('pir/pirArch');
		$this->load->view('templates/footer');
	}

	public function fetchDatafromDatabaseBackup()
	{
		$resultList = $this->ajaxpasyente_model->fetchAllDataArchived('*', 'PirTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			// Calculate days and hours left
			$expiration_date = date_create($value['ArchiveDate']);
			date_add($expiration_date, date_interval_create_from_date_string($value['ExpirationNumber'] . ' days'));
			$current_date = date_create();
			$diff = date_diff($current_date, $expiration_date);
			$days_left = max(0, $diff->format('%r%a'));
			$hours_left = max(0, $diff->format('%h'));

			$checkbox = '<input type="checkbox" class="delete-checkbox" data-id="' . $value['PirID'] . '">';
			$result['data'][] = array(
				$checkbox,
				htmlspecialchars($value['PirNo']),
				htmlspecialchars($value['LastName']) . ", " . ($value['FirstName']) . " " . ($value['MiddleName']),
				htmlspecialchars($value['DateOfBirth']),
				htmlspecialchars($value['Age']),
				htmlspecialchars($value['Sex']),
				htmlspecialchars($value['Contact']),
				htmlspecialchars($value['Address']),
				$days_left . ' days ' . ': ' . $hours_left . ' hours', // Include the "Days and Hours Left" column
			);
		}
		echo json_encode($result);
	}

	public function fetchDatafromDatabaseDeleted()
	{
		$resultList = $this->ajaxpasyente_model->fetchAllDataDeleted('*', 'PirTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			$checkbox = '<input type="checkbox" class="delete-checkbox" data-id="' . $value['PirID'] . '">';
			$result['data'][] = array(
				$checkbox,
				htmlspecialchars($value['PirNo']),
				htmlspecialchars($value['LastName']) . ", " . ($value['FirstName']) . " " . ($value['MiddleName']),
				htmlspecialchars($value['DateOfBirth']),
				htmlspecialchars($value['Age']),
				htmlspecialchars($value['Sex']),
				htmlspecialchars($value['Contact']),
				htmlspecialchars($value['Address']),
			);
		}
		echo json_encode($result);
	}

	public function restoreMultiple()
	{
		$ids = $this->input->post('ids');
		if (!empty($ids)) {
			$updatedRows = $this->Pasyente_model->restoreMultipleRecords($ids);
			$response = array('status' => 1, 'message' => "selected row successfully restored.");
		} else {
			$response = array('status' => 2, 'message' => 'No data selected to restore.');
		}
		echo json_encode($response);
	}


	public function getEditData()
	{
		$id = $this->input->post('id');
		// Ensure $id is properly sanitized before using it in a database query.
		$resultData = $this->ajaxpasyente_model->fetchSingleData('*', 'PirTBL', array('PirID' => $id));

		$dateOfBirth = strtotime($resultData['DateOfBirth']);
		$month = date('m', $dateOfBirth);
		$day = date('d', $dateOfBirth);
		$year = date('Y', $dateOfBirth);

		// Add the extracted values to the resultData array
		$resultData['dobMonthed'] = $month;
		$resultData['dobDayed'] = $day;
		$resultData['dobYeared'] = $year;

		echo json_encode($resultData);
	}

	public function addpasyente()
	{

		$data = array(

			'PirNo'         => $this->input->post('PirIDS'),
			'Date'         => date('Y/m/d'),
			'LastName'         => $this->input->post('LastName'),
			'FirstName'         => $this->input->post('FirstName'),
			'MiddleName'     => $this->input->post('MiddleName'),
			'Age'         => $this->input->post('Age'),
			'Sex'         => $this->input->post('Sex'),
			'DateOfBirth'         => $this->input->post('DateOfBirth'),
			'Address'         => $this->input->post('Address'),
			'Contact'         => $this->input->post('Contact'),
			'RecordedBy'         => $this->input->post('RecordedBy'),
			'Status'         => "Pending",
			'DateCreated'  => date('Y-m-d h:i:s'),
			'Is_Deleted' => 0
		);

		$results = $this->Pasyente_model->addpasyente($data);
		if ($results) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}

	public function updatepasyente()
	{

		$data = array(

			'LastName'         => $this->input->post('edLastName'),
			'FirstName'         => $this->input->post('edFirstName'),
			'MiddleName'     => $this->input->post('edMiddleName'),
			'Age'         => $this->input->post('edAge'),
			'Sex'         => $this->input->post('edSex'),
			'DateOfBirth'         => $this->input->post('eddob'),
			'Address'         => $this->input->post('edAddress'),
			'Contact'         => $this->input->post('edContact'),
			'RecordedBy'         => $this->input->post('edRecordedBy'),
			'DateEdited'  => date('Y-m-d h:i:s'),
		);

		$update = $this->ajaxpasyente_model->updateData('PirTBL', $data, array('PirID' => $this->input->post('edid')));
		if ($update == true) {
			echo 1;
			$this->session->set_flashdata('msgSuccess', 'Update Data has been successfully');
		} else {
			echo 2;
			$this->session->set_flashdata('msgFailed', 'Update Data has failed to create or username duplicated');
		}
	}

	public function archived_pasyente()
	{

		$data = array(

			'Is_Deleted' => 1,
			'ArchiveDate' => date('Y-m-d H:i:s')
		);

		$update = $this->ajaxpasyente_model->updateData('PirTBL', $data, array('PirID' => $this->input->post('PirID')));
		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Delete patient data has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Delete patient data has failed');
		}
		echo json_encode($response);
	}

	public function check_archived()
	{
		$this->Pasyente_model->archive_records(); // Call the archive_records() method from the model
	}

	public function fetchDatafromDatabaseGenerator()
	{
		$startDate = $this->input->post('start_date');
		$endDate = $this->input->post('end_date');

		$resultList = $this->ajaxpasyente_model->fetchDataByDateRange(
			'*',
			'PirTBL',
			'DateCreated',
			$startDate,
			$endDate
		);

		$response = array();

		if (!empty($resultList)) {
			$data = array();

			foreach ($resultList as $key => $value) {
				$data[] = array(
					htmlspecialchars($value['PirNo']),
					htmlspecialchars($value['LastName']) . ", " . ($value['FirstName']) . " " . ($value['MiddleName']),
					htmlspecialchars($value['DateOfBirth']),
					htmlspecialchars($value['Age']),
					htmlspecialchars($value['Sex']),
					htmlspecialchars($value['Contact']),
					htmlspecialchars($value['Address']),
				);
			}

			$response['data'] = $data;
		} else {
			$response['data'] = array();
		}

		$response['start_date'] = $startDate;
		$response['end_date'] = $endDate;

		echo json_encode($response);
	}
	public function exportToExcel()
	{
		$spreadsheet = new Spreadsheet();

		$spreadsheet->getProperties()->setCreator('Your Name')
			->setLastModifiedBy('Your Name')
			->setTitle('Title')
			->setSubject('Subject')
			->setDescription('Description');

		$data = $this->input->post('data');

		$spreadsheet->getActiveSheet()->fromArray($data, NULL, 'B5');

		$headers = array(
			'PirID', 'PatientName', 'DateOfBirth', 'Age', 'Sex', 'Contact', 'Address'
		);

		$column = 'B';

		foreach ($headers as $header) {
			$spreadsheet->getActiveSheet()->setCellValue($column . '4', $header);
			// Auto-size the column
			$spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
			$column++;
		}

		$timestamp = time();
		$formattedDate = date('F_j_Y', $timestamp);

		$spreadsheet->getActiveSheet()->setCellValue('B1', 'Generated by: MER Suite | Pir-Records');
		$spreadsheet->getActiveSheet()->setCellValue('B2', 'Generated on: ' . $formattedDate);
		$spreadsheet->getActiveSheet()->setCellValue('H1', 'Date From: ' . $this->input->post('start_date'));
		$spreadsheet->getActiveSheet()->setCellValue('H2', 'Date To: ' . $this->input->post('end_date'));
		// Set landscape orientation
		$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set narrow margins
		$spreadsheet->getActiveSheet()->getPageMargins()->setTop(0.5);
		$spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.5);
		$spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.5);
		$spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0.5);

		// Fit sheet on one page
		$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(0);

		// Add borders
		// Add borders to all cells with content
		$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
		$highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn();
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

		for ($row = 1; $row <= $highestRow; $row++) {
			for ($col = 1; $col <= $highestColumnIndex; $col++) {
				$cell = $spreadsheet->getActiveSheet()->getCellByColumnAndRow($col, $row);
				if (!is_null($cell) && !empty($cell->getValue())) {
					$spreadsheet->getActiveSheet()->getStyle($cell->getCoordinate())->applyFromArray([
						'borders' => [
							'allBorders' => [
								'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							],
						],
					]);
				}
			}
		}
		$writer = new Xlsx($spreadsheet);
		$directory = './downloads/pir/';

		// Ensure that the directory exists; create it if not
		if (!file_exists($directory)) {
			mkdir($directory, 0777, true);
		}

		$filename = 'Pir-Record_' . $formattedDate . '.xlsx';
		$filepath = $directory . $filename;

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');

		if ($data == null) {
			$response = array('status' => 2, 'message' => 'Generate Record Failed!');
		} else {
			// Save the file to the specified directory
			$writer->save($filepath);
			$response = array('status' => 1, 'message' => 'Generate Record Successfully!');
		}
		echo json_encode($response);
	}

	public function downloads($file)
	{
		// Check if the file exists
		if (file_exists('./downloads/pir/' . $file)) {
			// Set the appropriate MIME type
			$data = file_get_contents('./downloads/pir/' . $file);
			$name = $file;

			// Force the download
			force_download($name, $data);
		} else {
			// Handle file not found
			show_404();
		}
	}
}

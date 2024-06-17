<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
		$this->load->helper('download');
		$this->load->model('mer_model');
		$this->load->model('ajaxmer_model');;
		if (!$this->session->userdata('user_info')) {
			redirect('login');
		}
	}

	public function manage()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/mer');
		$this->load->view('templates/footer');
	}

	public function manageSec()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/mersec');
		$this->load->view('templates/footer');
	}

	public function manageBackup()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/merback');
		$this->load->view('templates/footer');
	}

	public function manageArchived()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/merArch');
		$this->load->view('templates/footer');
	}

	public function AppReq()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/approval');
		$this->load->view('templates/footer');
	}
	public function StatusReq()
	{
		$this->load->view('templates/header');
		$this->load->view('mer/status');
		$this->load->view('templates/footer');
	}

	public function GenerateRecord()
	{
		$data['files'] = directory_map('./downloads/mer');
		$this->load->view('templates/header');
		$this->load->view('mer/GRecord', $data);
		$this->load->view('templates/footer');
	}

	public function downloads($file)
	{
		// Check if the file exists
		if (file_exists('./downloads/mer/' . $file)) {
			// Set the appropriate MIME type
			$data = file_get_contents('./downloads/mer/' . $file);
			$name = $file;

			// Force the download
			force_download($name, $data);
		} else {
			// Handle file not found
			show_404();
		}
	}

	public function restoreMultiple()
	{
		$ids = $this->input->post('ids');
		if (!empty($ids)) {
			$updatedRows = $this->mer_model->restoreMultipleRecords($ids);
			$response = array('status' => 1, 'message' => "selected row successfully restored.");
		} else {
			$response = array('status' => 2, 'message' => 'No data selected to restore.');
		}
		echo json_encode($response);
	}
	public function search_pir()
	{
		$PirID = $this->input->post('PirID');
		$PIR = $this->mer_model->getUserById($PirID);

		if ($PIR) {
			echo json_encode($PIR);
		} else {
			echo json_encode(['error' => 'User not found']);
		}
	}

	public function search_pir1()
	{
		$edPirID = $this->input->post('edPirID');
		$edPIR = $this->mer_model->getUserById($edPirID);

		if ($edPIR) {
			echo json_encode($edPIR);
		} else {
			echo json_encode(['error' => 'User not found']);
		}
	}


	public function fetchDatafromDatabase()
	{
		$resultList = $this->ajaxmer_model->fetchAllData('*', 'MerTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			$buttonEd = '<button id="edit' . $value['MerID'] . '" onclick="edmerModal(' . $value['MerID'] . ')" class="btn btn-info" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-sharp fa-solid fa-pencil fa-beat-fade"></i></button>';
			$buttonDel = '<button id="delete' . $value['MerID'] . '" onclick="confirmDeleteMer(' . $value['MerID'] . ')" class="btn btn-danger" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-duotone fa-trash fa-beat-fade"></i></button>';
			$result['data'][] = array(
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['RecordedBy']),
				$buttonEd . $buttonDel
			);
		}
		echo json_encode($result);
	}

	public function fetchDatafromDatabaseSec()
	{
		$resultList = $this->ajaxmer_model->fetchAllDataApprove('*', 'MerTBL', array());
		$result = array();

		foreach ($resultList as $key => $value) {
			$buttonview = '<button id="editMer2' . $value['MerID'] . '" onclick="ViewMerModal(' . $value['MerID'] . ')" class="btn btn-warning" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-solid fa-eye fa-fade fa-xs"></i></button>';
			$result['data'][] = array(
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['RecordedBy']),
				$buttonview
			);
		}
		echo json_encode($result);
	}

	public function fetchDatafromDatabaseAppReq()
	{
		$resultList = $this->ajaxmer_model->fetchAllDataPending('*', 'MerTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			$buttonAccept = '<button id="edit' . $value['MerID'] . '" onclick="confirmApproveMer(' . $value['MerID'] . ')" class="btn btn-success" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-solid fa-check fa-fade"></i></button>';
			$buttonReject = '<button id="delete' . $value['MerID'] . '" onclick="confirmRejectMer(' . $value['MerID'] . ')" class="btn btn-danger" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-solid fa-x fa-fade"></i></button>';
			$result['data'][] = array(
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['RecordedBy']),
				$buttonAccept . $buttonReject,
			);
		}
		echo json_encode($result);
	}



	public function fetchDatafromDatabaseStatusReq()
	{
		$resultList = $this->ajaxmer_model->fetchAllDataForSec('*', 'MerTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			$buttonAccept = '<button id="edit' . $value['MerID'] . '" onclick="statusModal(' . $value['MerID'] . ')" class="btn btn-warning" style="margin-left: 2px; margin-top: 2px; width: 40px;"><i class="fa-solid fa-eye fa-fade fa-xs"></i></button>';
			$result['data'][] = array(
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['Comments']),
				htmlspecialchars($value['RecordedBy']),
				$buttonAccept
			);
		}
		echo json_encode($result);
	}

	public function fetchDatafromDatabaseBackup()
	{
		$resultList = $this->ajaxmer_model->fetchAllDataArchived('*', 'MerTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			// Calculate days and hours left
			$expiration_date = date_create($value['ArchiveDate']);
			date_add($expiration_date, date_interval_create_from_date_string($value['ExpirationNumber'] . ' days'));
			$current_date = date_create();
			$diff = date_diff($current_date, $expiration_date);
			$days_left = max(0, $diff->format('%r%a'));
			$hours_left = max(0, $diff->format('%h'));

			$checkbox = '<input type="checkbox" class="delete-checkbox" data-id="' . $value['MerID'] . '">';
			$result['data'][] = array(
				$checkbox,
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['RecordedBy']),
				$days_left . ' days ' . ': ' . $hours_left . ' hours', // Include the "Days and Hours Left" column
			);
		}
		echo json_encode($result);
	}

	public function fetchDatafromDatabaseDeleted()
	{
		$resultList = $this->ajaxmer_model->fetchAllDataDeleted('*', 'MerTBL', array());

		$result = array();

		foreach ($resultList as $key => $value) {
			$checkbox = '<input type="checkbox" class="delete-checkbox" data-id="' . $value['MerID'] . '">';
			$result['data'][] = array(
				$checkbox,
				htmlspecialchars($value['MerID']),
				htmlspecialchars($value['PirID']),
				htmlspecialchars($value['PatientName']),
				htmlspecialchars($value['Date']),
				htmlspecialchars($value['SPH_OD']),
				htmlspecialchars($value['CYL_OD']),
				htmlspecialchars($value['AXIS_OD']),
				htmlspecialchars($value['ADD_OD']),
				htmlspecialchars($value['SPH_OS']),
				htmlspecialchars($value['CYL_OS']),
				htmlspecialchars($value['AXIS_OS']),
				htmlspecialchars($value['ADD_OS']),
				htmlspecialchars($value['PD']),
				htmlspecialchars($value['Lens']),
				htmlspecialchars($value['RecordedBy']),
			);
		}
		echo json_encode($result);
	}

	public function getEditData()
	{
		$id = $this->input->post('id');
		// Ensure $id is properly sanitized before using it in a database query.
		$resultData = $this->ajaxmer_model->fetchSingleData('*', 'MerTBL', array('MerID' => $id));
		echo json_encode($resultData);
	}

	public function addmer()
	{
		if ($this->session->userdata('user_info')) {
			$user_info = $this->session->userdata('user_info');
			$useraccess = $user_info->AccessType;
		}

		if ($useraccess === 'Optometrist') {
			$data = array(
				'PirID'         => $this->input->post('PirID'),
				'PatientName'         => $this->input->post('PatientName'),
				'Date'         => date('Y/m/d'),
				'SPH_OD'         => $this->input->post('SPHOD'),
				'CYL_OD'         => $this->input->post('CYLOD'),
				'AXIS_OD'         => $this->input->post('AXISOD'),
				'ADD_OD'         => $this->input->post('ADDOD'),
				'SPH_OS'         => $this->input->post('SPHOS'),
				'CYL_OS'         => $this->input->post('CYLOS'),
				'AXIS_OS'         => $this->input->post('AXISOS'),
				'ADD_OS'         => $this->input->post('ADDOS'),
				'PD'         => $this->input->post('PD'),
				'Lens'         => $this->input->post('Lens'),
				'Status'         => "Approved",
				'RecordedBy'         => $this->input->post('RecordedBy'),
				'Is_Deleted' => 0,
				'DateCreated' => date('Y-m-d h:i:s')
			);
		} else {
			$data = array(
				'PirID'         => $this->input->post('PirID'),
				'PatientName'         => $this->input->post('PatientName'),
				'Date'         => date('Y/m/d'),
				'SPH_OD'         => $this->input->post('SPHOD'),
				'CYL_OD'         => $this->input->post('CYLOD'),
				'AXIS_OD'         => $this->input->post('AXISOD'),
				'ADD_OD'         => $this->input->post('ADDOD'),
				'SPH_OS'         => $this->input->post('SPHOS'),
				'CYL_OS'         => $this->input->post('CYLOS'),
				'AXIS_OS'         => $this->input->post('AXISOS'),
				'ADD_OS'         => $this->input->post('ADDOS'),
				'PD'         => $this->input->post('PD'),
				'Lens'         => $this->input->post('Lens'),
				'Status'         => "Pending",
				'RecordedBy'         => $this->input->post('RecordedBy'),
				'Is_Deleted' => 0,
				'DateCreated' => date('Y-m-d h:i:s')
			);
		}

		$results = $this->mer_model->addmer($data);
		if ($results) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}

	public function updatemer()
	{
	    	if ($this->session->userdata('user_info')) {
			$user_info = $this->session->userdata('user_info');
			$useraccess = $user_info->AccessType;
		}
	if ($useraccess === 'Optometrist') {
		$data = array(

			'PirID'         => $this->input->post('edPirID'),
			'PatientName'         => $this->input->post('edPatientName'),
			'DateEdited'         => date('Y/m/d'),
			'SPH_OD'         => $this->input->post('edSPHOD'),
			'CYL_OD'         => $this->input->post('edCYLOD'),
			'AXIS_OD'         => $this->input->post('edAXISOD'),
			'ADD_OD'         => $this->input->post('edADDOD'),
			'SPH_OS'         => $this->input->post('edSPHOS'),
			'CYL_OS'         => $this->input->post('edCYLOS'),
			'AXIS_OS'         => $this->input->post('edAXISOS'),
			'ADD_OS'         => $this->input->post('edADDOS'),
			'PD'         => $this->input->post('edPD'),
			'Status'         => "Approved",
			'Comments'         => "",
			'Lens'         => $this->input->post('edLens'),
			'RecordedBy'         => $this->input->post('edRecordedBy'),
			'DateEdited' => date('Y-m-d h:i:s')
		);
	} else {
	    	$data = array(

			'PirID'         => $this->input->post('edPirID'),
			'PatientName'         => $this->input->post('edPatientName'),
			'DateEdited'         => date('Y/m/d'),
			'SPH_OD'         => $this->input->post('edSPHOD'),
			'CYL_OD'         => $this->input->post('edCYLOD'),
			'AXIS_OD'         => $this->input->post('edAXISOD'),
			'ADD_OD'         => $this->input->post('edADDOD'),
			'SPH_OS'         => $this->input->post('edSPHOS'),
			'CYL_OS'         => $this->input->post('edCYLOS'),
			'AXIS_OS'         => $this->input->post('edAXISOS'),
			'ADD_OS'         => $this->input->post('edADDOS'),
			'PD'         => $this->input->post('edPD'),
			'Status'         => "Pending",
			'Comments'         => "",
			'Lens'         => $this->input->post('edLens'),
			'RecordedBy'         => $this->input->post('edRecordedBy'),
			'DateEdited' => date('Y-m-d h:i:s')
		);
	}
		$update = $this->ajaxmer_model->updateData('MerTBL', $data, array('MerID' => $this->input->post('edMerID')));
		if ($update == true) {
			echo 1;
			$this->session->set_flashdata('msgSuccess', 'Update Data has been successfully');
		} else {
			echo 2;
			$this->session->set_flashdata('msgFailed', 'Update Data has failed to create or username duplicated');
		}
	}

	public function archived_mer()
	{

		$data = array(
			'Is_Deleted' => 1,
			'ArchiveDate' => date('Y-m-d H:i:s')
		);

		$update = $this->ajaxmer_model->updateData('MerTBL', $data, array('MerID' => $this->input->post('MerID')));
		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Delete Mer record has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Delete Mer record has failed');
		}
		echo json_encode($response);
	}

	public function ApproveReq()
	{

		$data = array(
			'Status' => "Approved"
		);

		$update = $this->ajaxmer_model->updateData('MerTBL', $data, array('MerID' => $this->input->post('MerID')));
		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Approve Mer recorded data has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Reject Mer recorded data has failed');
		}
		echo json_encode($response);
	}

	public function RejectReq()
	{
		$data = array(
			'Status' => 'Rejected',
			'Comments' => $this->input->post('Comment')
		);

		$update = $this->ajaxmer_model->updateData('MerTBL', $data, array('MerID' => $this->input->post('MerID')));

		if ($update == true) {
			$response = array('status' => 1, 'message' => 'Reject Mer recorded data has been successfully');
		} else {
			$response = array('status' => 2, 'message' => 'Reject Mer recorded data has failed');
		}

		echo json_encode($response);
	}
	public function check_archived()
	{
		$this->mer_model->archive_records(); // Call the archive_records() method from the model
	}

	public function fetchDatafromDatabaseGenerator()
	{
		$startDate = $this->input->post('start_date');
		$endDate = $this->input->post('end_date');

		$resultList = $this->ajaxmer_model->fetchDataByDateRange(
			'*',
			'MerTBL',
			'DateCreated',
			$startDate,
			$endDate
		);

		$response = array();

		if (!empty($resultList)) {
			$data = array();

			foreach ($resultList as $key => $value) {
				$data[] = array(
					htmlspecialchars($value['MerID']),
					htmlspecialchars($value['PirID']),
					htmlspecialchars($value['PatientName']),
					htmlspecialchars($value['Date']),
					htmlspecialchars($value['SPH_OD']),
					htmlspecialchars($value['CYL_OD']),
					htmlspecialchars($value['AXIS_OD']),
					htmlspecialchars($value['ADD_OD']),
					htmlspecialchars($value['SPH_OS']),
					htmlspecialchars($value['CYL_OS']),
					htmlspecialchars($value['AXIS_OS']),
					htmlspecialchars($value['ADD_OS']),
					htmlspecialchars($value['PD']),
					htmlspecialchars($value['Lens']),
					htmlspecialchars($value['RecordedBy']),
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

		$spreadsheet->getProperties()->setCreator('Mersuite')
			->setLastModifiedBy('Mersuite')
			->setTitle('Mersuite')
			->setSubject('Mersuite')
			->setDescription('Mersuite');

		$data = $this->input->post('data');

		$spreadsheet->getActiveSheet()->fromArray($data, NULL, 'A5');

		$headers = array(
			'MerID', 'PirID', 'PatientName', 'Date', 'SPH_OD', 'CYL_OD', 'AXIS_OD', 'ADD_OD',
			'SPH_OS', 'CYL_OS', 'AXIS_OS', 'ADD_OS', 'PD', 'Lens', 'RecordedBy'
		);

		$column = 'A';

		foreach ($headers as $header) {
			$spreadsheet->getActiveSheet()->setCellValue($column . '4', $header);
			// Auto-size the column
			$spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
			$column++;
		}

		$timestamp = time();
		$formattedDate = date('F_j_Y', $timestamp);

		$spreadsheet->getActiveSheet()->setCellValue('B1', 'Generated by: MER Suite | Mer-Records');
		$spreadsheet->getActiveSheet()->setCellValue('B2', 'Generated on: ' . $formattedDate);
		$spreadsheet->getActiveSheet()->setCellValue('O1', 'Date From: ' . $this->input->post('start_date'));
		$spreadsheet->getActiveSheet()->setCellValue('O2', 'Date To: ' . $this->input->post('end_date'));
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
		// Specify the directory where you want to save the file
		$directory = './downloads/mer/';

		// Ensure that the directory exists; create it if not
		if (!file_exists($directory)) {
			mkdir($directory, 0777, true);
		}

		$filename = 'Mer-Record_' . $formattedDate . '.xlsx';
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
}

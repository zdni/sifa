<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prescription extends Doctor_Controller
{
	private $services = null;
	private $name = null;
	private $parent_page = 'doctor';
	private $current_page = 'doctor/prescription/';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('services/Prescription_services');
		$this->services = new Prescription_services;
		$this->load->model(array(
			'group_model',
			'prescription_model',
			'item_model',
		));
	}
	public function index()
	{
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1) : 0;
		// echo $page; return;
		//pagination parameter
		$pagination['base_url'] = base_url($this->current_page) . '/index';
		$pagination['total_records'] = $this->prescription_model->record_count();
		$pagination['limit_per_page'] = 10;
		$pagination['start_record'] = $page * $pagination['limit_per_page'];
		$pagination['uri_segment'] = 4;
		//set pagination
		if ($pagination['total_records'] > 0) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config($this->current_page);
		$table["rows"] = $this->prescription_model->prescriptions($pagination['start_record'], $pagination['limit_per_page'])->result();
		$table = $this->load->view('templates/tables/plain_table', $table, true);
		$this->data["contents"] = $table;
		$add_menu = $this->services->get_form_data($this->current_page);

		$add_menu = $this->load->view('templates/actions/modal_form', $add_menu, true);

		$this->data["header_button"] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Group";
		$this->data["header"] = "Group";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render("templates/contents/plain_content");
	}


	public function add()
	{
		if (!($_POST)) redirect(site_url($this->current_page));

		// echo var_dump( $data );return;
		$this->form_validation->set_rules($this->services->validation_config());
		if ($this->form_validation->run() === TRUE) {
			$data['code'] = $this->input->post('code');
			$data['user_id'] = $this->input->post('user_id');
			$data['patient_id'] = $this->input->post('patient_id');
			$data['date'] = $this->input->post('date');
			$data['timestamp'] = $this->input->post('timestamp');
			$data['status'] = 0;

			if ($this->prescription_model->create($data)) {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->prescription_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->prescription_model->errors()));
			}
		} else {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->prescription_model->errors() : $this->session->flashdata('message')));
			if (validation_errors() || $this->prescription_model->errors()) $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->data['message']));
		}

		redirect(site_url($this->current_page));
	}

	public function edit()
	{
		if (!($_POST)) redirect(site_url($this->current_page));

		// echo var_dump( $data );return;
		$this->form_validation->set_rules($this->services->validation_config());
		if ($this->form_validation->run() === TRUE) {
			$data['code'] = $this->input->post('code');
			$data['user_id'] = $this->input->post('user_id');
			$data['date'] = $this->input->post('date');
			$data['timestamp'] = $this->input->post('timestamp');

			$data_param['id'] = $this->input->post('id');

			if ($this->prescription_model->update($data, $data_param)) {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->prescription_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->prescription_model->errors()));
			}
		} else {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->prescription_model->errors() : $this->session->flashdata('message')));
			if (validation_errors() || $this->prescription_model->errors()) $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->data['message']));
		}

		redirect(site_url($this->current_page));
	}

	public function delete()
	{
		if (!($_POST)) redirect(site_url($this->current_page));

		$data_param['id'] 	= $this->input->post('id');
		if ($this->prescription_model->delete($data_param)) {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->prescription_model->messages()));
		} else {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->prescription_model->errors()));
		}
		redirect(site_url($this->current_page));
	}

	public function prescription($prescription_id)
	{
		$prescription = $this->prescription_model->prescription($prescription_id)->row();
		$table = $this->services->get_table_item_config($this->current_page, 1, $prescription_id);
		$table["rows"] = $this->item_model->items($prescription_id)->result();
		$table = $this->load->view('templates/tables/plain_table', $table, true);
		$this->data["contents"] = $table;
		$add_menu = $this->services->get_form_data_medicine($this->current_page, $prescription_id);

		$add_menu = $this->load->view('templates/actions/modal_form', $add_menu, true);

		$this->data["header_button"] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Resep " . $prescription->code;
		$this->data["header"] = "Daftar Obat";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render("templates/contents/plain_content");
	}
	public function add_item()
	{
		if (!($_POST)) redirect(site_url($this->current_page));

		// echo var_dump( $data );return;
		$this->form_validation->set_rules($this->services->validation_item_config());
		if ($this->form_validation->run() === TRUE) {
			$data['prescription_id'] = $this->input->post('prescription_id');
			$data['medicine_id'] = $this->input->post('medicine_id');
			$data['rule_id'] = $this->input->post('rule_id');
			$data['quantity'] = $this->input->post('quantity');

			if ($this->item_model->create($data)) {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->item_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->item_model->errors()));
			}
		} else {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->item_model->errors() : $this->session->flashdata('message')));
			if (validation_errors() || $this->item_model->errors()) $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->data['message']));
		}

		redirect(site_url($this->current_page . 'prescription/' . $data['prescription_id']));
	}

	public function edit_item()
	{
		if (!($_POST)) redirect(site_url($this->current_page));

		// echo var_dump( $data );return;
		$this->form_validation->set_rules($this->services->validation_item_config());
		if ($this->form_validation->run() === TRUE) {
			$data['prescription_id'] = $this->input->post('prescription_id');
			$data['medicine_id'] = $this->input->post('medicine_id');
			$data['rule_id'] = $this->input->post('rule_id');
			$data['quantity'] = $this->input->post('quantity');

			$data_param['id'] = $this->input->post('id');

			if ($this->item_model->update($data, $data_param)) {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->item_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->item_model->errors()));
			}
		} else {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->item_model->errors() : $this->session->flashdata('message')));
			if (validation_errors() || $this->item_model->errors()) $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->data['message']));
		}

		redirect(site_url($this->current_page . 'prescription/' . $data['prescription_id']));
	}

	public function delete_item()
	{
		if (!($_POST)) redirect(site_url($this->current_page));
		$data['prescription_id'] = $this->input->post('prescription_id');

		$data_param['id'] 	= $this->input->post('id');
		if ($this->item_model->delete($data_param)) {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->item_model->messages()));
		} else {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->item_model->errors()));
		}
		redirect(site_url($this->current_page . 'prescription/' . $data['prescription_id']));
		redirect(site_url($this->current_page));
	}
}

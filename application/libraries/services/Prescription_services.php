<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prescription_services
{


  function __construct(){

  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function select_patient() {
    $this->load->model('patient_model');
    $patients = $this->patient_model->patients()->result();
    $select_patient = [];
    foreach ($patients as $key => $patient) {
      $select_patient[$patient->id] = $patient->name;
    }
    return $select_patient;
  }
  public function select_medicine() {
    $this->load->model('medicine_model');
    $medicines = $this->medicine_model->medicines()->result();
    $select_medicine = [];
    foreach ($medicines as $key => $medicine) {
      $select_medicine[$medicine->id] = $medicine->name;
    }
    return $select_medicine;
  }
  public function select_rule() {
    $this->load->model('rule_model');
    $rules = $this->rule_model->rules()->result();
    $select_rule = [];
    foreach ($rules as $key => $rule) {
      $select_rule[$rule->id] = $rule->rule;
    }
    return $select_rule;
  }
  public function get_table_config_no_action($_page, $start_number = 1) {
    $table["header"] = array(
        'code' => 'Kode Resep',
        'full_name' => 'Nama Dokter',
        'patient_name' => 'Nama Pasien',
        '_date' => 'Tanggal',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => "Daftar Obat",
                "type" => "link",
                "url" => site_url( $_page."prescription/"),
                "button_color" => "primary",	
                "param" => 'id',
              ),
    );
      return $table;
  }
  public function get_table_config( $_page, $start_number = 1 )
  {
    $select_patient = $this->select_patient();
      $table["header"] = array(
        'code' => 'Kode Resep',
        'full_name' => 'Nama Dokter',
        'patient_name' => 'Nama Pasien',
        '_date' => 'Tanggal',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => "Daftar Obat",
                "type" => "link",
                "url" => site_url( $_page."prescription/"),
                "button_color" => "primary",	
                "param" => 'id',
              ),
              array(
                "name" => 'Edit',
                "type" => "modal_form",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => array(
                    "id" => array(
                        'type' => 'hidden',
                        'label' => "id",
                    ),
                    "code" => array(
                      'type' => 'text',
                      'label' => "Kode Resep",
                    ),
                    "patient_id" => array(
                      'type' => 'select',
                      'label' => "Nama Pasien",
                      'options' => $select_patient,
                    ),
                    "date" => array(
                      'type' => 'text',
                      'label' => "Tanggal",
                      'value' => date('Y-m-d'),
                    ),
                    "timestamp" => array(
                      'type' => 'hidden',
                      'label' => "timestamp",
                      'value' => time(),
                    ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
              array(
                "name" => 'X',
                "type" => "modal_delete",
                "modal_id" => "delete_",
                "url" => site_url( $_page."delete/"),
                "button_color" => "danger",
                "param" => "id",
                "form_data" => array(
                  "id" => array(
                    'type' => 'hidden',
                    'label' => "id",
                  ),
                ),
                "title" => "Group",
                "data_name" => "code",
              ),
    );
    return $table;
  }
  public function get_table_item_config_no_action($start_number = 1) {
    $table["header"] = array(
        'name' => 'Nama Obat',
        'rule' => 'Aturan Pakai',
        'quantity' => 'Banyak Obat',
      );
      $table["number"] = $start_number;
      return $table;
  }
  public function get_table_item_config( $_page, $start_number = 1, $prescription_id )
  {
    $select_patient = $this->select_patient();
    $select_medicine = $this->select_medicine();
    $select_rule = $this->select_rule();
      $table["header"] = array(
        'name' => 'Nama Obat',
        'rule' => 'Aturan Pakai',
        'quantity' => 'Banyak Obat',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "modal_form",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit_item/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => array(
                  "id" => array(
                    'type' => 'hidden',
                    'label' => "id",
                  ),  
                  "prescription_id" => array(
                    'type' => 'hidden',
                    'label' => "Resep",
                    'value' => $prescription_id,
                  ),
                  "medicine_id" => array(
                    'type' => 'select',
                    'label' => "Nama Obat",
                    'options' => $select_medicine,
                  ),
                  "rule_id" => array(
                    'type' => 'select',
                    'label' => "Aturan Pakai",
                    'options' => $select_rule,
                  ),
                  "quantity" => array(
                    'type' => 'number',
                    'label' => "Banyak Obat",
                  ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
              array(
                "name" => 'X',
                "type" => "modal_delete",
                "modal_id" => "delete_",
                "url" => site_url( $_page."delete_item/"),
                "button_color" => "danger",
                "param" => "id",
                "form_data" => array(
                  "id" => array(
                    'type' => 'hidden',
                    'label' => "id",
                  ),
                  "prescription_id" => array(
                    'type' => 'hidden',
                    'label' => "Resep",
                    'value' => $prescription_id,
                  ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
    );
    return $table;
  }
  public function validation_config( ){
    $config = array(
        array(
          'field' => 'code',
          'label' => 'Kode Resep',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'user_id',
          'label' => 'dokter',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'patient_id',
          'label' => 'Nama Pasien',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'date',
          'label' => 'tanggal',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'timestamp',
          'label' => 'waktu',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }
  public function validation_item_config( ){
    $config = array(
        array(
          'field' => 'prescription_id',
          'label' => 'Kode Resep',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'medicine_id',
          'label' => 'Nama Obat',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'rule_id',
          'label' => 'Aturan Pakai',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'quantity',
          'label' => 'Banayk Obat',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }
  public function get_form_data($page) {
    $select_patient = $this->select_patient();
    $form_data = array(
			"name" => "Tambah Resep",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url($page . "add/"),
			"form_data" => array(
				"code" => array(
					'type' => 'text',
					'label' => "Kode Resep",
					'value' => "",
				),
				"user_id" => array(
					'type' => 'hidden',
					'label' => "Dokter",
					'value' => $this->session->userdata('user_id'),
        ),
        "patient_id" => array(
					'type' => 'select',
					'label' => "Nama Pasien",
					'options' => $select_patient,
        ),
        "date" => array(
					'type' => 'text',
					'label' => "Tanggal",
					'value' => date('Y-m-d'),
        ),
        "timestamp" => array(
					'type' => 'hidden',
					'label' => "timestamp",
					'value' => time(),
				),
			),
			'data' => NULL
    );
    return $form_data;
  }
  public function get_form_data_medicine($_page, $prescription_id) {
    $select_medicine = $this->select_medicine();
    $select_rule = $this->select_rule();
    $form_data = array(
			"name" => "Tambah Obat",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url($_page . "add_item/"),
			"form_data" => array(
				"prescription_id" => array(
					'type' => 'hidden',
					'label' => "Resep",
					'value' => $prescription_id,
        ),
        "medicine_id" => array(
					'type' => 'select',
					'label' => "Nama Obat",
					'options' => $select_medicine,
        ),
        "rule_id" => array(
					'type' => 'select',
					'label' => "Aturan Pakai",
					'options' => $select_rule,
        ),
        "quantity" => array(
					'type' => 'number',
					'label' => "Banyak Obat",
				),
			),
			'data' => NULL
    );
    return $form_data;
  }
}

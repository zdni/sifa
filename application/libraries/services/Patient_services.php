<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Patient_services
{


  function __construct()
  {
  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  public function select_group()
  {
    $this->load->model('patient_group_model');
    $groups = $this->patient_group_model->group()->result();
    $select_group = [];
    foreach ($groups as $key => $group) {
      $select_group[$group->id] = $group->name;
    }
    return $select_group;
  }
  public function get_table_config($_page, $start_number = 1)
  {
    $select_group = $this->select_group();
    $table["header"] = array(
      'name' => 'Nama Pasien',
      'patient_group_name' => 'Kelompok Usia',
    );
    $table["number"] = $start_number;
    $table["action"] = array(
      array(
        "name" => 'Edit',
        "type" => "modal_form",
        "modal_id" => "edit_",
        "url" => site_url($_page . "edit/"),
        "button_color" => "primary",
        "param" => "id",
        "form_data" => array(
          "id" => array(
            'type' => 'hidden',
            'label' => "id",
          ),
          "name" => array(
            'type' => 'text',
            'label' => "Nama Pasien",
          ),
          "patient_group_id" => array(
            'type' => 'select',
            'label' => "Kelompok Usia",
            'options' => $select_group
          ),
        ),
        "title" => "Group",
        "data_name" => "name",
      ),
      array(
        "name" => 'X',
        "type" => "modal_delete",
        "modal_id" => "delete_",
        "url" => site_url($_page . "delete/"),
        "button_color" => "danger",
        "param" => "id",
        "form_data" => array(
          "id" => array(
            'type' => 'hidden',
            'label' => "id",
          ),
        ),
        "title" => "Group",
        "data_name" => "name",
      ),
    );
    return $table;
  }
  public function get_table_group_config($_page, $start_number = 1)
  {
    $table["header"] = array(
      'name' => 'Nama Group',
      'description' => 'Deskripsi',
    );
    $table["number"] = $start_number;
    $table["action"] = array(
      array(
        "name" => 'Edit',
        "type" => "modal_form",
        "modal_id" => "edit_",
        "url" => site_url($_page . "edit/"),
        "button_color" => "primary",
        "param" => "id",
        "form_data" => array(
          "id" => array(
            'type' => 'hidden',
            'label' => "id",
          ),
          "name" => array(
            'type' => 'text',
            'label' => "Nama Group",
          ),
          "description" => array(
            'type' => 'textarea',
            'label' => "Deskripsi",
          ),
        ),
        "title" => "Group",
        "data_name" => "name",
      ),
      array(
        "name" => 'X',
        "type" => "modal_delete",
        "modal_id" => "delete_",
        "url" => site_url($_page . "delete/"),
        "button_color" => "danger",
        "param" => "id",
        "form_data" => array(
          "id" => array(
            'type' => 'hidden',
            'label' => "id",
          ),
        ),
        "title" => "Group",
        "data_name" => "name",
      ),
    );
    return $table;
  }
  public function validation_group_config()
  {
    $config = array(
      array(
        'field' => 'name',
        'label' => 'name',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'description',
        'label' => 'description',
        'rules' =>  'trim|required',
      ),
    );

    return $config;
  }
  public function validation_config()
  {
    $config = array(
      array(
        'field' => 'name',
        'label' => 'name',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'patient_group_id',
        'label' => 'Kelompok Usia',
        'rules' =>  'trim|required',
      ),
    );

    return $config;
  }
  public function get_form_data($page)
  {
    $select_group = $this->select_group();
    $form_data = array(
      "name" => "Tambah Pasien",
      "modal_id" => "add_group_",
      "button_color" => "primary",
      "url" => site_url($page . "add/"),
      "form_data" => array(
        "name" => array(
          'type' => 'text',
          'label' => "Nama Pasien",
          'value' => "",
        ),
        "patient_group_id" => array(
          'type' => 'select',
          'label' => "Kelompok Usia",
          'options' => $select_group,
        ),
      ),
      'data' => NULL
    );
    return $form_data;
  }
}

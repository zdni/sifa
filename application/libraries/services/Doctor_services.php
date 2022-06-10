<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Doctor_services
{


  function __construct()
  { }

  public function __get($var)
  {
    return get_instance()->$var;
  }

  public function get_table_config($_page, $start_number = 1)
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
  public function get_table_group_config($_page, $start_number = 1)
  {
    $table["header"] = array(
      'name' => 'Spesialis Dokter',
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
  public function validation_config()
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
  public function validation_group_config()
  {
    $config = array(
      array(
        'field' => 'name',
        'label' => 'name',
        'rules' =>  'trim|required',
      ),
    );

    return $config;
  }
}

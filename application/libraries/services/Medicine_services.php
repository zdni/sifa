<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Medicine_services
{


  function __construct()
  { }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  public function select_category()
  {
    $this->load->model(array(
      'category_model',
    ));
    $categories = $this->category_model->categories()->result();
    $select_category = [];
    foreach ($categories as $key => $category) {
      $select_category[$category->id] = $category->name;
    }
    return $select_category;
  }
  public function get_table_config($_page, $start_number = 1)
  {
    $select_category = $this->select_category();
    $table["header"] = array(
      // 'code' => 'Kode Obat',
      'name' => 'Nama Obat',
      'category_name' => 'Kategori Obat',
      // 'date' => 'Tanggal',
      'expired' => 'Expired',
      // 'stock' => 'Stok Obat',
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
          "code" => array(
            'type' => 'text',
            'label' => "Kode Obat",
          ),
          "name" => array(
            'type' => 'text',
            'label' => "Nama Group",
          ),
          "category_id" => array(
            'type' => 'select',
            'label' => "Jenis Obat",
            'options' => $select_category,
          ),
          "date" => array(
            'type' => 'text',
            'label' => "Tanggal",
          ),
          "expired" => array(
            'type' => 'text',
            'label' => "Expired",
          ),
          "timestamp" => array(
            'type' => 'hidden',
            'label' => "timestamp",
          ),
          "stock" => array(
            'type' => 'number',
            'label' => "Stok Obat",
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
        'field' => 'code',
        'label' => 'Kode',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'name',
        'label' => 'name',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'category_id',
        'label' => 'Jenis Obat',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'date',
        'label' => 'Tanggall',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'expired',
        'label' => 'Expired',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'timestamp',
        'label' => 'timestamp',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'stock',
        'label' => 'Stok Obat',
        'rules' =>  'trim|required',
      ),
    );

    return $config;
  }
  public function get_form_data($page)
  {
    $select_category = $this->select_category();
    $form_data = array(
      "name" => "Tambah Obat",
      "modal_id" => "add_medicine_",
      "button_color" => "primary",
      "url" => site_url($page . "add/"),
      "form_data" => array(
        "code" => array(
          'type' => 'text',
          'label' => "Kode Obat",
          'value' => "",
        ),
        "name" => array(
          'type' => 'text',
          'label' => "Nama Obat",
          'value' => "",
        ),
        "category_id" => array(
          'type' => 'select',
          'label' => "Jenis Obat",
          'options' => $select_category,
        ),
        "date" => array(
          'type' => 'text',
          'label' => "Tanggal",
          'value' => date('Y-m-d'),
        ),
        "expired" => array(
          'type' => 'text',
          'label' => "Expired",
          'value' => date('Y-m-d'),
        ),
        "timestamp" => array(
          'type' => 'hidden',
          'label' => "timestamp",
          'value' => time(),
        ),
        "stock" => array(
          'type' => 'number',
          'label' => "Stok Obat",
          'value' => "",
        ),
      ),
      'data' => NULL
    );
    return $form_data;
  }
}

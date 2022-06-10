<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_services
{


    function __construct()
    {
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
    public function get_table_config_no_action($_page, $start_number = 1)
    {
        $table["header"] = array(
            'jeniskegiatan_id' => 'Jenis Kegiatan',
            'full_name' => 'Nama Dokter',
            'patient_name' => 'Nama Pasien',
            '_date' => 'Tanggal',
        );
        $table["number"] = $start_number;
        $table["action"] = array(
            array(
                "name" => "Daftar Obat",
                "type" => "link",
                "url" => site_url($_page . "prescription/"),
                "button_color" => "primary",
                "param" => 'id',
            ),
        );
        return $table;
    }
    public function get_table_item_config_no_action($start_number = 1)
    {
        $table["header"] = array(
            'name' => 'Nama Obat',
            'rule' => 'Aturan Pakai',
            'quantity' => 'Banyak Obat',
        );
        $table["number"] = $start_number;
        return $table;
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
                "name" => 'Hapus',
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
    public function get_form_data($page)
    {
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
                    'options' => array(),
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
}

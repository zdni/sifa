<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ibuhamil2_services
{

    function __construct()
    {
        $this->id              = '';
        $this->name    = "";
        $this->tgl_lahir    = "";
        $this->jk_id          = "";
        $this->alamat        = "";
        $this->no_hp          = "";
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
    public function get_table_config($_page, $start_number = 1)
    {
        // sesuaikan nama tabel header yang akan d tampilkan dengan nama atribut dari tabel yang ada dalam database
        $table["header"] = array(
            'name' => 'Nama Pasien',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk_deskripsi' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_hp' => 'No. HP',
        );

        $jks = $this->jk_model->jks()->result();
        $jk_select = array();
        foreach ($jks as $jk) {
            // if( $jk->id == 1 ) continue;
            $jk_select[$jk->id] = $jk->deskripsi;
        }

        $_data["form_data"] = array(
            "name" => array(
                'type' => 'text',
                'label' => "Nama Pasien",
            ),
            "tgl_lahir" => array(
                'type' => 'date',
                'label' => 'Tanggal Lahir',
            ),
            "jk_id" => array(
                'type' => 'text',
                'label' => 'Jenis Kelamin',
                'value' => $jk_select[$this->jk_id],
            ),
            "alamat" => array(
                'type' => 'text',
                'label' => 'Alamat',
            ),
            "no_hp" => array(
                'type' => 'text',
                'label' => 'No. HP',
            ),
        );
        return $_data;
    }
    public function get_table_group_config($_page, $start_number = 1)
    {
        $table["header"] = array(
            'deskripsi' => 'Deskripsi',
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
                    "deskripsi" => array(
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
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'jk_id',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'trim|required',
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
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'jk_id',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'no_hp',
                'label' => 'No. HP',
                'rules' => 'trim|required',
            ),
        );

        return $config;
    }
    public function get_form_data($page)
    {
        $jks = $this->jk_model->jks()->result();
        $jk_select = array();
        foreach ($jks as $jk) {
            // if( $jk->id == 1 ) continue;
            $jk_select[$jk->id] = $jk->deskripsi;
        }

        $s_data["form_data"] = array(
            "name" => array(
                'type' => 'text',
                'label' => "Nama Pasien",
            ),
            "tgl_lahir" => array(
                'type' => 'date',
                'label' => 'Tanggal Lahir',
            ),
            "jk_id" => array(
                'type' => 'text',
                'label' => 'Jenis Kelamin',
                'value' => $jk_select[$this->jk_id],
            ),
            "alamat" => array(
                'type' => 'text',
                'label' => 'Alamat',
            ),
            "no_hp" => array(
                'type' => 'text',
                'label' => 'No. HP',
            ),
        );
        return $s_data;
    }
}

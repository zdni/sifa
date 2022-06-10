<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pasienibu_services
{


    function __construct()
    {
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
    public function select_ibuhamil()
    {
        $this->load->model('ibuhamil_model');
        $ibuhamils = $this->ibuhamil_model->ibuhamils()->result();
        $select_ibuhamil = [];
        foreach ($ibuhamils as  $ibuhamil) {
            $select_ibuhamil[$ibuhamil->id] = $ibuhamil->name;
            $select_ibuhamil[$ibuhamil->id] = $ibuhamil->tgl_lahir;
            $select_ibuhamil[$ibuhamil->id] = $ibuhamil->jk_id;
            $select_ibuhamil[$ibuhamil->id] = $ibuhamil->alamat;
            $select_ibuhamil[$ibuhamil->id] = $ibuhamil->no_hp;
        }
        return $select_ibuhamil;
    }
    public function select_imunisasiibu()
    {
        $this->load->model('imunisasiibu_model');
        $imunisasiibus = $this->imunisasiibu_model->imunisasiibus()->result();
        $select_imunisasiibu = [];
        foreach ($imunisasiibus as  $imunisasiibu) {
            $select_imunisasiibu[$imunisasiibu->id] = $imunisasiibu->name;
        }
        return $select_imunisasiibu;
    }
    public function select_penyuluhanibu()
    {
        $this->load->model('penyuluhanibu_model');
        $penyuluhanibus = $this->penyuluhanibu_model->penyuluhanibus()->result();
        $select_penyuluhanibu = [];
        foreach ($penyuluhanibus as  $penyuluhanibu) {
            $select_penyuluhanibu[$penyuluhanibu->id] = $penyuluhanibu->name;
        }
        return $select_penyuluhanibu;
    }
    public function select_jk()
    {
        $this->load->model('jk_model');
        $jk = $this->jk_model->jk()->result();
        $select_jk = [];
        foreach ($jk as  $jk) {
            $select_jk[$jk->id] = $jk->name;
        }
        return $select_jk;
    }
    public function get_table_config($_page, $start_number = 1)
    {
        $select_jk = $this->select_jk();
        $table["header"] = array(
            'name' => 'Nama Pasien',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk_name' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_hp' => 'No. HP',
        );
        $table["number"] = $start_number;
        $table["action"] = array(
            array(
                "name" => "Daftar Pemeriksaan",
                "type" => "link",
                "url" => site_url($_page . "detail/"),
                "button_color" => "primary",
                "param" => "id",
            ),
            array(
                "name" => "Export",
                "type" => "link",
                "url" => site_url($_page . "export/"),
                "button_color" => "success",
                "param" => "id",
            ),
            array(
                'title' => 'Data Ibu',
                "name" => 'Hapus',
                "type" => "modal_delete",
                "modal_id" => "delete_",
                "url" => site_url($_page . "delete_dataibu/"),
                "button_color" => "danger",
                "param" => "id",
                "form_data" => array(
                    "id" => array(
                        'type' => 'hidden',
                        'label' => "id",
                    ),
                ),
                "data_name" => "name",
            ),
        );
        return $table;
    }

    public function get_table_pemeriksaan_config($_page, $ibuhamil_id = NULL, $start_number = 1)
    {
        $select_jk = $this->select_jk();
        $table["header"] = array(
            'ibuhamil_name' => 'Nama Pasien',
            'darah' => 'Darah',
            'bb' => 'Berat Badan',
            'jantung' => 'Detak Jantung',
            'suhu' => 'Suhu Tubuh',
            'imunisasiibu_name' => 'Suhu Tubuh',
            'penyuluhanibu_name' => 'Suhu Tubuh',
        );
        $table["number"] = $start_number;
        $table["action"] = array(
            array(
                "name" => 'Edit',
                "type" => "modal_form",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => $this->get_form_data_pemeriksaan($ibuhamil_id)['form_data'],
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
                'data_name' => 'ibuhamil_name',
                "title" => "Group",
            ),
        );
        return $table;
    }
    public function get_table_group_config($_page, $start_number = 1)
    {
        $table["header"] = array(
            'name' => 'Jenis Kelamin',
        );
        $table["number"] = $start_number;
        $table["action"] = array(
            array(
                "name" => 'Tambah Pemeriksaan',
                "type" => "link",
                "modal_id" => "edit_",
                "url" => site_url($_page . "add/"),
                "button_color" => "primary",
                "param" => "id",

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
    public function validation_pemeriksaan()
    {
        $config = array(
            array(
                'field' => 'ibuhamil_id',
                'label' => 'ibuhamil_id',
                'rules' =>  'trim|required',
            ),
            array(
                'field' => 'penyuluhanibu_id',
                'label' => 'Penyuluhan',
                'rules' =>  'trim|required',
            ),
            array(
                'field' => 'imunisasiibu_id',
                'label' => 'Jenis Imunisasi',
                'rules' =>  'trim|required',
            ),
            array(
                'field' => 'darah',
                'label' => 'Darah',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'bb',
                'label' => 'Berat Badan',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'jantung',
                'label' => 'Jantung',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'suhu',
                'label' => 'Suhu Tubuh',
                'rules' => 'trim|required',
            ),
        );

        return $config;
    }
    public function get_form_data()
    {

        $_data["form_data"] = array(
            "id" => array(
                'type' => 'hidden',
                'label' => "ID",
                'value' => $this->form_validation->set_value('id', $this->ibuhamil_id),
            ),
            "name" => array(
                'type' => 'text',
                'label' => "Nama Pasien",
                'value' => $this->form_validation->set_value('name', $this->ibuhamil_name),
            ),
            "tgl_lahir" => array(
                'type' => 'date',
                'label' => "Tanggal Lahir",
                'value' => $this->form_validation->set_value('tgl_lahir', $this->ibuhamil_tgl_lahir),
            ),
            "jk_name" => array(
                'type' => 'text',
                'label' => "Jenis Kelamin",
                'value' => $this->form_validation->set_value('jk_name', $this->ibuhamil_jk_name),
            ),
            "alamat" => array(
                'type' => 'text',
                'label' => "Alamat",
                'value' => $this->form_validation->set_value('alamat', $this->ibuhamil_alamat),
            ),
            "no_hp" => array(
                'type' => 'text',
                'label' => "No. HP",
                'value' => $this->form_validation->set_value('no_hp', $this->ibuhamil_no_hp),
            ),

        );
        //     // ),
        //     // 'data' => NULL
        // );
        // return $form_data;
    }
    public function get_form_data_pemeriksaan($ibuhamil_id)
    {

        $select_imunisasiibu = $this->select_imunisasiibu();
        $select_penyuluhanibu = $this->select_penyuluhanibu();
        $form_data['form_data'] = array(
            "id" => array(
                'type' => 'hidden',
                'label' => "id",
            ),
            "penyuluhanibu_id" => array(
                'type' => 'select',
                'label' => 'Jenis Penyuluhan',
                'options' => $select_penyuluhanibu,
            ),
            "imunisasiibu_id" => array(
                'type' => 'select',
                'label' => 'Jenis Penyuluhan',
                'options' => $select_imunisasiibu,
            ),
            "ibuhamil_id" => array(
                'type' => 'hidden',
                'label' => 'ibuhamil_id',
                'value' => $ibuhamil_id,
            ),
            "darah" => array(
                'type' => 'text',
                'label' => 'Tekanan Darah',
            ),
            "bb" => array(
                'type' => 'text',
                'label' => 'BB',
            ),
            "jantung" => array(
                'type' => 'text',
                'label' => 'Detak Jantung Janin',
            ),
            "suhu" => array(
                'type' => 'text',
                'label' => 'Suhu Badan',
            ),
        );
        return $form_data;
    }
}

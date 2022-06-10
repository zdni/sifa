<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends MY_Model
{
    protected $table = "report";

    function __construct()
    {
        parent::__construct($this->table);
        parent::set_join_key('report_id');
    }

    /**
     * create
     *
     * @param array  $data
     * @return static
     * @author madukubah
     */
    public function create($data)
    {
        // Filter the data passed
        $data = $this->_filter_data($this->table, $data);

        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id($this->table . '_id_seq');

        if (isset($id)) {
            $this->set_message("berhasil");
            return $id;
        }
        $this->set_error("gagal");
        return FALSE;
    }
    /**
     * update
     *
     * @param array  $data
     * @param array  $data_param
     * @return bool
     * @author madukubah
     */
    public function update($data, $data_param)
    {
        $this->db->trans_begin();
        $data = $this->_filter_data($this->table, $data);

        $this->db->update($this->table, $data, $data_param);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            $this->set_error("gagal");
            return FALSE;
        }

        $this->db->trans_commit();

        $this->set_message("berhasil");
        return TRUE;
    }
    /**
     * delete
     *
     * @param array  $data_param
     * @return bool
     * @author madukubah
     */
    public function delete($data_param)
    {
        //foreign
        //delete_foreign( $data_param. $models[]  )
        if (!$this->delete_foreign($data_param, ['item_model'])) {
            $this->set_error("gagal"); //('group_delete_unsuccessful');
            return FALSE;
        }
        //foreign
        $this->db->trans_begin();

        $this->db->delete($this->table, $data_param);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            $this->set_error("gagal"); //('group_delete_unsuccessful');
            return FALSE;
        }

        $this->db->trans_commit();

        $this->set_message("berhasil"); //('group_delete_successful');
        return TRUE;
    }

    /**
     * group
     *
     * @param int|array|null $id = id_groups
     * @return static
     * @author madukubah
     */
    public function report($id = NULL)
    {
        if (isset($id)) {
            $this->where($this->table . '.id', $id);
        }

        $this->limit(1);
        $this->order_by($this->table . '.id', 'desc');

        $this->report();

        return $this;
    }
    /**
     * groups
     *
     *
     * @return static
     * @author madukubah
     */
    public function reports($start = 0, $limit = NULL, $status = NULL)
    {
        if (isset($limit)) {
            $this->limit($limit);
        }
        $this->select($this->table . '.*');
        $this->select($this->table . '.date AS _date');
        $this->select(' CONCAT( users.first_name, " ", users.last_name ) AS full_name');
        $this->select('ibuhamil.nama_ibuhamil AS nama_ibuhamil');
        $this->join(
            'users',
            'users.id = report.user_id',
            'inner'
        );
        $this->join(
            'ibuhamil',
            'ibuhamil.id = report.ibuhamil_id',
            'inner'
        );
        if (isset($status)) {
            $this->where($this->table . '.status', $status);
        }
        $this->offset($start);
        $this->order_by($this->table . '.id', 'desc');
        return $this->fetch_data();
    }
}

<?php

class TarefasModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_tarefas() {
        $this->db->select();
        $this->db->from('controle');
        $this->db->join('status', 'status.idstatus = controle.status_idstatus');
        $this->db->order_by("idcontrole", "DESC");
        return $this->db->get()->result_array();
    }

    function status() {
        $this->db->select();
        $this->db->from('status');
        $this->db->order_by("status", "Asc");
        return $this->db->get()->result_array();
    }

}

?>
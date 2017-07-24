<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TarefasController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TarefasModel');
    }

    public function index() {
        $data['lista']  = $this->TarefasModel->list_tarefas();
        $data['status'] = $this->TarefasModel->status();
        $this->load->view('tarefas', $data);
    }

    public function cadastrar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome ', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('data_inicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('idstatus', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erro2', "Preencha todos os campos!");
            $this->index();
        } else {
            $nome           = $this->input->post('nome');
            $descricao      = $this->input->post('descricao');
            $data_inicio    = $this->input->post('data_inicio');
            $data_fim       = $this->input->post('data_fim');
            $status         = $this->input->post('idstatus');
            
            if($status==4 && $data_fim==''){
               $this->session->set_flashdata('erro', "Você não pode concluir a tarefa sem preencher a data de fim!");
               $this->index();
            } 
            else{
                $data = array(
                'nome'              => $nome,
                'descricao'         => $descricao,
                'data_inicio'       => $data_inicio,
                'data_fim'          => $data_fim,
                'situacao'          => 1,
                'status_idstatus'   => $status,
            );

            $this->db->insert('controle', $data);
            redirect('TarefasController');
            exit;
        
            }
            }
    }
    public function atualizar(){
         $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome ', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('data_inicio', 'Data de Inicio', 'required');
        $this->form_validation->set_rules('idstatus', 'Status', 'required');
        $id = $this->input->post('idcontrole');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erro2', "Preencha todos os campos!");
            $this->index();
        } else {
            $id             = $this->input->post('idcontrole');
            $nome           = $this->input->post('nome');
            $descricao      = $this->input->post('descricao');
            $data_inicio    = $this->input->post('data_inicio');
            $data_fim       = $this->input->post('data_fim');
            $status         = $this->input->post('idstatus');
            $situacao       = 0;
            
            if($status==4 && $data_fim==''){
               $this->session->set_flashdata('erro', "Você não pode concluir a tarefa sem preencher a data de fim!");
               $this->index();
            } 
            else{
            $data = array(
                'nome'              => $nome,
                'descricao'         => $descricao,
                'data_inicio'       => $data_inicio,
                'data_fim'          => $data_fim,
                'status_idstatus'   => $status,
                'situacao'          => $situacao
            );
            $datas = array(
                'nome'              => $nome,
                'descricao'         => $descricao,
                'data_inicio'       => $data_inicio,
                'data_fim'          => $data_fim,
                'status_idstatus'   => $status,
                'situacao'          => 1
            );
           if($status==4){
            $this->db->where('idcontrole', $id);
            $this->db->update('controle', $data);
           }
           else{
            $this->db->where('idcontrole', $id);
            $this->db->update('controle', $datas); 
           }
            redirect('TarefasController');
            exit;
            }
            
        }
    }
    

}

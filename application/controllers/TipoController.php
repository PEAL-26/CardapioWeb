<?php
class TipoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TipoModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Index()
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Tipos';
        $dados['sub_titulo'] = 'Listagem';
        $dados['tipos'] = $this->TipoModel->ListarTodos();
        $this->load->view('admin/tipos/index', $dados);
    }

    public function Details($id)
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Tipo';
        $dados['sub_titulo'] = 'Detalhes';
        $dados['tipo']  = $this->TipoModel->BuscarPorId($id);

        if ($dados['tipo'] == null) {
            $erro["heading"] = "Tipo";
            $erro["message"] = "Tipo não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        }

        $this->load->view('admin/tipos/details', $dados);
    }

    public function Create()
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Tipo';
        $dados['sub_titulo'] = 'Cadastrar';
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('ordem', 'Ordem', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/tipos/create', $dados);
        } else {
            $tipo = array(
                "nome" => $this->input->post('nome'),
                "ordem" => $this->input->post('ordem')
            );

            $resultado = $this->TipoModel->Inserir($tipo);

            if ($resultado) {
                redirect('admin/tipo');
            } else {
                $this->mensagem->MostrarMensagens();
                $this->load->view('admin/tipos/create',  $dados);
            }
        }
    }

    public function Edit($id)
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Tipo';
        $dados['sub_titulo'] = 'Editar';
        $dados['tipo']  = $this->TipoModel->BuscarPorId($id);
        
        if ($dados['tipo'] == null) {
            $erro["heading"] = "Tipo";
            $erro["message"] = "Tipo não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        }

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('ordem', 'Ordem', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/tipos/edit', $dados);
        } else {
            
            $tipo = array(
                "id" => $this->input->post('id'),
                "nome" => $this->input->post('nome'),
                "ordem" => $this->input->post('ordem')
            );
    
            if ($dados['tipo'] == null || $id != $tipo["id"]) {
                $erro["heading"] = "Tipo";
                $erro["message"] = "Tipo não econtrada.";
                $this->load->view('errors/html/error_404',  $erro);
                return;
            }

            $resultado = $this->TipoModel->Alterar($id, $tipo);

            if ($resultado) {
                redirect('admin/tipo');
            } else {
                $this->mensagem->MostrarMensagens();
                $this->load->view('admin/tipos/edit',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        if(!Permissao()) return;
        $resultado = $this->TipoModel->Remover($id);
        $this->mensagem->MostrarMensagens();
        redirect('admin/tipo', 'refresh');
        
    }
}

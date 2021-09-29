<?php
class CategoriaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoriaModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $dados['titulo'] = 'Categorias';
        $dados['sub_titulo'] = 'Listagem';
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();
        $this->load->view('categorias/index', $dados);
    }

    public function Details($id)
    {
        $dados['titulo'] = 'Categoria';
        $dados['sub_titulo'] = 'Detalhes';
        $dados['categoria']  = $this->CategoriaModel->BuscarPorId($id);

        if ($dados['categoria'] == null) {
            $erro["heading"] = "Categoria";
            $erro["message"] = "Categoria não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        }

        $this->load->view('categorias/details', $dados);
    }

    public function Create()
    {
        $dados['titulo'] = 'Categoria';
        $dados['sub_titulo'] = 'Cadastrar';
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('categorias/create', $dados);
        } else {
            $categoria = array(
                "nome" => $this->input->post('nome')
            );

            $resultado = $this->CategoriaModel->Inserir($categoria);

            if ($resultado) {
                redirect('categoria');
            } else {
                $this->load->view('categorias/create',  $dados);
            }
        }
    }

    public function Edit($id)
    {
        $dados['titulo'] = 'Categoria';
        $dados['sub_titulo'] = 'Editar';
        $dados['categoria']  = $this->CategoriaModel->BuscarPorId($id);

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('categorias/edit', $dados);
        } else {
            
            $categoria = array(
                "id" => $this->input->post('id'),
                "nome" => $this->input->post('nome')
            );
    
            if ($dados['categoria'] == null || $id != $categoria["id"]) {
                $erro["heading"] = "Categoria";
                $erro["message"] = "Categoria não econtrada.";
                $this->load->view('errors/html/error_404',  $erro);
                return;
            }

            $resultado = $this->CategoriaModel->Alterar($id, $categoria);

            if ($resultado) {
                redirect('categoria');
            } else {
                $this->load->view('categorias/edit',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        $resultado = $this->CategoriaModel->Remover($id);
        if ($resultado) {
            redirect('categoria', 'refresh');
        } else {
        }
    }
}

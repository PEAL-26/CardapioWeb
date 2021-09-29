<?php
class produtoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdutoModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $dados['titulo'] = 'Produtos';
        $dados['sub_titulo'] = 'Listagem';
        $dados['produtos'] = $this->ProdutoModel->ListarTodos();
        $this->load->view('produtos/index', $dados);
    }

    public function Create()
    {
        $dados['titulo'] = 'Produto';
        $dados['sub_titulo'] = 'Cadastrar';
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');
        $this->form_validation->set_rules('imagem', 'Imagem', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('produtos/create', $dados);
        } else {
            $produto = array(
                "categoria_id" => $this->input->post('categoria_id'),
                "nome" => $this->input->post('nome'),
                "descricao" => $this->input->post('descricao'),
                "valor" => $this->input->post('valor'),
                "imagem" => $this->input->post('imagem')
            );

            $resultado = $this->ProdutoModel->Inserir($produto);

            if ($resultado) {
                redirect('produto');
            } else {
                $this->load->view('produtos/create',  $dados);
            }
        }
    }

    public function Edit($id)
    {
        $dados['titulo'] = 'Produto';
        $dados['sub_titulo'] = 'Editar';
       
        $produto = array(
            "id" => $this->input->post('id'),
            "categoria_id" => $this->input->post('categoria_id'),
            "nome" => $this->input->post('nome'),
            "descricao" => $this->input->post('descricao'),
            "valor" => $this->input->post('valor'),
            "imagem" => $this->input->post('imagem')
        );

        if ($id != $produto["id"]) return NotFound();

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');
        $this->form_validation->set_rules('imagem', 'Imagem', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('produtos/edit', $dados);
        } else {


            $resultado = $this->ProdutoModel->Alterar($id, $produto);

            if ($resultado) {
                redirect('produto');
            } else {
                $this->load->view('produtos/edit',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        $resultado = $this->ProdutoModel->Remover($id);
        if ($resultado) {
            redirect('produto', 'refresh');
        } else {
        }
    }
}

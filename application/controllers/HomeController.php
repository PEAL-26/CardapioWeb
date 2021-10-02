<?php
class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdutoModel');
        $this->load->model('CategoriaModel');
    }

    public function Index()
    {
        $dados['titulo'] = 'Home';
        $dados['sub_titulo'] = 'Dashboard';
        $dados['produtos'] = $this->ProdutoModel->ListarTodos();
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();
        $this->load->view('home/index', $dados);
    }
}

<?php
class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdutoModel');
    }

    public function Index()
    {
        $dados['titulo'] = 'Home';
        $dados['sub_titulo'] = 'Dashboard';
        $dados['produtos'] = $this->ProdutoModel->ListarTodos();
        $this->load->view('home/index', $dados);
    }
}

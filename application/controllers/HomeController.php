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
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();
        $this->load->view('home/index', $dados);
    }

    public function Admin()
    {
        $usuario_logado = $this->session->userdata('usuario_logado');
        if (!$usuario_logado)  redirect('admin/entrar');

        $dados['titulo'] = 'Admin';
        $dados['sub_titulo'] = 'Dashboard';
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();
        $this->load->view('admin/index', $dados);
    }
}

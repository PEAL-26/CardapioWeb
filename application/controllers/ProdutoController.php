<?php
class ProdutoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdutoModel');
        $this->load->model('CategoriaModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Index()
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Produtos';
        $dados['sub_titulo'] = 'Listagem';

        $dados['produtos'] = $this->ProdutoModel->ListarTodos();
        $this->load->view('admin/produtos/index', $dados);
    }

    public function FiltrarProduto()
    {
        $filtro  = $this->input->post('filtro') ?? '';
        $dados['produtos'] = $this->ProdutoModel->Listar($filtro);
        echo json_encode($dados["produtos"]);
    }

    public function Details($id)
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Produto';
        $dados['sub_titulo'] = 'Detalhes';
        $dados['produto']  = $this->ProdutoModel->BuscarPorId($id);

        if ($dados['produto'] == null) {
            $erro["heading"] = "Erro!";
            $erro["message"] = "Produto não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        }

        $this->load->view('admin/produtos/details', $dados);
    }

    public function Create()
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Produto';
        $dados['sub_titulo'] = 'Cadastrar';
        $dados['msg'] = '';
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required|is_numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/produtos/create', $dados);
        } else {
            $carregar_imagem = $this->UploadImage();
            $produto = array(
                "categoria_id" => $this->input->post('categoria_id'),
                "nome" => $this->input->post('nome'),
                "descricao" => $this->input->post('descricao'),
                "valor" => $this->input->post('valor'),
                "imagem" =>  $carregar_imagem["resultado"]
            );

            if ($carregar_imagem["sucess"])
                $resultado = $this->ProdutoModel->Inserir($produto);

            if ($resultado ?? FALSE) {
                redirect('admin/produto');
            } else {
                $this->mensagem->MostrarMensagens();
                $this->load->view('admin/produtos/create',  $dados);
            }
        }
    }

    private function UploadImage()
    {
        if (!Permissao()) return;

        $nome_ficheiro_antigo = $this->input->post('nome_imagem_antigo');
        $nome_ficheiro_novo = $_FILES["imagem"]["name"];

        if ($nome_ficheiro_novo == TRUE) {
            $conf["upload_path"] = "assets/imagens/";
            $conf["file_name"] = time() . "-" . str_replace(' ', '-',  $_FILES["imagem"]["name"]);
            $conf["max_size"] = 2048;
            $conf["allowed_types"] = "gif|jpg|jpeg|png";
            $this->load->library('upload', $conf);

            if ($this->upload->do_upload('imagem')) {
                $localizacao_nova =  $conf["upload_path"] .  $conf["file_name"];

                if (!empty($nome_ficheiro_antigo)) {
                    $localizacao_antiga =  $conf["upload_path"] .  $nome_ficheiro_antigo;
                    if (file_exists($localizacao_antiga)) {
                        unlink($localizacao_antiga);
                    }
                }

                return array("sucess" => TRUE, "resultado" => $localizacao_nova);
            } else {
                $erros = $this->upload->display_errors();
                $this->mensagem->AddMensagemErro($erros);
                return array("sucess" => FALSE, "resultado" => "");
            }
        } else {
            return array("sucess" => TRUE, "resultado" =>  $nome_ficheiro_antigo);
            // $nome_ficheiro_novo  =  $nome_ficheiro_antigo;

        }
    }

    public function Edit($id)
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Produto';
        $dados['sub_titulo'] = 'Editar';
        $dados['produto']  = $this->ProdutoModel->BuscarPorId($id);
        $dados['categorias'] = $this->CategoriaModel->ListarTodos();

        if ($dados['produto'] == null) {
            $erro["heading"] = "Erro!";
            $erro["message"] = "Produto não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        } else {
            $dados['produto']->imagem = pathinfo($dados['produto']->imagem,2);
        }

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required|is_numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/produtos/edit', $dados);
        } else {
            $carregar_imagem = $this->UploadImage();

            $produto = array(
                "id" => $this->input->post('id'),
                "categoria_id" => $this->input->post('categoria_id'),
                "nome" => $this->input->post('nome'),
                "descricao" => $this->input->post('descricao'),
                "valor" => $this->input->post('valor'),
                "imagem" =>  $carregar_imagem["resultado"]
            );

            // print_r($produto);
            // exit;

            if ($dados['produto'] == null || $id != $produto["id"]) {
                $erro["heading"] = "Erro!";
                $erro["message"] = "Produto não econtrada.";
                $this->load->view('errors/html/error_404',  $erro);
                return;
            }

            if ($carregar_imagem["sucess"])
                $resultado = $this->ProdutoModel->Alterar($id, $produto);

            if ($resultado) {
                redirect('admin/produto');
            } else {
                $this->mensagem->MostrarMensagens();
                $this->load->view('admin/produtos/create',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        if (!Permissao()) return;
        $resultado = $this->ProdutoModel->Remover($id);
        $this->mensagem->MostrarMensagens();
        redirect('admin/produto', 'refresh');
    }
}

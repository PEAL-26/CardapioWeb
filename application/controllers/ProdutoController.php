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
            if ($carregar_imagem["sucess"]) {
                $produto = array(
                    "categoria_id" => $this->input->post('categoria_id'),
                    "nome" => $this->input->post('nome'),
                    "descricao" => $this->input->post('descricao'),
                    "valor" => $this->input->post('valor'),
                    "imagem" =>  $carregar_imagem["resultado"]
                );

                $resultado = $this->ProdutoModel->Inserir($produto);
            } else {
                $resultado = FALSE;
                $dados['msg'] = $carregar_imagem["resultado"];
            }

            if ($resultado) {
                redirect('admin/produto');
            } else {
                $this->load->view('admin/produtos/create',  $dados);
            }
        }
    }

    private function UploadImage()
    {
        if (!Permissao()) return;
        $imagem_selecionada = $this->input->post('nome_imagem');
        if (empty($imagem_selecionada))
            return array("sucess" => TRUE, "resultado" => '');

        $conf["upload_path"] = "assets/imagens/";
        $conf["max_size"] = 2048;
        $conf["allowed_types"] = "gif|jpg|jpeg|png";
        $this->load->library('upload', $conf);

        if ($this->upload->do_upload('imagem')) {
            $nome_imagem =  $this->upload->data();
            $localizacao =  $conf["upload_path"] . $nome_imagem["file_name"];
            return array("sucess" => TRUE, "resultado" => $localizacao);
        } else {
            return array("sucess" => FALSE, "resultado" => $this->upload->display_errors());
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
        }

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required|is_numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/produtos/edit', $dados);
        } else {
            $carregar_imagem = $this->UploadImage();
            if ($carregar_imagem["sucess"]) {
                $produto = array(
                    "id" => $this->input->post('id'),
                    "categoria_id" => $this->input->post('categoria_id'),
                    "nome" => $this->input->post('nome'),
                    "descricao" => $this->input->post('descricao'),
                    "valor" => $this->input->post('valor'),
                    "imagem" =>  $carregar_imagem["resultado"]
                );

                if ($dados['produto'] == null || $id != $produto["id"]) {
                    $erro["heading"] = "Erro!";
                    $erro["message"] = "Produto não econtrada.";
                    $this->load->view('errors/html/error_404',  $erro);
                    return;
                }

                $resultado = $this->ProdutoModel->Alterar($id, $produto);
            } else {
                $resultado = FALSE;
                $dados['msg'] = $carregar_imagem["resultado"];
            }

            if ($resultado) {
                redirect('admin/produto');
            } else {
                $this->load->view('admin/produtos/create',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        if (!Permissao()) return;
        $resultado = $this->ProdutoModel->Remover($id);
        if ($resultado) {
            redirect('admin/produto', 'refresh');
        } else {
        }
    }
}

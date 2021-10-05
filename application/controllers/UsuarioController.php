<?php
class UsuarioController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('UsuarioModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Index()
    { 
        if(!Permissao()) return;
        $dados['titulo'] = 'Usuários';
        $dados['sub_titulo'] = 'Listagem';
        $dados['usuarios'] = $this->UsuarioModel->ListarTodos();
        $this->load->view('admin/usuarios/index', $dados);
    }

    public function Details($id)
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Usuario';
        $dados['sub_titulo'] = 'Detalhes';
        $dados['usuario']  = $this->UsuarioModel->BuscarPorId($id);

        if ($dados['usuario'] == null) {
            $erro["heading"] = "Erro!";
            $erro["message"] = "Usuario não econtrada.";
            $this->load->view('errors/html/error_404',  $erro);
            return;
        }

        $this->load->view('admin/usuarios/details', $dados);
    }

    public function Create()
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Usuario';
        $dados['sub_titulo'] = 'Cadastrar';
        $dados['msg'] = '';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('senha_repetir', 'Repetir Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/usuarios/create', $dados);
        } else {
            $senha = $this->input->post('senha');
            $repetir = $this->input->post('senha_repetir');

            if ($this->VerificarSenha($senha, $repetir)) {
                $usuario = array(
                    "email" => $this->input->post('email'),
                    "nome" => $this->input->post('nome'),
                    "senha" => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
                );

                $verificar = $this->UsuarioModel->BuscarPorEmail($usuario["email"]);
                if ($verificar != null) $dados['msg'] .= '\\nEsse email já foi cadastrado.';

                $resultado = false;
            } else {
                $resultado = false;
                $dados['msg'] .= '\\nSenhas diferentes.';
            }

            if ($dados['msg'] = '')
                $resultado = $this->UsuarioModel->Inserir($usuario);

            if ($resultado) {
                redirect('usuario');
            } else {
                $this->load->view('admin/usuarios/create',  $dados);
            }
        }
    }

    private function VerificarSenha($senha, $repetir)
    {
        if(!Permissao()) return;
        if ($senha != $repetir) {
            return FALSE;
        }

        return TRUE;
    }
    public function Edit($id)
    {
        if(!Permissao()) return;
        $dados['titulo'] = 'Usuario';
        $dados['sub_titulo'] = 'Editar';
        $dados['msg'] = '';
        $dados['usuario']  = $this->UsuarioModel->BuscarPorId($id);

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha_antiga', 'Senha Antiga', 'required');
        $this->form_validation->set_rules('senha_nova', 'Senha Nova', 'required');
        $this->form_validation->set_rules('senha_nova_repetir', 'Repetir Nova Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/usuarios/edit', $dados);
        } else {
            $senha = $this->input->post('senha_nova');
            $repetir = $this->input->post('senha_nova_repetir');

            if ($this->VerificarSenha($senha, $repetir)) {
                $usuario = array(
                    "email" => $this->input->post('email'),
                    "nome" => $this->input->post('nome'),
                    "senha" => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
                );

                if ($dados['usuario'] == null || $id != $usuario["id"]) {
                    $erro["heading"] = "Erro!";
                    $erro["message"] = "Usuario não econtrado.";
                    $this->load->view('errors/html/error_404',  $erro);
                    return;
                }

                $verificar = $this->UsuarioModel->BuscarPorEmail($usuario["email"]);
                if ($verificar != null && $verificar != $id) $dados['msg'] .= '\\nEsse email já foi cadastrado.';
            } else {
                $resultado = false;
                $dados['msg'] .= '\\nSenhas diferentes.';
            }

            if ($dados['msg'] = '')
                $resultado = $this->UsuarioModel->Alterar($id, $usuario);

            if ($resultado) {
                redirect('usuario');
            } else {
                $this->load->view('admin/usuarios/create',  $dados);
            }
        }
    }

    public function Delete($id)
    {
        if(!Permissao()) return;
        $resultado = $this->UsuarioModel->Remover($id);
        if ($resultado) {
            redirect('usuario', 'refresh');
        } else {
        }
    }
}

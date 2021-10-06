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
        if (!Permissao()) return;
        $dados['titulo'] = 'Usuários';
        $dados['sub_titulo'] = 'Listagem';
        $dados['usuarios'] = $this->UsuarioModel->ListarTodos();
        $this->load->view('admin/usuarios/index', $dados);
    }

    public function Details($id)
    {
        if (!Permissao()) return;
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
        if (!Permissao()) return;
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

            if ($this->VerificarSenhaIgual($senha, $repetir)) {
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

            // if ($dados['msg'] = '')
            $resultado = $this->UsuarioModel->Inserir($usuario);

            if ($resultado) {
                redirect('admin/usuario');
            } else {
                $this->load->view('admin/usuarios/create',  $dados);
            }
        }
    }

    public function Edit($id)
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Usuario';
        $dados['sub_titulo'] = 'Editar';
        $dados['msg'] = '';
        $dados['usuario']  = $this->UsuarioModel->BuscarPorId($id);
        $resultado = false;

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/usuarios/edit', $dados);
        } else {

            $usuario = array(
                "id" => $this->input->post('id'),
                "email" => $this->input->post('email'),
                "nome" => $this->input->post('nome')
            );

            if ($dados['usuario'] == null || $id != $usuario["id"]) {
                $erro["heading"] = "Erro!";
                $erro["message"] = "Usuario não econtrado.";
                $this->load->view('errors/html/error_404',  $erro);
                return;
            }

            $verificar = $this->UsuarioModel->BuscarPorEmail($usuario["email"]);
            if ($verificar != null && $verificar->id != $id) $dados['msg'] .= "\n Esse email já foi cadastrado.";

            if ($dados['msg'] == '')
                $resultado = $this->UsuarioModel->Alterar($id, $usuario);

            if ($resultado) {
                redirect('admin/usuario');
            } else {
                $this->load->view('admin/usuarios/edit',  $dados);
            }
        }
    }

    public function EditPassword($id)
    {
        if (!Permissao()) return;
        $dados['titulo'] = 'Usuario';
        $dados['sub_titulo'] = 'Editar Senha';
        $dados['msg'] = '';
        $dados['usuario']  = $this->UsuarioModel->BuscarPorId($id);
        $resultado = false;

        $this->form_validation->set_rules('senha_antiga', 'Senha Antiga', 'required');
        $this->form_validation->set_rules('senha_nova', 'Senha Nova', 'required');
        $this->form_validation->set_rules('senha_repetir', 'Repetir Nova Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/usuarios/edit_password', $dados);
        } else {
            $usuario = array(
                "id" => $this->input->post('id')
            );

            $validarSenha = $this->ValidarEdicaoSenha($dados["usuario"]->email);

            if ($validarSenha["estado"] = 'editar') {
                $usuario["senha"] = password_hash($validarSenha["resultado"], PASSWORD_DEFAULT);
            } else if ($validarSenha["estado"] != TRUE) {
                $dados['msg'] .= "<p>" . $validarSenha["resultado"] . "</p>";
            }


            // if ($dados['msg'] = '')
            $resultado = $this->UsuarioModel->Alterar($id, $usuario);

            if ($resultado) {
                redirect('admin/usuario');
            } else {
                $this->load->view('admin/usuarios/edit_password',  $dados);
            }
        }
    }


    private function ValidarEdicaoSenha($email)
    {
        $antiga = $this->input->post('senha_antiga');
        $nova = $this->input->post('senha_nova');
        $repetir = $this->input->post('senha_nova_repetir');
        if (!empty($antiga)) {
            if (!$this->UsuarioModel->VerificarSenha($email, $antiga))
                return array("estado" => 'senha_antiga_invalida', "resultado" => 'Senha antiga inválida.');

            if (empty($nova))
                return  array("estado" => 'campo_vazio', "resultado" => 'Preencher senha nova.');

            if (empty($repetir))
                return array("estado" => 'campo_vazio', "resultado" => 'Preencher repetir senha.');

            if ($this->VerificarSenhaIgual($nova, $repetir)) {
                return array("estado" => 'editar', "resultado" => $nova);
            } else {
                return  array("estado" => 'senha_diferente', "resultado" => 'Repetir senha diferente da nova senha.');
            }
        }

        if (!empty($nova) || !empty($repetir)) {
            if (empty($antiga))
                return array("estado" => 'campo_vazio', "resultado" => 'Preencher senha antiga.');

            if (empty($nova))
                return  array("estado" => 'campo_vazio', "resultado" => 'Preencher senha nova.');
        }

        return  array("estado" => TRUE);
    }

    private function VerificarSenhaIgual($senha, $repetir)
    {
        if ($senha != $repetir) {
            return FALSE;
        }

        return TRUE;
    }

    public function Delete($id)
    {
        if (!Permissao()) return;
        $resultado = $this->UsuarioModel->Remover($id);
        if ($resultado) {
            redirect('admin/usuario', 'refresh');
        } else {
        }
    }
}

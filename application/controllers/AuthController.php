<?php
class AuthController extends CI_Controller
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
        $logado = $this->session->userdata('usuario_logado');
        if ($logado) IrParaPaginaAnterior();

        $this->load->view('admin/login');
    }

    public function Entrar()
    {
        $logado = $this->session->userdata('usuario_logado');
        if ($logado) IrParaPaginaAnterior();

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('amdin/login');
        } else {

            $email = $this->input->post('email');
            $senha = $this->input->post('senha');

            $resultado = $this->UsuarioModel->Entrar($email, $senha);
            
            if ($resultado) {
                $this->session->set_userdata('usuario_logado', $resultado);
                redirect('/');
            } else {
                // $this->mensagem->AddMensagemErro('O email ou senha incorrecta.');
                // $this->mensagem->MostrarMensagens();
                redirect('login');
            }
        }
    }

    public function Sair()
    {
        $this->session->unset_userdata('usuario_logado');
        $this->session->sess_destroy();
        redirect('/');
    }
}

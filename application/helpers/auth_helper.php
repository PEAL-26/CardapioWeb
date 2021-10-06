<?php

function Permissao()
{
    $ci = get_instance();
    $usuario_logado = $ci->session->userdata('usuario_logado');

    if ($usuario_logado) {
        GuardarPaginaActual();
        return true;
    } else {
        redirect('admin/entrar');
        //$erro["heading"] = "Acesso negado!";
        //$erro["message"] = "Contactar o administrador.";
        //$ci->load->view('errors/html/error_404',  $erro);
        return false;
    }
}

function GuardarPaginaActual()
{
    $ci = get_instance();
    $ci->session->set_userdata('referred_from', current_url());
}

function IrParaPaginaAnterior()
{
    $ci = get_instance();
    $referred_from = $ci->session->userdata('referred_from');
    redirect($referred_from, 'refresh');
}

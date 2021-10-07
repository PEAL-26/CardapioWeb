<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mensagem
{
    public $SucessoNoCadastro = 'Cadastro feito com sucesso!';
    public $SucessoNaAlteracao = 'Alteração feita com sucesso!';
    public $SucessoNaRemocao = 'Remoção feita com sucesso!';

    public $ErroNoCadastro = 'Erro ao cadastrar!';
    public $ErroNaAlteracao = 'Erro ao alterar!';
    public $ErroNaRemocao = 'Erro ao remover!';

    protected $CI;
    public $mensagens;
    public $contarMensagens = 0;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function AddMensagem($mensagem, $propriedade = '', $titulo = '', $tipo = '')
    {
        $this->contarMensagens++;

        $this->mensagens[$this->contarMensagens]['mensagem'] =  $mensagem;

        if (($propriedade != '') && ($propriedade != null) && strlen($propriedade) != 0) {
            $this->mensagens[$this->contarMensagens]['propriedade'] =  $propriedade;
        }

        if (($titulo != '') && ($titulo != null) && strlen($titulo) != 0) {
            $this->mensagens[$this->contarMensagens]['titulo'] = $titulo;
        }

        if (($tipo != '') &&  ($tipo != null) &&  strlen($tipo) != 0) {
            $this->mensagens[$this->contarMensagens]['tipo'] =  $tipo;
        }

        $this->_Unset();
        return  $this->mensagens;
    }

    public function AddMensagemSucesso($mensagem, $propriedade = '',  $titulo = 'Sucesso!')
    {
        return $this->AddMensagem($mensagem, $propriedade, $titulo, 'sucesso');
    }

    public function AddMensagemInfo($mensagem, $propriedade = '',  $titulo = 'Informação!')
    {
        return  $this->AddMensagem($mensagem, $propriedade, $titulo, 'info');
    }

    public function AddMensagemAviso($mensagem, $propriedade = '',  $titulo = 'Aviso!')
    {
        return  $this->AddMensagem($mensagem, $propriedade, $titulo, 'aviso');
    }

    public function AddMensagemErro($mensagem, $propriedade = '',  $titulo = 'Erro!')
    {
        return   $this->AddMensagem($mensagem, $propriedade, $titulo, 'erro');
    }

    public function MostrarMensagens($habilitar = true)
    {
        $mostrar = $habilitar && $this->contarMensagens > 0;
        if (!$mostrar) {
            $this->_Unset();
            return;
        }

        $msg = array();
        $titulo = array();
        $tipo = array();
        $contar = 0;

        foreach ($this->mensagens as $key => $value) {
            $contar++;
            $titulo[$contar] = isset($this->mensagens[$key]['titulo']) ? $this->mensagens[$key]['titulo'] : "";
            $tipo[$contar] = isset($this->mensagens[$key]['tipo']) ? $this->mensagens[$key]['tipo'] : "";
            if (isset($this->mensagens[$key]['propriedade'])) {
                $msg[$contar] = "<b>" . $this->mensagens[$key]['propriedade'] . '</b> ' .  $this->mensagens[$key]['mensagem'];
                continue;
            }

            $msg[$contar] = $this->mensagens[$key]['mensagem'];
        }

        $_msg = array(
            '_mensagens' =>  $msg,
            '_titulos' => $titulo,
            '_tipos' => $tipo,
            '_mostrar' =>  $mostrar
        );

        $this->CI->session->set_flashdata($_msg);
    }

    public function VisualizarMensagens()
    {
        $motrar = $this->CI->session->flashdata('_mostrar');

        if ($motrar) {
            $mensagens = $this->CI->session->flashdata('_mensagens');
            $titulo =  $this->CI->session->flashdata('_titulos');
            $tipo =  $this->CI->session->flashdata('_tipos');
           
            foreach ($mensagens as $key => $msg) {
                echo
                '<script type="text/javascript">',
                'Mensagem("' .  $mensagens[$key]  . '","' . $tipo[$key] . '");',
                '</script>';
            }
        }
    }

    public function _Unset()
    {
        unset(
            $_SESSION['_mensagens'],
            $_SESSION['_titulos'],
            $_SESSION['_tipos'],
            $_SESSION['_mostrar']
        );
    }

    public function Limpar()
    {
        $this->mensagens = array();
        $this->contarMensagens = 0;
        $this->_Unset();
    }
}

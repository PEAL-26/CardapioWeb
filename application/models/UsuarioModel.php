<?php
class UsuarioModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($usuario)
    {
        if ($this->ValidoParaInserir($usuario))
            $resultado = $this->db->insert('usuario',  $usuario);

        return isset($resultado);
    }

    private function ValidoParaInserir($dados)
    {
        if ($this->VerificarSeEmailExisteAoInserir($dados))
            $this->mensagem->AddMensagemErro('Esse email já existe.');

        return $this->mensagem->contarMensagens == 0;
    }

    private function VerificarSeEmailExisteAoInserir($dados)
    {
        $resultado = $this->BuscarPorEmail($dados['email']);
        return  $resultado != null;
    }

    public function Alterar($id, $usuario)
    {
        if ($this->ValidoParaAlterar($id, $usuario))
            $resultado = $this->db->update('usuario',  $usuario, array('id' => $id));

        return isset($resultado);
    }

    private function ValidoParaAlterar($id, $dados)
    {
        if ($this->VerificarSeEmailExisteAoAlterar($id, $dados))
            $this->mensagem->AddMensagemErro('Esse email já existe.');

        return $this->mensagem->contarMensagens == 0;
    }

    private function VerificarSeEmailExisteAoAlterar($id, $dados)
    {
        $resultado = $this->BuscarPorEmail($dados['email']);

        if (!isset($resultado->id)) return false;

        return  $resultado->id != $id;
    }

    public function Remover($id)
    {
        if (!$this->db->simple_query('DELETE FROM usuario WHERE id =' . $id)) {
            $this->mensagem->AddMensagemErro('Não foi possível remover esse usuário.');
            return false;
        }

        return true;
    }

    public function ListarTodos()
    {
        $this->db->select('id, nome, email');
        $this->db->from('usuario');
        $query = $this->db->get();
        return $query->result();
    }

    public function Listar($filtro)
    {
        $this->db->select('id, nome, email');
        $this->db->from('usuario');
        $this->db->like('email', $filtro, '', true);
        $this->db->or_like('nome',  $filtro, '', true);
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
        $this->db->select('id, nome, email');
        $this->db->from('usuario');
        $this->db->where('id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorEmail($email)
    {
        $this->db->select('id, nome, email');
        $this->db->from('usuario');
        $this->db->like('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    public  function VerificarSenha($email, $senha)
    {
        $sql = 'SELECT id, nome, email, senha 
        FROM usuario WHERE email ="' . $email . '"';

        $query = $this->db->query($sql);

        if ($this->db->count_all_results() == 1) {
            if (password_verify($senha,  $query->row()->senha)) {
                return true;
            }
        }

        return false;
    }

    public function Entrar($email, $senha)
    {
        $sql = 'SELECT id, nome, email, senha 
                FROM usuario WHERE email="' . $email . '"';

        $query = $this->db->query($sql);

        if ($this->db->count_all_results() == 1) {
            if (password_verify($senha,  $query->row()->senha)) {
                return array(
                    "id" =>  $query->row()->id,
                    "nome" =>  $query->row()->nome,
                    "email" =>  $query->row()->email
                );
            }
        }

        return false;
    }
}

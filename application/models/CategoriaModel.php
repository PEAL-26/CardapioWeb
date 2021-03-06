<?php
class CategoriaModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($categoria)
    {
        if ($this->ValidoParaInserir($categoria))
            $resultado = $this->db->insert('categoria',  $categoria);

        return isset($resultado);
    }

    private function ValidoParaInserir($dados)
    {
        if ($this->VerificarSeNomeExisteAoInserir($dados))
            $this->mensagem->AddMensagemErro('Esse nome já existe.');

        return $this->mensagem->contarMensagens == 0;
    }

    private function VerificarSeNomeExisteAoInserir($dados)
    {
        $resultado = $this->BuscarPorNome($dados['nome']);
        return  $resultado != null;
    }

    public function Alterar($id, $categoria)
    {
        if ($this->ValidoParaAlterar($id, $categoria))
            $resultado = $this->db->update('categoria',  $categoria, array('id' => $id));

        return isset($resultado);
    }

    private function ValidoParaAlterar($id, $dados)
    {
        if ($this->VerificarSeNomeExisteAoAlterar($id, $dados))
            $this->mensagem->AddMensagemErro('Esse nome já existe.');

        return $this->mensagem->contarMensagens == 0;
    }

    private function VerificarSeNomeExisteAoAlterar($id, $dados)
    {
        $resultado = $this->BuscarPorNome($dados['nome']);

        if (!isset($resultado->id)) return false;

        return  $resultado->id != $id;
    }

    public function Remover($id)
    {
        if (!$this->db->simple_query('DELETE FROM categoria WHERE id =' . $id)) {
            $this->mensagem->AddMensagemErro('Não foi possível remover esse item. Verifique se tem algum produto relacionado.');
            return false;
        }

        return true;
    }

    public function ListarTodos()
    {
        $this->db->select('c.id, c.nome, t.nome tipo, t.ordem');
        $this->db->from('categoria c');
        $this->db->join('tipo t','t.id = c.tipo_id', 'left');
        $this->db->order_by('t.ordem, c.nome');
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
    
        $this->db->select('c.id, c.nome, t.nome tipo, t.ordem');
        $this->db->from('categoria c');
        $this->db->join('tipo t','t.id = c.tipo_id', 'left');
        $this->db->where('c.id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorNome($nome)
    {      
        $this->db->select('c.id, c.nome, t.nome tipo, t.ordem');
        $this->db->from('categoria c');
        $this->db->join('tipo t','t.id = c.tipo_id', 'left');
        $this->db->like('c.nome', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

<?php
class ProdutoModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($produto)
    {
        $resultado = $this->db->insert('produto',  $produto);
        return isset($resultado);
    }

    public function Alterar($id, $produto)
    {
        $resultado = $this->db->update('produto',  $produto, array('id' => $id));
        return isset($resultado);
    }

    public function Remover($id)
    {
        if (!$this->db->simple_query('DELETE FROM produto WHERE id =' . $id)) {
            return false;
        }

        return true;
    }

    public function ListarTodos()
    {
        $this->db->select('id, nome, descricao, valor, imagem');
        $this->db->from('produto');
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
        $this->db->select('id, nome, descricao, valor, imagem');
        $this->db->from('produto');
        $this->db->where('id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorNome($nome)
    {
        $this->db->select('id, nome, descricao, valor, imagem');
        $this->db->from('produto');
        $this->db->like('nome LIKE ', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

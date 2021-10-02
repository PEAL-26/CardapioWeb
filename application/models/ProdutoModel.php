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
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('produto p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->order_by('c.Nome, p.nome');
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('produto p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->where('p.id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorNome($nome)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('produto p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->like('p.nome LIKE ', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

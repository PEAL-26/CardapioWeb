<?php
class CategoriaModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($categoria)
    {
        $resultado = $this->db->insert('categoria',  $categoria);
        return isset($resultado);
    }

    public function Alterar($id, $categoria)
    {
        $resultado = $this->db->update('categoria',  $categoria, array('id' => $id));
        return isset($resultado);
    }

    public function Remover($id)
    {
        if (!$this->db->simple_query('DELETE FROM categoria WHERE id =' . $id)) {
            return false;
        }

        return true;
    }

    public function ListarTodos()
    {
        $this->db->select('id, nome');
        $this->db->from('categoria');
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
        $this->db->select('id, nome');
        $this->db->from('categoria');
        $this->db->where('id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorNome($nome)
    {
        $this->db->select('id, nome');
        $this->db->from('categoria');
        $this->db->like('nome LIKE ', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

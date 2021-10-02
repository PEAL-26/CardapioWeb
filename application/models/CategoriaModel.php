<?php
class CategoriaModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($categoria)
    {
        $this->db->trans_begin();
       
        $resultado = $this->db->insert('categoria',  $categoria);
       
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Alterar($id, $categoria)
    {
        $this->db->trans_complete();

        $resultado = $this->db->update('categoria',  $categoria, array('id' => $id));
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
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
        $this->db->order_by('nome');
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

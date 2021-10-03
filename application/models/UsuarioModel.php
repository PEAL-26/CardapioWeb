<?php
class UsuarioModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($usuario)
    {
        $resultado = $this->db->insert('usuario',  $usuario);
        return isset($resultado);
    }

    public function Alterar($id, $usuario)
    {
        $resultado = $this->db->update('usuario',  $usuario, array('id' => $id));
        return isset($resultado);
    }

    public function Remover($id)
    {
        if (!$this->db->simple_query('DELETE FROM usuario WHERE id =' . $id)) {
            return false;
        }

        return true;
    }

    public function ListarTodos()
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('usuario p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->order_by('c.Nome, p.nome');
        $query = $this->db->get();
        return $query->result();
    }

    public function Listar($filtro)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('usuario p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->like('p.nome', $filtro, '', true);
        $this->db->or_like('c.nome',  $filtro, '', true);
        $this->db->or_like('p.descricao',  $filtro, '', true);
        $this->db->order_by('c.Nome, p.nome');
        $query = $this->db->get();
        return $query->result();
    }

    public function BuscarPorId($id)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('usuario p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->where('p.id =', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function BuscarPorNome($nome)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('usuario p ');
        $this->db->join('categoria c', 'c.id = p.categoria_id');
        $this->db->like('p.nome LIKE ', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

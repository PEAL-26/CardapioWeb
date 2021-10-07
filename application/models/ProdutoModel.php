<?php
class ProdutoModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Inserir($produto)
    {
        if ($this->ValidoParaInserir($produto))
            $resultado = $this->db->insert('produto',  $produto);

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

    public function Alterar($id, $produto)
    {
        if ($this->ValidoParaAlterar($id, $produto))
            $resultado = $this->db->update('produto',  $produto, array('id' => $id));

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
        if (!$this->db->simple_query('DELETE FROM produto WHERE id =' . $id)) {
            $this->mensagem->AddMensagemErro('Não foi possível remover esse item. Verifique se tem algum produto relacionado.');
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

    public function Listar($filtro)
    {
        $this->db->select('p.id, p.nome, c.nome categoria, p.descricao, p.valor, p.imagem');
        $this->db->from('produto p ');
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
        $this->db->like('p.nome', $nome);
        $query = $this->db->get();
        return $query->row();
    }
}

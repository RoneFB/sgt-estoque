<?php

class ModelProdutos extends CI_Model{
    public function listar(int $usuarioId){
        $this->db->where('usuario_id', $usuarioId);
        $produtos = $this->db->get("produtos")->result_array();
        return $produtos;
    }

    public function salvar($produto){
        $this->db->insert("produtos", $produto);
    }

    public function deletar($produtoId = null, $usuarioId = null){
        if(!empty($produtoId) || !empty($usuarioId)){
            if($produtoId)
                $this->db->where('id', $produtoId);
            if($usuarioId)
                $this->db->where('usuario_id', $usuarioId);

            $this->db->delete('produtos');
        }
    }

    public function atualizar($produto){
        $this->db->where('id', $produto->id);
        $this->db->set('nome', $produto->nome);
        $this->db->set('descricao', $produto->descricao);
        $this->db->set('valor', $produto->valor);
        $this->db->set('quantidade', $produto->quantidade);
        $this->db->update('produtos');
        if($this->db->trans_status()) return $this->db->trans_commit();
        else return $this->db->trans_rollback();
    }
}
<?php

class ModelUsuario extends CI_Model{
    public function listar(){
        return $this->db->get("usuarios")->result_array();
    }   
    public function logar($dados, $ishash = false){
        $senha = md5($dados->senha);
        $this->db->where("email", $dados->email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }

    public function findById($usuarioID){
        $this->db->where("id", $usuarioID);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }

    public function salvar($usuario){
        $usuario->senha = md5($usuario->senha);
        $this->db->insert("usuarios", $usuario);
        return $usuario;
    }

    public function deletar($usuarioId){
        
        $this->db->where('id', $usuarioId);
        $this->db->delete('usuarios');
    }
}
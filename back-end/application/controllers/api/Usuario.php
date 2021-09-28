<?php
require APPPATH . 'libraries/REST_Controller.php'; 
use Firebase\JWT\JWT;

class Usuario extends REST_Controller{


    public function __construct($config = 'rest') {

     
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->load->database();
        $this->load->model("ModelUsuario", "usuarios");
        $this->load->helper('request');
        
      }

	public function index_get()
	{
        $usuarios = $this->usuarios->listar();
        $this->response($usuarios, REST_Controller::HTTP_OK);
	}

    public function index_delete(int $usuarioId){
        $this->load->model("ModelProdutos", "produtos");
        $this->produtos->deletar(null, $usuarioId);
        $this->usuarios->deletar($usuarioId);
        $this->response(null, REST_Controller::HTTP_ACCEPTED);
    }

    public function login_post(){
        $dados = getRequestBody();
        $usuario =  $this->usuarios->logar($dados);
        if(!empty($usuario)){
            // $key = "example_key";
            // $payload = array(
            //     "iss" => "",
            //     "aud" => "",
            //     "iat" => 1356999524,
            //     "nbf" => 1357000000
            // );
            // $jwt = JWT::encode($payload, $key);
            
        }
        unset($usuario['SENHA']);
        $this->response($usuario, REST_Controller::HTTP_OK);
    }
    public function index_post(){
        $usuario = getRequestBody();
        $insert = $this->usuarios->salvar($usuario);
        $this->response($insert, REST_Controller::HTTP_OK);
    }
}

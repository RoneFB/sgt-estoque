<?php
require APPPATH . 'libraries/REST_Controller.php'; 

class Produto extends REST_Controller{


    public function __construct() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->database();
        $this->load->model("ModelProdutos", "produtos");
        $this->load->helper('request');
      }

	public function index_get(int $usuarioId)
	{
        $produtos = $this->produtos->listar($usuarioId);
        $this->response($produtos, REST_Controller::HTTP_OK);
	}

    public function index_delete(int $produtoID = null, int $usuarioId = null){
        $this->produtos->deletar($produtoID, $usuarioId);
        $this->response(null, REST_Controller::HTTP_ACCEPTED);
    }
    public function index_post(){
        $produto = current(getRequestBody());
        $produto->data_cadastro = date('Y-m-d H:m:s');
        if(isset($produto->id)){
            $this->produtos->atualizar($produto);
        }else{
            $this->produtos->salvar($produto);
        }
        $this->response($produto, REST_Controller::HTTP_OK);
    }
}

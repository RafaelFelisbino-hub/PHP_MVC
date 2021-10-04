<?php

namespace App\Http;

class Response{

    //Código do status http
    private $httpCode = 200;

    private $headers = [];

    private $contentType = 'text/html';

    //Conteúdo do response
    private $content;

    public function __construct($httpCode, $content, $contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    //Alterar o content type do response
    public function setContentType($contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type',$contentType);  
    }

    //Adicionar registro no header de response
    public function addHeader($key, $value){
        $this->headers[$key] = $value;
    }

    //Enviar headers para o navegador
    private function sendHeaders(){
        //Define o status de retorno
        http_response_code($this->httpCode);

        //Enviar headers
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }

    public function sendResponse(){
        $this->sendHeaders();
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                break;
        }
    }
}
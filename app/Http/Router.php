<?php

namespace App\Http;

use \Closure;
use \Exception;
use \ReflectionFunction;

class Router{

    //Raiz do projeto
    private $url = '';
        
    //O que é comum em todas as rotas
    private $prefix = '';

    //Índice de rotas
    private $routes = [];

    //Instância de request
    private $request;

    public function __construct($url){
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    //Definir o prefixo das rotas
    private function setPrefix(){
        //Informações da url atual
        $parseUrl = parse_url($this->url);
        
        //Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    //Adicionar rotas na classe
    private function addRoute($method, $route, $params =[]){
        //Validando parâmetros
        foreach ($params as $key => $value) {
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params['key']);
                continue;
            }
        }

        //Variáveis da rota
        $params['variables'] = [];

        //Padrão de validação das variáveis das rotas
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable,$route,$matches)){
            $route = preg_replace($patternVariable, '(.*?)',$route);
            $params['variables'] = $matches[1];
        }

        //Padrão de validação da url
        $patternRoute = '/^'.str_replace('/', '\/',$route).'$/';
        
        //Adicionar rota na classe
        $this->routes[$patternRoute][$method] = $params;
    }

    //Responsável por definir uma rota de get
    public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }

    //Responsável por definir uma rota post
    public function post($route, $params = []){
        return $this->addRoute('POST', $route, $params);
    }

    //Responsável por definir uma rota put
    public function put($route, $params = []){
        return $this->addRoute('PUT', $route, $params);
    }

    //Responsável por definir uma rota delete
    public function delete($route, $params = []){
        return $this->addRoute('DELETE', $route, $params);
    }

    //Retornar a uri sem prefixo
    private function getUri(){
        $uri = $this->request->getUri();
        
        //Separar uri do prefixo
        $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];
        
        return end($xUri);
    }

    //Retornar os dados da rota atual
    private function getRoute(){
        $uri = $this->getUri();

        //Método da requisição
        $httpMethod = $this->request->getHttpMethod();

        //Validar as rotas
        foreach ($this->routes as $patternRoute => $methods) {
            //Verifica se a uri bate com o padrão
            if(preg_match($patternRoute, $uri,$matches)){
                //Verifica o método
                if(isset($methods[$httpMethod])){
                    unset($matches[0]);

                    //Chaves - idPagina - acao
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys,$matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    //Retorna os parâmetros da rota
                    return $methods[$httpMethod];
                }
                
                throw new Exception("Método não permitido", 405);
                
            }
        }

        throw new Exception("URL não encontrada", 404);
        
    }

    //Executar a rota atual
    public function run(){
        try {
            //Obtém rota atual
            $route = $this->getRoute();
           
            //Verifica o controlador
            if(!isset($route['controller'])){
                throw new Exception("URL não pode ser processada", 500);
            }

            //Argumentos da função
            $args = [];

            //Instância de reflection
            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? ''; 
            }

            //Retorna a execução da função
            return call_user_func_array($route['controller'],$args);

        } catch (Exception $e) {
           return new Response($e->getCode(), $e->getMessage());
        }
    }
}
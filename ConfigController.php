<?php

namespace Core;

// A linha 'require' foi removida pois o Composer gerencia isso via PSR-4.

class ConfigController extends Config
{
    private ?string $url; // Usando ? para permitir nulo se necessário
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;
    private string $urlParameter;
    private string $classLoad;

    public function __construct()
    {
        $this->configAdm();
        $this->parseUrl();
        
        echo "Controller: {$this->urlController} <br>";
        echo "Metodo: {$this->urlMetodo} <br>";
        echo "Paramentro: {$this->urlParameter} <br>";
    }

    private function parseUrl()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

        if (empty($url)) {
            $this->urlController = CONTROLLERERRO;
            $this->urlMetodo = METODO;
            $this->urlParameter = "";
            return;
        }

        $this->urlArray = explode("/", $url);
        
        // Operador de Coalescência Nula (??) para simplificar
        $this->urlController = $this->urlArray[0] ?? CONTROLLER;
        $this->urlMetodo     = $this->urlArray[1] ?? METODO;
        $this->urlParameter  = $this->urlArray[2] ?? "";
    }

    public function loadPage()
    {
        echo "Carregar Pagina: {$this->urlController}<br>";

        // Converte a primeira letra em maiúscula (ex: login -> Login)
        $this->urlController = ucwords($this->urlController);
        echo "Carregar Pagina corrigida: {$this->urlController}<br>";

        $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        
        // Verifica se a classe existe antes de instanciar
        if (class_exists($this->classLoad)) {
            $classePage = new $this->classLoad();
            $classePage->{$this->urlMetodo}();
        } else {
            echo "Erro: A classe {$this->classLoad} não foi encontrada.";
            
             /*$login = new \App\adms\Controllers\Login();
        $login->index();

        $users = new \App\adms\Controllers\Users();
        $users->index();*/
        }
    }
}
<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        $baseFolder = '../app/controllers/';
        $subfolders = ['admin', 'petugas'];

        // 1. Cek apakah url[0] adalah folder (admin/petugas)
        if (isset($url[0]) && in_array($url[0], $subfolders)) {

            $folder = $url[0];
            unset($url[0]);

            $controllerName = isset($url[1]) ? ucfirst($url[1]) : ucfirst($folder);
            $controllerPath = "$baseFolder$folder/$controllerName.php";

            if (!isset($url[1])) {
                $controllerName = ucfirst($folder);
            } else {
                unset($url[1]);
            }

            if (!file_exists($controllerPath)) {
                $controllerName = ucfirst($folder);
                $controllerPath = "$baseFolder$folder/$controllerName.php";
            }

        } else {
            $controllerName = isset($url[0]) ? ucfirst($url[0]) : $this->controller;
            $controllerPath = $baseFolder . $controllerName . '.php';

            if (!file_exists($controllerPath)) {
                $controllerName = $this->controller;
                $controllerPath = $baseFolder . $controllerName . '.php';
            }

            unset($url[0]);
        }
        require_once $controllerPath;
        $this->controller = new $controllerName;

        // Method
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            unset($url[2]);
        } elseif (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Params
        $this->params = $url ? array_values($url) : [];

        // Execute
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}

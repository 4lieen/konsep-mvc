<?php

class App {

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // Cek apakah controller ada
        if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Load controller (Harus di dalam __construct())
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Cek method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Ambil parameter
        $this->params = !empty($url) ? array_values($url) : [];

        // Panggil controller dan method
        call_user_func_array([$this->controller, $this->method], $this->params);
    } // ✅ Pastikan __construct() ditutup dengan benar

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
?>

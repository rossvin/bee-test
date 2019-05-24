<?php
class Bootstrap {
   
    public function __construct() {
        Session::init();
        $configPHP   = 'config.php';

        file_exists($configPHP) ? require_once($configPHP) : [];
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url=str_replace('bee-tz/','',$url);
       $url = mb_strtolower(rtrim($url, '/'));

        $url = explode('/', $url);
        spl_autoload_register(function ($class) {
            include 'Models/'.$class .'.php';
        });
        if(empty($url[0])) {
            require 'Controllers/indexController.php';
            $controller = new Index();
            $controller->index();

            return false;
        }
        $file = 'Controllers/' . $url[0] . 'Controller' . '.php';
        if(file_exists($file)) {
            require $file;
        } else {
            require 'Controllers/errorController.php';
            $controller = new Error404();
            return false;
        }
        $controller_url=$url[0];
        $controller = new $controller_url();
        $method = $url[1];

            if (isset($url[2])) {
                $controller->$method($url[2]);
            } else {
                if (isset($url[1])) {
                    $controller->$method();
                }
            }


    }

}
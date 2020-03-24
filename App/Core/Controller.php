<?php

namespace App\Core;
use App\Designs\design;
use App\Models\DB;

class Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->DB = new DB;
        $this->db = new DB;
        $this->flash = new \Plasticbrain\FlashMessages\FlashMessages();
    }

    public function error404()
    {   
        $viewData['status'] = 404;
        $viewData['title'] = "Not Found";
        $viewData['msg'] = "Sorry but the page you are looking for does not exist, have been removed.";

        extract($viewData);
        include 'App/Views/error_404.php';
    }

    public function error500($pesan)
    {   
        $viewData['status'] = 500;
        $viewData['title'] = "Server Error";
        $viewData['msg'] = $pesan;

        extract($viewData);
        include 'App/Views/error_404.php';
    }

    public function Views($viewName)
    {   
        if (ENVIRONMENT !=  'production') {
            require 'vendor/autoload.php';
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $this->error500("There a something error, please turn on development mode to see  error message");
        }
        
        extract($viewData = []);
        include 'vendor/template.php';
    }

    public function loadView($viewName, $viewData = array())
    {   
        extract($viewData); 
        include 'App/Views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        include 'vendor/template.php';
    }
    public function loadViewInTemplate($viewName, $viewData)
    {   
        $flash = new \Plasticbrain\FlashMessages\FlashMessages();
        $design = new design();
        extract($viewData);
        include 'App/Views/' . $viewName . '.php';
    }

}


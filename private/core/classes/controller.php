<?php

abstract class Controller {

    private $route = [];

    private $args = 0;

    private $params = [];

    function __construct () {

        $this->route = explode('/', URI);

        $this->args = count($this->route);
        //print_r("count::") ;
        //print_r($this->route[1]) ;
        $this->router();

    }

    private function router () {
        
        if (class_exists($this->route[1])) {
            //print_r("if router");
            if ($this->args >= 3) {
                if (method_exists($this, $this->route[2])) {
                    $this->uriCaller(2, 3);
                } else {
                    $this->uriCaller(0, 2);
                }
            } else {
                $this->uriCaller(0, 2);
            }

        } else {
           // print_r("else router");
            if ($this->args >= 2) {
                if (method_exists($this, $this->route[1])) {
                    $this->uriCaller(1, 2);
                } else {
                    //echo "<pre>";
                    //print_r("else router final");
                    //echo "<pre>";
                    $this->uriCaller(0, 1);
                }
            } else {
                $this->uriCaller(0, 1);
            }

        }

    }

    private function uriCaller ($method, $param) {
       //print_r($method);
       //print_r($param);

        for ($i = $param; $i < $this->args; $i++) {
            //print_r($this->route[$i]);
            $this->params[$i] = $this->route[$i];
        }

        if ($method == 0)
            call_user_func_array(array($this, 'Index'), $this->params);
        else
            call_user_func_array(array($this, $this->route[$method]), $this->params);

    }

    abstract function Index ();

    function model ($path) {
        // $path = $path;

        $class = explode('/', $path);
        $class = $class[count($class)-1];

        $path = strtolower($path);

        require(ROOT . "/private/app/models/$path.php");

        $this->$class = new $class;
    }

    function view ($path, $data = []) {

        require(ROOT . "/private/app/views/$path.php");

    }
}

?>
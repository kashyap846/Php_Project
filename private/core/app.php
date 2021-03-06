<?php

    class App {

        private $config = [];

        public $db;

        function __construct () {

            define("URI", $_SERVER['REQUEST_URI']);
            define("ROOT", $_SERVER['DOCUMENT_ROOT']);
           // print_r("2");

        }

        function configure() {
            require(ROOT . "/private/core/config/database.php");

            if (isset($this->config["database"])) {
                try {
                    $this->db = new PDO($this->config["database"]["driver"] .
                        ":host=" . $this->config["database"]["dbhost"] .
                        ";dbname=" . $this->config["database"]["dbname"]
                        , $this->config["database"]["username"]
                        , $this->config["database"]["password"]);
                } catch(PDOException $ex) {
                    echo($ex->getMessage);
                }
            }
        }

        function load () {
            spl_autoload_register(function ($class) {
                //print_r("spl_autoload_register");
                //print_r($class);
                $class = strtolower($class);
                if (file_exists(ROOT . "/private/core/classes/$class.php")) {

                    require_once(ROOT . "/private/core/classes/$class.php");

                } else if (file_exists(ROOT . "/private/core/helpers/$class.php")) {

                    require_once(ROOT . "/private/core/helpers/$class.php");

                }

            });
            
        }

        function require ($path) {

            require (ROOT . $path);

        }

        function start () {
            session_start();
            $route = explode('/', URI);
            //print_r($route[1] );
            
            $route[1] = strtolower($route[1]);
            //print_r("start::" . $route[1] . "<br>");
            if (file_exists(ROOT . "/private/app/controllers/" . $route[1] . ".php")) {
                $this->require("/private/app/controllers/" . $route[1] . ".php");
                //print_r("Appp::if " . $route[1] . "<br>");
                $controller = new $route[1]();
            } else {
                $this->require("/private/app/controllers/main.php");
                //print_r("Appp::else");
                $main = new Main();
            }
        }
        
    }

?>
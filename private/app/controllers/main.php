<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * http://localhost/
     */
    function Index () {
        //print_r("Index");

        $this->view("template/header");
        $this->view("main/index");
        $this->view("template/footer");
        
    }

    function Other () {
        //print_r("Other");
        $this->view("template/header");
        $this->view("main/other");
        echo("<br><br><br>hello there");
        $this->view("template/footer");
        
    }

    function Languages () {
        //print_r("Language");
        $this->view("template/header");
        $this->view("template/language");
        $this->view("template/footer");
        
    }
    function Colours () {
        //print_r("Language");
        $this->view("template/header");
        $this->view("template/color");
        $this->view("template/footer");
        
    }

    

}

?>
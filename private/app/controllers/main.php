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
        setcookie("1_Jar","2020-30-03");
        // echo($_COOKIE["1_Jar"]);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            echo($_POST["username"] . "<br>");
            echo($_POST["pass"] . "<br>");
            $_SESSION["username"] = $_POST["username"];

        }

        if(isset($_SESSION["username"])){
            echo("Logged in as" . $_POST["username"]);
        }
        $this->view("template/header");
        $this->view("main/form");
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

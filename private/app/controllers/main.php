<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * http://localhost/
     */
    function Index () {
        $CSRF_Token = rand(1000, 100000);
        setcookie('CSRF_Token',$CSRF_Token);
        $_SESSION["CSRF_Token"] = $CSRF_Token;
        //print_r("Index");
        setcookie("1_Jar","2020-30-03");
        // echo($_COOKIE["1_Jar"]);
        $safe = false;
        if($_SESSION["CSRF_Token"] == $_COOKIE["CSRF_Token"] &&
        $_SESSION["CSRF_Token"] == $_POST["CSRF_Token"]){
            $safe = true;
        } 

        if($_SERVER["REQUEST_METHOD"]=="POST" && $safe == true){
            echo($_POST["username"] . "<br>");
            echo($_POST["pass"] . "<br>");
            $_SESSION["username"] = $_POST["username"];

        }else{
            echo("session end");
            session_destroy();

        }
        
        
        if(isset($_SESSION["username"])){
            echo("Logged in as" . $_POST["username"]);
        }
        
        //$this->view("template/header");

        $this->view("main/form", array("CSRF_Token" => $CSRF_Token));
        //$this->view("template/footer");
        
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

<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");

        $is_authenticated = isset($_SESSION["username"]);
        if($is_authenticated){
            $this->view("test/authenticated");
        }else{
            $this->view("test/noauthenticated");
        }
        
        $this->view("template/footer");
    } 

    function Login(){
        if($_SERVER["request_method"] == "POST"){
           // print_r("if");
            $this->model("AuthorsModel");
            $clean_username = htmlentities($_POST["username"]);
        $clean_password = htmlentities($_POST["password"]);
        $authenticate = $this->AuthorsModel->authenticateUser($clean_username,$clean_password);
        if($authenticate){
            //header("location: /user/");
            
            header("location: /user/");
        }else{
            echo("No authenticated");
        }
    }else{
       // print_r("else");
        $this->view("test/login");
    }
        
    }
    function Logout(){
        session_unset();
        session_destroy();
        $_SESSION = Array();
        header("location: /user/");
    }

}

?>
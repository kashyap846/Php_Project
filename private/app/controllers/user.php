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
        if($_SERVER["request_method"] = "POST"){
            $this->model("AuthorsModel");
        $authenticate = $this->AuthorsModel->authenticateUser("kashyap846@gmail.com","1234");
        if($authenticate){
            //header("location: /user/");
            
            echo("authenticate");
        }else{
            echo("No authenticated");
        }
    }else{
        $this->view("test/login")
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
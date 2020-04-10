<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");
        $this->view("test/test");
        $this->view("template/footer");
    } 

    function Login(){
        $this->model("AuthorsModel");
        $authenticate = $this->AuthorsModel->authenticateUser("kashyap846@gmail.com","1234");
        if($authenticate){
            //header("location: /user/");
            echo("authenticate");
        }else{
            echo("No authenticated");
        }
    }
    function Logout(){
        session_unset();
        session_destroy();
        $_SESSION = Array();
    }

}

?>
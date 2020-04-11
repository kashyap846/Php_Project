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
        echo("login");
        //echo($_SERVER["request_method"]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           print_r("POST");
           $post_csrf = htmlentities($_POST["csrf"]);
           $cookie_csrf = $_COOKIE["csrf"];
           $sess_cookie = $_SESSION["csrf"];

           if($sess_cookie == $post_csrf && $sess_cookie == $cookie_csrf){

           


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
        echo("bad csrf");
    }
    // }else if($_SERVER["request_method"] == "GET"){
    //    // print_r("else");
    //    $csrf = random_int(10000,100000000);
    //    //echo($csrf);
    //    $_SESSION["csrf"] = $csrf;
    //     //$_COOKIE["csrf"] = $csrf;
    //     setcookie("csrf",$csrf);
    //     $this->view("test/login" , array("csrf" => $csrf));
    // 
}else{
        //http_response_code(405);
           $csrf = random_int(10000,100000000);
       echo("get");
       $_SESSION["csrf"] = $csrf;
        //$_COOKIE["csrf"] = $csrf;
        setcookie("csrf",$csrf);
        $this->view("test/login" , array("csrf" => $csrf));
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
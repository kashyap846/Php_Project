<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    private function getRefererDetails(){
        $completeUrl = $_SERVER['HTTP_REFERER'];
        $url_split = explode("/", $_SERVER['HTTP_REFERER']);
        $count = count($url_split);
        $splits = array();
        for($i = 3;$i < $count; $i++){
            $splits[$i-3] = $url_split[$i];
        }
        //echo($_SESSION["username"]);
        // echo($count . "<br><br>");
        // print_r($url_split);
       // echo(join("/",$splits));
        return join("/",$splits) . "/";
    }

    function Index () {
        $this->view("template/header");
        echo($this->getRefererDetails());
        $is_authenticated = isset($_SESSION["username"]);
        if($is_authenticated){
            $this->view("test/authenticated");
        }else{
            $this->view("test/noauthenticated");
        }
        
        $this->view("template/footer");
    } 

    function Login(){
        //echo("login");
        //echo($_SERVER["request_method"]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           //print_r("POST");
           $post_csrf = htmlentities($_POST["csrf"]);
           $cookie_csrf = $_COOKIE["csrf"];
           $sess_cookie = $_SESSION["csrf"];
        //echo("sess_cookie::$sess_cookie");
        //echo("cookie_csrf::$cookie_csrf");
        //echo("post_csrf::$post_csrf");
           //if($sess_cookie == $post_csrf && $sess_cookie == $cookie_csrf){
            $this->model("AuthorsModel");
            $clean_username = htmlentities($_POST["username"]);
        $clean_password = htmlentities($_POST["password"]);
        $authenticate = $this->AuthorsModel->authenticateUser($clean_username,$clean_password);
        //echo("controller authenticate" . $authenticate);
        if($authenticate){
            //header("location: /user/");
            
            header("location: /user/");
        }else{
          
            echo("No authenticated");
        //}
    // }else{
    //     echo("bad csrf");
    }
    }else if($_SERVER["REQUEST_METHOD"] == "GET"){
       $csrf = random_int(10000,100000000);
       //session_start();
       $_SESSION["csrf"] = $csrf;
        setcookie("csrf",$csrf);
        
        echo("sess cookie::" . $_SESSION["csrf"]);
        $this->view("test/login" , array("csrf" => $csrf));
    
}else{
        http_response_code(405);
           
    }
        
    }
    function Logout(){
        session_unset();
        session_destroy();
        $_SESSION = Array();
        // header("location: /user/");
        $this->view("test/logout");
    }

}

?>
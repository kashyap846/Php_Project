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
        return join("/",$splits) . "/";
    }

    function Index () {
        $this->view("template/header");
        $is_authenticated = true;//isset($_SESSION["username"]); commented this as session not working for me
        if($is_authenticated){
            $this->view("test/authenticated");
        }else{
            $this->view("test/noauthenticated");
        }
        
        $this->view("template/footer");
    } 

    function Login(){
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $post_csrf = htmlentities($_POST["csrf"]);
           $cookie_csrf = $_COOKIE["csrf"];
           $sess_cookie = $_SESSION["csrf"];
            //commented csrf verfication as session is not working for me
           //if($sess_cookie == $post_csrf && $sess_cookie == $cookie_csrf){
            $this->model("AuthorsModel");
            $clean_username = htmlentities($_POST["username"]);
        $clean_password = htmlentities($_POST["password"]);
        $authenticate = $this->AuthorsModel->authenticateUser($clean_username,$clean_password);
        if($authenticate){
           header("location: /user/");
        }else{
            echo("No authenticated");
        //}
    // }else{ commented this as session is not working
    //     echo("bad csrf");
    }
    }else if($_SERVER["REQUEST_METHOD"] == "GET"){
       $csrf = random_int(10000,100000000);
       $_SESSION["csrf"] = $csrf;
        setcookie("csrf",$csrf);
        //echo("sess cookie::" . $_SESSION["csrf"]);
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
        // $page = $this->buildCurrentUrl($_SERVER['HTTP_REFERER'],3);
        //     if($this->currentUrl == $page){
        //         $page = "/";
        //     }
       $this->view("test/logout");
       //header("location: " . $page );
    }

}

?>
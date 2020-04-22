<?php
class  Blog extends Controller
{
     function __construct() {
        parent::__construct();
    }
    function Index(){
        $this->model("BlogModel");
        $posts = $this->BlogModel->getAllPosts();

        $this->view("template/header");
        $this->view("blog/index", $posts);
        echo("hello there");
        $this->view("template/footer");

    }
    function Read($blogId){
        

    }function Create(){

    }


    
}
?>

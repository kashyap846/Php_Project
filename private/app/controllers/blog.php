<?php
class  Blog extends Controller
{
     function __construct() {
        parent::__construct();
    }
    function Index(){
        $this->model("BlogModel");
        $posts = $this->BlogModel->getAllPosts();
        $input = Array("posts" => $posts);

        $this->view("template/header");
        $this->view("blog/index", $input);
        $this->view("template/footer");

    }
    function Read($postId){
        $this->model("BlogModel");
       $post = $this->BlogModel->getPostById($postId);
       $this->view("blog/header", $post);
        $this->view("blog/post", $post);
        
        $this->view("template/footer");
        

    }
    function Create()
    {
        //echo("username::" . $_SESSION["username"]);
        $is_auth = isset($_SESSION["username"]);
        //commenting this part as session is not working for me
        //  if(!$is_auth){
        //      header("location: /blog");
        //      return;
        // }

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $title = $_POST["title"];
            $content = $_POST["content"];
            $author = $_POST["author"];
            $this -> model("BlogModel");
            $slug = $this -> BlogModel -> createPost($title, $author, $content);
          
          header("location: /blog/read/" . $slug);


        }else{

        $this->view("template/header");
        $this->view("blog/create");
        $this->view("template/footer");

        

        }
    }

    function Update($postId){
    echo("postId::" . $postId);
    $is_auth = isset($_SESSION["username"]);
    //commenting this part as session is not working for me
        //  if(!$is_auth){
        //      header("location: /blog");
        //      return;
        // }
    }


    
}
?>

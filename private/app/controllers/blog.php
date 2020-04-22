class  Blog extends Controller
{
     function __construct() {
        parent::__construct();
    }
    function Index(){
        $this->model("BlogModel");
        $posts=$this->BlogModel->getAllPosts();

        $this->view("template/header");
        $this->view("main/index", $posts);
        echo("<br><br><br>hello there");
        $this->view("template/footer");

    }
    function Read($blogId){
        

    }function Create(){

    }


    
}

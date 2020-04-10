<?php

class AuthorsModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");
        $this->view("test/test");
        $this->view("template/footer");
    } 

}

?>
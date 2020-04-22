<?php

class BlogModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function getAllPosts(){
        $sql= "SELECT slug, title, author, post_date FROM posts";
        $stmt= $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
}
}

?>
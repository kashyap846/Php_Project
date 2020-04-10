<?php

class AuthorsModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function authenticateUser($username,$password){
        $clean_username = htmlentities($username);
        $clean_password = htmlentities($password);
        $sql = "SELECT `hash_password`, `first_name`, `last_name` from authors where email= ?";
        $stmt = $this->db->prepare($sql);
        $count = $stmt->execute(Array($clean_username));
        $row = $stmt->fetch();
        $hash_password = $row[0];
        if(isset($hash_password)){
            $is_authenticated = password_verify($clean_password,$hash_password);
            if($is_authenticated){
                $_SESSION["first_name"] = $row[1];
                $_SESSION["last_name"] = $row[2];
                $_SESSION_["username"] = $clean_username;
            }
    } 

}
}

?>
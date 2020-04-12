<?php

class AuthorsModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function authenticateUser($username,$password){
        $clean_username = $username;
        $clean_password = $password;
        $sql = "SELECT `hash_password`, `first_name`, `last_name` from authors where email= ?";
        $stmt = $this->db->prepare($sql);
        $count = $stmt->execute(Array($clean_username));
        $row = $stmt->fetch();
        $hash_password = $row[0];
        //echo("hash_password" . $hash_password);
        $is_authenticated = false;
        if(isset($hash_password)){
            $is_authenticated = password_verify($clean_password,$hash_password);
            //echo("is_authenticated" . $is_authenticated);
            if($is_authenticated){
                //session_start();
                $_SESSION["first_name"] = $row[1];
                $_SESSION["last_name"] = $row[2];
                $_SESSION["username"] = $clean_username;

                $update_sql = "UPDATE `authors` set `last_login_date` = CURRENT_TIMESTAMP() where email = ?";
                $update_stmt = $this->db->prepare($update_sql);
                $update_stmt->execute(Array($clean_username));
             return 1;
            }
    } 
    return 0;

}
}

?>
<?php

class Installer{

private $config = [];

public $db;

function configure(){
    require "private/core/config/database.php";
}

function install(){

    if(isset($this->config["database"])){
        try{
            echo("if");
            $dsn = $this->config["database"]["driver"] . ":" .
            "host=" . $this->config["database"]["dbhost"] .
            ":dbname=" . $this->config["database"]["dbname"];
            echo("before execute222");
            $this->db = new PDO(
                $dsn
                , $this->config["database"]["username"]
                , $this->config["database"]["password"]
            );
            echo("before execute111");
            $sql = file_get_contents("setup/data/init.sql");
            echo("before execute");
            $this->db->exec($sql);

            echo "Databse setup successfully. \n";
        }catch(PDOException $ex){
                echo($ex->getMessage());
            }

    }
}

}
echo("HI");
$installer = new Installer();
$installer->configure();
$installer->install();

?>
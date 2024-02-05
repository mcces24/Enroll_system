<?php
Class Connection{
  
    private $server = "mysql:host=localhost;dbname=u524183941_mcc_es";
    private $username = "u524183941_mcces";
    private $password = "MccAdmin1";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;
     
    public function open(){
        try{
            $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conn;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
  
    }
  
    public function close(){
        $this->conn = null;
    }
  
}
?>

<?php

$conn = new PDO('mysql:host=localhost; dbname=u524183941_mcc_es','u524183941_mcces', 'MccAdmin1'); 

$server = "localhost";
$username = "u524183941_mcces";
$password = "MccAdmin1";
$database = "u524183941_mcc_es";
$connection = mysqli_connect("$server","$username","$password");
$select_db = mysqli_select_db($connection, $database);
if(!$select_db)
{
    echo("connection terminated");
}
?>
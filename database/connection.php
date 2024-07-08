<?php
include '../env.php';
Class Connection{
    
    private $server = "mysql:host=localhost;dbname=u510162695_mcc_es";
    private $username = "u510162695_mcces";
    private $password = "McAdmin1";
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

$conn = new PDO('mysql:host=' . $host . '; dbname=' .$db_name . '',' ' . $username . '', '' . $password . ''); 

$connection = mysqli_connect("$host","$username","$password");
$select_db = mysqli_select_db($connection, $db_name);
if(!$select_db)
{
    echo("connection terminated");
}
?>
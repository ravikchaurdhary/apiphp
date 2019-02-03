<?php
 
class DbOperation
{
    private $conn;
    public $id;
 
    //Constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    //Function to create a new user
    public function createTeam($first_name,$last_name,$email,$password,$gender)
    {
    
       $stmt = $this->conn->prepare("SELECT count(*) FROM team WHERE name ='daaaa'"); 
       echo "count is:".$stmt;
      if($stmt < 0){
        $stmt = $this->conn->prepare("INSERT INTO team(first_name,last_name,email,password,gender) values(?, ?,?,?,?)");
        $stmt->bind_param("sssss", $first_name, $last_name,$email,$password,$gender);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
                       $query = $this->conn->query("SELECT id FROM team ORDER by id DESC LIMIT 1");
         while($row = $query->fetch_assoc())  
          {
                 $id = $row['id'];
                 echo "Team added successfully id:".$id;
                 return $id;
          }   
                 return true;
        }
        else {
            return false;
        }
}
else{
     echo "Sorry ! This email already exist";
     return false;
}



    }
 
}
?>
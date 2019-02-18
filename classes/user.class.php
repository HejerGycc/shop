<?php
class User 
{
    //databse connection and table
    private $conn;
    private $table_name="users";

    //object properties
    public $id;
    public $firstname;
    public $lastname;
    public $adress;
    public $email;
    public $pwd;
    public $role;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){

        //write query
        $query = " INSERT INTO
        " . $this->table_name . "
        SET
           firstname=:firstname, 
           lastname=:lastname, 
           adress=:adress, 
           email=:email, 
           pwd=:pwd, 
           role=:role";
        $stmt = $this->conn->prepare($query);

        //posted values
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->adress = htmlspecialchars(strip_tags($this->adress));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->pwd = htmlspecialchars(strip_tags($this->pwd));
        $this->role = htmlspecialchars(strip_tags($this->role));
        
        //bind values
        $stmt->bindParam(":firstname",$this->firstname);
        $stmt->bindParam(":lastname",$this->lastname);
        $stmt->bindParam(":adress",$this->adress);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":pwd",$this->pwd);
        $stmt->bindParam(":role",$this->role);

        if ($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    function readAll($from_record_num, $records_per_page){
 
        $query = "SELECT *
                FROM
                    " . $this->table_name . "
                ORDER BY
                    firstname ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
    
    // used for paging products
    public function countAll(){
    
        $query = "SELECT id FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    
        $num = $stmt->rowCount();
    
        return $num;
    }

    function readOne(){
 
        $query = "SELECT *
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->adress = $row['adress'];
        $this->email = $row['email'];
        $this->pwd = $row['pwd'];
        $this->role = $row['role'];
    }

    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    firstname = :firstname,
                    lastname = :lastname,
                    adress = :adress,
                    email = :email,
                    pwd = :pwd,
                    role = :role,
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->adress=htmlspecialchars(strip_tags($this->adress));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->pwd=htmlspecialchars(strip_tags($this->pwd));
        $this->role=htmlspecialchars(strip_tags($this->role));
     
        // bind parameters
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':adress', $this->adress);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':pwd', $this->pwd);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }

}

?>
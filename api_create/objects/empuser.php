<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "emp";
 
    // object properties
    public $id;
    public $fullname;
    public $phone;
    public $emailaddress;
    public $dob;
    public $city;
    public $state;
    public $pincode;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create() method will be here
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                fullname = :fullname,
                phone = :phone,
                emailaddress = :emailaddress,
                dob = :dob,
                city = :city,
                state = :state,
                pincode = :pincode";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->fullname=htmlspecialchars(strip_tags($this->fullname));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->emailaddress=htmlspecialchars(strip_tags($this->emailaddress));
    $this->dob=htmlspecialchars(strip_tags($this->dob));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->state=htmlspecialchars(strip_tags($this->state));
    $this->pincode=htmlspecialchars(strip_tags($this->pincode));
 
    // bind the values
    $stmt->bindParam(':fullname', $this->fullname);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':emailaddress', $this->emailaddress);
    $stmt->bindParam(':dob', $this->dob);
    $stmt->bindParam(':city', $this->city);
    $stmt->bindParam(':state', $this->state);
    $stmt->bindParam(':pincode', $this->pincode);
 
    // hash the password before saving to database
    // $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    // $stmt->bindParam(':password', $password_hash);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 
// emailExists() method will be here
}
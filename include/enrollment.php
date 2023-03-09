<?php

class Enrollment{
    private $conn;
    private $table;

    //FIELDS
    public $fullname;
    public $email;
    public $password;
    public $cv;
    public $type;
    public $duration;
    public $start_date;
    public $end_date;
    public $location;
    public $specialty;


    public function __construct($dbconnection){
        $this->conn= $dbconnection;
    }

    //CREATE A USER
    public  function create(){
        $this->fullname         = htmlspecialchars(strip_tags(trim($this->fullname)));
        $this->email            = htmlspecialchars(strip_tags(trim($this->email)));
        $this->password         = htmlspecialchars(strip_tags(trim($this->password)));
        $this->type             = htmlspecialchars(strip_tags(trim($this->type)));
        $this->duration         = htmlspecialchars(strip_tags(trim($this->duration)));
        $this->start_date       = htmlspecialchars(strip_tags(trim($this->start_date)));
        $this->end_date         = htmlspecialchars(strip_tags(trim($this->end_date)));
        $this->location = htmlspecialchars(strip_tags(trim($this->location)));
        $this->specialty        = htmlspecialchars(strip_tags(trim($this->specialty)));

        $sql = "INSERT INTO ".$this->table."(fullname,email,password,type,duration,start_date, end_date,cv, location,specialty) VALUES(?,?,?,?,?,?,?,?,?,?)";

        $stmt= $this->conn->prepare($sql);

        $stmt->bindParam(1,$this->fullname);
        $stmt->bindParam(2,$this->email);
        $stmt->bindParam(3,$this->password);
        $stmt->bindParam(4,$this->type);
        $stmt->bindParam(5,$this->duration);
        $stmt->bindParam(6,$this->start_date);
        $stmt->bindParam(7,$this->end_date);
        $stmt->bindParam(8,$this->cv);
        $stmt->bindParam(9,$this->location);
        $stmt->bindParam(10,$this->specialty);

        if($stmt->execute()){
            $this->notification(200,"ENROLLED");
        }
        return  $this->notification(402,"ENROLLMENT FAIL");
    }

    // READ ALL ENROLLED USER
    public function read(){
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    // READ A SINGLE USER
    public function read_single(){
        $this->email  = htmlspecialchars(strip_tags(trim($this->email)));

        $sql = "SELECT * FROM ".$this->table. " where email='$this->email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function delete_single(){

        $this->email  = htmlspecialchars(strip_tags(trim($this->email)));

        $sql = "DELETE FROM ".$this->table. " where email='$this->email'";
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            $this->notification(200,"DELETED");
        }
        return  $this->notification(402,"NOT DELETED");
       
    }

    public function delete(){

        $sql = "DELETE FROM ".$this->table;
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            $this->notification(200,"DELETED");
        }
        return  $this->notification(402,"NOT DELETED");

    }

    // THIS IS TO BE PROGRAM
    public function update(){

    }

    // NOTIFICATION
    public function notification($code, $message){
        echo json_encode(["code"=>$code,"message"=>$message]);
    }


}

?>
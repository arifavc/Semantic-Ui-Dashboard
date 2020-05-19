<?php

class Database{

    public $connect;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "academia";

    function __construct(){
        $this->db_connect();
    }


    public function db_connect(){
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
            }
    }

    
    public function table_data(){
        $stmt = $this->connect->query('SELECT * FROM customers');
        while($row = $stmt->fetch()) {
            echo '
                <tr data-customer-id='.$row->id.'>
                    <td>'.$row->name .' '. $row->surname.'</td>
                    <td>'.$row->phone.'</td>
                    <td>'.$row->tcno.'</td>
                    <td>'.$row->apartment.'</td>
                    <td>'.$row->contract_time.'</td>
                    <td>'.$row->amount.'₺</td>
                  </tr>
            ';
        }


    }


    // public function fetch_table_data(){
    //     $stmt = $this->connect->query('SELECT * FROM customers');
    //     return $stmt;
    // }

}


?>


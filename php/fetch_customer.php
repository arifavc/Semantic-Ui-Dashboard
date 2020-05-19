<?php

include 'db.php';
$db = new Database();


$id = $_POST['id'];

        try {
            $sql = "SELECT * FROM customers WHERE id = '{$id}'";
            $stmt = $db->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            echo json_encode($result,JSON_UNESCAPED_UNICODE); // -> utf-8
            
            
        }catch (Exception $error) {
            print_r($error->getMessage());
        }
?>
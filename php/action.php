<?php

include 'db.php';
$db = new Database();



// İnsert
$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['telno'];
$tcno = $_POST['tcno'];
$apartment = $_POST['apartment'];
$amount = $_POST['amount'];

try {
    $sql = "INSERT INTO customers (name, surname, phone, tcno, apartment, amount) 
    VALUES ('{$name}', '{$surname}', '{$phone}','{$tcno}','{$apartment}','{$amount}')";
    $db->connect->exec($sql);
    
} catch (Exception $error) {
    print_r($error->getMessage());
}
    
 ?>

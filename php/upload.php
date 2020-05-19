<?php


if($_FILES['file']['name'] != ''){
    include 'db.php';
    $db = new Database();
    $sql = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";
    $stmt = $db->connect->query($sql);
    $user = $stmt->fetch();
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);
    $img_id = $user->id;
    $name = $img_id . '.' . $extension;
    $location = '../images/upload/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $sql = "UPDATE customers SET image='{$name}' WHERE id='{$img_id}'";
    $stmt= $db->connect->prepare($sql);
    $stmt->execute();
    echo $name;

}

?>
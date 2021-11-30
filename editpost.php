<?php
include "connection_database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $path=$_POST['beforeImage'];
    $del=$_POST['delImage'];
    $image=$_POST['image'];
    if(!empty($_FILES["image"])) {
        $directory = "/images/";
        $extent = pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION);
        $path= uniqid() . ".{$extent}";
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] .  $directory . $path);
        if(!empty($del))
        {
            unlink($_SERVER['DOCUMENT_ROOT'] . $directory . $del);
        }
    }
    $query = "UPDATE `news` SET `name` = :name, `description` = :description , `image` = :image WHERE `id` = :id";
    $params = [
        ':id' => $id,
        ':name' => $name,
        ':description'=>$description,
        ':image'=>$path
    ];
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
}
?>
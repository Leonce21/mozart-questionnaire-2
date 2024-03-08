<?php
session_start();


try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// delete record
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM teacherrecruitement wHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result)
    {
        $_SESSION['verify'] = "record deleted successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../../teacher-recruitement.php');
    }else{
        $_SESSION['verify'] = "Error in deleting the record";
        $_SESSION['verify_message'] = "error";
        header('location:../../teacher-recruitement.php');
    }
}

?>
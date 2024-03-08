<?php
session_start();


try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

//delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM serviceguide wHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result)
    {
        $_SESSION['verify'] = "record deleted successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../../questionnaire.php');
    }else{
        $_SESSION['verify'] = "Error in deleting the record";
        $_SESSION['verify_message'] = "error";
        header('location:../../questionnaire.php');
    }
}
?>
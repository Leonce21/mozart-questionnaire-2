<?php
session_start();
// include('../config/connection.php');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['save_btn'])) {
    // Collect values from POST
    $firstname = $_POST['firstname'];
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $Q4 = $_POST['Q4'];
    $Q5 = $_POST['Q5'];
    $Q6 = $_POST['Q6'];
    $Q7 = $_POST['Q7'];
    $Q8 = $_POST['Q8'];
    $Q9 = $_POST['Q9'];
    $Q10 = $_POST['Q10'];
    $salaryexpectation = $_POST['salaryexpectation'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO `academicsupport`(`firstname`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `salaryexpectation`) 
                           VALUES (:firstname, :Q1, :Q2, :Q3, :Q4, :Q5, :Q6, :Q7, :Q8, :Q9, :Q10, :salaryexpectation)");

    // Bind parameters
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':Q1', $Q1);
    $stmt->bindParam(':Q2', $Q2);
    $stmt->bindParam(':Q3', $Q3);
    $stmt->bindParam(':Q4', $Q4);
    $stmt->bindParam(':Q5', $Q5);
    $stmt->bindParam(':Q6', $Q6);
    $stmt->bindParam(':Q7', $Q7);
    $stmt->bindParam(':Q8', $Q8);
    $stmt->bindParam(':Q9', $Q9);
    $stmt->bindParam(':Q10', $Q10);
    $stmt->bindParam(':salaryexpectation', $salaryexpectation);

    // Execute the statement
    $result = $stmt->execute();

    // Check and redirect
    
    if ($result) {
        $_SESSION['status'] = "Data inserted successfully";
        $_SESSION['status_code'] = "success";
        header('location:index.php');
    } else {
        $_SESSION['status'] = "Data not inserted successfully";
        $_SESSION['status_code'] = "error";
        header('location:insert.php');
    }
    
}
    
?>
<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
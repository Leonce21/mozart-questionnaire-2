<?php
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $Q4 = $_POST['Q4'];
    $Q5 = $_POST['Q5'];
    $Q6 = $_POST['Q6'];
    $Q7_Mon = $_POST['Q7_Mon'];
    $Q7_Tues = $_POST['Q7_Tues'];
    $Q7_Wed = $_POST['Q7_Wed'];
    $Q7_Thur = $_POST['Q7_Thur'];
    $Q7_Fri = $_POST['Q7_Fri'];
    $Q7_Sat = $_POST['Q7_Sat'];
    $Q7_Sun = $_POST['Q7_Sun'];
    $adultName = $_POST['adultName'];
    $adultRegion = $_POST['adultRegion'];
    $adultLocation = $_POST['adultLocation'];
    $adultFixPhone = $_POST['adultFixPhone'];
    $adultMobilePhone = $_POST['adultMobilePhone'];
    $adultEmail = $_POST['adultEmail'];
    $adultPObox = $_POST['adultPObox'];
    $studentName = $_POST['studentName'];
    $studentRegion = $_POST['studentRegion'];
    $studentLocation = $_POST['studentLocation'];
    $studentFixPhone = $_POST['studentFixPhone'];
    $studentMobilePhone = $_POST['studentMobilePhone'];
    $studentEmail = $_POST['studentEmail'];
    $studentPOBox = $_POST['studentPOBox'];
    $InternetUsage = $_POST['InternetUsage'];
    $InternetUsage_duartion = $_POST['studentFixPhone'];
    $mozartCours_Promotion = $_POST['mozartCours_Promotion'];



    // Prepare SQL statement for update
    $stmt = $pdo->prepare("UPDATE `informationform` SET
                             `Q1` = :Q1,
                             `Q2` = :Q2,
                             `Q3` = :Q3,
                             `Q4` = :Q4,
                             `Q5` = :Q5,
                            `Q6` = :Q6,
                             `Q7_Mon` = :Q7_Mon,
                             `Q7_Tues` = :Q7_Tues,
                             `Q7_Wed` = :Q7_Wed,
                             `Q7_Thur` = :Q7_Thur,
                             `Q7_Fri` = :Q7_Fri,
                             `Q7_Sat` = :Q7_Sat,
                             `Q7_Sun` = :Q7_Sun,
                             `adultName` = :adultName,
                             `adultRegion` = :adultRegion,
                             `adultLocation` = :adultLocation,
                             `adultFixPhone` = :adultFixPhone,
                             `adultMobilePhone` = :adultMobilePhone,
                             `adultEmail` = :adultEmail,
                             `adultPObox` = :adultPObox,
                             `studentName` = :studentName,
                             `studentRegion` = :studentRegion,
                             `studentLocation` = :studentLocation,
                             `studentFixPhone` = :studentFixPhone,
                             `studentMobilePhone` = :studentMobilePhone,
                             `studentEmail` = :studentEmail,
                             `studentPOBox` = :studentPOBox,
                             `InternetUsage` = :InternetUsage,
                             `InternetUsage_duartion` = :InternetUsage_duartion,
                             `mozartCours_Promotion` = :mozartCours_Promotion
                            WHERE `id` = :id");

    // Bind parameters for update
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':Q1', $Q1);
    $stmt->bindParam(':Q2', $Q2);
    $stmt->bindParam(':Q3', $Q3);
    $stmt->bindParam(':Q4', $Q4);
    $stmt->bindParam(':Q5', $Q5);
    $stmt->bindParam(':Q6', $Q6);
    $stmt->bindParam(':Q7_Mon', $Q7_Mon);
    $stmt->bindParam(':Q7_Tues', $Q7_Tues);
    $stmt->bindParam(':Q7_Wed', $Q7_Wed);
    $stmt->bindParam(':Q7_Thur', $Q7_Thur);
    $stmt->bindParam(':Q7_Fri', $Q7_Fri);
    $stmt->bindParam(':Q7_Sat', $Q7_Sat);
    $stmt->bindParam(':Q7_Sun', $Q7_Sun);
    $stmt->bindParam(':adultName', $adultName);
    $stmt->bindParam(':adultRegion', $adultRegion);
    $stmt->bindParam(':adultLocation', $adultLocation);
    $stmt->bindParam(':adultFixPhone', $adultFixPhone);
    $stmt->bindParam(':adultMobilePhone', $adultMobilePhone);
    $stmt->bindParam(':adultEmail', $adultEmail);
    $stmt->bindParam(':adultPObox', $adultPObox);
    $stmt->bindParam(':studentName', $studentName);
    $stmt->bindParam(':studentRegion', $studentRegion);
    $stmt->bindParam(':studentLocation', $studentLocation);
    $stmt->bindParam(':studentFixPhone', $studentFixPhone);
    $stmt->bindParam(':studentMobilePhone', $studentMobilePhone);
    $stmt->bindParam(':studentEmail', $studentEmail);
    $stmt->bindParam(':studentPOBox', $studentPOBox);
    $stmt->bindParam(':InternetUsage', $InternetUsage);
    $stmt->bindParam(':InternetUsage_duartion', $InternetUsage_duartion);
    $stmt->bindParam(':mozartCours_Promotion', $mozartCours_Promotion);

    // Execute the update statement
    $result = $stmt->execute();

    // Check and redirect for update
    if ($result) {
        $_SESSION['verify'] = "Data updated successfully";
        $_SESSION['verify_message'] = "success";

        header('location:../parent.php');
        exit();
    } else {
        $_SESSION['verify'] = "Data not updated successfully";
        $_SESSION['verify_message'] = "error";
        header('location:edit-parent.php?id=' . $id); // Redirect back to edit page with the ID
        exit();
    }
} else {
    // Redirect if no edit button is clicked
    $_SESSION['verify'] = "too long";
    $_SESSION['verify_message'] = "warning";
    header('location:./index.php');
    exit();
}
?>

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
    $Name = $_POST['Name'];
    $date_of_birth = $_POST['date_of_birth'];
    $sex = $_POST['sex'];
    $CurrentInstitution = $_POST['CurrentInstitution'];
    $CurrentInstitutionPeriod = $_POST['CurrentInstitutionPeriod'];
    $Classattended = $_POST['Classattended'];
    $repeating = $_POST['repeating'];
        
    $PreviousInstitution = $_POST['PreviousInstitution'];
    $Annualaverage = $_POST['Annualaverage'];
    $studentquality = $_POST['studentquality'];

    $Subject1 = $_POST['Subject1'];
    $Subject2 = $_POST['Subject2'];
    $Subject3 = $_POST['Subject3'];
    $Subject = $Subject1 . ', '. $Subject2 . ', '. $Subject3;

    $SubjectRating1 = $_POST['SubjectRating1'];
    $SubjectRating2 = $_POST['SubjectRating2'];
    $SubjectRating3 = $_POST['SubjectRating3'];
    $SubjectRating = $SubjectRating1 . ', '. $SubjectRating2 . ' ,'. $SubjectRating3;

    $SubjectRatingReasons1 = $_POST['SubjectRatingReasons1'];
    $SubjectRatingReasons2 = $_POST['SubjectRatingReasons2'];
    $SubjectRatingReasons3 = $_POST['SubjectRatingReasons3'];
    $SubjectRatingReasons = $SubjectRatingReasons1 . ', '. $SubjectRatingReasons2 . ' ,'. $SubjectRatingReasons3;

    $Subjectdisturbance1 = $_POST['Subjectdisturbance1'];
    $Subjectdisturbance2 = $_POST['Subjectdisturbance2'];
    $Subjectdisturbance3 = $_POST['Subjectdisturbance3'];
    $Subjectdisturbance = $Subjectdisturbance1 . ', '. $Subjectdisturbance2 . ' ,'. $Subjectdisturbance3;

    $Subjectappreciation1 = $_POST['Subjectappreciation1'];
    $Subjectappreciation2 = $_POST['Subjectappreciation2'];
    $Subjectappreciation3 = $_POST['Subjectappreciation3'];
    $Subjectappreciation = $Subjectappreciation1 . ', '. $Subjectappreciation2 . ' ,'. $Subjectappreciation3;

    $SubjectNotAppreciated1 = $_POST['SubjectNotAppreciated1'];
    $SubjectNotAppreciated2 = $_POST['SubjectNotAppreciated2'];
    $SubjectNotAppreciated3 = $_POST['SubjectNotAppreciated3'];
    $SubjectNotAppreciated = $SubjectNotAppreciated1 . ', '. $SubjectNotAppreciated2 . ', '. $SubjectNotAppreciated3;

    $SubjectExp1 = $_POST['SubjectExp1'];
    $SubjectExp2 = $_POST['SubjectExp2'];
    $SubjectExp3 = $_POST['SubjectExp3'];
    $SubjectExp4 = $_POST['SubjectExp4'];
    $SubjectExp = $SubjectExp1 . ', '. $SubjectExp2 . ', '. $SubjectExp3 . ', '. $SubjectExp4;

    $Subjectperiod1 = $_POST['Subjectperiod1'];
    $Subjectperiod2 = $_POST['Subjectperiod2'];
    $Subjectperiod3 = $_POST['Subjectperiod3'];
    $Subjectperiod4 = $_POST['Subjectperiod4'];
    $Subjectperiod = $Subjectperiod1 . ', '. $Subjectperiod2 . ', '. $Subjectperiod3 . ', '. $Subjectperiod4;

    $SubjectSatisfaction1 = $_POST['SubjectSatisfaction1'];
    $SubjectSatisfaction2 = $_POST['SubjectSatisfaction2'];
    $SubjectSatisfaction3 = $_POST['SubjectSatisfaction3'];
    $SubjectSatisfaction4 = $_POST['SubjectSatisfaction4'];
    $SubjectSatisfaction = $SubjectSatisfaction1 . ', '. $SubjectSatisfaction2 . ', '. $SubjectSatisfaction3 . ', '. $SubjectSatisfaction4;

    $group_collaboration = $_POST['group_collaboration'];
    $learningApproach = $_POST['learningApproach'];
    $learning_Motivation = $_POST['learning_Motivation'];
    $LearningProfile = $_POST['LearningProfile'];


    // Prepare SQL statement for update
    $stmt = $pdo->prepare("UPDATE `studentinterview` SET 
                            `Name` = :Name,
                             `date_of_birth` = :date_of_birth,
                             `sex` = :sex,
                             `CurrentInstitution` = :CurrentInstitution,
                             `CurrentInstitutionPeriod` = :CurrentInstitutionPeriod,
                             `Classattended` = :Classattended,
                            `repeating` = :repeating,
                             `PreviousInstitution` = :PreviousInstitution,
                             `Annualaverage` = :Annualaverage,
                             `studentquality` = :studentquality,
                             `Subject` = :Subject,
                             `SubjectRating` = :SubjectRating,
                             `SubjectRatingReasons` = :SubjectRatingReasons,
                             `Subjectdisturbance` = :Subjectdisturbance,
                             `Subjectappreciation` = :Subjectappreciation,
                             `SubjectNotAppreciated` = :SubjectNotAppreciated,
                             `SubjectExp` = :SubjectExp,
                             `Subjectperiod` = :Subjectperiod,
                             `SubjectSatisfaction` = :SubjectSatisfaction,
                             `SubjectNotAppreciated` = :SubjectNotAppreciated,
                             `SubjectExp` = :SubjectExp,
                             `Subjectperiod` = :Subjectperiod,
                             `SubjectSatisfaction` = :SubjectSatisfaction,
                             `group_collaboration` = :group_collaboration,
                             `learningApproach` = :learningApproach,
                             `learning_Motivation` = :learning_Motivation,
                             `LearningProfile` = :LearningProfile
                            WHERE `id` = :id");

    // Bind parameters for update
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':CurrentInstitution', $CurrentInstitution);
    $stmt->bindParam(':CurrentInstitutionPeriod', $CurrentInstitutionPeriod);
    $stmt->bindParam(':Classattended', $Classattended);
    $stmt->bindParam(':repeating', $repeating);
    $stmt->bindParam(':PreviousInstitution', $PreviousInstitution);
    $stmt->bindParam(':Annualaverage', $Annualaverage);
    $stmt->bindParam(':studentquality', $studentquality);
    $stmt->bindParam(':Subject', $Subject);
    $stmt->bindParam(':SubjectRating', $SubjectRating);
    $stmt->bindParam(':SubjectRatingReasons', $SubjectRatingReasons);
    $stmt->bindParam(':Subjectdisturbance', $Subjectdisturbance);
    $stmt->bindParam(':Subjectappreciation', $Subjectappreciation);
    $stmt->bindParam(':SubjectNotAppreciated', $SubjectNotAppreciated);
    $stmt->bindParam(':SubjectExp', $SubjectExp);
    $stmt->bindParam(':Subjectperiod', $Subjectperiod);
    $stmt->bindParam(':SubjectSatisfaction', $SubjectSatisfaction);
    $stmt->bindParam(':group_collaboration', $group_collaboration);
    $stmt->bindParam(':learningApproach', $learningApproach);
    $stmt->bindParam(':learning_Motivation', $learning_Motivation);
    $stmt->bindParam(':LearningProfile', $LearningProfile);

    // Execute the update statement
    $result = $stmt->execute();

    // Check and redirect for update
    if ($result) {
        $_SESSION['status'] = "Data updated successfully";
        $_SESSION['status_code'] = "success";
        header('location:../index.php');
        exit();
    } else {
        $_SESSION['status'] = "Data not updated successfully";
        $_SESSION['status_code'] = "error";
        header('location:edit.php?id=' . $id); // Redirect back to edit page with the ID
        exit();
    }
} else {
    // Redirect if no edit button is clicked
    header('location:./index.php');
    exit();
}
?>

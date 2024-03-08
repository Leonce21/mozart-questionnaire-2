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
    $School = $_POST['School'];
    $School_period = $_POST['School_period'];
    $date_of_birth = $_POST['date_of_birth'];
    $sex = $_POST['sex'];
    $MaritalStatus = $_POST['MaritalStatus'];
    $Education_Section = $_POST['Education_Section'];
    $teacher_diploma = $_POST['teacher_diploma'];
    $teacher_activity = $_POST['teacher_activity'];
    $location = $_POST['location'];
    $teacher_description = $_POST['teacher_description'];
    $subject_tutoring = $_POST['subject_tutoring'];
    $tutoring_problem = $_POST['tutoring_problem'];
    $thingyoudontlike = $_POST['thingyoudontlike'];
    $thingyoulike = $_POST['thingyoulike'];
    $support_class = $_POST['support_class'];
    $support_classDuration = $_POST['support_classDuration'];

    $Subject1 = $_POST['Subject1'];
    $Subject2 = $_POST['Subject2'];
    $Subject3 = $_POST['Subject3'];

    $Subject = $Subject1 . ', '. $Subject2 . ', '. $Subject3;

    $Subjectperiod1 = $_POST['Subjectperiod1'];
    $Subjectperiod2 = $_POST['Subjectperiod2'];
    $Subjectperiod3 = $_POST['Subjectperiod3'];

    $SubjectPeriod = $Subjectperiod1 . ', '. $Subjectperiod2 . ' ,'. $Subjectperiod3;

    $SubjectSatisfaction1 = $_POST['SubjectSatisfaction1'];
    $SubjectSatisfaction2 = $_POST['SubjectSatisfaction2'];
    $SubjectSatisfaction3 = $_POST['SubjectSatisfaction3'];

    $SubjectSatisfaction = $SubjectSatisfaction1 . ', ' . $SubjectSatisfaction2 . ', ' . $SubjectSatisfaction3;

    $group_collaboration = $_POST['group_collaboration'];
    $tutoring = $_POST['tutoring'];
    $teaching_Strengths = $_POST['teaching_Strengths'];
    $computerMastering = $_POST['computerMastering'];
    $learning_Motivation = $_POST['learning_Motivation'];
    $LearningProfile = $_POST['LearningProfile'];


    // Prepare SQL statement for update
    $stmt = $pdo->prepare("UPDATE `teacherinterview` SET 
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
    $stmt->bindParam(':Name', $FamilyName);
    $stmt->bindParam(':date_of_birth', $StudentName);
    $stmt->bindParam(':sex', $FirstTeacherName);
    $stmt->bindParam(':CurrentInstitution', $SecondTeacherName);
    $stmt->bindParam(':CurrentInstitutionPeriod', $ThirdTeacherName);
    $stmt->bindParam(':Classattended', $SubjectsTaken);
    $stmt->bindParam(':repeating', $SubjectsTaught);
    $stmt->bindParam(':PreviousInstitution', $Q_one);
    $stmt->bindParam(':Annualaverage', $Q_two);
    $stmt->bindParam(':studentquality', $Q_three);
    $stmt->bindParam(':Subject', $Q_four);
    $stmt->bindParam(':SubjectRating', $Q_five);
    $stmt->bindParam(':SubjectRatingReasons', $Q_six);
    $stmt->bindParam(':Subjectdisturbance', $Q_seven);
    $stmt->bindParam(':Subjectappreciation', $Q_eight);
    $stmt->bindParam(':SubjectNotAppreciated', $Q_nine);
    $stmt->bindParam(':SubjectExp', $Q_ten);
    $stmt->bindParam(':Subjectperiod', $Q_eleven);
    $stmt->bindParam(':SubjectSatisfaction', $Q_twelve);
    $stmt->bindParam(':group_collaboration', $Q_thirteen);
    $stmt->bindParam(':learningApproach', $Q_fourteen);
    $stmt->bindParam(':learning_Motivation', $learning_Motivation);
    $stmt->bindParam(':LearningProfile', $LearningProfile);

    // Execute the update statement
    $result = $stmt->execute();

    // Check and redirect for update
    if ($result) {
        $_SESSION['verify'] = "Data updated successfully";
        $_SESSION['verify_message'] = "success";;
        header('location:../questionnaire.php');
        exit();
    } else {
        $_SESSION['verify'] = "Data not updated successfully";
        $_SESSION['verify_message'] = "error";
        header('location:edit-questionnaire.php?id=' . $id); // Redirect back to edit page with the ID
        exit();
    }
} else {
    // Redirect if no edit button is clicked
    header('location:./index.php');
    exit();
}
?>

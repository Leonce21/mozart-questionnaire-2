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
    $FamilyName = $_POST['FamilyName'];
    $StudentName = $_POST['StudentName'];
    $FirstTeacherName = $_POST['FirstTeacherName'];
    $SecondTeacherName = $_POST['SecondTeacherName'];
    $ThirdTeacherName = $_POST['ThirdTeacherName'];
    $SubjectsTaken = $_POST['SubjectsTaken'];
    $SubjectsTaught = $_POST['SubjectsTaught'];           
    $Q_one = $_POST['Q_one'];
    $Q_two = $_POST['Q_two'];
    $Q_three = $_POST['Q_three'];
    $Q_four = $_POST['Q_four'];
    $Q_five = $_POST['Q_five'];
    $Q_six = $_POST['Q_six'];
    $Q_seven = $_POST['Q_seven'];
    $Q_eight = $_POST['Q_eight'];
    $Q_nine = $_POST['Q_nine'];
    $Q_ten = $_POST['Q_ten'];
    $Q_eleven = $_POST['Q_eleven'];
    $Q_twelve = $_POST['Q_twelve'];
    $Q_thirteen = $_POST['Q_thirteen'];
    $Q_fourteen = $_POST['Q_fourteen'];

    $SubjectForCourse1 = $_POST['SubjectForCourse1'];
    $SubjectForCourse2 = $_POST['SubjectForCourse2'];
    $SubjectForCourse3 = $_POST['SubjectForCourse3'];

    $SubjectForCourse = $SubjectForCourse1 . ', '. $SubjectForCourse2 . ', '. $SubjectForCourse3;

    $SubjectMark1 = $_POST['SubjectMark1'];
    $SubjectMark2 = $_POST['SubjectMark2'];
    $SubjectMark3 = $_POST['SubjectMark3'];

    $SubjectMark = $SubjectMark1 . ', '. $SubjectMark2 . ' ,'. $SubjectMark3;

    $Evaluationdate1 = $_POST['Evaluationdate1'];
    $Evaluationdate2 = $_POST['Evaluationdate2'];
    $Evaluationdate3 = $_POST['Evaluationdate3'];

    $Evaluationdate = $Evaluationdate1 . ', '. $Evaluationdate2 . ' ,'. $Evaluationdate3;


    $ReasonsForMarks1 = $_POST['ReasonsForMarks1'];
    $ReasonsForMarks2 = $_POST['ReasonsForMarks2'];
    $ReasonsForMarks3 = $_POST['ReasonsForMarks3'];

    $ReasonsForMarks = $ReasonsForMarks1 . ', '. $ReasonsForMarks2 . ' ,'. $ReasonsForMarks3;


    $Subjectdifficulty1 = $_POST['Subjectdifficulty1'];
    $Subjectdifficulty2 = $_POST['Subjectdifficulty2'];
    $Subjectdifficulty3 = $_POST['Subjectdifficulty3'];

    $Subjectdifficulty = $Subjectdifficulty1 . ', '. $Subjectdifficulty2 . ' ,'. $Subjectdifficulty3;

    $dissatisfaction1 = $_POST['dissatisfaction1'];
    $dissatisfaction2 = $_POST['dissatisfaction2'];
    $dissatisfaction = $dissatisfaction1 . ', '. $dissatisfaction2;


    // Prepare SQL statement for update
    $stmt = $pdo->prepare("UPDATE `serviceguide` SET 
                            FamilyName = :FamilyName, 
                            StudentName = :StudentName, 
                            FirstTeacherName = :FirstTeacherName, 
                            SecondTeacherName = :SecondTeacherName, 
                            ThirdTeacherName = :ThirdTeacherName, 
                            SubjectsTaken = :SubjectsTaken, 
                            SubjectsTaught = :SubjectsTaught, 
                            Q_one = :Q_one, 
                            Q_two = :Q_two, 
                            Q_three = :Q_three, 
                            Q_four = :Q_four, 
                            Q_five = :Q_five, 
                            Q_six = :Q_six, 
                            Q_seven = :Q_seven, 
                            Q_eight = :Q_eight, 
                            Q_nine = :Q_nine, 
                            Q_ten = :Q_ten, 
                            Q_eleven = :Q_eleven, 
                            Q_twelve = :Q_twelve, 
                            Q_thirteen = :Q_thirteen, 
                            Q_fourteen = :Q_fourteen, 
                            SubjectForCourse = :SubjectForCourse, 
                            SubjectMark = :SubjectMark, 
                            Evaluationdate = :Evaluationdate, 
                            ReasonsForMarks = :ReasonsForMarks, 
                            Subjectdifficulty = :Subjectdifficulty, 
                            dissatisfaction = :dissatisfaction 
                              WHERE `id` = :id");

    // Bind parameters for update
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':FamilyName', $FamilyName);
    $stmt->bindParam(':StudentName', $StudentName);
    $stmt->bindParam(':FirstTeacherName', $FirstTeacherName);
    $stmt->bindParam(':SecondTeacherName', $SecondTeacherName);
    $stmt->bindParam(':ThirdTeacherName', $ThirdTeacherName);
    $stmt->bindParam(':SubjectsTaken', $SubjectsTaken);
    $stmt->bindParam(':SubjectsTaught', $SubjectsTaught);
    $stmt->bindParam(':Q_one', $Q_one);
    $stmt->bindParam(':Q_two', $Q_two);
    $stmt->bindParam(':Q_three', $Q_three);
    $stmt->bindParam(':Q_four', $Q_four);
    $stmt->bindParam(':Q_five', $Q_five);
    $stmt->bindParam(':Q_six', $Q_six);
    $stmt->bindParam(':Q_seven', $Q_seven);
    $stmt->bindParam(':Q_eight', $Q_eight);
    $stmt->bindParam(':Q_nine', $Q_nine);
    $stmt->bindParam(':Q_ten', $Q_ten);
    $stmt->bindParam(':Q_eleven', $Q_eleven);
    $stmt->bindParam(':Q_twelve', $Q_twelve);
    $stmt->bindParam(':Q_thirteen', $Q_thirteen);
    $stmt->bindParam(':Q_fourteen', $Q_fourteen);
    $stmt->bindParam(':SubjectForCourse', $SubjectForCourse);
    $stmt->bindParam(':SubjectMark', $SubjectMark);
    $stmt->bindParam(':Evaluationdate', $Evaluationdate);
    $stmt->bindParam(':ReasonsForMarks', $ReasonsForMarks);
    $stmt->bindParam(':Subjectdifficulty', $Subjectdifficulty);
    $stmt->bindParam(':dissatisfaction', $dissatisfaction);
    

    // Execute the update statement
    $result = $stmt->execute();

    // Check and redirect for update
    if ($result) {
        $_SESSION['verify'] = "Data updated successfully";
        $_SESSION['verify_message'] = "success";
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

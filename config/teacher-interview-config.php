<?php
       
 include('connection.php');
       
       
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

switch ($_GET['action'])
{
    case 'add':
        $query = "INSERT INTO teacherinterview
            (Name, School, School_period, date_of_birth, sex, MaritalStatus, Education_Section, teacher_diploma, 
            teacher_activity, location, teacher_description, subject_tutoring, tutoring_problem, thingyoudontlike, 
            thingyoulike, support_class, support_classDuration, Subject, SubjectPeriod, SubjectSatisfaction, 
            group_collaboration, tutoring, teaching_Strengths, computerMastering, learning_Motivation, LearningProfile)
            VALUES ('$Name', '$School', '$School_period', '$date_of_birth', '$sex', '$MaritalStatus', 
            '$Education_Section', '$teacher_diploma', '$teacher_activity', '$location', '$teacher_description', 
            '$subject_tutoring', '$tutoring_problem', '$thingyoudontlike', '$thingyoulike', '$support_class', 
            '$support_classDuration', '$Subject', '$SubjectPeriod', '$SubjectSatisfaction', '$group_collaboration', 
            '$tutoring', '$teaching_Strengths', '$computerMastering', '$learning_Motivation', '$LearningProfile')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "../pages/teacher-interview.php";
    </script>

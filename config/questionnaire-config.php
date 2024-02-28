<?php
       
 include('connection.php');
       
       
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

switch ($_GET['action'])
{
    case 'add':
         // Prepare and execute the SQL query
         $query = "INSERT INTO serviceguide
         (FamilyName, StudentName, FirstTeacherName, SecondTeacherName, ThirdTeacherName, SubjectsTaken, SubjectsTaught, Q_one, Q_two, Q_three, Q_four, Q_five, Q_six, Q_seven, Q_eight, Q_nine, Q_ten, Q_eleven, Q_twelve, Q_thirteen, Q_fourteen, SubjectForCourse, SubjectMark, Evaluationdate, ReasonsForMarks, Subjectdifficulty, dissatisfaction)
         VALUES ('$FamilyName', '$StudentName', '$FirstTeacherName', '$SecondTeacherName', '$ThirdTeacherName', '$SubjectsTaken', '$SubjectsTaught', '$Q_one', '$Q_two', '$Q_three', '$Q_four', '$Q_five', '$Q_six', '$Q_seven', '$Q_eight', '$Q_nine', '$Q_ten', '$Q_eleven', '$Q_twelve', '$Q_thirteen', '$Q_fourteen', '$SubjectForCourse', '$SubjectMark', '$Evaluationdate', '$ReasonsForMarks', '$Subjectdifficulty', '$dissatisfaction')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "../pages/questionnaire.php";
    </script>

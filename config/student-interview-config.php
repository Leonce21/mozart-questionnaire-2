<?php
       
 include('connection.php');
       
       
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


switch ($_GET['action'])
{
    case 'add':
         // Prepare and execute the SQL query
         $query = "INSERT INTO studentinterview (Name, date_of_birth, sex, CurrentInstitution, CurrentInstitutionPeriod, Classattended, repeating, PreviousInstitution, Annualaverage, studentquality, Subject, SubjectRating, SubjectRatingReasons, Subjectdisturbance, Subjectappreciation, SubjectNotAppreciated, SubjectExp, Subjectperiod, SubjectSatisfaction, group_collaboration, learningApproach, learning_Motivation, LearningProfile) 
                  VALUES ('$Name', '$date_of_birth', '$sex', '$CurrentInstitution', '$CurrentInstitutionPeriod', '$Classattended', '$repeating', '$PreviousInstitution', '$Annualaverage', '$studentquality', '$Subject', '$SubjectRating', '$SubjectRatingReasons', '$Subjectdisturbance', '$Subjectappreciation', '$SubjectNotAppreciated', '$SubjectExp', '$Subjectperiod', '$SubjectSatisfaction', '$group_collaboration', '$learningApproach', '$learning_Motivation', '$LearningProfile')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "../pages/student-interview.php";
    </script>



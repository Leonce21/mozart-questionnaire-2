<?php
       
 include('connection.php');
       
       
$Name = $_POST['Name'];
$nationality = $_POST['nationality'];
$date_of_birth = $_POST['date_of_birth'];
$District = $_POST['District'];
$Date_Issued = $_POST['Date_Issued'];
$FixPhone = $_POST['FixPhone'];
$MobilePhone = $_POST['MobilePhone'];
$Email = $_POST['Email'];
$PObox = $_POST['PObox'];
$mozartCours_Promotion = $_POST['mozartCours_Promotion'];
$MeansOfTransport = $_POST['MeansOfTransport'];
$CurrentSituation = $_POST['CurrentSituation'];
$degreeobtained = $_POST['degreeobtained'];
$year_of_degree = $_POST['year_of_degree'];
$Speciality = $_POST['Speciality'];
$institution = $_POST['institution'];
$private_class = $_POST['private_class'];
$support_class = $_POST['support_class'];
$experience = $_POST['experience'];
$teachingmotivation = $_POST['teachingmotivation'];
$InternetUsage = $_POST['InternetUsage'];
$InternetUsage_duartion = $_POST['InternetUsage_duartion'];
$hoursOfLesson = $_POST['hoursOfLesson'];
$geographicPreferences = $_POST['geographicPreferences'];
$Monday = $_POST['Monday'];
$Tuesday = $_POST['Tuesday'];
$Wednesday = $_POST['Wednesday'];
$Thursday = $_POST['Thursday'];
$Friday = $_POST['Friday'];
$Saturday = $_POST['Saturday'];
$Sunday = $_POST['Sunday'];

$Subject1 = $_POST['Subject1'];
$Subject2 = $_POST['Subject2'];
$Subject3 = $_POST['Subject3'];

$Subject = $Subject1 . ', '. $Subject2 . ', '. $Subject3;

$levels1 = $_POST['levels1'];
$levels2 = $_POST['levels2'];
$levels3 = $_POST['levels3'];

$levels = $levels1 . ', '. $levels2 . ' ,'. $levels3;

switch ($_GET['action'])
{
    case 'add':
        $query = "INSERT INTO teacherrecruitement
            (Name, nationality, date_of_birth, District, Date_Issued, FixPhone, MobilePhone, Email, PObox, mozartCours_Promotion, MeansOfTransport, CurrentSituation, degreeobtained, year_of_degree, Speciality, institution, private_class, support_class, experience, teachingmotivation, InternetUsage, InternetUsage_duartion, hoursOfLesson, geographicPreferences, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, Subject, levels)
            VALUES ('$Name', '$nationality', '$date_of_birth', '$District', '$Date_Issued', '$FixPhone', '$MobilePhone', '$Email', '$PObox', '$mozartCours_Promotion', '$MeansOfTransport', '$CurrentSituation', '$degreeobtained', '$year_of_degree', '$Speciality', '$institution', '$private_class', '$support_class', '$experience', '$teachingmotivation', '$InternetUsage', '$InternetUsage_duartion', '$hoursOfLesson', '$geographicPreferences', '$Monday', '$Tuesday', '$Wednesday', '$Thursday', '$Friday', '$Saturday', '$Sunday', '$Subject', '$levels')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "../pages/teacher-recruitement.php";
    </script>

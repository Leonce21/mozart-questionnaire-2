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


    // Prepare SQL statement for update
    $stmt = $pdo->prepare("UPDATE `teacherrecruitement` SET 
                            `Name` = :Name,
                        `nationality` = :nationality,
                        `date_of_birth` = :date_of_birth,
                        `District` = :District,
                        `Date_Issued` = :Date_Issued,
                        `FixPhone` = :FixPhone,
                        `MobilePhone` = :MobilePhone,
                        `Email` = :Email,
                        `PObox` = :PObox,
                        `mozartCours_Promotion` = :mozartCours_Promotion,
                        `MeansOfTransport` = :MeansOfTransport,
                        `CurrentSituation` = :CurrentSituation,
                        `degreeobtained` = :degreeobtained,
                        `year_of_degree` = :year_of_degree,
                        `Speciality` = :Speciality,
                        `institution` = :institution,
                        `private_class` = :private_class,
                        `support_class` = :support_class,
                        `experience` = :experience,
                        `teachingmotivation` = :teachingmotivation,
                        `InternetUsage` = :InternetUsage,
                        `InternetUsage_duartion` = :InternetUsage_duartion,
                        `hoursOfLesson` = :hoursOfLesson,
                        `geographicPreferences` = :geographicPreferences,
                        `Monday` = :Monday,
                        `Tuesday` = :Tuesday,
                        `Wednesday` = :Wednesday,
                        `Thursday` = :Thursday,
                        `Friday` = :Friday,
                        `Saturday` = :Saturday,
                        `Sunday` = :Sunday,
                        `Subject` = :Subject,
                        `levels` = :levels
                            WHERE `id` = :id");

    // Bind parameters for update
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':District', $District);
    $stmt->bindParam(':Date_Issued', $Date_Issued);
    $stmt->bindParam(':FixPhone', $FixPhone);
    $stmt->bindParam(':MobilePhone', $MobilePhone);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':PObox', $PObox);
    $stmt->bindParam(':mozartCours_Promotion', $mozartCours_Promotion);
    $stmt->bindParam(':MeansOfTransport', $MeansOfTransport);
    $stmt->bindParam(':CurrentSituation', $CurrentSituation);
    $stmt->bindParam(':degreeobtained', $degreeobtained);
    $stmt->bindParam(':year_of_degree', $year_of_degree);
    $stmt->bindParam(':Speciality', $Speciality);
    $stmt->bindParam(':institution', $institution);
    $stmt->bindParam(':private_class', $private_class);
    $stmt->bindParam(':support_class', $support_class);
    $stmt->bindParam(':experience', $experience);
    $stmt->bindParam(':teachingmotivation', $teachingmotivation);
    $stmt->bindParam(':InternetUsage', $InternetUsage);
    $stmt->bindParam(':InternetUsage_duartion', $InternetUsage_duartion);
    $stmt->bindParam(':hoursOfLesson', $hoursOfLesson);
    $stmt->bindParam(':geographicPreferences', $geographicPreferences);
    $stmt->bindParam(':Monday', $Monday);
    $stmt->bindParam(':Tuesday', $Tuesday);
    $stmt->bindParam(':Wednesday', $Wednesday);
    $stmt->bindParam(':Thursday', $Thursday);
    $stmt->bindParam(':Friday', $Friday);
    $stmt->bindParam(':Saturday', $Saturday);
    $stmt->bindParam(':Sunday', $Sunday);
    $stmt->bindParam(':Subject', $Subject);
    $stmt->bindParam(':levels', $levels);

    // Execute the update statement
    $result = $stmt->execute();

    // Check and redirect for update
    if ($result) {
        $_SESSION['verify'] = "Data updated successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../teacher-recruitement.php');
        exit();
    } else {
        $_SESSION['verify'] = "Data not updated successfully";
        $_SESSION['verify_message'] = "error";
        header('location:edit-teacher-recruitement.php?id=' . $id); // Redirect back to edit page with the ID
        exit();
    }
} else {
    // Redirect if no edit button is clicked
    header('location:./index.php');
    exit();
}
?>
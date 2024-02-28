<?php
       
 include('connection.php');
       
       
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


switch ($_GET['action'])
{
    case 'add':
        $query = "INSERT INTO informationform
        (Q1, Q2, Q3, Q4, Q5, Q6, 
        Q7_Mon, Q7_Tues, Q7_Wed, Q7_Thur, Q7_Fri, Q7_Sat, Q7_Sun, adultName, adultRegion, adultLocation, 
        adultFixPhone, adultMobilePhone, adultEmail, adultPObox, studentName, studentRegion, 
        studentLocation, studentFixPhone, studentMobilePhone, studentEmail, studentPOBox, InternetUsage, 
        InternetUsage_duartion, mozartCours_Promotion)
        VALUES ('$Q1', '$Q2', '$Q3', 
        '$Q4', '$Q5', '$Q6', '$Q7_Mon', '$Q7_Tues', '$Q7_Wed', '$Q7_Thur', '$Q7_Fri', '$Q7_Sat', 
        '$Q7_Sun', '$adultName', '$adultRegion', '$adultLocation', '$adultFixPhone', '$adultMobilePhone', 
        '$adultEmail', '$adultPObox', '$studentName', '$studentRegion', '$studentLocation', 
        '$studentFixPhone', '$studentMobilePhone', '$studentEmail', '$studentPOBox', '$InternetUsage', 
        '$InternetUsage_duartion', '$mozartCours_Promotion')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "../pages/parent.php";
    </script>

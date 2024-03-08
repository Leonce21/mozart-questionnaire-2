<?php
session_start();
// include('../config/connection.php');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['save_btn'])) {
    // Collect values from POST
           
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

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO `informationform` (`Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7_Mon`, `Q7_Tues`, `Q7_Wed`, `Q7_Thur`, `Q7_Fri`, `Q7_Sat`, `Q7_Sun`, `adultName`, `adultRegion`, `adultLocation`, 
    `adultFixPhone`, `adultMobilePhone`, `adultEmail`, `adultPObox`, `studentName`, `studentRegion`, 
    `studentLocation`, `studentFixPhone`, `studentMobilePhone`, `studentEmail`, `studentPOBox`, `InternetUsage`, 
    `InternetUsage_duartion`, `mozartCours_Promotion`) 
                           VALUES (:Q1, :Q2, :Q3, :Q4, :Q5, :Q6, :Q7_Mon, :Q7_Tues, :Q7_Wed, :Q7_Thur, :Q7_Fri, :Q7_Sat, :Q7_Sun, :adultName, :adultRegion, :adultLocation, 
        :adultFixPhone, :adultMobilePhone, :adultEmail, :adultPObox, :studentName, :studentRegion, 
        :studentLocation, :studentFixPhone, :studentMobilePhone, :studentEmail, :studentPOBox, :InternetUsage, 
        :InternetUsage_duartion, :mozartCours_Promotion)");

    // Bind parameters
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

    // Execute the statement
    $result = $stmt->execute();

    // Check and redirect
    
    if ($result) {
        $_SESSION['status'] = "Data added successfully";
        $_SESSION['status_message'] = "success";
        header('location:../parent.php');
    } else {
        $_SESSION['status'] = "Data not added";
        $_SESSION['status_message'] = "error";
        header('location:add-parent.php');
        exit();
    }
    
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <title>Document</title>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php include('../includes/sidebar.php');?>

    <main class="main-content border-radius-lg ">

        <?php include('../includes/navbar.php');?>

        
        <div class="container-fluid py-4">

            <div class="row h-100 min-vh-100">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <h4>Add parent information
                                <a href="../parent.php" class="btn btn-primary float-end">Back</a>
                                
                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="col-lg-10" role="form" method="POST">
                                <div class="mt-1">

                                <div mat-dialog-content class="ms-5 form-group">
            <!--   page 1 start -->
            <div>

                <ol class="list-group list-numbered card-body">
                    <!--  Question 1  -->
                    <div >
                        <li for="" class="form-label list-item">You are :</li>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <input class="form-check-input" type="radio" value="parent" formControlName="Q1"
                                    name="Q1" id="flexRadioDefault1">
                                Parent
                            </label>
                        </div>
                        <div class="form-check form-check-inline">

                            <label class="form-check-label" for="flexRadioDefault2">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="Student, Middle school student or high school student"
                                    id="flexRadioDefault2">
                                Student, Middle school student or high school student
                            </label>
                        </div>
                        <div class="form-check form-check-inline">

                            <label class="form-check-label" for="flexRadioDefault3">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="Adult wishing a formation" id="flexRadioDefault3">
                                Adult wishing a formation
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="flexRadioDefault4">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="An enterprise" id="flexRadioDefault4">
                                An enterprise
                            </label>
                        </div>
                    </div>

                    <!--  Question 2  -->
                    <div>
                        <li for="" class="form-label">The classes are for? :</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your self" id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">
                                Your self
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2" value="Your son"
                                id="flexRadioDefault6">
                            <label class="form-check-label" for="flexRadioDefault6">
                                Your son
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your daughter" id="flexRadioDefault7">
                            <label class="form-check-label" for="flexRadioDefault7">
                                Your daughter
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your children" id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault8">
                                Your children
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your employees" id="flexRadioDefault9">
                            <label class="form-check-label" for="flexRadioDefault9">
                                Your employees
                            </label>
                        </div>
                    </div>

                    <!--  Question 3  -->
                    <div class="">
                        <li for="" class="form-label">Level :</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="Primary School" id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault10">
                                Primary School
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="Secondary School" id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">
                                Secondary School
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="University" id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault12">
                                University
                            </label>
                        </div>

                    </div>

                    <!--  Question 4  -->
                    <div>
                        <li for="" class="form-label">Type of Classes desired:</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Private lessons at home" id="flexRadioDefault23">
                            <label class="form-check-label" for="flexRadioDefault23">
                                Private lessons at home
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Homework assistance" id="flexRadioDefault24">
                            <label class="form-check-label" for="flexRadioDefault24">
                                Homework assistance
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Group tutoring sessions" id="flexRadioDefault25">
                            <label class="form-check-label" for="flexRadioDefault25">
                                Group tutoring sessions
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Online academic support" id="flexRadioDefault26">
                            <label class="form-check-label" for="flexRadioDefault26">
                                Online academic support
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Exam preparation program" id="flexRadioDefault27">
                            <label class="form-check-label" for="flexRadioDefault27">
                                Exam preparation program
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Competition preparation program" id="flexRadioDefault28">
                            <label class="form-check-label" for="flexRadioDefault28">
                                Competition preparation program
                            </label>
                        </div>
                    </div>

                    <!--  Question 5  -->
                    <div>
                        <li for="" class="form-label">Class schedule:</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Regular throughout the year" id="flexRadioDefault29">
                            <label class="form-check-label" for="flexRadioDefault29">
                                Regular throughout the year
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="One-time or several months punctual" id="flexRadioDefault30">
                            <label class="form-check-label" for="flexRadioDefault30">
                                One-time or several months punctual
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Intensive over a short period" id="flexRadioDefault31">
                            <label class="form-check-label" for="flexRadioDefault31">
                                Intensive over a short period
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Punctual throughout the year" id="flexRadioDefault32">
                            <label class="form-check-label" for="flexRadioDefault32">
                                Punctual throughout the year
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Quarterly" id="flexRadioDefault33">
                            <label class="form-check-label" for="flexRadioDefault33">
                                Quarterly
                            </label>
                        </div>

                    </div>

                    <!--  Question 6  -->
                    <div>
                        <li for="" class="form-label">Field of Study</li>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="Science"
                                id="flexRadioscience">
                            <label class="form-check-label" for="flexRadioscience">
                                Science
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="Arts"
                                id="flexRadioarts">
                            <label class="form-check-label" for="flexRadioarts">
                                Arts
                            </label>
                        </div>

                    </div>

                    <!--  Question 7  -->
                    <div class="me-4">
                        <li for="" class="form-label">preferred time (Day/Hour):</li>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Period</th>
                                        <th scope="col">Morning</th>
                                        <th scope="col">AfterNoon</th>
                                        <th scope="col">Evenning</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <!--    question 1  Monday  -->
                                    <tr>
                                        <th scope="row">Monday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="Morning" formControlName="Q7_Mon" id="Q17">
                                                <label class="form-check-label" for="Q17">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="AfterNoon" formControlName="Q7_Mon" id="Q18">
                                                <label class="form-check-label" for="Q18">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="Evenning" formControlName="Q7_Mon" id="Q19">
                                                <label class="form-check-label" for="Q19">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 2  Tuesday  -->
                                    <tr>
                                        <th scope="row">Tuesday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="Morning" formControlName="Q7_Tues" id="Q20">
                                                <label class="form-check-label" for="Q20">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="AfterNoon" formControlName="Q7_Tues" id="Q21">
                                                <label class="form-check-label" for="Q21">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="Evenning" formControlName="Q7_Tues" id="Q22">
                                                <label class="form-check-label" for="Q22">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 3   Wednesday -->
                                    <tr>
                                        <th scope="row">Wednesday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="Morning" formControlName="Q7_Wed" id="Q23">
                                                <label class="form-check-label" for="Q23">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="AfterNoon" formControlName="Q7_Wed" id="Q2">
                                                <label class="form-check-label" for="Q2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="Evenning" formControlName="Q7_Wed" id="Q3">
                                                <label class="form-check-label" for="Q3">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 4   Thursday -->
                                    <tr>
                                        <th scope="row">Thursday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="Morning" formControlName="Q7_Thur" id="Qthurs">
                                                <label class="form-check-label" for="Qthurs">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="AfterNoon" formControlName="Q7_Thur" id="Qthurs2">
                                                <label class="form-check-label" for="Qthurs2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="Evenning" formControlName="Q7_Thur" id="Qthurs3">
                                                <label class="form-check-label" for="Qthurs3">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 5  Friday  -->
                                    <tr>
                                        <th scope="row">Friday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="Morning" formControlName="Q7_Fri" id="Qfri1">
                                                <label class="form-check-label" for="Qfri1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="AfterNoon" formControlName="Q7_Fri" id="Qfri2">
                                                <label class="form-check-label" for="Qfri2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="Evenning" formControlName="Q7_Fri" id="Qfri3">
                                                <label class="form-check-label" for="Qfri3">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 6  Saturday  -->
                                    <tr>
                                        <th scope="row">Saturday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="Morning" formControlName="Q7_Sat" id="Qsat1">
                                                <label class="form-check-label" for="Qsat1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="AfterNoon" formControlName="Q7_Sat" id="Qsat2">
                                                <label class="form-check-label" for="Qsat2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="Evenning" formControlName="Q7_Sat" id="Qsat3">
                                                <label class="form-check-label" for="Qsat3">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--    question 7 Sunday   -->
                                    <tr>
                                        <th scope="row">Sunday</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="Morning" formControlName="Q7_Sun" id="Qsun1">
                                                <label class="form-check-label" for="Qsun1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="AfterNoon" formControlName="Q7_Sun" id="Qsun2">
                                                <label class="form-check-label" for="Qsun2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="Evenning" formControlName="Q7_Sun" id="Qsun3">
                                                <label class="form-check-label" for="Qsun3">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </ol>

            </div>
            <!-- End of page 1  -->

            <!--   page 2 start -->
            <div class="card-body">

                <ol class="list-group list-numbered ms-3">
                    <span class="text-warning-emphasis">Hint: * are required fields</span>
                    <!--  Question 1  -->
                    <li for="" class="form-label list-item mt-2">Contact Information (parents/guardians/others)</li>
                    <div class="row g-3">
                        <div class="col-md-11">
                            <label for="inputEmail4" class="form-label">Mr,Mrs,Miss<span
                                    class="required-indicator">*</span></label>
                            <input type="text" class="form-control" name="adultName">

                        </div>

                        <div class="col-md-5 form-group">
                            <label for="region" class="form-label">Region<span
                                    class="required-indicator">*</span></label>
                            <select class="form-select" name="adultRegion">

                                <option value="" selected disabled>Select a Region</option>
                                <option value="adamaoua">Adamaoua</option>
                                <option value="centre">Centre</option>
                                <option value="east">East</option>
                                <option value="far-north">Far North</option>
                                <option value="littoral">Littoral</option>
                                <option value="north">North</option>
                                <option value="northwest">Northwest</option>
                                <option value="west">West</option>
                                <option value="south">South</option>
                                <option value="southwest">Southwest</option>
                            </select>

                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Quater<span
                                    class="required-indicator">*</span></label>
                            <input type="text" class="form-control" formControlName="adultLocation"
                                name="adultLocation">

                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Landing Phone</label>
                            <input type="number" class="form-control" name="adultFixPhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Mobile Phone</label>
                            <input type="number" class="form-control" name="adultMobilePhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress" class="form-label">Email</label>
                            <input type="email" class="form-control" name="adultEmail">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">P.O Box</label>
                            <input type="text" class="form-control" name="adultPObox">
                        </div>
                    </div>

                    <!--  Question 2  -->
                    <li for="" class="form-label list-item mt-5">Contact Information (Students)</li>
                    <div class="row g-3">
                        <div class="col-md-11">
                            <label for="inputEmail4" class="form-label">Mr,Mrs,Miss:</label>
                            <input type="text" class="form-control" name="studentName">
                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Region</label>
                            <select class="form-select" name="studentRegion" formControlName="studentRegion">
                                <option value="" selected disabled>Select a Region</option>
                                <option value="adamaoua">Adamaoua</option>
                                <option value="centre">Centre</option>
                                <option value="east">East</option>
                                <option value="far-north">Far North</option>
                                <option value="littoral">Littoral</option>
                                <option value="north">North</option>
                                <option value="northwest">Northwest</option>
                                <option value="west">West</option>
                                <option value="south">South</option>
                                <option value="southwest">Southwest</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Quater</label>
                            <input type="text" class="form-control" name="studentLocation">
                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Landline Phone:</label>
                            <input type="number" class="form-control" name="studentFixPhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Mobile Phone:</label>
                            <input type="number" class="form-control" name="studentMobilePhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="studentEmail">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">P.O Box:</label>
                            <input type="text" class="form-control" name="studentPOBox">
                        </div>

                        <div class="">
                            <li for="" class="form-label list-item">Have you ever use the internet(For school purpose)
                            </li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InternetUsage" value="Yes"
                                    id="flexRadioDefaultP2">
                                <label class="form-check-label" for="flexRadioDefaultP2">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InternetUsage" value="No"
                                    formControlName="InternetUsage" id="flexRadioDefaultP3">
                                <label class="form-check-label" for="flexRadioDefaultP3">
                                    No
                                </label>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">Frequency of use (hours)? Per week</label>
                            <input type="number" class="form-control" name="InternetUsage_duartion"
                                placeholder="Ex: 10 hours">
                        </div>
                    </div>

                    <!--  Question 3  -->
                    <div>
                        <li for="" class="form-label mt-5">How did you come to know about MozartCours?</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a poster" name="mozartCours_Promotion" id="flexRadioDefaultp1">
                            <label class="form-check-label" for="flexRadioDefaultp1">
                                Through a poster
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a flyer/handout" name="mozartCours_Promotion" id="flexRadioDefaultp2">
                            <label class="form-check-label" for="flexRadioDefaultp2">
                                Through a flyer/handout
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through word of mouth" name="mozartCours_Promotion" id="flexRadioDefaultp3">
                            <label class="form-check-label" for="flexRadioDefaultp3">
                                Through word of mouth
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a banner" name="mozartCours_Promotion" id="flexRadioDefaultp4">
                            <label class="form-check-label" for="flexRadioDefaultp4">
                                Through a banner
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a commercial/advertisement" name="mozartCours_Promotion"
                                id="flexRadioDefaultp5">
                            <label class="form-check-label" for="flexRadioDefaultp5">
                                Through a commercial/advertisement
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through the internet" name="mozartCours_Promotion" id="flexRadioDefaultp6">
                            <label class="form-check-label" for="flexRadioDefaultp6">
                                Through the internet
                            </label>
                        </div>
                    </div>

                </ol>

            </div>
            <!-- End of page 2  -->


            <!-- buttons  -->

        </div>
                                    <!-- buttons  -->
                                    <div class="justify-content-center text-center">
                                        <a class="btn btn-danger col-3 mx-auto" onclick="cancelRedirect()">Cancel</a>
                                        <button name="save_btn" type="submit" class="btn btn-primary col-3 mx-auto">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <?php include('../includes/footer.php');?>
            <?php include('../includes/scripts.php');?>
        </div>
        <script>
            function cancelRedirect() {
              window.location.href = '../parent.php';
            }
        </script>
</body>

</html>
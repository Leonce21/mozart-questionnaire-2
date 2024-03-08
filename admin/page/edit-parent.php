<?php
session_start();


try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data based on the provided ID
    try {
        $stmt = $pdo->prepare("SELECT * FROM informationform WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            // Redirect if the record is not found
            header('location:index.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect if no ID is provided
    header('location:index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/mozart 2.png">

    <title>

      Dashboard Forms

    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>


<body class="g-sidenav-show  bg-gray-100">

    <?php include('../includes/sidebar.php');?>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <?php include('../includes/navbar.php');?>

        <!-- End Navbar -->

        <div class="container-fluid py-4">

            <div class="row h-100 min-vh-100">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <h4>Edit data
                                <a href="../parent.php" class="btn btn-primary float-end">Back</a>

                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="table-responsive"  role="form" method="POST"
                                action="update-parent.php">
                                <div mat-dialog-content class="ms-5 form-group">
                                    <!--   page 1 start -->
                                    <div>

                                        <ol class="list-group list-numbered card-body">
                                            <!--  Question 1  -->
                                            <div>
                                                 <!-- Add hidden input field for ID -->
                                        <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">
                                                <li for="" class="form-label list-item">You are :</li>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        <input class="form-check-input" type="radio" value="parent"
                                                        <?php echo ($row['Q1'] == 'parent') ? 'checked' : ''; ?>
                                                            formControlName="Q1" name="Q1" id="flexRadioDefault1">
                                                        Parent
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">

                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        <input class="form-check-input" type="radio"
                                                            formControlName="Q1" name="Q1"
                                                            <?php echo ($row['Q1'] == 'Student, Middle school student or high school student') ? 'checked' : ''; ?>
                                                            value="Student, Middle school student or high school student"
                                                            id="flexRadioDefault2">
                                                        Student, Middle school student or high school student
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">

                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        <input class="form-check-input" type="radio"
                                                            formControlName="Q1" name="Q1"
                                                            <?php echo ($row['Q1'] == 'Adult wishing a formation') ? 'checked' : ''; ?>
                                                            value="Adult wishing a formation" id="flexRadioDefault3">
                                                        Adult wishing a formation
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        <input class="form-check-input" type="radio"
                                                        <?php echo ($row['Q1'] == 'An enterprise') ? 'checked' : ''; ?>
                                                            formControlName="Q1" name="Q1" value="An enterprise"
                                                            id="flexRadioDefault4">
                                                        An enterprise
                                                    </label>
                                                </div>
                                            </div>

                                            <!--  Question 2  -->
                                            <div>
                                                <li for="" class="form-label">The classes are for? :</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q2"
                                                    <?php echo ($row['Q2'] == 'Your self') ? 'checked' : ''; ?>
                                                        name="Q2" value="Your self" id="flexRadioDefault5">
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        Your self
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q2"
                                                    <?php echo ($row['Q2'] == 'Your son') ? 'checked' : ''; ?>
                                                        name="Q2" value="Your son" id="flexRadioDefault6">
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        Your son
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q2"
                                                    <?php echo ($row['Q2'] == 'Your daughter') ? 'checked' : ''; ?>
                                                        name="Q2" value="Your daughter" id="flexRadioDefault7">
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Your daughter
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q2"
                                                    <?php echo ($row['Q2'] == 'Your children') ? 'checked' : ''; ?>
                                                        name="Q2" value="Your children" id="flexRadioDefault8">
                                                    <label class="form-check-label" for="flexRadioDefault8">
                                                        Your children
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q2"
                                                    <?php echo ($row['Q2'] == 'Your employees') ? 'checked' : ''; ?>
                                                        name="Q2" value="Your employees" id="flexRadioDefault9">
                                                    <label class="form-check-label" for="flexRadioDefault9">
                                                        Your employees
                                                    </label>
                                                </div>
                                            </div>

                                            <!--  Question 3  -->
                                            <div class="">
                                                <li for="" class="form-label">Level :</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'Primary School') ? 'checked' : ''; ?>
                                                        name="Q3" value="Primary School" id="flexRadioDefault10">
                                                    <label class="form-check-label" for="flexRadioDefault10">
                                                        Primary School
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'Secondary School') ? 'checked' : ''; ?>
                                                        name="Q3" value="Secondary School" id="flexRadioDefault11">
                                                    <label class="form-check-label" for="flexRadioDefault11">
                                                        Secondary School
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'University') ? 'checked' : ''; ?>
                                                        name="Q3" value="University" id="flexRadioDefault12">
                                                    <label class="form-check-label" for="flexRadioDefault12">
                                                        University
                                                    </label>
                                                </div>

                                            </div>

                                            <!--  Question 4  -->
                                            <div>
                                                <li for="" class="form-label">Type of Classes desired:</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Private lessons at home') ? 'checked' : ''; ?>
                                                        name="Q4" value="Private lessons at home"
                                                        id="flexRadioDefault23">
                                                    <label class="form-check-label" for="flexRadioDefault23">
                                                        Private lessons at home
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Homework assistance') ? 'checked' : ''; ?>
                                                        name="Q4" value="Homework assistance" id="flexRadioDefault24">
                                                    <label class="form-check-label" for="flexRadioDefault24">
                                                        Homework assistance
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Group tutoring sessions') ? 'checked' : ''; ?>
                                                        name="Q4" value="Group tutoring sessions"
                                                        id="flexRadioDefault25">
                                                    <label class="form-check-label" for="flexRadioDefault25">
                                                        Group tutoring sessions
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Online academic support') ? 'checked' : ''; ?>
                                                        name="Q4" value="Online academic support"
                                                        id="flexRadioDefault26">
                                                    <label class="form-check-label" for="flexRadioDefault26">
                                                        Online academic support
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Exam preparation program') ? 'checked' : ''; ?>
                                                        name="Q4" value="Exam preparation program"
                                                        id="flexRadioDefault27">
                                                    <label class="form-check-label" for="flexRadioDefault27">
                                                        Exam preparation program
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                        <?php echo ($row['Q4'] == 'Competition preparation program') ? 'checked' : ''; ?>
                                                        name="Q4" value="Competition preparation program"
                                                        id="flexRadioDefault28">
                                                    <label class="form-check-label" for="flexRadioDefault28">
                                                        Competition preparation program
                                                    </label>
                                                </div>
                                            </div>

                                            <!--  Question 5  -->
                                            <div>
                                                <li for="" class="form-label">Class schedule:</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'Regular throughout the year') ? 'checked' : ''; ?>
                                                        name="Q5" value="Regular throughout the year"
                                                        id="flexRadioDefault29">
                                                    <label class="form-check-label" for="flexRadioDefault29">
                                                        Regular throughout the year
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'One-time or several months punctual') ? 'checked' : ''; ?>
                                                        name="Q5" value="One-time or several months punctual"
                                                        id="flexRadioDefault30">
                                                    <label class="form-check-label" for="flexRadioDefault30">
                                                        One-time or several months punctual
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'Intensive over a short period') ? 'checked' : ''; ?>
                                                        name="Q5" value="Intensive over a short period"
                                                        id="flexRadioDefault31">
                                                    <label class="form-check-label" for="flexRadioDefault31">
                                                        Intensive over a short period
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'Punctual throughout the year') ? 'checked' : ''; ?>
                                                        name="Q5" value="Punctual throughout the year"
                                                        id="flexRadioDefault32">
                                                    <label class="form-check-label" for="flexRadioDefault32">
                                                        Punctual throughout the year
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'Quarterly') ? 'checked' : ''; ?>
                                                        name="Q5" value="Quarterly" id="flexRadioDefault33">
                                                    <label class="form-check-label" for="flexRadioDefault33">
                                                        Quarterly
                                                    </label>
                                                </div>

                                            </div>

                                            <!--  Question 6  -->
                                            <div>
                                                <li for="" class="form-label">Field of Study</li>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q6"
                                                    <?php echo ($row['Q6'] == 'Science') ? 'checked' : ''; ?>
                                                        name="Q6" value="Science" id="flexRadioscience">
                                                    <label class="form-check-label" for="flexRadioscience">
                                                        Science
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q6"
                                                    <?php echo ($row['Q6'] == 'Arts') ? 'checked' : ''; ?>
                                                        name="Q6" value="Arts" id="flexRadioarts">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Mon'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Mon" value="Morning"
                                                                            formControlName="Q7_Mon" id="Q17">
                                                                        <label class="form-check-label" for="Q17">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Mon'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Mon" value="AfterNoon"
                                                                            formControlName="Q7_Mon" id="Q18">
                                                                        <label class="form-check-label" for="Q18">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Mon'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Mon" value="Evenning"
                                                                            formControlName="Q7_Mon" id="Q19">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Tues'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Tues" value="Morning"
                                                                            formControlName="Q7_Tues" id="Q20">
                                                                        <label class="form-check-label" for="Q20">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Tues'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Tues" value="AfterNoon"
                                                                            formControlName="Q7_Tues" id="Q21">
                                                                        <label class="form-check-label" for="Q21">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Tues'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Tues" value="Evenning"
                                                                            formControlName="Q7_Tues" id="Q22">
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
                                                                        <input class="form-check-input" type="radio"
                                                                         <?php echo ($row['Q7_Wed'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Wed" value="Morning"
                                                                            formControlName="Q7_Wed" id="Q23">
                                                                        <label class="form-check-label" for="Q23">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Wed'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Wed" value="AfterNoon"
                                                                            formControlName="Q7_Wed" id="Q2">
                                                                        <label class="form-check-label" for="Q2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                         <?php echo ($row['Q7_Wed'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Wed" value="Evenning"
                                                                            formControlName="Q7_Wed" id="Q3">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Thur'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Thur" value="Morning"
                                                                            formControlName="Q7_Thur" id="Qthurs">
                                                                        <label class="form-check-label" for="Qthurs">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Thur'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Thur" value="AfterNoon"
                                                                            formControlName="Q7_Thur" id="Qthurs2">
                                                                        <label class="form-check-label" for="Qthurs2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Thur'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Thur" value="Evenning"
                                                                            formControlName="Q7_Thur" id="Qthurs3">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Fri'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Fri" value="Morning"
                                                                            formControlName="Q7_Fri" id="Qfri1">
                                                                        <label class="form-check-label" for="Qfri1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Fri'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Fri" value="AfterNoon"
                                                                            formControlName="Q7_Fri" id="Qfri2">
                                                                        <label class="form-check-label" for="Qfri2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Fri'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Fri" value="Evenning"
                                                                            formControlName="Q7_Fri" id="Qfri3">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sat'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Sat" value="Morning"
                                                                            formControlName="Q7_Sat" id="Qsat1">
                                                                        <label class="form-check-label" for="Qsat1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sat'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Sat" value="AfterNoon"
                                                                            formControlName="Q7_Sat" id="Qsat2">
                                                                        <label class="form-check-label" for="Qsat2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sat'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Sat" value="Evenning"
                                                                            formControlName="Q7_Sat" id="Qsat3">
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
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sun'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Q7_Sun" value="Morning"
                                                                            formControlName="Q7_Sun" id="Qsun1">
                                                                        <label class="form-check-label" for="Qsun1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sun'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Q7_Sun" value="AfterNoon"
                                                                            formControlName="Q7_Sun" id="Qsun2">
                                                                        <label class="form-check-label" for="Qsun2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Q7_Sun'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Q7_Sun" value="Evenning"
                                                                            formControlName="Q7_Sun" id="Qsun3">
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
                                            <li for="" class="form-label list-item mt-2">Contact Information
                                                (parents/guardians/others)</li>
                                            <div class="row g-3">
                                                <div class="col-md-11">
                                                    <label for="inputEmail4" class="form-label">Mr,Mrs,Miss<span
                                                            class="required-indicator">*</span></label>
                                                    <input type="text" class="form-control" value="<?= $row['adultName'] ?>" 
                                                        name="adultName" required>

                                                </div>

                                                <div class="col-md-5 form-group">
                                                    <label for="region" class="form-label">Region<span
                                                            class="required-indicator">*</span></label>
                                                    <select class="form-select" formControlName="adultRegion"
                                                        name="adultRegion">

                                                        <option value="" selected disabled>Select a Region</option>
                                                        <option value="adamaoua" <?php echo ($row['adultRegion'] == 'adamaoua') ? 'selected' : ''; ?>>Adamaoua</option>
                                                        <option value="centre" <?php echo ($row['adultRegion'] == 'centre') ? 'selected' : ''; ?>>Centre</option>
                                                        <option value="east" <?php echo ($row['adultRegion'] == 'east') ? 'selected' : ''; ?>>East</option>
                                                        <option value="far-north" <?php echo ($row['adultRegion'] == 'far') ? 'selected' : ''; ?>>Far North</option>
                                                        <option value="littoral" <?php echo ($row['adultRegion'] == 'littoral') ? 'selected' : ''; ?>>Littoral</option>
                                                        <option value="north" <?php echo ($row['adultRegion'] == 'north') ? 'selected' : ''; ?>>North</option>
                                                        <option value="northwest" <?php echo ($row['adultRegion'] == 'northwest') ? 'selected' : ''; ?>>Northwest</option>
                                                        <option value="west" <?php echo ($row['adultRegion'] == 'west') ? 'selected' : ''; ?>>West</option>
                                                        <option value="south" <?php echo ($row['adultRegion'] == 'south') ? 'selected' : ''; ?>>South</option>
                                                        <option value="southwest" <?php echo ($row['adultRegion'] == 'southwest') ? 'selected' : ''; ?>>Southwest</option>
                                                    </select>

                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputZip" class="form-label">Quater<span
                                                            class="required-indicator">*</span></label>
                                                    <input type="text" class="form-control" value="<?= $row['adultLocation'] ?>"
                                                        formControlName="adultLocation" name="adultLocation">

                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputCity" class="form-label">Landing Phone</label>
                                                    <input type="number" class="form-control" value="<?= $row['adultFixPhone'] ?>" name="adultFixPhone">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputZip" class="form-label">Mobile Phone</label>
                                                    <input type="number" class="form-control" value="<?= $row['adultMobilePhone'] ?>" name="adultMobilePhone">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputAddress" class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="<?= $row['adultEmail'] ?>" name="adultEmail">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputAddress2" class="form-label">P.O Box</label>
                                                    <input type="text" class="form-control" value="<?= $row['adultPObox'] ?>" name="adultPObox">
                                                </div>
                                            </div>

                                            <!--  Question 2  -->
                                            <li for="" class="form-label list-item mt-5">Contact Information (Students)
                                            </li>
                                            <div class="row g-3">
                                                <div class="col-md-11">
                                                    <label for="inputEmail4" class="form-label">Mr,Mrs,Miss:</label>
                                                    <input type="text" class="form-control" name="studentName"  value="<?= $row['studentName'] ?>" required>
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputCity" class="form-label">Region</label>
                                                    <select class="form-select" name="studentRegion"
                                                        formControlName="studentRegion">
                                                        <option value="" selected disabled>Select a Region</option>
                                                        <option value="adamaoua" <?php echo ($row['studentRegion'] == 'adamaoua') ? 'selected' : ''; ?>>Adamaoua</option>
                                                        <option value="centre" <?php echo ($row['studentRegion'] == 'centre') ? 'selected' : ''; ?>>Centre</option>
                                                        <option value="east" <?php echo ($row['studentRegion'] == 'east') ? 'selected' : ''; ?>>East</option>
                                                        <option value="far-north" <?php echo ($row['studentRegion'] == 'far') ? 'selected' : ''; ?>>Far North</option>
                                                        <option value="littoral" <?php echo ($row['studentRegion'] == 'littoral') ? 'selected' : ''; ?>>Littoral</option>
                                                        <option value="north" <?php echo ($row['studentRegion'] == 'north') ? 'selected' : ''; ?>>North</option>
                                                        <option value="northwest" <?php echo ($row['studentRegion'] == 'northwest') ? 'selected' : ''; ?>>Northwest</option>
                                                        <option value="west" <?php echo ($row['studentRegion'] == 'west') ? 'selected' : ''; ?>>West</option>
                                                        <option value="south" <?php echo ($row['studentRegion'] == 'south') ? 'selected' : ''; ?>>South</option>
                                                        <option value="southwest" <?php echo ($row['studentRegion'] == 'southwest') ? 'selected' : ''; ?>>Southwest</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputZip" class="form-label">Quater</label>
                                                    <input type="text" class="form-control" value="<?= $row['studentLocation'] ?>" name="studentLocation">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputCity" class="form-label">Landline Phone:</label>
                                                    <input type="number" class="form-control" value="<?= $row['studentFixPhone'] ?>" name="studentFixPhone">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputZip" class="form-label">Mobile Phone:</label>
                                                    <input type="number" class="form-control" value="<?= $row['studentMobilePhone'] ?>" name="studentMobilePhone">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputAddress" class="form-label">Email:</label>
                                                    <input type="email" class="form-control" value="<?= $row['studentEmail'] ?>" name="studentEmail">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="inputAddress2" class="form-label">P.O Box:</label>
                                                    <input type="text" class="form-control" value="<?= $row['studentPOBox'] ?>" name="studentPOBox">
                                                </div>

                                                <div class="">
                                                    <li for="" class="form-label list-item">Have you ever use the
                                                        internet(For school purpose)
                                                    </li>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                        <?php echo ($row['InternetUsage'] == 'Yes') ? 'checked' : ''; ?>
                                                            name="InternetUsage" value="Yes" id="flexRadioDefaultP2">
                                                        <label class="form-check-label" for="flexRadioDefaultP2">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                        <?php echo ($row['InternetUsage'] == 'No') ? 'checked' : ''; ?>
                                                            name="InternetUsage" value="No"
                                                            formControlName="InternetUsage" id="flexRadioDefaultP3">
                                                        <label class="form-check-label" for="flexRadioDefaultP3">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <label for="inputAddress2" class="form-label">Frequency of use
                                                        (hours)? Per week</label>
                                                    <input type="number" class="form-control"
                                                        name="InternetUsage_duartion" value="<?= $row['InternetUsage_duartion'] ?>" placeholder="Ex: 10 hours">
                                                </div>
                                            </div>

                                            <!--  Question 3  -->
                                            <div>
                                                <li for="" class="form-label mt-5">How did you come to know about
                                                    MozartCours?</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through a poster') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion" value="Through a poster"
                                                        name="mozartCours_Promotion" id="flexRadioDefaultp1">
                                                    <label class="form-check-label" for="flexRadioDefaultp1">
                                                        Through a poster
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through a flyer/handout') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion"
                                                        value="Through a flyer/handout" name="mozartCours_Promotion"
                                                        id="flexRadioDefaultp2">
                                                    <label class="form-check-label" for="flexRadioDefaultp2">
                                                        Through a flyer/handout
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through word of mouth') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion"
                                                        value="Through word of mouth" name="mozartCours_Promotion"
                                                        id="flexRadioDefaultp3">
                                                    <label class="form-check-label" for="flexRadioDefaultp3">
                                                        Through word of mouth
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through a banner') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion" value="Through a banner"
                                                        name="mozartCours_Promotion" id="flexRadioDefaultp4">
                                                    <label class="form-check-label" for="flexRadioDefaultp4">
                                                        Through a banner
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through a commercial/advertisement') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion"
                                                        value="Through a commercial/advertisement"
                                                        name="mozartCours_Promotion" id="flexRadioDefaultp5">
                                                    <label class="form-check-label" for="flexRadioDefaultp5">
                                                        Through a commercial/advertisement
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                    <?php echo ($row['mozartCours_Promotion'] == 'Through the internet') ? 'checked' : ''; ?>
                                                        formControlName="mozartCours_Promotion"
                                                        value="Through the internet" name="mozartCours_Promotion"
                                                        id="flexRadioDefaultp6">
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
                                <div class="justify-content-center text-center">
                                        <a class="btn btn-danger col-3 mx-auto" onclick="cancelRedirect()">Cancel</a>
                                        <button name="edit_btn" type="submit" class="btn btn-primary col-3 mx-auto">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <?php include('../includes/footer.php');?>

        </div>


    </main>
    <script>
            function cancelRedirect() {
              window.location.href = '../parent.php';
            }
    </script>


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js"></script>
</body>

</html>
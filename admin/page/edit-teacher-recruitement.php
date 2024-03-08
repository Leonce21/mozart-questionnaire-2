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
        $stmt = $pdo->prepare("SELECT * FROM teacherrecruitement WHERE id = :id");
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

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
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

    <!-- CSS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                                <a href="../questionnaire.php" class="btn btn-primary float-end">Back</a>

                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="update-teacher-recruitement.php">
                                <!-- Add hidden input field for ID -->
                                <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">

                                <div mat-dialog-content class="ms-5 content">
                                    <!--   page 1 start -->
                                    <div>

                                        <ol class="list-group list-numbered card-body ms-4">
                                            <!--  Question 1  -->
                                            <div>

                                                <li for="" class="form-label list-item mt-2">Your Details</li>
                                                <div class="row g-3">
                                                    <div class="col-md-10">
                                                        <label for="Name" class="form-label">First and Last name</label>
                                                        <input type="text" id="Name" class="form-control" value="<?= $row['Name'] ?>" name="Name"
                                                            required>

                                                    </div>

                                                    <div class="col-md-5 form-group">
                                                        <label for="region" class="form-label">Nationality</label>
                                                        <input type="text" class="form-control" value="<?= $row['nationality'] ?>" name="nationality">
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputCity" class="form-label">Date of Birth</label>
                                                        <input type="date" class="form-control" value="<?= $row['date_of_birth'] ?>" name="date_of_birth">
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputZip" class="form-label">District</label>
                                                        <input type="text" class="form-control" value="<?= $row['District'] ?>" name="District">

                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputCity" class="form-label">Issued on </label>
                                                        <input type="date" class="form-control" value="<?= $row['Date_Issued'] ?>" name="Date_Issued">
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputCity" class="form-label">Landline Phone/Fixed
                                                            Phone:</label>
                                                        <input type="number" class="form-control" value="<?= $row['FixPhone'] ?>" name="FixPhone">
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputZip" class="form-label">Mobile Phone:</label>
                                                        <input type="number" class="form-control" value="<?= $row['MobilePhone'] ?>" name="MobilePhone">
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputAddress" class="form-label">Email:</label>
                                                        <input type="email" class="form-control" value="<?= $row['Email'] ?>" name="Email" required>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="inputAddress2" class="form-label">P.O Box:</label>
                                                        <input type="text" class="form-control" value="<?= $row['PObox'] ?>" name="PObox">
                                                    </div>
                                                </div>

                                            </div>

                                            <!--  Question 2  -->
                                            <div class="col-md-10">
                                                <li for="" class="form-label">How did you hear about MozartCours?</li>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="mozartCours_Promotion"
                                                    formControlName="mozartCours_Promotion">
                                                    <option value="" selected disabled>Choose...</option>
                                                    <option value="Poster" <?php echo ($row['mozartCours_Promotion'] == 'Poster') ? 'selected' : ''; ?>>By a poster </option>
                                                    <option value="Leaflet" <?php echo ($row['mozartCours_Promotion'] == 'Leaflet') ? 'selected' : ''; ?>>A leaflet </option>
                                                    <option value="Mouth to mouth" <?php echo ($row['mozartCours_Promotion'] == 'Mouth to mouth') ? 'selected' : ''; ?>>Word of mouth </option>
                                                    <option value="Internet" <?php echo ($row['mozartCours_Promotion'] == 'Internet') ? 'selected' : ''; ?>>Internet </option>
                                                    <option value="Banner" <?php echo ($row['mozartCours_Promotion'] == 'Banner') ? 'selected' : ''; ?>>Banner </option>
                                                </select>
                                            </div>

                                            <!--  Question 3  -->
                                            <div class="col-md-10">
                                                <li for="" class="form-label">Means of transport</li>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="MeansOfTransport">
                                                    <option value="" selected disabled>Choose...</option>
                                                    <option value="Car" <?php echo ($row['MeansOfTransport'] == 'Car') ? 'selected' : ''; ?>>Car </option>
                                                    <option value="Taxi" <?php echo ($row['MeansOfTransport'] == 'Taxi') ? 'selected' : ''; ?>>A Taxi </option>
                                                    <option value="Bicycle" <?php echo ($row['MeansOfTransport'] == 'Bicycle') ? 'selected' : ''; ?>>A bicycle </option>
                                                    <option value="Scooter" <?php echo ($row['MeansOfTransport'] == 'Scooter') ? 'selected' : ''; ?>>A Scooter </option>
                                                    <option value="Motocycle" <?php echo ($row['MeansOfTransport'] == 'Motocycle') ? 'selected' : ''; ?>>A Motocycle</option>
                                                </select>
                                            </div>

                                            <!--  Question 4  -->
                                            <div class="col-md-10">
                                                <li for="" class="form-label">Current Situation</li>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="CurrentSituation" >
                                                    <option value="" selected disabled>Choose...</option>
                                                    <option value="Current teacher" <?php echo ($row['CurrentSituation'] == 'Current teacher') ? 'selected' : ''; ?>>Current teacher</option>
                                                    <option value="Retired teacher" <?php echo ($row['CurrentSituation'] == 'Retired teacher') ? 'selected' : ''; ?>>Retired teacher</option>
                                                    <option value="Student" <?php echo ($row['CurrentSituation'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                                                    <option value="Without activity" <?php echo ($row['CurrentSituation'] == 'Without activity') ? 'selected' : ''; ?>>Without activity</option>
                                                    <option value="Trainer" <?php echo ($row['CurrentSituation'] == 'Trainer') ? 'selected' : ''; ?>>Trainer</option>
                                                    <option value="Employee" <?php echo ($row['CurrentSituation'] == 'Employee') ? 'selected' : ''; ?>>Employee</option>
                                                </select>
                                            </div>

                                            <!-- Question 5 -->
                                            <div class="row g-3">
                                                <li for="" class="form-label mt-5">Your Studies</li>
                                                <div class="col-md-5 form-group">
                                                    <label for="degree" class="form-label">Highest Degree
                                                        obtained</label>
                                                    <input type="text" class="form-control" name="degreeobtained" value="<?= $row['degreeobtained'] ?>"
                                                        placeholder="Ex: HND, Masters,...">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="year" class="form-label">Year</label>
                                                    <input type="date" class="form-control" name="year_of_degree" value="<?= $row['year_of_degree'] ?>">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="degree" class="form-label">Speciality</label>
                                                    <input type="text" class="form-control" name="Speciality" value="<?= $row['Speciality'] ?>"
                                                        placeholder="Ex: Engineering, Accountancy,...">
                                                </div>

                                                <div class="col-md-5">
                                                    <label for="degree" class="form-label">University/School</label>
                                                    <input type="text" class="form-control" name="institution" value="<?= $row['institution'] ?>"
                                                        placeholder="Ex: UY1, ENSPY,...">
                                                </div>

                                            </div>

                                            <!-- Question 6 -->
                                            <div>
                                                <li for="" class="form-label list-item">
                                                    Have you ever given private lessons in a private setting?
                                                </li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="private_class"
                                                        formControlName="private_class" value="Yes"
                                                        <?php echo ($row['private_class'] == 'Yes') ? 'checked' : ''; ?>
                                                        id="flexRadioDefault1" />
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="private_class"
                                                        formControlName="private_class" value="No"
                                                        <?php echo ($row['private_class'] == 'No') ? 'checked' : ''; ?>
                                                        id="flexRadioDefault2" />
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Question 7 -->
                                            <div>
                                                <li for="" class="form-label list-item">
                                                    Have you ever given private lessons within the framework of an
                                                    organization?
                                                </li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="support_class"
                                                        formControlName="support_class" value="Yes"
                                                        <?php echo ($row['private_class'] == 'No') ? 'checked' : ''; ?>
                                                        id="flexRadioDefault3" />
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="support_class"
                                                        formControlName="support_class" value="No"
                                                        <?php echo ($row['private_class'] == 'No') ? 'checked' : ''; ?>
                                                        id="flexRadioDefault4" />
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Question 8 -->
                                            <div class="">
                                                <li for="" class="form-label">What are your educational or associative
                                                    experiences? </li>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="experience" value="<?= $row['experience'] ?>"
                                                        placeholder="">
                                                </div>
                                            </div>

                                            <!-- Question 9 -->
                                            <div class="">
                                                <li for="" class="form-label">What are your main motivations for
                                                    teaching? </li>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="teachingmotivation" value="<?= $row['teachingmotivation'] ?>"
                                                        placeholder="">
                                                </div>
                                            </div>

                                            <div class="">
                                                <li for="" class="form-label list-item">Have you ever use the
                                                    internet(For school purpose)</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="InternetUsage"
                                                    <?php echo ($row['InternetUsage'] == 'Yes') ? 'checked' : ''; ?>
                                                        value="Yes" id="flexRadioDefaultP2">
                                                    <label class="form-check-label" for="flexRadioDefaultP2">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="InternetUsage"
                                                    <?php echo ($row['InternetUsage'] == 'No') ? 'checked' : ''; ?>
                                                        value="No" id="flexRadioDefaultP3">
                                                    <label class="form-check-label" for="flexRadioDefaultP3">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputAddress2" class="form-label">Frequency of use (hours)? Per
                                                    week</li>
                                                <input type="text" class="form-control" name="InternetUsage_duartion"
                                                value="<?= $row['InternetUsage_duartion'] ?>"
                                                    placeholder="Ex: 10 hours">
                                            </div>

                                            <!-- Question 10 -->
                                            <li for="inputAddress" class="form-label">
                                                In which subjects and for which levels do you wish to teach?
                                            </li>
                                            <div class="col-md-10 table-responsive me-5">
                                                <div class="">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Subjects</th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="Subject1"
                                                                        class="form-control" placeholder="Ex: Computer">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="Subject2"
                                                                        class="form-control"
                                                                        placeholder="Ex: Geography">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="Subject3"
                                                                        class="form-control" placeholder="Ex: French">
                                                                </th>
                                                                <!-- <th scope="col">
                      <input type="text" formControlName="Subject4" class="form-control" placeholder="Ex: English">
                    </th>
                    <th scope="col">
                      <input type="text" formControlName="Subject5" class="form-control" placeholder="Ex: Biology">
                    </th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Levels</th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="levels1"
                                                                        class="form-control" placeholder="Ex: Primary">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="levels2"
                                                                        class="form-control"
                                                                        placeholder="Ex: Secondary">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" formControlName="levels3"
                                                                        class="form-control"
                                                                        placeholder="Ex: University">
                                                                </th>
                                                                <!-- <th scope="col">
                      <input type="text" formControlName="levels4" class="form-control" placeholder="Ex: Primary">
                    </th>
                    <th scope="col">
                      <input type="text" formControlName="levels5" class="form-control" placeholder="Ex: Secondary">
                    </th> -->
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputAddress2" class="form-label">How many hours of lessons
                                                    would you like to give each week?</li>
                                                <input type="number" class="form-control" name="hoursOfLesson" value="<?= $row['hoursOfLesson'] ?>" 
                                                    placeholder="Ex: 10 hours">
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputAddress2" class="form-label">What are your geographic
                                                    preferences (neighborhoods) for teaching? </li>
                                                <input type="text" class="form-control" name="geographicPreferences" value="<?= $row['geographicPreferences'] ?>"
                                                    placeholder="Ex: Mimboman, Essos, Omnisport">
                                            </div>

                                            <!--  Question 7  -->
                                            <div class="me-4">
                                                <li for="" class="form-label">Check in this table your hourly
                                                    availability to give lessons?</li>
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
                                                                        <?php echo ($row['Monday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Monday" value="Morning"
                                                                            formControlName="Monday" id="Q17">
                                                                        <label class="form-check-label" for="Q17">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Monday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Monday" value="AfterNoon"
                                                                            formControlName="Monday" id="Q18">
                                                                        <label class="form-check-label" for="Q18">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Monday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Monday" value="Evenning"
                                                                            formControlName="Monday" id="Q19">
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
                                                                        <?php echo ($row['Tuesday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Tuesday" value="Morning"
                                                                            formControlName="Tuesday" id="Q20">
                                                                        <label class="form-check-label" for="Q20">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Tuesday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Tuesday" value="AfterNoon"
                                                                            formControlName="Tuesday" id="Q21">
                                                                        <label class="form-check-label" for="Q21">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Tuesday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Tuesday" value="Evenning"
                                                                            formControlName="Tuesday" id="Q22">
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
                                                                        <?php echo ($row['Wednesday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Wednesday" value="Morning"
                                                                            formControlName="Wednesday" id="Q23">
                                                                        <label class="form-check-label" for="Q23">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Wednesday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Wednesday" value="AfterNoon"
                                                                            formControlName="Wednesday" id="Q2">
                                                                        <label class="form-check-label" for="Q2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Wednesday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Wednesday" value="Evenning"
                                                                            formControlName="Wednesday" id="Q3">
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
                                                                        <?php echo ($row['Thursday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Thursday" value="Morning"
                                                                            formControlName="Thursday" id="Qthurs">
                                                                        <label class="form-check-label" for="Qthurs">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Thursday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Thursday" value="AfterNoon"
                                                                            formControlName="Thursday" id="Qthurs2">
                                                                        <label class="form-check-label" for="Qthurs2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Thursday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Thursday" value="Evenning"
                                                                            formControlName="Thursday" id="Qthurs3">
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
                                                                        <?php echo ($row['Friday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Friday" value="Morning"
                                                                            formControlName="Friday" id="Qfri1">
                                                                        <label class="form-check-label" for="Qfri1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Friday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Friday" value="AfterNoon"
                                                                            formControlName="Friday" id="Qfri2">
                                                                        <label class="form-check-label" for="Qfri2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Friday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Friday" value="Evenning"
                                                                            formControlName="Friday" id="Qfri3">
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
                                                                        <?php echo ($row['Saturday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Saturday" value="Morning"
                                                                            formControlName="Saturday" id="Qsat1">
                                                                        <label class="form-check-label" for="Qsat1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Saturday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Saturday" value="AfterNoon"
                                                                            formControlName="Saturday" id="Qsat2">
                                                                        <label class="form-check-label" for="Qsat2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Saturday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Saturday" value="Evenning"
                                                                            formControlName="Saturday" id="Qsat3">
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
                                                                        <?php echo ($row['Sunday'] == 'Morning') ? 'checked' : ''; ?>
                                                                            name="Sunday" value="Morning"
                                                                            formControlName="Sunday" id="Qsun1">
                                                                        <label class="form-check-label" for="Qsun1">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Sunday'] == 'AfterNoon') ? 'checked' : ''; ?>
                                                                            name="Sunday" value="AfterNoon"
                                                                            formControlName="Sunday" id="Qsun2">
                                                                        <label class="form-check-label" for="Qsun2">

                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                        <?php echo ($row['Sunday'] == 'Evenning') ? 'checked' : ''; ?>
                                                                            name="Sunday" value="Evenning"
                                                                            formControlName="Sunday" id="Qsun3">
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
                                </div>
                                <!-- buttons  -->
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
              window.location.href = '../teacher-recruitement.php';
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
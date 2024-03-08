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
        $stmt = $pdo->prepare("SELECT * FROM serviceguide WHERE id = :id");
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
// delete record
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM serviceguide wHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result)
    {
        $_SESSION['verify'] = "record deleted successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../questionnaire.php');
    }else{
        $_SESSION['verify'] = "Error in deleting the record";
        $_SESSION['verify_message'] = "error";
        header('location:../questionnaire.php');
    }
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
                            <form class="" role="form" method="POST" action="update-questionnaire.php">
                                <!-- Add hidden input field for ID -->
                                <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">

                                <div mat-dialog-content class=" ms-5">
                                    <ol class="list-group list-numbered card-body ms-4 row g-3">
                                        <div class="col-md-10">
                                            <li for="inputEmail4" class="form-label">Code and/or Family name<span
                                                    class="required-indicator">*</span></li>
                                            <input type="text" class="form-control" value="<?= $row['FamilyName'] ?>" name="FamilyName">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputEmail4" class="form-label">Student name<span
                                                    class="required-indicator">*</span></li>
                                            <input type="text" class="form-control" value="<?= $row['StudentName'] ?>" name="StudentName">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputCity" class="form-label">First teacher name</li>
                                            <input type="text" class="form-control" value="<?= $row['FirstTeacherName'] ?>" name="FirstTeacherName">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputCity" class="form-label">Second teacher name</li>
                                            <input type="text" class="form-control" value="<?= $row['SecondTeacherName'] ?>" name="SecondTeacherName">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputCity" class="form-label">Third teacher name</li>
                                            <input type="text" class="form-control" value="<?= $row['ThirdTeacherName'] ?>" name="ThirdTeacherName">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Subjects taken</li>
                                            <input type="text" class="form-control" value="<?= $row['SubjectsTaken'] ?>" name="SubjectsTaken">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Subjects taught</li>
                                            <input type="text" class="form-control" value="<?= $row['SubjectsTaught'] ?>" name="SubjectsTaught">
                                        </div>

                                    </ol>
                                    <!--    Yes/No questions table    -->
                                    <div class="col-md-12 table-responsive me-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Questions</th>
                                                    <th colspan="2" class="text-center">Student</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!--    question 1    -->
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Are the monitoring notebooks well filled?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_one"
                                                            <?php echo ($row['Q_one'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_one" id="Q1">
                                                            <label class="form-check-label" for="Q1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_one"
                                                            <?php echo ($row['Q_one'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_one" id="Q2">
                                                            <label class="form-check-label" for="Q2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 2    -->
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Is the teacher very often on time?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_two"
                                                            <?php echo ($row['Q_two'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_two" id="Q3">
                                                            <label class="form-check-label" for="Q3">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_two"
                                                            <?php echo ($row['Q_two'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_two" id="Q4">
                                                            <label class="form-check-label" for="Q4">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 3    -->
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Did the teacher miss any sessions?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_three"
                                                            <?php echo ($row['Q_three'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_three" id="Q5">
                                                            <label class="form-check-label" for="Q5">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_three"
                                                            <?php echo ($row['Q_three'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_three" id="Q6">
                                                            <label class="form-check-label" for="Q6">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 4    -->
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Does the teacher respect the duration of the sessions?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_four"
                                                            <?php echo ($row['Q_four'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_four" id="Q7">
                                                            <label class="form-check-label" for="Q7">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_four"
                                                            <?php echo ($row['Q_four'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_four" id="Q8">
                                                            <label class="form-check-label" for="Q8">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 5    -->
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Are you always ready on time for the classes?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_five"
                                                            <?php echo ($row['Q_five'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_five" id="Q9">
                                                            <label class="form-check-label" for="Q9">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_five"
                                                            <?php echo ($row['Q_five'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_five" id="Q10">
                                                            <label class="form-check-label" for="Q10">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 6    -->
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Do you always do the homework he gives you?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_six"
                                                            <?php echo ($row['Q_six'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_six" id="Q11">
                                                            <label class="form-check-label" for="Q11">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_six"
                                                            <?php echo ($row['Q_six'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_six" id="Q12">
                                                            <label class="form-check-label" for="Q12">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 7    -->
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Do you have any motivation issues?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_seven"
                                                            <?php echo ($row['Q_seven'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_seven" id="Q13">
                                                            <label class="form-check-label" for="Q13">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_seven"
                                                            <?php echo ($row['Q_seven'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_seven" id="Q14">
                                                            <label class="form-check-label" for="Q14">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 8    -->
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>Do you present your weaknesses to the teacher effectively?</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eight"
                                                            <?php echo ($row['Q_eight'] == 'Yes') ? 'checked' : ''; ?>
                                                                value="Yes" formControlName="Q_eight" id="Q15">
                                                            <label class="form-check-label" for="Q15">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eight"
                                                            <?php echo ($row['Q_eight'] == 'No') ? 'checked' : ''; ?>
                                                                value="No" formControlName="Q_eight" id="Q16">
                                                            <label class="form-check-label" for="Q16">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <!--  End of Yes/No questions table    -->
                                    <!-- 
                    <div class="col-10">
                        <label for="inputAddress" class="form-label">Teacher Number : </label>
                        <input type="number" class="form-control" formControlName="TeacherNumber">
                    </div> -->

                                    <div>
                                        <p>The advisor will check the corresponding box according to the following
                                            evaluation:</p>
                                        <ol class="d-flex justify-content-start mks">

                                        </ol>
                                    </div>

                                    <!--    Yes/No questions table    -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col"></th>
                                                    <th colspan="5" class="text-center">Student</th>

                                                </tr>
                                            </thead>

                                            <tbody >
                                                <!--    question 9    -->
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td style="width: 5%;">How do you judge the quality of the teacher's interventions?
                                                        (Relevant, quickly
                                                        understands my problem, seems to have a good command of the
                                                        subject...)
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_nine"
                                                            <?php echo ($row['Q_nine'] == '5') ? 'checked' : ''; ?>
                                                                value="5" formControlName="Q_nine" id="Q17">
                                                            <label class="form-check-label" for="Q17">
                                                                5
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_nine"
                                                            <?php echo ($row['Q_nine'] == '4') ? 'checked' : ''; ?>
                                                                value="4" formControlName="Q_nine" id="Q18">
                                                            <label class="form-check-label" for="Q18">
                                                                4
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_nine"
                                                            <?php echo ($row['Q_nine'] == '3') ? 'checked' : ''; ?>
                                                                value="3" formControlName="Q_nine" id="Q19">
                                                            <label class="form-check-label" for="Q19">
                                                                3
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_nine"
                                                            <?php echo ($row['Q_nine'] == '2') ? 'checked' : ''; ?>
                                                                value="2" formControlName="Q_nine" id="Q20">
                                                            <label class="form-check-label" for="Q20">
                                                                2
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_nine"
                                                            <?php echo ($row['Q_nine'] == '1') ? 'checked' : ''; ?>
                                                                value="1" formControlName="Q_nine" id="Q21">
                                                            <label class="form-check-label" for="Q21">
                                                                1
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 10    -->
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td colspan="1">How do you assess your relationship with the teacher? (He is
                                                        nice, kind,
                                                        attentive, we get along well, he doesn't make fun of my
                                                        mistakes, he is
                                                        patient...)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_ten"
                                                            <?php echo ($row['Q_ten'] == '5') ? 'checked' : ''; ?>
                                                                value="5" formControlName="Q_ten" id="Q22">
                                                            <label class="form-check-label" for="Q22">
                                                                5
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_ten"
                                                            <?php echo ($row['Q_ten'] == '4') ? 'checked' : ''; ?>
                                                                value="4" formControlName="Q_ten" id="Q23">
                                                            <label class="form-check-label" for="Q23">
                                                                4
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_ten"
                                                            <?php echo ($row['Q_ten'] == '3') ? 'checked' : ''; ?>
                                                                value="3" formControlName="Q_ten" id="Q24">
                                                            <label class="form-check-label" for="Q24">
                                                                3
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_ten"
                                                            <?php echo ($row['Q_ten'] == '2') ? 'checked' : ''; ?>
                                                                value="2" formControlName="Q_ten" id="Q25">
                                                            <label class="form-check-label" for="Q25">
                                                                2
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_ten"
                                                            <?php echo ($row['Q_ten'] == '1') ? 'checked' : ''; ?>
                                                                value="1" formControlName="Q_ten" id="Q26">
                                                            <label class="form-check-label" for="Q26">
                                                                1
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 11    -->
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td colspan="1">Does the teacher explain the concepts well? (Is he clear,
                                                        precise, gives
                                                        examples...)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eleven"
                                                            <?php echo ($row['Q_eleven'] == '5') ? 'checked' : ''; ?>
                                                                value="5" formControlName="Q_eleven" id="Q27">
                                                            <label class="form-check-label" for="Q27">
                                                                5
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eleven"
                                                            <?php echo ($row['Q_eleven'] == '4') ? 'checked' : ''; ?>
                                                                value="4" formControlName="Q_eleven" id="Q28">
                                                            <label class="form-check-label" for="Q28">
                                                                4
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eleven"
                                                            <?php echo ($row['Q_eleven'] == '3') ? 'checked' : ''; ?>
                                                                value="3" formControlName="Q_eleven" id="Q29">
                                                            <label class="form-check-label" for="Q29">
                                                                3
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eleven"
                                                            <?php echo ($row['Q_eleven'] == '2') ? 'checked' : ''; ?>
                                                                value="2" formControlName="Q_eleven" id="Q30">
                                                            <label class="form-check-label" for="Q30">
                                                                2
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_eleven"
                                                            <?php echo ($row['Q_eleven'] == '1') ? 'checked' : ''; ?>
                                                                value="1" formControlName="Q_eleven" id="Q31">
                                                            <label class="form-check-label" for="Q31">
                                                                1
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 12    -->
                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td colspan="1">How do you judge the method used to make you understand? (It
                                                        suits me, not very
                                                        adapted, difficult)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_twelve"
                                                             <?php echo ($row['Q_twelve'] == '5') ? 'checked' : ''; ?>
                                                                value="5" formControlName="Q_twelve" id="Q32">
                                                            <label class="form-check-label" for="Q32">
                                                                5
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_twelve"
                                                             <?php echo ($row['Q_twelve'] == '4') ? 'checked' : ''; ?>
                                                                value="4" formControlName="Q_twelve" id="Q33">
                                                            <label class="form-check-label" for="Q33">
                                                                4
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_twelve"
                                                             <?php echo ($row['Q_twelve'] == '3') ? 'checked' : ''; ?>
                                                                value="3" formControlName="Q_twelve" id="Q34">
                                                            <label class="form-check-label" for="Q34">
                                                                3
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_twelve"
                                                             <?php echo ($row['Q_twelve'] == '2') ? 'checked' : ''; ?>
                                                                value="2" formControlName="Q_twelve" id="Q35">
                                                            <label class="form-check-label" for="Q35">
                                                                2
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="Q_twelve"
                                                             <?php echo ($row['Q_twelve'] == '1') ? 'checked' : ''; ?>
                                                                value="1" formControlName="Q_twelve" id="Q36">
                                                            <label class="form-check-label" for="Q36">
                                                                1
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 13    -->
                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td style="width:10%">How do you appreciate any progress made? (I understand better, I
                                                        got good
                                                        grades, I know how to study,...)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="Q_thirteen" value="5" formControlName="Q_thirteen"
                                                                <?php echo ($row['Q_thirteen'] == '5') ? 'checked' : ''; ?>
                                                                id="Q37">
                                                            <label class="form-check-label" for="Q37">
                                                                5
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="Q_thirteen" value="4" formControlName="Q_thirteen"
                                                                <?php echo ($row['Q_thirteen'] == '4') ? 'checked' : ''; ?>
                                                                id="Q38">
                                                            <label class="form-check-label" for="Q38">
                                                                4
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="Q_thirteen" value="3" formControlName="Q_thirteen"
                                                                <?php echo ($row['Q_thirteen'] == '3') ? 'checked' : ''; ?>
                                                                id="Q39">
                                                            <label class="form-check-label" for="Q39">
                                                                3
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="Q_thirteen" value="2" formControlName="Q_thirteen"
                                                                <?php echo ($row['Q_thirteen'] == '2') ? 'checked' : ''; ?>
                                                                id="f2">
                                                            <label class="form-check-label" for="q40">
                                                                2
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="Q_thirteen" value="1" formControlName="Q_thirteen"
                                                                <?php echo ($row['Q_thirteen'] == '1') ? 'checked' : ''; ?>
                                                                id="Q41">
                                                            <label class="form-check-label" for="Q41">
                                                                1
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--    question 14    -->
                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td>Are there any other issues to mention?</td>
                                                    <td colspan="2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                            <?php echo ($row['Q_fourteen'] == 'Yes') ? 'checked' : ''; ?>
                                                                name="Q_fourteen" value="Yes"
                                                                formControlName="Q_fourteen" id="Q42">
                                                            <label class="form-check-label" for="Q42">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                            <?php echo ($row['Q_fourteen'] == 'No') ? 'checked' : ''; ?>
                                                                name="Q_fourteen" value="No"
                                                                formControlName="Q_fourteen" id="Q43">
                                                            <label class="form-check-label" for="Q43">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td>If yes, explain</td>
                                                    <th colspan="5"><input type="text" class="form-control"
                                                            formControlName="Q_fourteenText"></th>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!--  End of Yes/No questions table    -->

                                    <p class="col-md-10">If applicable (otherwise, respond to the last line only), what
                                        grades did you
                                        get on assignments?</p>

                                    <div class="col-md-11">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-responsive ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">The subjects for the support or related courses.
                                                        </th>
                                                        <th scope="col"><input type="text" name="SubjectForCourse1"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="SubjectForCourse2"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="SubjectForCourse3"
                                                                class="form-control"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Marks obtained</th>
                                                        <th scope="col"><input type="text" name="SubjectMark1"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="SubjectMark2"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="SubjectMark3"
                                                                class="form-control"></th>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Evaluation date</th>
                                                        <th scope="col"><input type="date" name="Evaluationdate1"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="date" name="Evaluationdate2"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="date" name="Evaluationdate3"
                                                                class="form-control"></th>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Reasons for these marks</th>
                                                        <th scope="col"><input type="text" name="ReasonsForMarks1"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="ReasonsForMarks2"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="ReasonsForMarks3"
                                                                class="form-control"></th>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Difficulties you still encounter during these
                                                            subjects</th>
                                                        <th scope="col"><input type="text" name="Subjectdifficulty1"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="Subjectdifficulty2"
                                                                class="form-control"></th>
                                                        <th scope="col"><input type="text" name="Subjectdifficulty3"
                                                                class="form-control"></th>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <p class="col-md-10">In cases of notable dissatisfaction, note below the given
                                        reasons</p>

                                    <div class="col-10 table-responsive">


                                        <table class="table table-bordered table-responsive ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Questions No</th>
                                                    <th colspan="2">Different reasons given by the students.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <th scope="col"><textarea name="dissatisfaction1"
                                                            class="form-control" cols="30" rows="1"></textarea></th>

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <th scope="col"><textarea name="dissatisfaction2"
                                                            class="form-control" cols="30" rows="1"></textarea></th>

                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

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
              window.location.href = '../questionnaire.php';
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
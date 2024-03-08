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
        $stmt = $pdo->prepare("SELECT * FROM studentinterview WHERE id = :id");
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

//delete
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM studentinterview wHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result)
    {
        $_SESSION['verify'] = "record deleted successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../student.php');
    }else{
        $_SESSION['verify'] = "Error in deleting the record";
        $_SESSION['verify_message'] = "error";
        header('location:../student.php');
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
                                <a href="../student.php" class="btn btn-primary float-end">Back</a>

                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="" role="form" method="POST"
                                action="update-student.php">

                                <div mat-dialog-content class=" ms-5">
                                    <ol class="list-group list-numbered card-body ms-4 row g-3">
                                        <!-- Add hidden input field for ID -->
                                        <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">

                                        <div class="col-md-10">
                                            <li for="inputEmail4" class="form-label">What's your name?<span
                                                    class="required-indicator">*</span></li>
                                            <input type="text" class="form-control" name="Name" value="<?= $row['Name'] ?>" required >
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Date of Birth<span
                                                    class="required-indicator">*</span>
                                            </li>
                                            <input type="date" class="form-control" name="date_of_birth" value="<?= $row['date_of_birth'] ?>" required/>
                                        </div>

                                        <div class="col-md-5">
                                            <li for="inputZip" class="form-label">What is your sex</li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" 
                                                    type="radio" 
                                                    name="sex" 
                                                    <?php echo ($row['sex'] == 'Male') ? 'checked' : ''; ?>
                                                    value="Male"
                                                    id="gender1" />
                                                <label class="form-check-label" for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" 
                                                    <?php echo ($row['sex'] == 'Female') ? 'checked' : ''; ?>
                                                    name="sex" value="Female"
                                                    id="gender2" />
                                                <label class="form-check-label" for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputCity" class="form-label">Current institution attended?</li>
                                            <input type="text" class="form-control" value="<?= $row['CurrentInstitution'] ?>" name="CurrentInstitution">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputCity" class="form-label">For how long?</li>
                                            <input type="text" class="form-control" value="<?= $row['CurrentInstitutionPeriod'] ?>" name="CurrentInstitutionPeriod"
                                                placeholder="Ex: 3 Years" />
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Class attended?</li>
                                            <input type="text" class="form-control" value="<?= $row['Classattended'] ?>" name="Classattended">
                                        </div>

                                        <div class="col-md-5">
                                            <li for="inputZip" class="form-label">Repeating</li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    <?php echo ($row['repeating'] == 'Yes') ? 'checked' : ''; ?> formControlName="repeating"
                                                    name="repeating" value="Yes" id="rpt1" />
                                                <label class="form-check-label" for="rpt1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    <?php echo ($row['repeating'] == 'No') ? 'checked' : ''; ?> formControlName="repeating"
                                                    name="repeating" value="No" id="rpt2" />
                                                <label class="form-check-label" for="rpt2">
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Previous institution (if new)? </li>
                                            <input type="text" class="form-control"  value="<?= $row['PreviousInstitution'] ?>" name="PreviousInstitution">
                                        </div>

                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Annual average obtained last year /
                                                Current sequential
                                                averages?</li>
                                            <input type="text" class="form-control" value="<?= $row['Annualaverage'] ?>" name="Annualaverage">
                                        </div>


                                        <div class="col-md-10">
                                            <li for="" class="form-label">How would you qualify as a student</li>
                                            <select class="form-select" aria-label="Default select example"
                                                name="studentquality" formControlName="studentquality">
                                                <option value="" selected disabled>Choose...</option>
                                                <option value="Good" <?php echo ($row['studentquality'] == 'Good') ? 'selected' : ''; ?>>Good</option>
                                                <option value="Medium" <?php echo ($row['studentquality'] == 'Medium') ? 'selected' : ''; ?>>Medium</option>
                                                <option value="Bad" <?php echo ($row['studentquality'] == 'Bad') ? 'selected' : ''; ?>>Bad</option>
                                            </select>
                                        </div>


                                        <li for="inputAddress" class="form-label">
                                            Subject Analysis ?
                                        </li>
                                        <div class="col-11">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">The subjects where you have gaps</th>
                                                            <th scope="col"><input type="text" name="Subject1"
                                                                    class="form-control"></th>
                                                            <th scope="col"><input type="text" name="Subject2"
                                                                    class="form-control"></th>
                                                            <th scope="col"><input type="text" name="Subject3"
                                                                    class="form-control"></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">High/low rating</th>
                                                            <th scope="col"><input type="text" name="SubjectRating1"
                                                                    class="form-control"></th>
                                                            <th scope="col"><input type="text" name="SubjectRating2"
                                                                    class="form-control"></th>
                                                            <th scope="col"><input type="text" name="SubjectRating3"
                                                                    class="form-control"></th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">What are the reasons for this low rating
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectRatingReasons1" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectRatingReasons2" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectRatingReasons3" class="form-control">
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">The elements that bother you in these
                                                                subjects</th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectdisturbance1" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectdisturbance2" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectdisturbance3" class="form-control">
                                                            </th>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <li for="region" class="form-label">Subjects Appreciation</li>
                                        <div class="col-11">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-responsive">

                                                    <thead>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">Subject you appreciate</th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectappreciation1" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectappreciation2" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="Subjectappreciation3" class="form-control">
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Subject you don't appreciate</th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectNotAppreciated1" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectNotAppreciated2" class="form-control">
                                                            </th>
                                                            <th scope="col"><input type="text"
                                                                    name="SubjectNotAppreciated3" class="form-control">
                                                            </th>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <li for="inputAddress" class="form-label">
                                            Experience of that classes ?
                                        </li>
                                        <div class="col-11 table-responsive">
                                            <div class="">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Subjects</th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectExp1"
                                                                    class="form-control" placeholder="Ex: Computer">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectExp2"
                                                                    class="form-control" placeholder="Ex: Geography">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectExp3"
                                                                    class="form-control" placeholder="Ex: French">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectExp4"
                                                                    class="form-control" placeholder="Ex: English">
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Number of hours/week</th>
                                                            <th scope="col">
                                                                <input type="text" name="Subjectperiod1"
                                                                    class="form-control" placeholder="Ex: 2hrs">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="Subjectperiod2"
                                                                    class="form-control" placeholder="Ex: 5hrs">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="Subjectperiod3"
                                                                    class="form-control" placeholder="Ex: 1hrs">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="Subjectperiod4"
                                                                    class="form-control" placeholder="Ex: 10hrs">
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Satisfactions (reasons)</th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectSatisfaction1"
                                                                    class="form-control" placeholder="Ex: Satisfied">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectSatisfaction2"
                                                                    class="form-control" placeholder="Ex: Satisfied">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectSatisfaction3"
                                                                    class="form-control"
                                                                    placeholder="Ex: Not Satisfied">
                                                            </th>
                                                            <th scope="col">
                                                                <input type="text" name="SubjectSatisfaction4"
                                                                    class="form-control" placeholder="Ex: Satisfied">
                                                            </th>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!--  Question   14   -->
                                        <div class="col-md-10">
                                            <li for="inputZip" class="form-label">Do you like working with your
                                                comrades/colleagues?</li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    formControlName="group_collaboration" name="group_collaboration"
                                                    <?php echo ($row['group_collaboration'] == 'Yes') ? 'checked' : ''; ?>
                                                    value="Yes" id="comrades1" />
                                                <label class="form-check-label" for="comrades1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    formControlName="group_collaboration" name="group_collaboration"
                                                    <?php echo ($row['group_collaboration'] == 'No') ? 'checked' : ''; ?>
                                                    value="No" id="comrades2" />
                                                <label class="form-check-label" for="comrades2">
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <p class="">
                                            <b>Open questions: </b>(the last 2 questions will allow you to say
                                            the profiles of motivation and identity)
                                        </p>

                                        <!--  Question   17   -->
                                        <div class="col-md-10">
                                            <li for="" class="form-label">How do you learn?</li>
                                            <select class="form-select" aria-label="Default select example"
                                                name="learningApproach" formControlName="learningApproach">
                                                <option value="" selected disabled>Choose...</option>
                                                <option value="Books" <?php echo ($row['learningApproach'] == 'Books') ? 'selected' : ''; ?>>Books</option>
                                                <option value="Internet" <?php echo ($row['learningApproach'] == 'Internet') ? 'selected' : ''; ?>>Internet research</option>
                                                <option value="Internet&books" <?php echo ($row['learningApproach'] == 'Internet&books') ? 'selected' : ''; ?>>Internet and books</option>
                                                <option value="Videos" <?php echo ($row['learningApproach'] == 'Videos') ? 'selected' : ''; ?>>Videos</option>
                                                <option value="Conversation" <?php echo ($row['learningApproach'] == 'Conversation') ? 'selected' : ''; ?>>Conversation</option>
                                            </select>
                                        </div>

                                        <!--  Question   18   -->
                                        <div class="col-10">
                                            <li for="inputAddress" class="form-label">In Learning, what motivates you?
                                            </li>
                                            <input type="text" class="form-control" name="learning_Motivation" value="<?= $row['learning_Motivation'] ?>"
                                                placeholder="Ex: Mathematics, French, Physics" />
                                        </div>

                                        <!--  Question   19   -->
                                        <div class="col-10">
                                            <li for="inputAddress" class="form-label">What is your learning profile?
                                            </li>
                                            <input type="text" class="form-control" value="<?= $row['LearningProfile'] ?>" name="LearningProfile" />
                                        </div>

                                    </ol>
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
              window.location.href = '../student.php';
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
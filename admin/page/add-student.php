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
    

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO studentinterview ( Name, 
        date_of_birth, 
        sex, 
        CurrentInstitution, 
        CurrentInstitutionPeriod, 
        Classattended, 
        repeating, 
        PreviousInstitution, 
        Annualaverage, 
        studentquality, 
        Subject, 
        SubjectRating, 
        SubjectRatingReasons, 
        Subjectdisturbance, 
        Subjectappreciation, 
        SubjectNotAppreciated, 
        SubjectExp, 
        Subjectperiod, 
        SubjectSatisfaction, 
        group_collaboration, 
        learningApproach, 
        learning_Motivation, 
        LearningProfile) VALUES (
        :Name, 
        :date_of_birth, 
        :sex, 
        :CurrentInstitution, 
        :CurrentInstitutionPeriod, 
        :Classattended, 
        :repeating, 
        :PreviousInstitution, 
        :Annualaverage, 
        :studentquality, 
        :Subject, 
        :SubjectRating, 
        :SubjectRatingReasons, 
        :Subjectdisturbance, 
        :Subjectappreciation, 
        :SubjectNotAppreciated, 
        :SubjectExp, 
        :Subjectperiod, 
        :SubjectSatisfaction, 
        :group_collaboration, 
        :learningApproach, 
        :learning_Motivation, 
        :LearningProfile)");

    // Bind parameters
    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':CurrentInstitution', $CurrentInstitution);
    $stmt->bindParam(':CurrentInstitutionPeriod', $CurrentInstitutionPeriod);
    $stmt->bindParam(':Classattended', $Classattended);
    $stmt->bindParam(':repeating', $repeating);
    $stmt->bindParam(':PreviousInstitution', $PreviousInstitution);
    $stmt->bindParam(':Annualaverage', $Annualaverage);
    $stmt->bindParam(':studentquality', $studentquality);
    $stmt->bindParam(':Subject', $Subject);
    $stmt->bindParam(':SubjectRating', $SubjectRating);
    $stmt->bindParam(':SubjectRatingReasons', $SubjectRatingReasons);
    $stmt->bindParam(':Subjectdisturbance', $Subjectdisturbance);
    $stmt->bindParam(':Subjectappreciation', $Subjectappreciation);
    $stmt->bindParam(':SubjectNotAppreciated', $SubjectNotAppreciated);
    $stmt->bindParam(':SubjectExp', $SubjectExp);
    $stmt->bindParam(':Subjectperiod', $Subjectperiod);
    $stmt->bindParam(':SubjectSatisfaction', $SubjectSatisfaction);
    $stmt->bindParam(':group_collaboration', $group_collaboration);
    $stmt->bindParam(':learningApproach', $learningApproach);
    $stmt->bindParam(':learning_Motivation', $learning_Motivation);
    $stmt->bindParam(':LearningProfile', $LearningProfile);

    // Execute the statement
    $result = $stmt->execute();

    // Check and redirect
    
    if ($result) {
        $_SESSION['status'] = "Data inserted successfully";
        $_SESSION['status_code'] = "success";
        header('location:../student.php');
    } else {
        $_SESSION['status'] = "Data not inserted successfully";
        $_SESSION['status_code'] = "error";
        header('location:add-student.php');
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
                            <h4>Add student data
                                <a href="../student.php" class="btn btn-primary float-end">Back</a>

                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="" role="form" method="POST"
                                action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
                                <div class="mt-1">

                                    <div mat-dialog-content class=" ms-5">
                                        <ol class="list-group list-numbered card-body ms-4 row g-3">
                                            <div class="col-md-10">
                                                <li for="inputEmail4" class="form-label">What's your name?<span
                                                        class="required-indicator">*</span></li>
                                                <input type="text" class="form-control" name="Name">
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputZip" class="form-label">Date of Birth<span
                                                        class="required-indicator">*</span>
                                                </li>
                                                <input type="date" class="form-control" name="date_of_birth" />
                                            </div>

                                            <div class="col-md-5">
                                                <li for="inputZip" class="form-label">What is your sex</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex" value="Male"
                                                        id="gender1" />
                                                    <label class="form-check-label" for="gender1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        value="Female" id="gender2" />
                                                    <label class="form-check-label" for="gender2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputCity" class="form-label">Current institution attended?
                                                </li>
                                                <input type="text" class="form-control" name="CurrentInstitution">
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputCity" class="form-label">For how long?</li>
                                                <input type="text" class="form-control" name="CurrentInstitutionPeriod"
                                                    placeholder="Ex: 3 Years" />
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputZip" class="form-label">Class attended?</li>
                                                <input type="text" class="form-control" name="Classattended">
                                            </div>

                                            <div class="col-md-5">
                                                <li for="inputZip" class="form-label">Repeating</li>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        formControlName="repeating" name="repeating" value="Yes"
                                                        id="rpt1" />
                                                    <label class="form-check-label" for="rpt1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        formControlName="repeating" name="repeating" value="No"
                                                        id="rpt2" />
                                                    <label class="form-check-label" for="rpt2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputZip" class="form-label">Previous institution (if new)?
                                                </li>
                                                <input type="text" class="form-control" name="PreviousInstitution">
                                            </div>

                                            <div class="col-md-10">
                                                <li for="inputZip" class="form-label">Annual average obtained last year
                                                    / Current sequential
                                                    averages?</li>
                                                <input type="text" class="form-control" name="Annualaverage">
                                            </div>


                                            <div class="col-md-10">
                                                <li for="" class="form-label">How would you qualify as a student</li>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="studentquality" formControlName="studentquality">
                                                    <option value="" selected disabled>Choose...</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Bad">Bad</option>
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
                                                                        name="SubjectRatingReasons1"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="SubjectRatingReasons2"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="SubjectRatingReasons3"
                                                                        class="form-control"></th>

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
                                                                        name="Subjectappreciation1"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="Subjectappreciation2"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="Subjectappreciation3"
                                                                        class="form-control"></th>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Subject you don't appreciate</th>
                                                                <th scope="col"><input type="text"
                                                                        name="SubjectNotAppreciated1"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="SubjectNotAppreciated2"
                                                                        class="form-control"></th>
                                                                <th scope="col"><input type="text"
                                                                        name="SubjectNotAppreciated3"
                                                                        class="form-control"></th>

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
                                                                        class="form-control"
                                                                        placeholder="Ex: Geography">
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
                                                                        class="form-control"
                                                                        placeholder="Ex: Satisfied">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" name="SubjectSatisfaction2"
                                                                        class="form-control"
                                                                        placeholder="Ex: Satisfied">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" name="SubjectSatisfaction3"
                                                                        class="form-control"
                                                                        placeholder="Ex: Not Satisfied">
                                                                </th>
                                                                <th scope="col">
                                                                    <input type="text" name="SubjectSatisfaction4"
                                                                        class="form-control"
                                                                        placeholder="Ex: Satisfied">
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
                                                        value="Yes" id="comrades1" />
                                                    <label class="form-check-label" for="comrades1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        formControlName="group_collaboration" name="group_collaboration"
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
                                                    <option value="Books">Books</option>
                                                    <option value="Internet">Internet research</option>
                                                    <option value="Internet & books">Internet and books</option>
                                                    <option value="Videos">Videos</option>
                                                    <option value="Conversation">Conversation</option>
                                                </select>
                                            </div>

                                            <!--  Question   18   -->
                                            <div class="col-10">
                                                <li for="inputAddress" class="form-label">In Learning, what motivates
                                                    you? </li>
                                                <input type="text" class="form-control" name="learning_Motivation"
                                                    placeholder="Ex: Mathematics, French, Physics" />
                                            </div>

                                            <!--  Question   19   -->
                                            <div class="col-10">
                                                <li for="inputAddress" class="form-label">What is your learning profile?
                                                </li>
                                                <input type="text" class="form-control" name="LearningProfile" />
                                            </div>

                                        </ol>
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

        </div>
        <script>
            function cancelRedirect() {
              window.location.href = '../student.php';
            }
        </script>
</body>

</html>
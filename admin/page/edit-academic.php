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
        $stmt = $pdo->prepare("SELECT * FROM academicsupport WHERE id = :id");
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
    $stmt = $pdo->prepare("DELETE FROM academicsupport wHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if($result)
    {
        $_SESSION['verify'] = "record deleted successfully";
        $_SESSION['verify_message'] = "success";
        header('location:../academin-support.php');
    }else{
        $_SESSION['verify'] = "Error in deleting the record";
        $_SESSION['verify_message'] = "error";
        header('location:../academin-support.php');
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
                            <form class="" role="form" method="POST" action="update-academic.php">

                                <div mat-dialog-content class="ms-5">

                                    <ol class="list-group list-numbered">
                                        <!-- Add hidden input field for ID -->
                                        <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">

                                        <div class="col-md-10 m-1">
                                            <label for="firstname" class="form-check-label col-md-5">Name and
                                                SurName<span class="required-indicator">*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                value="<?= $row['firstname'] ?>"
                                                formControlName="firstname" required>
                                        </div>
                                        <!--  Question 1  -->
                                        <div class="col-lg-10 m-1">

                                            <li for="" class="form-label list-item">
                                                <mat-label>In your opinion, is academic support essential for a
                                                    student...?</mat-label>
                                            </li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q1"
                                                <?php echo ($row['Q1'] == 'No, because a student can succeed very well without academic support') ? 'checked' : ''; ?>
                                                    name="Q1"
                                                    value="No, because a student can succeed very well without academic support"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    No, because a student can succeed very well without academic support
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q1"
                                                <?php echo ($row['Q1'] == 'Yes, because it always brings an added value to the student who receives it') ? 'checked' : ''; ?>
                                                    name="Q1"
                                                    value="Yes, because it always brings an added value to the student who receives it"
                                                    id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Yes, because it always brings an added value to the student who
                                                    receives it
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q1"
                                                <?php echo ($row['Q1'] == 'Yes, because it has always been part of the educational system') ? 'checked' : ''; ?>
                                                    name="Q1"
                                                    value="Yes, because it has always been part of the educational system"
                                                    id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Yes, because it has always been part of the educational system.
                                                </label>
                                            </div>

                                        </div>

                                        <!--  Question 2  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item"><mat-label>For you, what
                                                    difference(s) are there between academic support and the lessons
                                                    taught in a class ?</mat-label></li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q2"
                                                <?php echo ($row['Q2'] == 'Academic support is assistance to complement the work done in class by the teacher') ? 'checked' : ''; ?>
                                                    name="Q2"
                                                    value="Academic support is assistance to complement the work done in class by the teacher"
                                                    id="flexRadioDefault4">
                                                <label class="form-check-label" for="flexRadioDefault4">
                                                    Academic support is assistance to complement the work done in class
                                                    by the teacher
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q2"
                                                <?php echo ($row['Q2'] == 'Academic support is a class lesson re-taught for one or a few students') ? 'checked' : ''; ?>
                                                    name="Q2"
                                                    value="Academic support is a class lesson re-taught for one or a few students"
                                                    id="flexRadioDefault5">
                                                <label class="form-check-label" for="flexRadioDefault5">
                                                    Academic support is a class lesson re-taught for one or a few
                                                    students
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q2"
                                                <?php echo ($row['Q2'] == 'Classroom lessons work on a blank mind while academic support shapes a confused or questioning mind.') ? 'checked' : ''; ?>
                                                    name="Q2"
                                                    value="Classroom lessons work on a blank mind while academic support shapes a confused or questioning mind."
                                                    id="flexRadioDefault6">
                                                <label class="form-check-label" for="flexRadioDefault6">
                                                    Classroom lessons work on a 'blank' mind while academic support
                                                    shapes a 'confused' or 'questioning' mind.
                                                </label>
                                            </div>

                                        </div>
                                        <!--  Question 3  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">A child that you are tutoring in a
                                                subject must absolutely succeed in it?</li>
                                            <div class="col-lg-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'Not necessarily') ? 'checked' : ''; ?>
                                                        name="Q3" value="Not necessarily" id="flexRadioDefault7">
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Not necessarily...
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'Yes, because its my job to achieve this result') ? 'checked' : ''; ?>
                                                        name="Q3"
                                                        value="Yes, because it's my job to achieve this result"
                                                        id="flexRadioDefault8">
                                                    <label class="form-check-label" for="flexRadioDefault8">
                                                        Yes, because it's my job to achieve this result
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q3"
                                                    <?php echo ($row['Q3'] == 'Only if the child follows my instructions to the letter') ? 'checked' : ''; ?>
                                                        name="Q3"
                                                        value="Only if the child follows my instructions to the letter."
                                                        id="flexRadioDefault9">
                                                    <label class="form-check-label" for="flexRadioDefault9">
                                                        Only if the child follows my instructions to the letter.
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <!--  Question 4  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">You are not at all inspired on a
                                                question raised by a student you are mentoring, what do you do? </li>
                                            <div class="col-lg-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                    <?php echo ($row['Q4'] == 'You refer the question back to the student while you gather your thoughts') ? 'checked' : ''; ?>
                                                        name="Q4"
                                                        value="You refer the question back to the student while you gather your thoughts"
                                                        id="flexRadioDefault10">
                                                    <label class="form-check-label" for="flexRadioDefault10">
                                                        You refer the question back to the student while you gather your
                                                        thoughts
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                    <?php echo ($row['Q4'] == 'You postpone the question to the next session, to buy some time') ? 'checked' : ''; ?>
                                                        name="Q4"
                                                        value="You postpone the question to the next session, to buy some time"
                                                        id="flexRadioDefault11">
                                                    <label class="form-check-label" for="flexRadioDefault11">
                                                        You postpone the question to the next session, to buy some time
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q4"
                                                    
                                                    <?php echo ($row['Q4'] == 'You still attempt to provide explanations, even if they are shallow, while you try to find the real inspiration') ? 'checked' : ''; ?>
                                                        name="Q4"
                                                        value="You still attempt to provide explanations, even if they are shallow, while you try to find the real inspiration"
                                                        id="flexRadioDefault12">
                                                    <label class="form-check-label" for="flexRadioDefault12">
                                                        You still attempt to provide explanations, even if they are
                                                        shallow, while you try to find the real inspiration.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  Question 5  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">A not very bright student complains
                                                about your teaching methods</li>
                                            <div class="col-lg-11">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'Its an opportunity to question yourself by listening to the reasons mentioned') ? 'checked' : ''; ?>
                                                        name="Q5"
                                                        value="It's an opportunity to question yourself by listening to the reasons mentioned"
                                                        id="flexRadioDefault13">
                                                    <label class="form-check-label" for="flexRadioDefault13">
                                                        It's an opportunity to question yourself by listening to the
                                                        reasons mentioned
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    <?php echo ($row['Q5'] == 'You are not surprised coming from him as he is among the students you know to be very distracted and undisciplined') ? 'checked' : ''; ?>
                                                        name="Q5"
                                                        value="You are not surprised coming from him as he is among the students you know to be very distracted and undisciplined"
                                                        id="flexRadioDefault14">
                                                    <label class="form-check-label" for="flexRadioDefault14">
                                                        You are not surprised coming from him as he is among the
                                                        students you know to be very distracted and undisciplined
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q5"
                                                    
                                                    <?php echo ($row['Q5'] == 'You are unhappy because you believe you have a good grasp of your techniques and methods, and you can boast of the evidence through previous results') ? 'checked' : ''; ?>
                                                        name="Q5"
                                                        value="You are unhappy because you believe you have a good grasp of your techniques and methods, and you can boast of the evidence through previous results"
                                                        id="flexRadioDefault15">
                                                    <label class="form-check-label" for="flexRadioDefault15">
                                                        You are unhappy because you believe you have a good grasp of
                                                        your techniques and methods, and you can boast of the evidence
                                                        through previous results
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <!--  Question 6  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">You are on time at a student's
                                                place, and he is late for the nth time... </li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q6"
                                                <?php echo ($row['Q6'] == 'For you, what matters is that the time will be recorded') ? 'checked' : ''; ?>
                                                    name="Q6"
                                                    value="For you, what matters is that the time will be recorded"
                                                    id="flexRadioDefault16">
                                                <label class="form-check-label" for="flexRadioDefault16">
                                                    For you, what matters is that the time will be recorded
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q6"
                                                <?php echo ($row['Q6'] == 'You try to find out why this student keeps repeating this behavior and address his parents about this attitude') ? 'checked' : ''; ?>
                                                    name="Q6"
                                                    value="You try to find out why this student keeps repeating this behavior and address his parents about this attitude"
                                                    id="flexRadioDefault17">
                                                <label class="form-check-label" for="flexRadioDefault17">
                                                    You try to find out why this student keeps repeating this behavior
                                                    and address his parents about this attitude
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q6"
                                                
                                                <?php echo ($row['Q6'] == 'You give him yet another lecture about his behavior before moving on to the lesson of the day') ? 'checked' : ''; ?>
                                                    name="Q6"
                                                    value="You give him yet another lecture about his behavior before moving on to the lesson of the day"
                                                    id="flexRadioDefault18">
                                                <label class="form-check-label" for="flexRadioDefault18">
                                                    You give him yet another lecture about his behavior before moving on
                                                    to the lesson of the day.
                                                </label>
                                            </div>
                                        </div>
                                        <!--  Question 7  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">You have a very heterogeneous group
                                                (content of the lessons) in your class. </li>
                                            <div class="col-lg-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q7"
                                                    <?php echo ($row['Q7'] == 'You try to work on a lesson that is common to everyone') ? 'checked' : ''; ?>
                                                        name="Q7"
                                                        value="You try to work on a lesson that is common to everyone"
                                                        id="flexRadioDefault19">
                                                    <label class="form-check-label" for="flexRadioDefault19">
                                                        You try to work on a lesson that is common to everyone.
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q7"
                                                    
                                                    <?php echo ($row['Q7'] == 'You have each individual work on their own lesson') ? 'checked' : ''; ?>
                                                        name="Q7"
                                                        value="You have each individual work on their own lesson"
                                                        id="flexRadioDefault20">
                                                    <label class="form-check-label" for="flexRadioDefault20">
                                                        You have each individual work on their own lesson.
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q7"
                                                    <?php echo ($row['Q7'] == 'You work with everyone on the most advanced lesson; anyway, the others will tackle it later') ? 'checked' : ''; ?>
                                                        name="Q7"
                                                        value="You work with everyone on the most advanced lesson; anyway, the others will tackle it later"
                                                        id="flexRadioDefault21">
                                                    <label class="form-check-label" for="flexRadioDefault21">
                                                        You work with everyone on the most advanced lesson; anyway, the
                                                        others will tackle it later
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <!--  Question 8  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">You have a very heterogeneous group
                                                (student levels) in your class. </li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q8"
                                                <?php echo ($row['Q8'] == 'Its a very interesting aspect of the teaching profession for you') ? 'checked' : ''; ?>
                                                    name="Q8"
                                                    value="Its a very interesting aspect of the teaching profession for you"
                                                    id="flexRadioDefault22">
                                                <label class="form-check-label" for="flexRadioDefault22">
                                                    It's a very interesting aspect of the teaching profession for you
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q8"
                                                <?php echo ($row['Q8'] == 'You dont worry about it and work with the high-level students; the rest should catch up') ? 'checked' : ''; ?>
                                                    name="Q8"
                                                    value="You don't worry about it and work with the high-level students; the rest should catch up"
                                                    id="flexRadioDefault23">
                                                <label class="form-check-label" for="flexRadioDefault23">
                                                    You don't worry about it and work with the high-level students; the
                                                    rest should catch up
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q8"
                                                <?php echo ($row['Q8'] == 'You find it challenging and try to seek help from your colleagues') ? 'checked' : ''; ?>
                                                    name="Q8"
                                                    value="You find it challenging and try to seek help from your colleagues"
                                                    id="flexRadioDefault24">
                                                <label class="form-check-label" for="flexRadioDefault24">
                                                    You find it challenging and try to seek help from your colleagues.
                                                </label>
                                            </div>
                                        </div>
                                        <!--  Question 9  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">What makes you a good academic
                                                support teacher is </li>
                                            <div class="col-lg-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q9"
                                                    <?php echo ($row['Q9'] == 'Your consistently positive past results') ? 'checked' : ''; ?>
                                                        name="Q9" value="Your consistently positive past results"
                                                        id="flexRadioDefault25">
                                                    <label class="form-check-label" for="flexRadioDefault25">
                                                        Your consistently positive past results
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q9"
                                                    <?php echo ($row['Q9'] == 'Your patient spirit, and your dedication to the students you guide') ? 'checked' : ''; ?>
                                                        name="Q9"
                                                        value="Your patient spirit, and your dedication to the students you guide"
                                                        id="flexRadioDefault26">
                                                    <label class="form-check-label" for="flexRadioDefault26">
                                                        Your patient spirit, and your dedication to the students you
                                                        guide
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" formControlName="Q9"
                                                    <?php echo ($row['Q9'] == 'Your excellent mastery of the subjects you teach') ? 'checked' : ''; ?>
                                                        name="Q9"
                                                        value="Your excellent mastery of the subjects you teach"
                                                        id="flexRadioDefault27">
                                                    <label class="form-check-label" for="flexRadioDefault27">
                                                        Your excellent mastery of the subjects you teach.
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <!--  Question 10  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">A brilliant student claims that you
                                                made a mistake in an exercise (wrongly) because he has a different
                                                correction (probably wrong). </li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q10"
                                                <?php echo ($row['Q10'] == 'You ask him (together with others) to look for where it could be wrong and calmly explain to them afterward why your solution is correct and coherent.') ? 'checked' : ''; ?>
                                                    name="Q10"
                                                    value="You ask him (together with others) to look for where it could be wrong and calmly explain to them afterward why your solution is correct and coherent"
                                                    id="flexRadioDefault28">
                                                <label class="form-check-label" for="flexRadioDefault28">
                                                    You ask him (together with others) to look for where it could be
                                                    wrong and calmly explain to them afterward why your solution is
                                                    correct and coherent.
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q10"
                                                <?php echo ($row['Q10'] == 'You ask him to present his solution and help him see why his solution is not correct.') ? 'checked' : ''; ?>
                                                    name="Q10"
                                                    value="You ask him to present his solution and help him see why his solution is not correct."
                                                    id="flexRadioDefault29">
                                                <label class="form-check-label" for="flexRadioDefault29">
                                                    You ask him to present his solution and help him see why his
                                                    solution is not correct.
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" formControlName="Q10"
                                                <?php echo ($row['Q10'] == 'You tell him that you are certain that your solution is correct, and he would be better off accepting it.') ? 'checked' : ''; ?>
                                                    name="Q10"
                                                    value="You tell him that you are certain that your solution is correct, and he would be better off accepting it."
                                                    id="flexRadioDefault30">
                                                <label class="form-check-label" for="flexRadioDefault30">
                                                    You tell him that you are certain that your solution is correct, and
                                                    he would be better off accepting it.
                                                </label>
                                            </div>
                                        </div>

                                        <!--  Question 11  -->
                                        <div class="col-lg-10 m-1">
                                            <li for="" class="form-label list-item">Salary expectations and working
                                                conditions. </li>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    name="salaryexpectation"></textarea>
                                                <label for="floatingTextarea">comment here...</label>
                                            </div>
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
              window.location.href = '../academin-support.php';
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
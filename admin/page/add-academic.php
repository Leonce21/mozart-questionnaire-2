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
    $firstname = $_POST['firstname'];
    $Q1 = $_POST['Q1'];
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $Q4 = $_POST['Q4'];
    $Q5 = $_POST['Q5'];
    $Q6 = $_POST['Q6'];
    $Q7 = $_POST['Q7'];
    $Q8 = $_POST['Q8'];
    $Q9 = $_POST['Q9'];
    $Q10 = $_POST['Q10'];
    $salaryexpectation = $_POST['salaryexpectation'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO `academicsupport`(`firstname`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `salaryexpectation`) 
                           VALUES (:firstname, :Q1, :Q2, :Q3, :Q4, :Q5, :Q6, :Q7, :Q8, :Q9, :Q10, :salaryexpectation)");

    // Bind parameters
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':Q1', $Q1);
    $stmt->bindParam(':Q2', $Q2);
    $stmt->bindParam(':Q3', $Q3);
    $stmt->bindParam(':Q4', $Q4);
    $stmt->bindParam(':Q5', $Q5);
    $stmt->bindParam(':Q6', $Q6);
    $stmt->bindParam(':Q7', $Q7);
    $stmt->bindParam(':Q8', $Q8);
    $stmt->bindParam(':Q9', $Q9);
    $stmt->bindParam(':Q10', $Q10);
    $stmt->bindParam(':salaryexpectation', $salaryexpectation);

    // Execute the statement
    $result = $stmt->execute();

    // Check and redirect
    
    if ($result) {
        $_SESSION['status'] = "Data inserted successfully";
        $_SESSION['status_code'] = "success";
        header('location:../academin-support.php');
    } else {
        $_SESSION['status'] = "Data not inserted successfully";
        $_SESSION['status_code'] = "error";
        header('location:add-academic.php');
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
                            <h4>Add academic support information
                                <a href="../academin-support.php" class="btn btn-primary float-end">Back</a>
                                
                            </h4>
                        </div>
                        <hr class="horizontal dark mt-0 mb-2">
                        <div class="card-body">
                            <form class="col-lg-12" role="form" method="POST" >
                                <div class="mt-1">

                                <div mat-dialog-content class="ms-5">
            
            <ol class="list-group list-numbered">

                <div class="col-md-10 m-1">
                    <label for="firstname" class="form-check-label col-md-5">Name and SurName<span class="required-indicator">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" 
                    formControlName="firstname" required>
                </div>
                <!--  Question 1  -->
                <div class="col-lg-10 m-1">
                    
                    <li for="" class="form-label list-item">
                        <mat-label>In your opinion, is academic support essential for a student...?</mat-label>
                    </li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q1" name="Q1" value="No, because a student can succeed very well without academic support" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            No, because a student can succeed very well without academic support
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q1" name="Q1" value="Yes, because it always brings an added value to the student who receives it" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Yes, because it always brings an added value to the student who receives it
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q1" name="Q1" value="Yes, because it has always been part of the educational system" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Yes, because it has always been part of the educational system.
                        </label>
                    </div>
                   
                </div>

                <!--  Question 2  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item"><mat-label>For you, what difference(s) are there between academic support and the lessons taught in a class ?</mat-label></li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q2" name="Q2" value="Academic support is assistance to complement the work done in class by the teacher" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Academic support is assistance to complement the work done in class by the teacher
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q2" name="Q2" value="Academic support is a class lesson re-taught for one or a few students" id="flexRadioDefault5">
                        <label class="form-check-label" for="flexRadioDefault5">
                            Academic support is a class lesson re-taught for one or a few students
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q2" name="Q2" value="Classroom lessons work on a blank mind while academic support shapes a confused or questioning mind" id="flexRadioDefault6">
                        <label class="form-check-label" for="flexRadioDefault6">
                            Classroom lessons work on a 'blank' mind while academic support shapes a 'confused' or 'questioning' mind.
                        </label>
                    </div>
                    
                </div>
                <!--  Question 3  -->
                <div class="col-lg-6 m-1">
                    <li for="" class="form-label list-item">A child that you are tutoring in a subject must absolutely succeed in it?</li>
                    <div class="col-lg-11">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3" value="Not necessarily" id="flexRadioDefault7">
                            <label class="form-check-label" for="flexRadioDefault7">
                                Not necessarily...
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3" value="Yes, because its my job to achieve this result" id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault8">
                                Yes, because it's my job to achieve this result
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3" value="Only if the child follows my instructions to the letter" id="flexRadioDefault9">
                            <label class="form-check-label" for="flexRadioDefault9">
                                Only if the child follows my instructions to the letter.
                            </label>
                        </div>
                    </div>
                    
                </div>
                <!--  Question 4  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">You are not at all inspired on a question raised by a student you are mentoring, what do you do? </li>
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"  value="You refer the question back to the student while you gather your thoughts" id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault10">
                                You refer the question back to the student while you gather your thoughts
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4" value="You postpone the question to the next session, to buy some time"  id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">
                                You postpone the question to the next session, to buy some time
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"  value="You still attempt to provide explanations, even if they are shallow, while you try to find the real inspiration" id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault12">
                                You still attempt to provide explanations, even if they are shallow, while you try to find the real inspiration.
                            </label>
                        </div>
                    </div>
                </div>
                <!--  Question 5  -->
                <div class="col-lg-11 m-1">
                    <li for="" class="form-label list-item">A not very bright student complains about your teaching methods</li>
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5" value="It's an opportunity to question yourself by listening to the reasons mentioned" id="flexRadioDefault13">
                            <label class="form-check-label" for="flexRadioDefault13">
                                It's an opportunity to question yourself by listening to the reasons mentioned
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5" value="You are not surprised coming from him as he is among the students you know to be very distracted and undisciplined" id="flexRadioDefault14">
                            <label class="form-check-label" for="flexRadioDefault14">
                                You are not surprised coming from him as he is among the students you know to be very distracted and undisciplined  
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5" value="You are unhappy because you believe you have a good grasp of your techniques and methods, and you can boast of the evidence through previous results" id="flexRadioDefault15">
                            <label class="form-check-label" for="flexRadioDefault15">
                                You are unhappy because you believe you have a good grasp of your techniques and methods, and you can boast of the evidence through previous results
                            </label>
                        </div>
                        
                    </div>
                    
                </div>
                <!--  Question 6  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">You are on time at a student's place, and he is late for the nth time... </li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="For you, what matters is that the time will be recorded" id="flexRadioDefault16">
                        <label class="form-check-label" for="flexRadioDefault16">
                            For you, what matters is that the time will be recorded
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="You try to find out why this student keeps repeating this behavior and address his parents about this attitude" id="flexRadioDefault17">
                        <label class="form-check-label" for="flexRadioDefault17">
                            You try to find out why this student keeps repeating this behavior and address his parents about this attitude
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="You give him yet another lecture about his behavior before moving on to the lesson of the day" id="flexRadioDefault18">
                        <label class="form-check-label" for="flexRadioDefault18">
                            You give him yet another lecture about his behavior before moving on to the lesson of the day.
                        </label>
                    </div>
                </div>
                <!--  Question 7  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">You have a very heterogeneous group (content of the lessons) in your class. </li>
                    <div class="col-lg-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q7" name="Q7" value="You try to work on a lesson that is common to everyone." id="flexRadioDefault19">
                            <label class="form-check-label" for="flexRadioDefault19">
                                You try to work on a lesson that is common to everyone.
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q7" name="Q7" value="You have each individual work on their own lesson." id="flexRadioDefault20">
                            <label class="form-check-label" for="flexRadioDefault20">
                                You have each individual work on their own lesson.
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q7" name="Q7" value="You work with everyone on the most advanced lesson; anyway, the others will tackle it later" id="flexRadioDefault21">
                            <label class="form-check-label" for="flexRadioDefault21">
                                You work with everyone on the most advanced lesson; anyway, the others will tackle it later
                            </label>
                        </div>
                    </div>
                    
                </div>
                <!--  Question 8  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">You have a very heterogeneous group (student levels) in your class. </li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q8" name="Q8" value="Its a very interesting aspect of the teaching profession for you" id="flexRadioDefault22">
                        <label class="form-check-label" for="flexRadioDefault22">
                            It's a very interesting aspect of the teaching profession for you
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q8" name="Q8" value="You don't worry about it and work with the high-level students; the rest should catch up" id="flexRadioDefault23">
                        <label class="form-check-label" for="flexRadioDefault23">
                            You don't worry about it and work with the high-level students; the rest should catch up
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q8" name="Q8" value="You find it challenging and try to seek help from your colleagues." id="flexRadioDefault24">
                        <label class="form-check-label" for="flexRadioDefault24">
                            You find it challenging and try to seek help from your colleagues.
                        </label>
                    </div>
                </div>
                <!--  Question 9  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">What makes you a good academic support teacher is </li>
                    <div class="col-lg-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q9" name="Q9" value="Your consistently positive past results" id="flexRadioDefault25">
                            <label class="form-check-label" for="flexRadioDefault25">
                                Your consistently positive past results
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q9" name="Q9" value="Your patient spirit, and your dedication to the students you guide" id="flexRadioDefault26">
                            <label class="form-check-label" for="flexRadioDefault26">
                                Your patient spirit, and your dedication to the students you guide
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q9" name="Q9" value="Your excellent mastery of the subjects you teach." id="flexRadioDefault27">
                            <label class="form-check-label" for="flexRadioDefault27">
                                Your excellent mastery of the subjects you teach.
                            </label>
                        </div>
                    </div>
                    
                </div>

                <!--  Question 10  -->
                <div class="col-lg-12m-1">
                    <li for="" class="form-label list-item">A brilliant student claims that you made a mistake in an exercise (wrongly) because he has a different correction (probably wrong). </li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q10" name="Q10" value="You ask him (together with others) to look for where it could be wrong and calmly explain to them afterward why your solution is correct and coherent." id="flexRadioDefault28">
                        <label class="form-check-label" for="flexRadioDefault28">
                            You ask him (together with others) to look for where it could be wrong and calmly explain to them afterward why your solution is correct and coherent.
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q10" name="Q10" value="You ask him to present his solution and help him see why his solution is not correct." id="flexRadioDefault29">
                        <label class="form-check-label" for="flexRadioDefault29">
                            You ask him to present his solution and help him see why his solution is not correct.
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" formControlName="Q10" name="Q10" value="You tell him that you are certain that your solution is correct, and he would be better off accepting it." id="flexRadioDefault30">
                        <label class="form-check-label" for="flexRadioDefault30">
                            You tell him that you are certain that your solution is correct, and he would be better off accepting it.
                        </label>
                    </div>
                </div>

                <!--  Question 11  -->
                <div class="col-lg-10 m-1">
                    <li for="" class="form-label list-item">Salary expectations and working conditions. </li>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="salaryexpectation"></textarea>
                        <label for="floatingTextarea">comment here...</label>
                    </div>
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
              window.location.href = '../academin-support.php';
            }
        </script>
</body>

</html>
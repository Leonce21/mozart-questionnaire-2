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
    $School = $_POST['School'];
    $School_period = $_POST['School_period'];
    $date_of_birth = $_POST['date_of_birth'];
    $sex = $_POST['sex'];
    $MaritalStatus = $_POST['MaritalStatus'];
    $Education_Section = $_POST['Education_Section'];
    $teacher_diploma = $_POST['teacher_diploma'];
    $teacher_activity = $_POST['teacher_activity'];
    $location = $_POST['location'];
    $teacher_description = $_POST['teacher_description'];
    $subject_tutoring = $_POST['subject_tutoring'];
    $tutoring_problem = $_POST['tutoring_problem'];
    $thingyoudontlike = $_POST['thingyoudontlike'];
    $thingyoulike = $_POST['thingyoulike'];
    $support_class = $_POST['support_class'];
    $support_classDuration = $_POST['support_classDuration'];

    $Subject1 = $_POST['Subject1'];
    $Subject2 = $_POST['Subject2'];
    $Subject3 = $_POST['Subject3'];

    $Subject = $Subject1 . ', '. $Subject2 . ', '. $Subject3;

    $Subjectperiod1 = $_POST['Subjectperiod1'];
    $Subjectperiod2 = $_POST['Subjectperiod2'];
    $Subjectperiod3 = $_POST['Subjectperiod3'];

    $SubjectPeriod = $Subjectperiod1 . ', '. $Subjectperiod2 . ' ,'. $Subjectperiod3;

    $SubjectSatisfaction1 = $_POST['SubjectSatisfaction1'];
    $SubjectSatisfaction2 = $_POST['SubjectSatisfaction2'];
    $SubjectSatisfaction3 = $_POST['SubjectSatisfaction3'];

    $SubjectSatisfaction = $SubjectSatisfaction1 . ', ' . $SubjectSatisfaction2 . ', ' . $SubjectSatisfaction3;

    $group_collaboration = $_POST['group_collaboration'];
    $tutoring = $_POST['tutoring'];
    $teaching_Strengths = $_POST['teaching_Strengths'];
    $computerMastering = $_POST['computerMastering'];
    $learning_Motivation = $_POST['learning_Motivation'];
    $LearningProfile = $_POST['LearningProfile'];

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO `teacherinterview` (Name, School, School_period, date_of_birth, sex, MaritalStatus, Education_Section, teacher_diploma, 
    teacher_activity, location, teacher_description, subject_tutoring, tutoring_problem, thingyoudontlike, 
    thingyoulike, support_class, support_classDuration, Subject, SubjectPeriod, SubjectSatisfaction, 
    group_collaboration, tutoring, teaching_Strengths, computerMastering, learning_Motivation, LearningProfile) 
      VALUES (:Name, :School, :School_period, :date_of_birth, :sex, :MaritalStatus, :Education_Section, :teacher_diploma, :teacher_activity, :location, :teacher_description, :subject_tutoring, :tutoring_problem, :thingyoudontlike, 
    :thingyoulike, :support_class, :support_classDuration, :Subject, :SubjectPeriod, :SubjectSatisfaction, 
    :group_collaboration, :tutoring, :teaching_Strengths, :computerMastering, :learning_Motivation, :LearningProfile)");

    // Bind parameters
    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':School', $School);
    $stmt->bindParam(':School_period', $School_period);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':MaritalStatus', $MaritalStatus);
    $stmt->bindParam(':Education_Section', $Education_Section);
    $stmt->bindParam(':teacher_diploma', $teacher_diploma);
    $stmt->bindParam(':teacher_activity', $teacher_activity);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':teacher_description', $teacher_description);
    $stmt->bindParam(':subject_tutoring', $subject_tutoring);
    $stmt->bindParam(':tutoring_problem', $tutoring_problem);
    $stmt->bindParam(':thingyoudontlike', $thingyoudontlike);
    $stmt->bindParam(':thingyoulike', $thingyoulike);
    $stmt->bindParam(':support_class', $support_class);
    $stmt->bindParam(':support_classDuration', $support_classDuration);
    $stmt->bindParam(':Subject', $Subject); 
    $stmt->bindParam(':SubjectPeriod', $SubjectPeriod); 
    $stmt->bindParam(':SubjectSatisfaction', $SubjectSatisfaction); 
    $stmt->bindParam(':group_collaboration', $group_collaboration);
    $stmt->bindParam(':tutoring', $tutoring);
    $stmt->bindParam(':teaching_Strengths', $teaching_Strengths);
    $stmt->bindParam(':computerMastering', $computerMastering);
    $stmt->bindParam(':learning_Motivation', $learning_Motivation);
    $stmt->bindParam(':LearningProfile', $LearningProfile);

    // Execute the statement
    $result = $stmt->execute();

    // Check and redirect
    
    if ($result) {
        $_SESSION['status'] = "Data inserted successfully";
        $_SESSION['status_code'] = "success";
        header('location:../teacher-interview.php');
    } else {
        $_SESSION['status'] = "Data not inserted successfully";
        $_SESSION['status_code'] = "error";
        header('location:add-teacher-interview.php');
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
              <h4>Add a questionnaire
                <a href="../teacher-interview.php" class="btn btn-primary float-end">Back</a>

              </h4>
            </div>
            <hr class="horizontal dark mt-0 mb-2">
            <div class="card-body">
              <form class="text-black" role="form" method="POST">
                <div class="mt-1">

                  <div mat-dialog-content class="p-4 ms-5 ">
                    <p><b>Background research and current situation</b></p>
                    <ol class="list-group list-numbered" >
                      <div class="row g-3">
                        <!--  Question   1   -->
                        <div class="col-md-10">
                          <li for="inputEmail4" class="form-label">What's your name?<span
                              class="required-indicator">*</span></li>
                          <input type="text" class="form-control" name="Name" />
                        </div>

                        <!--  Question   2   -->
                        <div class="col-md-10">
                          <li for="inputEmail4" class="form-label">
                            Establishment or institution?
                          </li>
                          <input type="text" class="form-control" name="School" placeholder="Ex: UY1, ENSPY, ..." />
                        </div>

                        <!--  Question   3   -->
                        <div class="col-md-10">
                          <li for="inputCity" class="form-label">For how long?</li>
                          <input type="text" class="form-control" name="School_period" placeholder="Ex: 12 Years" />
                        </div>

                        <!--  Question   4   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">Date of Birth<span class="required-indicator">*</span>
                          </li>
                          <input type="date" class="form-control" name="date_of_birth" />
                        </div>

                        <!--  Question   5   -->
                        <div class="col-md-5">
                          <li for="inputZip" class="form-label">What is your sex</li>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" value="Male" id="gender1" />
                            <label class="form-check-label" for="gender1">
                              Male
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="sex" name="sex" value="Female"
                              id="gender2" />
                            <label class="form-check-label" for="gender2">
                              Female
                            </label>
                          </div>
                        </div>

                        <div class="col-md-10">
                          <li for="region" class="form-label">Marital Status<span class="required-indicator">*</span>
                          </li>
                          <select class="form-select" aria-label="Default select example" name="MaritalStatus"
                            formControlName="MaritalStatus">
                            <option value="" selected disabled>Choose...</option>
                            <option value="Married">Married</option>
                            <option value="Divorcede">Divorced</option>
                            <option value="Single">Single</option>
                            <option value="Separated">Separated</option>
                            <option value="none">Prefer Not to Say</option>
                          </select>
                        </div>

                        <!--  Question   6   -->
                        <div class="col-md-5">
                          <li for="inputZip" class="form-label">Education Section<span
                              class="required-indicator">*</span></li>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Education_Section"
                              name="Education_Section" value="English Section" id="Education_Section1" />
                            <label class="form-check-label" for="Education_Section1">
                              English Section
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Education_Section"
                              name="Education_Section" value="French Section" id="Education_Section2" />
                            <label class="form-check-label" for="Education_Section2">
                              French Section
                            </label>
                          </div>
                        </div>

                        <!--  Question   4   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">Last diploma obtained<span
                              class="required-indicator">*</span></li>
                          <input type="text" class="form-control" name="teacher_diploma"
                            placeholder="Ex: Masters 1, Licence, HND" />
                        </div>

                        <!--  Question   4   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">specify your activity</li>
                          <input type="text" class="form-control" name="teacher_activity"
                            placeholder="Ex: Teacher, Engineer, Accountant" />
                        </div>

                        <!--  Question   6   -->
                        <div class="col-md-10">
                          <li for="inputCity" class="form-label">Your residence<span class="required-indicator">*</span>
                          </li>
                          <input type="text" class="form-control" name="location" placeholder="EX: Emombo" />
                        </div>

                        <!--  Question   7   -->
                        <div class="col-md-10">
                          <li for="teacher" class="form-label">How would you describe yourself as a teacher?</li>
                          <select class="form-select" aria-label="Default select example" name="teacher_description"
                            formControlName="teacher_description">
                            <option value="" selected disabled>Choose...</option>
                            <option value="Married">Good</option>
                            <option value="Divorcede">Medium</option>
                            <option value="Single">Bad</option>
                          </select>
                        </div>


                        <!--  Question   7   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">What subjects do you teach in tutoring</li>
                          <input type="text" class="form-control" name="subject_tutoring"
                            placeholder="Ex: French, English, Mathematics" />

                        </div>

                        <!--  Question   9   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">
                            What kinds of problems do you often encounter in the exercise of
                            your tutoring profession?
                          </li>
                          <input type="text" class="form-control" name="tutoring_problem"
                            placeholder="Ex: Late payement, Lazy student" />

                        </div>

                        <!--  Question   10   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">
                            What are the things you like about your students and you don't
                            like about your students?
                          </li>
                          <div class="row g-3">
                            <div class="form-floating col-md-6">
                              <input type="text" class="form-control" placeholder="comment" name="thingyoudontlike" />
                              <label for="floatingTextarea">What you don't like in a student</label>
                            </div>
                            <div class="form-floating col-md-5">
                              <input type="text" class="form-control" placeholder="comment" name="thingyoulike" />
                              <label for="floatingTextarea">What you like in a student</label>
                            </div>
                          </div>
                        </div>

                        <!--  Question   11   -->
                        <div class="col-md-10">
                          <li for="" class="form-label list-item">
                            Have you ever done support classes before ?
                          </li>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="support_class"
                              formControlName="support_class" value="Yes" id="flexRadioDefault1" />
                            <label class="form-check-label" for="flexRadioDefault1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="support_class"
                              formControlName="support_class" value="No" id="flexRadioDefault2" />
                            <label class="form-check-label" for="flexRadioDefault2">
                              No
                            </label>
                          </div>
                        </div>

                        <!--  Question   12   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">Since ?</li>
                          <input type="text" class="form-control" name="support_classDuration"
                            placeholder="Ex: 2 years" />
                        </div>

                        <!--  Question   13   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">
                            Experience of that classes ?
                          </li>
                          <div class="col-14 table-responsive">
                            <div class="">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">
                                      <input type="text" name="Subject1" class="form-control"
                                        placeholder="Ex: Computer">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="Subject2" class="form-control"
                                        placeholder="Ex: Geography">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="Subject3" class="form-control" placeholder="Ex: French">
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
                                    <th scope="row">Number of hours/week</th>
                                    <th scope="col">
                                      <input type="text" name="Subjectperiod1" class="form-control"
                                        placeholder="Ex: 2hrs">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="Subjectperiod2" class="form-control"
                                        placeholder="Ex: 5hrs">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="Subjectperiod3" class="form-control"
                                        placeholder="Ex: 1hrs">
                                    </th>
                                    <!-- <th scope="col">
                        <input type="text" name="Subjectperiod4" class="form-control" placeholder="Ex: 10hrs">
                      </th>
                      <th scope="col">
                        <input type="text" name="Subjectperiod5" class="form-control" placeholder="Ex: 6hrs">
                      </th> -->
                                  </tr>
                                  <tr>
                                    <th scope="row">Satisfactions (reasons)</th>
                                    <th scope="col">
                                      <input type="text" name="SubjectSatisfaction1" class="form-control"
                                        placeholder="Ex: Satisfied">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="SubjectSatisfaction2" class="form-control"
                                        placeholder="Ex: Satisfied">
                                    </th>
                                    <th scope="col">
                                      <input type="text" name="SubjectSatisfaction3" class="form-control"
                                        placeholder="Ex: Not Satisfied">
                                    </th>
                                    <!-- <th scope="col">
                        <input type="text" name="SubjectSatisfaction4" class="form-control" placeholder="Ex: Satisfied">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="SubjectSatisfaction5" class="form-control" placeholder="Ex: Not Satisfied">
                      </th> -->
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>


                        <!--  Question   14   -->
                        <div class="col-md-10">
                          <li for="inputZip" class="form-label">Do you like working with your comrades/colleagues?</li>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="group_collaboration"
                              name="group_collaboration" value="Yes" id="comrades1" />
                            <label class="form-check-label" for="comrades1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="group_collaboration"
                              name="group_collaboration" value="No" id="comrades2" />
                            <label class="form-check-label" for="comrades2">
                              No
                            </label>
                          </div>
                        </div>

                        <p class="">
                          <b>Open questions: </b>(the last 2 questions will allow you to say
                          the profiles of motivation and identity)
                        </p>

                        <!--  Question   16   -->

                        <!--  Question   17   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">Why do you give tutoring</li>
                          <input type="text" class="form-control" name="tutoring"
                            placeholder="Ex: Passion for Sharing Knowledge, Continuous Learning, Improving Communication Skills" />
                        </div>

                        <!--  Question   17   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">What are your strengths for teaching?</li>
                          <input type="text" class="form-control" name="teaching_Strengths"
                            placeholder="Ex: Adaptability, Organizational Skills, Clear Communication" />
                        </div>

                        <div class="col-md-10">
                          <li for="region" class="form-label">How much do you master computer tool</li>
                          <select class="form-select" aria-label="Default select example" name="computerMastering"
                            formControlName="computerMastering">
                            <option value="" selected disabled>Choose...</option>
                            <option value="Married">Good</option>
                            <option value="Divorcede">Medium</option>
                            <option value="Single">Bad</option>
                          </select>
                        </div>



                        <!--  Question   18   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">In Learning, what motivates you? </li>
                          <input type="text" class="form-control" name="learning_Motivation"
                            placeholder="Ex: Mathematics, French, Physics" />
                        </div>

                        <!--  Question   19   -->
                        <div class="col-md-10">
                          <li for="inputAddress" class="form-label">What is your learning profile?</li>
                          <input type="text" class="form-control" name="LearningProfile" />
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
      <?php include('../includes/scripts.php');?>
    </div>


    
<script>
  function cancelRedirect() {
    window.location.href = '../teacher-interview.php';
  }
</script>
</body>

</html>
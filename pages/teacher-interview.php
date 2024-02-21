<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include '../config/header.php' ?>
  
<form class="rd table-responsive" (ngSubmit)="GuideSubmit()" [formGroup]="formData">
  <h3 class="card-head text-center mb-5">Teacher interview guide</h3>

  <div class="">
    <div mat-dialog-content class="p-4 ms-5">
        <p><b>Background research and current situation</b></p>
      <ol class="list-group list-numbered">
        <div class="row g-3">
          <!--  Question   1   -->
          <div class="col-md-10">
            <li for="inputEmail4" class="form-label">What's your name?<span class="required-indicator">*</span></li>
            <input type="text" class="form-control" formControlName="Name"/>
          </div>

          <!--  Question   2   -->
          <div class="col-md-10">
            <li for="inputEmail4" class="form-label">
              Establishment or institution?
            </li>
            <input type="text" class="form-control" formControlName="School" placeholder="Ex: UY1, ENSPY, ..."/>
          </div>

          <!--  Question   3   -->
          <div class="col-md-10">
            <li for="inputCity" class="form-label">For how long?</li>
            <input type="text" class="form-control" formControlName="School_period" placeholder="Ex: 12 Years"/>
          </div>

          <!--  Question   4   -->
          <div class="col-md-10">
            <li for="inputZip" class="form-label">Date of Birth<span class="required-indicator">*</span></li>
            <input type="date" class="form-control" formControlName="date_of_birth"/>
          </div>

          <!--  Question   5   -->
          <div class="col-md-5">
            <li for="inputZip" class="form-label">What is your sex</li>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" formControlName="sex" name="sex" value="Male" id="gender1" />
              <label class="form-check-label" for="gender1">
                Male
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" formControlName="sex" name="sex" value="Female" id="gender2" />
              <label class="form-check-label" for="gender2">
                Female
              </label>
            </div>
          </div>

          <div class="col-md-10">
            <li  for="region" class="form-label">Marital Status<span class="required-indicator">*</span></li>
            <select class="form-select" aria-label="Default select example" name="MaritalStatus" formControlName="MaritalStatus">
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
            <li for="inputZip" class="form-label">Education Section<span class="required-indicator">*</span></li>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" formControlName="Education_Section" name="Education_Section" value="English Section" id="Education_Section1" />
              <label class="form-check-label" for="Education_Section1">
                English Section
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" formControlName="Education_Section" name="Education_Section" value="French Section" id="Education_Section2" />
              <label class="form-check-label" for="Education_Section2">
                French Section
              </label>
            </div>
          </div>

          <!--  Question   4   -->
          <div class="col-md-10">
            <li for="inputZip" class="form-label">Last diploma obtained<span class="required-indicator">*</span></li>
            <input type="text" class="form-control" formControlName="teacher_diploma" placeholder="Ex: Masters 1, Licence, HND"/>
          </div>

           <!--  Question   4   -->
           <div class="col-md-10">
            <li for="inputZip" class="form-label">specify your activity</li>
            <input type="text" class="form-control" formControlName="teacher_activity" placeholder="Ex: Teacher, Engineer, Accountant"/>
          </div>

          <!--  Question   6   -->
          <div class="col-md-10">
            <li for="inputCity" class="form-label">Your residence<span class="required-indicator">*</span></li>
            <input type="text" class="form-control" formControlName="location" placeholder="EX: Emombo"/>
          </div>

          <!--  Question   7   -->
          <div class="col-md-10">
            <li  for="teacher" class="form-label">How would you describe yourself as a teacher?</li>
            <select class="form-select" aria-label="Default select example" name="teacher_description" formControlName="teacher_description">
              <option value="" selected disabled>Choose...</option>
              <option value="Married">Good</option>
              <option value="Divorcede">Medium</option>
              <option value="Single">Bad</option>
            </select>
          </div>


          <!--  Question   7   -->
          <div class="col-md-10">
            <li for="inputZip" class="form-label">What subjects do you teach in tutoring</li>
              <input type="text" class="form-control" formControlName="subject_tutoring" placeholder="Ex: French, English, Mathematics"/>
          
          </div>

          <!--  Question   9   -->
          <div class="col-md-10">
            <li for="inputAddress" class="form-label">
              What kinds of problems do you often encounter in the exercise of
              your tutoring profession?
            </li>
            <input type="text" class="form-control" formControlName="tutoring_problem" placeholder="Ex: Late payement, Lazy student"/>
          
          </div>

          <!--  Question   10   -->
          <div class="col-md-10">
            <li for="inputAddress" class="form-label">
              What are the things you like about your students and you don't
              like about your students?
            </li>
            <div class="row g-3">
              <div class="form-floating col-md-6">
                <input type="text" class="form-control" placeholder="comment" formControlName="thingyoudontlike" />
                <label for="floatingTextarea">What you don't like in a student</label>
              </div>
              <div class="form-floating col-md-5">
                <input type="text" class="form-control" placeholder="comment" formControlName="thingyoulike" />
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
              <input class="form-check-input" type="radio" name="support_class" formControlName="support_class" value="Yes" id="flexRadioDefault1" />
              <label class="form-check-label" for="flexRadioDefault1">
                Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="support_class" formControlName="support_class" value="No" id="flexRadioDefault2" />
              <label class="form-check-label" for="flexRadioDefault2">
                No
              </label>
            </div>
          </div>

          <!--  Question   12   -->
          <div class="col-md-10">
            <li for="inputZip" class="form-label">Since ?</li>
            <input type="text" class="form-control" formControlName="support_classDuration" placeholder="Ex: 2 years"/>
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
                        <input type="text" formControlName="Subject1" class="form-control" placeholder="Ex: Computer">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="Subject2" class="form-control" placeholder="Ex: Geography">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="Subject3" class="form-control" placeholder="Ex: French">
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
                        <input type="text" formControlName="Subjectperiod1" class="form-control" placeholder="Ex: 2hrs">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="Subjectperiod2" class="form-control" placeholder="Ex: 5hrs">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="Subjectperiod3" class="form-control" placeholder="Ex: 1hrs">
                      </th>
                      <!-- <th scope="col">
                        <input type="text" formControlName="Subjectperiod4" class="form-control" placeholder="Ex: 10hrs">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="Subjectperiod5" class="form-control" placeholder="Ex: 6hrs">
                      </th> -->
                    </tr>
                    <tr>
                      <th scope="row">Satisfactions (reasons)</th>
                      <th scope="col">
                        <input type="text" formControlName="SubjectSatisfaction1" class="form-control" placeholder="Ex: Satisfied">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="SubjectSatisfaction2" class="form-control" placeholder="Ex: Satisfied">
                      </th>
                      <th scope="col">
                        <input type="text" formControlName="SubjectSatisfaction3" class="form-control" placeholder="Ex: Not Satisfied">
                      </th>
                      <!-- <th scope="col">
                        <input type="text" formControlName="SubjectSatisfaction4" class="form-control" placeholder="Ex: Satisfied">
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
              <input class="form-check-input" type="radio" formControlName="group_collaboration" name="group_collaboration" value="Yes" id="comrades1" />
              <label class="form-check-label" for="comrades1">
                Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" formControlName="group_collaboration" name="group_collaboration" value="No" id="comrades2" />
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
            <input type="text" class="form-control" formControlName="tutoring" placeholder="Ex: Passion for Sharing Knowledge, Continuous Learning, Improving Communication Skills"/>
          </div>

          <!--  Question   17   -->
          <div class="col-md-10">
            <li for="inputAddress" class="form-label">What are your strengths for teaching?</li>
            <input type="text" class="form-control" formControlName="teaching_Strengths" placeholder="Ex: Adaptability, Organizational Skills, Clear Communication"/>
          </div>

          <div class="col-md-10">
            <li  for="region" class="form-label">How much do you master computer tool</li>
            <select class="form-select" aria-label="Default select example" name="computerMastering" formControlName="computerMastering">
              <option value="" selected disabled>Choose...</option>
              <option value="Married">Good</option>
              <option value="Divorcede">Medium</option>
              <option value="Single">Bad</option>
            </select>
          </div>

          

          <!--  Question   18   -->
          <div class="col-md-10">
            <li for="inputAddress" class="form-label">In Learning, what motivates you? </li>
            <input type="text" class="form-control" formControlName="learning_Motivation" placeholder="Ex: Mathematics, French, Physics"/>
          </div>

          <!--  Question   19   -->
          <div class="col-md-10">
            <li for="inputAddress" class="form-label">What is your learning profile?</li>
            <input type="text" class="form-control" formControlName="LearningProfile"/>
          </div>

        </div>

      </ol>

    </div>

    <!-- buttons  -->
    <div class="action mt-2 ms-5">
      <button type="button" class="btn btn-secondary" (click)="onCancel()">Cancel</button>
      <button color="primary" type="submit" class="btn btn-primary ms-2" [disabled]="!formData.valid">Submit</button>
    </div>
  </div>
</form>

    <?php include '../config/footer.php' ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include '../config/header.php' ?>
    <h3 class="card-head text-center mb-5 text-white">High Care Student Guide</h3>
    <form class="table-responsive col-lg-10 mt-1" role="form" method="post"
        action="../config/student-interview-config.php?action=add">


            <div mat-dialog-content class=" ms-5">
                <ol class="list-group list-numbered card-body ms-4 row g-3">
                    <div class="col-md-10">
                        <li for="inputEmail4" class="form-label">What's your name?<span
                                class="required-indicator">*</span></li>
                        <input type="text" class="form-control" name="Name">
                    </div>

                    <div class="col-md-10">
                        <li for="inputZip" class="form-label">Date of Birth<span class="required-indicator">*</span>
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
                            <input class="form-check-input" type="radio" name="sex" value="Female"
                                id="gender2" />
                            <label class="form-check-label" for="gender2">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <li for="inputCity" class="form-label">Current institution attended?</li>
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
                            <input class="form-check-input" type="radio" formControlName="repeating" name="repeating"
                                value="Yes" id="rpt1" />
                            <label class="form-check-label" for="rpt1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="repeating" name="repeating"
                                value="No" id="rpt2" />
                            <label class="form-check-label" for="rpt2">
                                No
                            </label>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <li for="inputZip" class="form-label">Previous institution (if new)? </li>
                        <input type="text" class="form-control" name="PreviousInstitution">
                    </div>

                    <div class="col-md-10">
                        <li for="inputZip" class="form-label">Annual average obtained last year / Current sequential
                            averages?</li>
                        <input type="text" class="form-control" name="Annualaverage">
                    </div>


                    <div class="col-md-10">
                        <li for="" class="form-label">How would you qualify as a student</li>
                        <select class="form-select" aria-label="Default select example" name="studentquality"
                            formControlName="studentquality">
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
                                        <th scope="row">What are the reasons for this low rating</th>
                                        <th scope="col"><input type="text" name="SubjectRatingReasons1"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="SubjectRatingReasons2"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="SubjectRatingReasons3"
                                                class="form-control"></th>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">The elements that bother you in these subjects</th>
                                        <th scope="col"><input type="text" name="Subjectdisturbance1"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="Subjectdisturbance2"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="Subjectdisturbance3"
                                                class="form-control"></th>
                                       
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
                                        <th scope="col"><input type="text" name="Subjectappreciation1"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="Subjectappreciation2"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="Subjectappreciation3"
                                                class="form-control"></th>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">Subject you don't appreciate</th>
                                        <th scope="col"><input type="text" name="SubjectNotAppreciated1"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="SubjectNotAppreciated2"
                                                class="form-control"></th>
                                        <th scope="col"><input type="text" name="SubjectNotAppreciated3"
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
                                            <input type="text" name="SubjectExp1" class="form-control"
                                                placeholder="Ex: Computer">
                                        </th>
                                        <th scope="col">
                                            <input type="text" name="SubjectExp2" class="form-control"
                                                placeholder="Ex: Geography">
                                        </th>
                                        <th scope="col">
                                            <input type="text" name="SubjectExp3" class="form-control"
                                                placeholder="Ex: French">
                                        </th>
                                        <th scope="col">
                                            <input type="text" name="SubjectExp4" class="form-control"
                                                placeholder="Ex: English">
                                        </th>
                                       
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
                                        <th scope="col">
                                            <input type="text" name="Subjectperiod4" class="form-control"
                                                placeholder="Ex: 10hrs">
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
                                                class="form-control" placeholder="Ex: Not Satisfied">
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

                    <!--  Question   17   -->
                    <div class="col-md-10">
                        <li for="" class="form-label">How do you learn?</li>
                        <select class="form-select" aria-label="Default select example" name="learningApproach"
                            formControlName="learningApproach">
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
                        <li for="inputAddress" class="form-label">In Learning, what motivates you? </li>
                        <input type="text" class="form-control" name="learning_Motivation"
                            placeholder="Ex: Mathematics, French, Physics" />
                    </div>

                    <!--  Question   19   -->
                    <div class="col-10">
                        <li for="inputAddress" class="form-label">What is your learning profile?</li>
                        <input type="text" class="form-control" name="LearningProfile" />
                    </div>

                </ol>
            </div>


            <!-- buttons  -->
            <div class="action mt-2 ms-5">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button color="primary" type="submit" class="btn btn-primary ms-2">Submit</button>
            </div>
        </div>
    </form>

    <?php include '../config/footer.php' ?>
</body>

</html>
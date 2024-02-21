<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include '../config/header.php' ?>
    <form class="table-responsive col-lg-12 mt-1" method="post">

        <h3 class="card-head text-center p-5">Information data (Students/Families)</h3>

        <div mat-dialog-content class="ms-5">
            <!--   page 1 start -->
            <div>

                <ol class="list-group list-numbered card-body">
                    <!--  Question 1  -->
                    <div>
                        <li for="" class="form-label list-item">You are :</li>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <input class="form-check-input" type="radio" value="parent" formControlName="Q1"
                                    name="Q1" id="flexRadioDefault1">
                                Parent
                            </label>
                        </div>
                        <div class="form-check form-check-inline">

                            <label class="form-check-label" for="flexRadioDefault2">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="Student, Middle school student or high school student"
                                    id="flexRadioDefault2">
                                Student, Middle school student or high school student
                            </label>
                        </div>
                        <div class="form-check form-check-inline">

                            <label class="form-check-label" for="flexRadioDefault3">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="Adult wishing a formation" id="flexRadioDefault3">
                                Adult wishing a formation
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="flexRadioDefault4">
                                <input class="form-check-input" type="radio" formControlName="Q1" name="Q1"
                                    value="An enterprise" id="flexRadioDefault4">
                                An enterprise
                            </label>
                        </div>
                    </div>

                    <!--  Question 2  -->
                    <div>
                        <li for="" class="form-label">The classes are for? :</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your self" id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">
                                Your self
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2" value="Your son"
                                id="flexRadioDefault6">
                            <label class="form-check-label" for="flexRadioDefault6">
                                Your son
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your daughter" id="flexRadioDefault7">
                            <label class="form-check-label" for="flexRadioDefault7">
                                Your daughter
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your children" id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault8">
                                Your children
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q2" name="Q2"
                                value="Your employees" id="flexRadioDefault9">
                            <label class="form-check-label" for="flexRadioDefault9">
                                Your employees
                            </label>
                        </div>
                    </div>

                    <!--  Question 3  -->
                    <div class="">
                        <li for="" class="form-label">Level :</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="Primary School" id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault10">
                                Primary School
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="Secondary School" id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">
                                Secondary School
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q3" name="Q3"
                                value="University" id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault12">
                                University
                            </label>
                        </div>

                    </div>

                    <!--  Question 4  -->
                    <div>
                        <li for="" class="form-label">Type of Classes desired:</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Private lessons at home" id="flexRadioDefault23">
                            <label class="form-check-label" for="flexRadioDefault23">
                                Private lessons at home
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Homework assistance" id="flexRadioDefault24">
                            <label class="form-check-label" for="flexRadioDefault24">
                                Homework assistance
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Group tutoring sessions" id="flexRadioDefault25">
                            <label class="form-check-label" for="flexRadioDefault25">
                                Group tutoring sessions
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Online academic support" id="flexRadioDefault26">
                            <label class="form-check-label" for="flexRadioDefault26">
                                Online academic support
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Exam preparation program" id="flexRadioDefault27">
                            <label class="form-check-label" for="flexRadioDefault27">
                                Exam preparation program
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q4" name="Q4"
                                value="Competition preparation program" id="flexRadioDefault28">
                            <label class="form-check-label" for="flexRadioDefault28">
                                Competition preparation program
                            </label>
                        </div>
                    </div>

                    <!--  Question 5  -->
                    <div>
                        <li for="" class="form-label">Class schedule:</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Regular throughout the year" id="flexRadioDefault29">
                            <label class="form-check-label" for="flexRadioDefault29">
                                Regular throughout the year
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="One-time or several months punctual" id="flexRadioDefault30">
                            <label class="form-check-label" for="flexRadioDefault30">
                                One-time or several months punctual
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Intensive over a short period" id="flexRadioDefault31">
                            <label class="form-check-label" for="flexRadioDefault31">
                                Intensive over a short period
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Punctual throughout the year" id="flexRadioDefault32">
                            <label class="form-check-label" for="flexRadioDefault32">
                                Punctual throughout the year
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q5" name="Q5"
                                value="Quarterly" id="flexRadioDefault33">
                            <label class="form-check-label" for="flexRadioDefault33">
                                Quarterly
                            </label>
                        </div>

                    </div>

                    <!--  Question 6  -->
                    <div>
                        <li for="" class="form-label">Field of Study</li>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="Science"
                                id="flexRadioscience">
                            <label class="form-check-label" for="flexRadioscience">
                                Science
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="Q6" name="Q6" value="Arts"
                                id="flexRadioarts">
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
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="Morning" formControlName="Q7_Mon" id="Q17">
                                                <label class="form-check-label" for="Q17">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="AfterNoon" formControlName="Q7_Mon" id="Q18">
                                                <label class="form-check-label" for="Q18">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Mon"
                                                    value="Evenning" formControlName="Q7_Mon" id="Q19">
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
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="Morning" formControlName="Q7_Tues" id="Q20">
                                                <label class="form-check-label" for="Q20">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="AfterNoon" formControlName="Q7_Tues" id="Q21">
                                                <label class="form-check-label" for="Q21">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Tues"
                                                    value="Evenning" formControlName="Q7_Tues" id="Q22">
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
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="Morning" formControlName="Q7_Wed" id="Q23">
                                                <label class="form-check-label" for="Q23">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="AfterNoon" formControlName="Q7_Wed" id="Q2">
                                                <label class="form-check-label" for="Q2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Wed"
                                                    value="Evenning" formControlName="Q7_Wed" id="Q3">
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
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="Morning" formControlName="Q7_Thur" id="Qthurs">
                                                <label class="form-check-label" for="Qthurs">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="AfterNoon" formControlName="Q7_Thur" id="Qthurs2">
                                                <label class="form-check-label" for="Qthurs2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Thur"
                                                    value="Evenning" formControlName="Q7_Thur" id="Qthurs3">
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
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="Morning" formControlName="Q7_Fri" id="Qfri1">
                                                <label class="form-check-label" for="Qfri1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="AfterNoon" formControlName="Q7_Fri" id="Qfri2">
                                                <label class="form-check-label" for="Qfri2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Fri"
                                                    value="Evenning" formControlName="Q7_Fri" id="Qfri3">
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
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="Morning" formControlName="Q7_Sat" id="Qsat1">
                                                <label class="form-check-label" for="Qsat1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="AfterNoon" formControlName="Q7_Sat" id="Qsat2">
                                                <label class="form-check-label" for="Qsat2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sat"
                                                    value="Evenning" formControlName="Q7_Sat" id="Qsat3">
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
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="Morning" formControlName="Q7_Sun" id="Qsun1">
                                                <label class="form-check-label" for="Qsun1">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="AfterNoon" formControlName="Q7_Sun" id="Qsun2">
                                                <label class="form-check-label" for="Qsun2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Q7_Sun"
                                                    value="Evenning" formControlName="Q7_Sun" id="Qsun3">
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
                    <li for="" class="form-label list-item mt-2">Contact Information (parents/guardians/others)</li>
                    <div class="row g-3">
                        <div class="col-md-11">
                            <label for="inputEmail4" class="form-label">Mr,Mrs,Miss<span
                                    class="required-indicator">*</span></label>
                            <input type="text" class="form-control" formControlName="adultName" name="adultName">

                        </div>

                        <div class="col-md-5 form-group">
                            <label for="region" class="form-label">Region<span
                                    class="required-indicator">*</span></label>
                            <select class="form-select" formControlName="adultRegion" name="adultRegion">

                                <option value="" selected disabled>Select a Region</option>
                                <option value="adamaoua">Adamaoua</option>
                                <option value="centre">Centre</option>
                                <option value="east">East</option>
                                <option value="far-north">Far North</option>
                                <option value="littoral">Littoral</option>
                                <option value="north">North</option>
                                <option value="northwest">Northwest</option>
                                <option value="west">West</option>
                                <option value="south">South</option>
                                <option value="southwest">Southwest</option>
                            </select>

                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Quater<span
                                    class="required-indicator">*</span></label>
                            <input type="text" class="form-control" formControlName="adultLocation"
                                name="adultLocation">

                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Landline Phone:</label>
                            <input type="number" class="form-control" formControlName="adultFixPhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Mobile Phone:</label>
                            <input type="number" class="form-control" formControlName="adultMobilePhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress" class="form-label">Email:</label>
                            <input type="email" class="form-control" formControlName="adultEmail">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">P.O Box:</label>
                            <input type="text" class="form-control" formControlName="adultPObox">
                        </div>
                    </div>

                    <!--  Question 2  -->
                    <li for="" class="form-label list-item mt-5">Contact Information (Students)</li>
                    <div class="row g-3">
                        <div class="col-md-11">
                            <label for="inputEmail4" class="form-label">Mr,Mrs,Miss:</label>
                            <input type="text" class="form-control" formControlName="studentName">
                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Region</label>
                            <select class="form-select" name="studentRegion" formControlName="studentRegion">
                                <option value="" selected disabled>Select a Region</option>
                                <option value="adamaoua">Adamaoua</option>
                                <option value="centre">Centre</option>
                                <option value="east">East</option>
                                <option value="far-north">Far North</option>
                                <option value="littoral">Littoral</option>
                                <option value="north">North</option>
                                <option value="northwest">Northwest</option>
                                <option value="west">West</option>
                                <option value="south">South</option>
                                <option value="southwest">Southwest</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Quater</label>
                            <input type="text" class="form-control" formControlName="studentLocation">
                        </div>

                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">Landline Phone:</label>
                            <input type="number" class="form-control" formControlName="studentFixPhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputZip" class="form-label">Mobile Phone:</label>
                            <input type="number" class="form-control" formControlName="studentMobilePhone">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress" class="form-label">Email:</label>
                            <input type="email" class="form-control" formControlName="studentEmail">
                        </div>

                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">P.O Box:</label>
                            <input type="text" class="form-control" formControlName="studentPOBox">
                        </div>

                        <div class="">
                            <li for="" class="form-label list-item">Have you ever use the internet(For school purpose)
                            </li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InternetUsage" value="Yes"
                                    formControlName="InternetUsage" id="flexRadioDefaultP2">
                                <label class="form-check-label" for="flexRadioDefaultP2">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InternetUsage" value="No"
                                    formControlName="InternetUsage" id="flexRadioDefaultP3">
                                <label class="form-check-label" for="flexRadioDefaultP3">
                                    No
                                </label>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <label for="inputAddress2" class="form-label">Frequency of use (hours)? Per week</label>
                            <input type="text" class="form-control" formControlName="InternetUsage_duartion"
                                placeholder="Ex: 10 hours">
                        </div>
                    </div>

                    <!--  Question 3  -->
                    <div>
                        <li for="" class="form-label mt-5">How did you come to know about MozartCours?</li>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a poster" name="mozartCours_Promotion" id="flexRadioDefaultp1">
                            <label class="form-check-label" for="flexRadioDefaultp1">
                                Through a poster
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a flyer/handout" name="mozartCours_Promotion" id="flexRadioDefaultp2">
                            <label class="form-check-label" for="flexRadioDefaultp2">
                                Through a flyer/handout
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through word of mouth" name="mozartCours_Promotion" id="flexRadioDefaultp3">
                            <label class="form-check-label" for="flexRadioDefaultp3">
                                Through word of mouth
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a banner" name="mozartCours_Promotion" id="flexRadioDefaultp4">
                            <label class="form-check-label" for="flexRadioDefaultp4">
                                Through a banner
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through a commercial/advertisement" name="mozartCours_Promotion"
                                id="flexRadioDefaultp5">
                            <label class="form-check-label" for="flexRadioDefaultp5">
                                Through a commercial/advertisement
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" formControlName="mozartCours_Promotion"
                                value="Through the internet" name="mozartCours_Promotion" id="flexRadioDefaultp6">
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
        <div class="action ms-5">
            <button type="button" class="btn btn-secondary" (click)="onCancel()">Cancel</button>
            <button color="primary" type="submit" class="btn btn-primary ms-2"
                [disabled]="!formData.valid">Submit</button>
        </div>
    </form>

    <?php include '../config/footer.php' ?>
</body>

</html>
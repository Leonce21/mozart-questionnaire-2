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
    <h3 class="card-head text-center mb-5 text-white">Guide Questionnaire for Monitoring Services (Student's Family)</h3>
    <form class="table-responsive col-lg-10 mt-1" role="form" method="post"
        action="../config/questionnaire-config.php?action=add">

        <div class="">
            <div >
                <div mat-dialog-content class=" ms-5">
                    <ol class="list-group list-numbered card-body ms-4 row g-3">
                        <div class="col-md-10">
                            <li for="inputEmail4" class="form-label">Code and/or Family name<span
                                    class="required-indicator">*</span></li>
                            <input type="text" class="form-control" name="FamilyName">
                        </div>

                        <div class="col-md-10">
                            <li for="inputEmail4" class="form-label">Student name<span
                                    class="required-indicator">*</span></li>
                            <input type="text" class="form-control" name="StudentName">
                        </div>

                        <div class="col-md-10">
                            <li for="inputCity" class="form-label">First teacher name</li>
                            <input type="text" class="form-control" name="FirstTeacherName">
                        </div>

                        <div class="col-md-10">
                            <li for="inputCity" class="form-label">Second teacher name</li>
                            <input type="text" class="form-control" name="SecondTeacherName">
                        </div>

                        <div class="col-md-10">
                            <li for="inputCity" class="form-label">Third teacher name</li>
                            <input type="text" class="form-control" name="ThirdTeacherName">
                        </div>

                        <div class="col-md-10">
                            <li for="inputZip" class="form-label">Subjects taken</li>
                            <input type="text" class="form-control" name="SubjectsTaken">
                        </div>

                        <div class="col-md-10">
                            <li for="inputZip" class="form-label">Subjects taught</li>
                            <input type="text" class="form-control" name="SubjectsTaught">
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
                                            <input class="form-check-input" type="radio" name="Q_one" value="Yes"
                                                formControlName="Q_one" id="Q1">
                                            <label class="form-check-label" for="Q1">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_one" value="No"
                                                formControlName="Q_one" id="Q2">
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
                                            <input class="form-check-input" type="radio" name="Q_two" value="Yes"
                                                formControlName="Q_two" id="Q3">
                                            <label class="form-check-label" for="Q3">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_two" value="No"
                                                formControlName="Q_two" id="Q4">
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
                                            <input class="form-check-input" type="radio" name="Q_three" value="Yes"
                                                formControlName="Q_three" id="Q5">
                                            <label class="form-check-label" for="Q5">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_three" value="No"
                                                formControlName="Q_three" id="Q6">
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
                                            <input class="form-check-input" type="radio" name="Q_four" value="Yes"
                                                formControlName="Q_four" id="Q7">
                                            <label class="form-check-label" for="Q7">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_four" value="No"
                                                formControlName="Q_four" id="Q8">
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
                                            <input class="form-check-input" type="radio" name="Q_five" value="Yes"
                                                formControlName="Q_five" id="Q9">
                                            <label class="form-check-label" for="Q9">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_five" value="No"
                                                formControlName="Q_five" id="Q10">
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
                                            <input class="form-check-input" type="radio" name="Q_six" value="Yes"
                                                formControlName="Q_six" id="Q11">
                                            <label class="form-check-label" for="Q11">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_six" value="No"
                                                formControlName="Q_six" id="Q12">
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
                                            <input class="form-check-input" type="radio" name="Q_seven" value="Yes"
                                                formControlName="Q_seven" id="Q13">
                                            <label class="form-check-label" for="Q13">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_seven" value="No"
                                                formControlName="Q_seven" id="Q14">
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
                                            <input class="form-check-input" type="radio" name="Q_eight" value="Yes"
                                                formControlName="Q_eight" id="Q15">
                                            <label class="form-check-label" for="Q15">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eight" value="No"
                                                formControlName="Q_eight" id="Q16">
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
                        <p>The advisor will check the corresponding box according to the following evaluation:</p>
                        <ol class="d-flex justify-content-start mks">

                        </ol>
                    </div>

                    <!--    Yes/No questions table    -->
                    <div class="col-md-11 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th colspan="5" class="text-center">Student</th>

                                </tr>
                            </thead>

                            <tbody>
                                <!--    question 9    -->
                                <tr>
                                    <th scope="row">9</th>
                                    <td>How do you judge the quality of the teacher's interventions? (Relevant, quickly
                                        understands my problem, seems to have a good command of the subject...)</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_nine" value="5"
                                                formControlName="Q_nine" id="Q17">
                                            <label class="form-check-label" for="Q17">
                                                5
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_nine" value="4"
                                                formControlName="Q_nine" id="Q18">
                                            <label class="form-check-label" for="Q18">
                                                4
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_nine" value="3"
                                                formControlName="Q_nine" id="Q19">
                                            <label class="form-check-label" for="Q19">
                                                3
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_nine" value="2"
                                                formControlName="Q_nine" id="Q20">
                                            <label class="form-check-label" for="Q20">
                                                2
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_nine" value="1"
                                                formControlName="Q_nine" id="Q21">
                                            <label class="form-check-label" for="Q21">
                                                1
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <!--    question 10    -->
                                <tr>
                                    <th scope="row">10</th>
                                    <td>How do you assess your relationship with the teacher? (He is nice, kind,
                                        attentive, we get along well, he doesn't make fun of my mistakes, he is
                                        patient...)</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_ten" value="5"
                                                formControlName="Q_ten" id="Q22">
                                            <label class="form-check-label" for="Q22">
                                                5
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_ten" value="4"
                                                formControlName="Q_ten" id="Q23">
                                            <label class="form-check-label" for="Q23">
                                                4
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_ten" value="3"
                                                formControlName="Q_ten" id="Q24">
                                            <label class="form-check-label" for="Q24">
                                                3
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_ten" value="2"
                                                formControlName="Q_ten" id="Q25">
                                            <label class="form-check-label" for="Q25">
                                                2
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_ten" value="1"
                                                formControlName="Q_ten" id="Q26">
                                            <label class="form-check-label" for="Q26">
                                                1
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <!--    question 11    -->
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Does the teacher explain the concepts well? (Is he clear, precise, gives
                                        examples...)</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eleven" value="5"
                                                formControlName="Q_eleven" id="Q27">
                                            <label class="form-check-label" for="Q27">
                                                5
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eleven" value="4"
                                                formControlName="Q_eleven" id="Q28">
                                            <label class="form-check-label" for="Q28">
                                                4
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eleven" value="3"
                                                formControlName="Q_eleven" id="Q29">
                                            <label class="form-check-label" for="Q29">
                                                3
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eleven" value="2"
                                                formControlName="Q_eleven" id="Q30">
                                            <label class="form-check-label" for="Q30">
                                                2
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_eleven" value="1"
                                                formControlName="Q_eleven" id="Q31">
                                            <label class="form-check-label" for="Q31">
                                                1
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <!--    question 12    -->
                                <tr>
                                    <th scope="row">12</th>
                                    <td>How do you judge the method used to make you understand? (It suits me, not very
                                        adapted, difficult)</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_twelve" value="5"
                                                formControlName="Q_twelve" id="Q32">
                                            <label class="form-check-label" for="Q32">
                                                5
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_twelve" value="4"
                                                formControlName="Q_twelve" id="Q33">
                                            <label class="form-check-label" for="Q33">
                                                4
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_twelve" value="3"
                                                formControlName="Q_twelve" id="Q34">
                                            <label class="form-check-label" for="Q34">
                                                3
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_twelve" value="2"
                                                formControlName="Q_twelve" id="Q35">
                                            <label class="form-check-label" for="Q35">
                                                2
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_twelve" value="1"
                                                formControlName="Q_twelve" id="Q36">
                                            <label class="form-check-label" for="Q36">
                                                1
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <!--    question 13    -->
                                <tr>
                                    <th scope="row">13</th>
                                    <td>How do you appreciate any progress made? (I understand better, I got good
                                        grades, I know how to study,...)</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_thirteen" value="5"
                                                formControlName="Q_thirteen" id="Q37">
                                            <label class="form-check-label" for="Q37">
                                                5
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_thirteen" value="4"
                                                formControlName="Q_thirteen" id="Q38">
                                            <label class="form-check-label" for="Q38">
                                                4
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_thirteen" value="3"
                                                formControlName="Q_thirteen" id="Q39">
                                            <label class="form-check-label" for="Q39">
                                                3
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_thirteen" value="2"
                                                formControlName="Q_thirteen" id="f2">
                                            <label class="form-check-label" for="q40">
                                                2
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_thirteen" value="1"
                                                formControlName="Q_thirteen" id="Q41">
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
                                            <input class="form-check-input" type="radio" name="Q_fourteen" value="Yes"
                                                formControlName="Q_fourteen" id="Q42">
                                            <label class="form-check-label" for="Q42">
                                                Yes
                                            </label>
                                        </div>
                                    </td>
                                    <td colspan="5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Q_fourteen" value="No"
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

                    <p class="col-md-10">If applicable (otherwise, respond to the last line only), what grades did you
                        get on assignments?</p>

                    <div class="col-md-11">

                        <div class="table-responsive col-14">
                            <table class="table table-bordered table-responsive ">
                                <thead>
                                    <tr>
                                        <th scope="col">The subjects for the support or related courses.</th>
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
                                        <th scope="row">Difficulties you still encounter during these subjects</th>
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

                    <p class="col-md-10">In cases of notable dissatisfaction, note below the given reasons</p>

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
                                    <th scope="col"><textarea formControlName="dissatisfaction2"
                                            class="form-control" cols="30" rows="1"></textarea></th>

                                </tr>
                            </tbody>
                        </table>
                        
                    </div>

                </div>

            </div>

            <!-- buttons  -->
            <div class="action" style="display: flex; justify-content: center;">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button color="primary" type="submit" class="btn btn-primary ms-3">Submit</button>
            </div>
        </div>
    </form>

    <?php include '../config/footer.php' ?>
</body>

</html>
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
   
<form (ngSubmit)="submit()" [formGroup]="formData" class="table-responsive col-lg-14 mt-1">
  
    <h3 class="card-head text-center">Teacher Recruitement</h3>

    <div mat-dialog-content class="ms-5 content">
          <!--   page 1 start -->
      <div>
        
        <ol class="list-group list-numbered card-body ms-4">
          <!--  Question 1  -->
          <div>
            
            <li for="" class="form-label list-item mt-2">Your Details</li>
            <div class="row g-3">
              <div class="col-md-10">
                <label for="Name" class="form-label">First and Last name</label>
                <input type="text" id="Name" class="form-control" name="Name"
                formControlName="Name">

              </div>

              <div class="col-md-5 form-group">
                <label for="region" class="form-label">Nationality</label>
                <input type="text" class="form-control" formControlName="nationality">
              </div>

              <div class="col-md-5">
                <label for="inputCity" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" formControlName="date_of_birth">
              </div>

              <div class="col-md-5">
                <label for="inputZip" class="form-label">District</label>
                <input type="text" class="form-control" formControlName="District" 
                        name="District">
        
              </div>

              <div class="col-md-5">
                <label for="inputCity" class="form-label">Issued on </label>
                <input type="date" class="form-control" formControlName="Date_Issued">
              </div>

              <div class="col-md-5">
                <label for="inputCity" class="form-label">Landline Phone/Fixed Phone:</label>
                <input type="number" class="form-control" formControlName="FixPhone">
              </div>

              <div class="col-md-5">
                <label for="inputZip" class="form-label">Mobile Phone:</label>
                <input type="number" class="form-control" formControlName="MobilePhone">
              </div>

              <div class="col-md-5">
                <label for="inputAddress" class="form-label">Email:</label>
                <input type="email" class="form-control" formControlName="Email"  required>           
              </div>

              <div class="col-md-5">
                <label for="inputAddress2" class="form-label">P.O Box:</label>
                <input type="text" class="form-control" formControlName="PObox">
              </div>
            </div>

          </div>

          <!--  Question 2  -->
          <div class="col-md-10">
            <li for="" class="form-label">How did you hear about MozartCours?</li>
            <select class="form-select" aria-label="Default select example" name="mozartCours_Promotion"
                formControlName="mozartCours_Promotion">
                <option value="" selected disabled>Choose...</option>
                <option value="Poster">By a poster </option>
                <option value="Leaflet">A leaflet </option>
                <option value="Mouth to mouth">Word of mouth </option>
                <option value="Internet">Internet </option>
                <option value="Banner">Banner </option>
            </select>
          </div>

          <!--  Question 3  -->
          <div class="col-md-10">
            <li for="" class="form-label">Means of transport</li>
            <select class="form-select" aria-label="Default select example" name="MeansOfTransport"
                formControlName="MeansOfTransport">
                <option value="" selected disabled>Choose...</option>
                <option value="Car">Car </option>
                <option value="Taxi">A Taxi </option>
                <option value="Bicycle">A bicycle </option>
                <option value="Scooter">A Scooter </option>
                <option value="Motocycle">A Motocycle</option>
            </select>
          </div>

          <!--  Question 4  -->
          <div class="col-md-10">
            <li for="" class="form-label">Current Situation</li>
            <select class="form-select" aria-label="Default select example" name="CurrentSituation"
                formControlName="CurrentSituation">
                <option value="" selected disabled>Choose...</option>
                <option value="Current teacher">Current teacher</option>
                <option value="Retired teacher">Retired teacher</option>
                <option value="Student">Student</option>
                <option value="Without activity">Without activity</option>
                <option value="Trainer">Trainer</option>
                <option value="Employee">Employee</option>
            </select>
          </div>

          <!-- Question 5 -->
          <div class="row g-3">
            <li for="" class="form-label mt-5">Your Studies</li>
            <div class="col-md-5 form-group">
              <label for="degree" class="form-label">Highest Degree obtained</label>
              <input type="text" class="form-control" formControlName="degreeobtained" placeholder="Ex: HND, Masters,...">
            </div>
  
            <div class="col-md-5">
              <label for="year" class="form-label">Year</label>
              <input type="date" class="form-control" formControlName="year_of_degree">
            </div>

            <div class="col-md-5">
              <label for="degree" class="form-label">Speciality</label>
              <input type="text" class="form-control" formControlName="Speciality" placeholder="Ex: Engineering, Accountancy,...">
            </div>

            <div class="col-md-5">
              <label for="degree" class="form-label">University/School</label>
              <input type="text" class="form-control" formControlName="institution" placeholder="Ex: UY1, ENSPY,...">
            </div>

          </div>

           <!-- Question 6 -->
          <div>
            <li for="" class="form-label list-item">
              Have you ever given private lessons in a private setting?
            </li>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="private_class" formControlName="private_class" value="Yes" id="flexRadioDefault1" />
              <label class="form-check-label" for="flexRadioDefault1">
                Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="private_class" formControlName="private_class" value="No" id="flexRadioDefault2" />
              <label class="form-check-label" for="flexRadioDefault2">
                No
              </label>
            </div>
          </div>

           <!-- Question 7 -->
          <div>
            <li for="" class="form-label list-item">
              Have you ever given private lessons within the framework of an organization?
            </li>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="support_class" formControlName="support_class" value="Yes" id="flexRadioDefault3" />
              <label class="form-check-label" for="flexRadioDefault3">
                Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="support_class" formControlName="support_class" value="No" id="flexRadioDefault4" />
              <label class="form-check-label" for="flexRadioDefault4">
                No
              </label>
            </div>
          </div>

          <!-- Question 8 -->
          <div class="">
            <li for="" class="form-label">What are your educational or associative experiences? </li>
            <div class="col-md-10">
              <input type="text" class="form-control" formControlName="experience" placeholder="">
            </div>
          </div>

          <!-- Question 9 -->
          <div class="">
            <li for="" class="form-label">What are your main motivations for teaching? </li>
            <div class="col-md-10">
              <input type="text" class="form-control" formControlName="teachingmotivation" placeholder="">
            </div>
          </div>

          <div class="">
            <li for="" class="form-label list-item">Have you ever use the internet(For school purpose)</li>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="InternetUsage" value="Yes" formControlName="InternetUsage" id="flexRadioDefaultP2">
              <label class="form-check-label" for="flexRadioDefaultP2">
                  Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="InternetUsage" value="No" formControlName="InternetUsage" id="flexRadioDefaultP3">
              <label class="form-check-label" for="flexRadioDefaultP3">
                  No
              </label>
            </div>
          </div>
            
          <div class="col-md-5">
            <li for="inputAddress2" class="form-label">Frequency of use (hours)? Per week</li>
            <input type="text" class="form-control" formControlName="InternetUsage_duartion" placeholder="Ex: 10 hours">
          </div>

          <!-- Question 10 -->
          <li for="inputAddress" class="form-label">
            In which subjects and for which levels do you wish to teach?
          </li>
          <div class="col-md-5 table-responsive me-5">
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
                    <th scope="row">Levels</th>
                    <th scope="col">
                      <input type="text" formControlName="levels1" class="form-control" placeholder="Ex: Primary">
                    </th>
                    <th scope="col">
                      <input type="text" formControlName="levels2" class="form-control" placeholder="Ex: Secondary">
                    </th>
                    <th scope="col">
                      <input type="text" formControlName="levels3" class="form-control" placeholder="Ex: University">
                    </th>
                    <!-- <th scope="col">
                      <input type="text" formControlName="levels4" class="form-control" placeholder="Ex: Primary">
                    </th>
                    <th scope="col">
                      <input type="text" formControlName="levels5" class="form-control" placeholder="Ex: Secondary">
                    </th> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-5">
            <li for="inputAddress2" class="form-label">How many hours of lessons would you like to give each week?</li>
            <input type="number" class="form-control" formControlName="hoursOfLesson" placeholder="Ex: 10 hours">
          </div> 
          
          <div class="col-md-5">
            <li for="inputAddress2" class="form-label">What are your geographic preferences (neighborhoods) for teaching? </li>
            <input type="text" class="form-control" formControlName="geographicPreferences" placeholder="Ex: Mimboman, Essos, Omnisport">
          </div> 
          
          <!--  Question 7  -->
          <div class="me-4">
            <li for="" class="form-label">Check in this table your hourly availability to give lessons?</li>
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
                            <input class="form-check-input" type="radio" name="Monday" value="Morning" formControlName="Monday" id="Q17">
                            <label class="form-check-label" for="Q17">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Monday" value="AfterNoon" formControlName="Monday" id="Q18">
                            <label class="form-check-label" for="Q18">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Monday" value="Evenning" formControlName="Monday" id="Q19">
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
                            <input class="form-check-input" type="radio" name="Tuesday" value="Morning" formControlName="Tuesday" id="Q20">
                            <label class="form-check-label" for="Q20">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Tuesday" value="AfterNoon" formControlName="Tuesday" id="Q21">
                            <label class="form-check-label" for="Q21">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Tuesday" value="Evenning" formControlName="Tuesday" id="Q22">
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
                            <input class="form-check-input" type="radio" name="Wednesday" value="Morning" formControlName="Wednesday" id="Q23">
                            <label class="form-check-label" for="Q23">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Wednesday" value="AfterNoon" formControlName="Wednesday" id="Q2">
                            <label class="form-check-label" for="Q2">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Wednesday" value="Evenning" formControlName="Wednesday" id="Q3">
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
                            <input class="form-check-input" type="radio" name="Thursday" value="Morning" formControlName="Thursday" id="Qthurs">
                            <label class="form-check-label" for="Qthurs">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Thursday" value="AfterNoon" formControlName="Thursday" id="Qthurs2">
                            <label class="form-check-label" for="Qthurs2">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Thursday" value="Evenning" formControlName="Thursday" id="Qthurs3">
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
                            <input class="form-check-input" type="radio" name="Friday" value="Morning" formControlName="Friday" id="Qfri1">
                            <label class="form-check-label" for="Qfri1">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Friday" value="AfterNoon" formControlName="Friday" id="Qfri2">
                            <label class="form-check-label" for="Qfri2">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Friday" value="Evenning" formControlName="Friday" id="Qfri3">
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
                            <input class="form-check-input" type="radio" name="Saturday" value="Morning" formControlName="Saturday" id="Qsat1">
                            <label class="form-check-label" for="Qsat1">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Saturday" value="AfterNoon" formControlName="Saturday" id="Qsat2">
                            <label class="form-check-label" for="Qsat2">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Saturday" value="Evenning" formControlName="Saturday" id="Qsat3">
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
                            <input class="form-check-input" type="radio" name="Sunday" value="Morning" formControlName="Sunday" id="Qsun1">
                            <label class="form-check-label" for="Qsun1">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sunday" value="AfterNoon" formControlName="Sunday" id="Qsun2">
                            <label class="form-check-label" for="Qsun2">
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sunday" value="Evenning" formControlName="Sunday" id="Qsun3">
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
    </div>
    <div class="action ms-5">
      <button type="button" class="btn btn-secondary" (click)="onCancel()">Cancel</button>
      <button color="primary" type="submit" class="btn btn-primary ms-2">Submit</button>
    </div>
</form>



    <?php include '../config/footer.php' ?>
</body>

</html>
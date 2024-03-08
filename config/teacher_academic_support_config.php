<?php
       session_start();
 include('connection.php');
       
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


switch ($_GET['action'])
{
    case 'add':
        $query = "INSERT INTO academicsupport(Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, salaryexpectation) VALUES ('$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10', '$salaryexpectation')";

        mysqli_query($db, $query) or die('Error in updating Database');

    break;

    if($query){
        $_SESSION['status'] = "Data inserted goodly";
        header('location:');
    }

}
?>
    <script type="text/javascript">
        alert("Successfully added.");
        window.location = "../pages/teacher_academic_support.php";
    </script>

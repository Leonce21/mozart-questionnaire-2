<?php
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=mozartcoursquestionnaire", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch data from the database
try {
    $stmt = $pdo->query("SELECT * FROM studentinterview");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <title>

        Material Dashboard 2 by Creative Tim

    </title>

    <!--     Fonts and icons     -->
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

    <link id="pagestyle" href="./assets/css/material-dashboard.css" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>


<body class="g-sidenav-show  bg-gray-100">

    <?php include('./includes/sidebar.php');?>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <?php include('./includes/navbar.php');?>

        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="card-body table-responsive col-12">
                <h2>Student Data Table</h2>
                <table class="table table-bordered table-striped" role="grid" aria-describedby="all_patients_info">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>sex</th>
                            <th>Current Institution</th>
                            <th>Current Institution Period</th>
                            <th>Class attended</th>
                            <th>Repeating</th>
                            <th>Previous Institution</th>
                            <th>Annual average</th>
                            <th>Group collaboration</th>
                            <th>Learning Approach</th>
                            <th>Learning Motivation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                        <tr class="text-center">
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <?= $row['Name'] ?>
                            </td>
                            <td>
                                <?= $row['date_of_birth'] ?>
                            </td>
                            <td>
                                <?= $row['sex'] ?>
                            </td>
                            <td>
                                <?= $row['CurrentInstitution'] ?>
                            </td>
                            <td>
                                <?= $row['CurrentInstitutionPeriod'] ?>
                            </td>
                            <td>
                                <?= $row['Classattended'] ?>
                            </td>
                            <td>
                                <?= $row['repeating'] ?>
                            </td>
                            <td>
                                <?= $row['PreviousInstitution'] ?>
                            </td>
                            <td>
                                <?= $row['Annualaverage'] ?>
                            </td>
                            <td>
                                <?= $row['group_collaboration'] ?>
                            </td>
                            <td>
                                <?= $row['learningApproach'] ?>
                            </td>
                            <td>
                                <?= $row['learning_Motivation'] ?>
                            </td>
                            <td>
                                <a href="./page/edit-student.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php include('./includes/footer.php');?>

        </div>


    </main>



    <!--   Core JS Files   -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
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
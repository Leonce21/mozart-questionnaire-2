<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/mozart 2.png">

    <title>

      Dashboard Forms

    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link id="pagestyle" href="./assets/css/material-dashboard.css" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>


<body class="g-sidenav-show bg-gray-100">

    <?php include('./includes/sidebar.php');?>

    <main class="main-content border-radius-lg">
        <!-- Navbar -->

        <?php include('./includes/navbar.php');?>

        <!-- End Navbar -->

        <div class="container-fluid py-4">

            <div class="row h-100 min-vh-100">
                <div class="col-12">

                    <div class="row">
                        <div class="col-lg-5 col-sm-6">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">weekend</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Bookings</p>
                                        <h4 class="mb-0">281</h4>
                                    </div>
                                </div>

                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55%
                                        </span>than last week</p>
                                </div>
                            </div>

                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">leaderboard</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                        <h4 class="mb-0">2,300</h4>
                                    </div>
                                </div>

                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-3">
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                                        </span>than last month</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
                            <div class="card  mb-2">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">store</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize ">Revenue</p>
                                        <h4 class="mb-0 ">34k</h4>
                                    </div>
                                </div>

                                <hr class="horizontal my-0 dark">
                                <div class="card-footer p-3">
                                    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1%
                                        </span>than yesterday</p>
                                </div>
                            </div>

                            <div class="card ">
                                <div class="card-header p-3 pt-2 bg-transparent">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="material-icons opacity-10">person_add</i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize ">Followers</p>
                                        <h4 class="mb-0 ">+91</h4>
                                    </div>
                                </div>

                                <hr class="horizontal my-0 dark">
                                <div class="card-footer p-3">
                                    <p class="mb-0 ">Just updated</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                        {
                            
                            ?>
                            <!-- <div class="alert alert-warning fade show" role="alert">
                                <strong>Successfully added</strong><?php echo $_SESSION['status']; ?>
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </div> -->
                            <?php
                            //unset($_SESSION['status']);
                        }
                    ?>
<!-- 
                    <div class="card mt-5">
                        <div class="card-header">
                          

                           
                        </div>

                        <div class="card-body">
                          
                        </div>
                    </div> -->

                   
                </div>
            </div>

            <?php include('./includes/footer.php');?>

        </div>


    </main>

   

    <!--   Core JS Files   -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>


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
    <script src="./assets/js/material-dashboard.min.js"></script>
</body>

</html>

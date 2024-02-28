
<html>
    <body>
        
        <footer class="footer py-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>

        
        <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] != '')
            {
            
            ?>
            <script>
                swal({
                    title: '<?php echo $_SESSION['status']; ?>',
                    icon: '<?php echo $_SESSION['status_code']; ?>',
                    
                    button: "Ok",
                });
            </script>
            <?php

                unset($_SESSION['status']);
            
            }
        ?>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../assets/js/sweetalert.js"></script>
        <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
    </body>
</html>
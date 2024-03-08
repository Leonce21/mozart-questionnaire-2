<script src="/admin/assets/js/sweetalert.js"></script>
<?php
    if (isset($_SESSION['verify']))
    {
        ?>
       
        <script>
            swal({
                title: "<?php echo $_SESSION['verify'];?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['verify_message'];?>",
                button: "Ok",
            });
        </script>

        <?php
        unset($_SESSION['verify']); 
    }
?>



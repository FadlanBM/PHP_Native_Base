    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    
        <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/app.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/app.init.overlay.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/app-style-switcher.js"></script>   
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/sidebarmenu.js"></script>  
    <!--Custom JavaScript -->
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/feather.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/custom.min.js"></script>           
    <!-- ############################################################### -->
    <!-- This Page Js Files Here -->
    <!-- ############################################################### -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/echarts/dist/echarts.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo BASE_URL; ?>/assets/libs/d3/dist/d3.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/c3/c3.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/dist/js/pages/dashboards/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
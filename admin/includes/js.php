<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="src/assets/js/jquery.min.js"></script>
<script src="src/assets/js/popper.min.js"></script>
<script src="src/assets/js/bootstrap.min.js"></script>
<script src="src/assets/js/select2.min.js"></script>
<script src="src/assets/js/slick.js"></script>
<script src="src/assets/js/jquery.counterup.min.js"></script>
<script src="src/assets/js/counterup.min.js"></script>
<script src="src/assets/js/custom.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="src/assets/js/metisMenu.min.js"></script>	
<script>
    $('#side-menu').metisMenu();
</script>

<script src="src/assets/js/dropzone.js"></script>
		
<!-- Date Booking Script -->
<script src="src/assets/js/moment.min.js"></script>
<script src="src/assets/js/daterangepicker.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="src/assets/js/metisMenu.min.js"></script>	
<script>
    $('#side-menu').metisMenu();
</script>

<script>
        // Course Expire and Start Daterange Script
    $(function() {
        $('input[name="edu-expire"]').daterangepicker({
        singleDatePicker: true,
        });
        $('input[name="edu-expire"]').val('');
        $('input[name="edu-expire"]').attr("placeholder","Course Expire");
    });
    $(function() {
        $('input[name="edu-start"]').daterangepicker({
        singleDatePicker: true,
        
        });
        $('input[name="start"]').val('');
        $('input[name="start"]').attr("placeholder","Course Start");
    });
</script>